<?php require_once('../Connections/connect2data.php'); ?>

<?php
$menu_is = "member";

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recmember = 10;
$pageNum_Recmember = 0;
if (isset($_GET['pageNum_Recmember'])) {
    $pageNum_Recmember = $_GET['pageNum_Recmember'];
}
$startRow_Recmember = $pageNum_Recmember * $maxRows_Recmember;

$query_Recmember = "SELECT * FROM `client` ORDER BY user_id ASC";
$query_limit_Recmember = sprintf("%s LIMIT %d, %d", $query_Recmember, $startRow_Recmember, $maxRows_Recmember);
$Recmember = $conn->query($query_limit_Recmember);
$row_Recmember = $Recmember->fetch();

if (isset($_GET['totalRows_Recmember'])) {
    $totalRows_Recmember = $_GET['totalRows_Recmember'];
} else {
    $all_Recmember = $conn->query($query_Recmember);
    $totalRows_Recmember = $all_Recmember->rowCount();
}
$totalPages_Recmember = ceil($totalRows_Recmember / $maxRows_Recmember) - 1;

$queryString_Recmember = "";
if (!empty($_SERVER['QUERY_STRING'])) {
    $params = explode("&", $_SERVER['QUERY_STRING']);
    $newParams = array();
    foreach ($params as $param) {
        if (stristr($param, "pageNum_Recmember") == false &&
            stristr($param, "totalRows_Recmember") == false) {
            array_push($newParams, $param);
        }
    }
    if (count($newParams) != 0) {
        $queryString_Recmember = "&" . htmlentities(implode("&", $newParams));
    }
}
$queryString_Recmember = sprintf("&totalRows_Recmember=%d%s", $totalRows_Recmember, $queryString_Recmember);

// ====================================================================

$R_pageNum_Recmember = 0;
if (isset($_REQUEST["pageNum_Recmember"])) {
    $R_pageNum_Recmember = $_REQUEST["pageNum_Recmember"];
}
if (!isset($R_pageNum_Recmember)) {
    $_SESSION["ToPage"] = 0;
}
//若指定分頁數小於1則預設顯示第一頁
else if ($R_pageNum_Recmember < 0) {
    $_SESSION["ToPage"] = 0;
}
//若指定指定的分頁超過總分頁數則顯示最後一頁
else if ($R_pageNum_Recmember > $totalPages_Recmember) {
    $_SESSION["ToPage"] = $TotalPage;
} else {
    $_SESSION["ToPage"] = $R_pageNum_Recmember;
}

//如果指定的頁面大於資料所擁有的頁面,轉到最大的頁面
if ($R_pageNum_Recmember > $totalPages_Recmember && $R_pageNum_Recmember != 0) {
    header("Location:member_list.php?pageNum_Recmember=" . $totalPages_Recmember);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php require_once('cmsTitle.php'); ?></title>

    <?php require_once('script.php'); ?>
    <?php require_once('head.php');?>
</head>
<body>
    <table width="1280" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <?php require_once('cmsHeader.php'); ?>
                <?php require_once('top.php'); ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="left">
                            <!-- InstanceBeginEditable name="編輯區域" -->
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="300" class="list_title">盟主列表</td>
                                    <td width="724"><span class="no_data">
									<?php if ($totalRows_Recmember == 0) { // Show if recordset empty ?>
										<strong>抱歉!找不到任何資料~</strong>
									<?php } // Show if recordset empty ?>
									</span></td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
                                <tr>
                                    <td width="739" align="right" class="page_display">
	                                    <!-------顯示頁選擇與分頁設定開始---------->
	                                    <table border="0">
	                                        <tr>
	                                            <td>
	                                                <?php if ($pageNum_Recmember > 0) { // Show if not first page ?>
	                                                <a href="<?php printf(" %s?pageNum_Recmember=%d%s ", $currentPage, max(0, $pageNum_Recmember - 1), $queryString_Recmember); ?>">
	                                                <</a>
	                                                <?php } // Show if not first page ?>
	                                            </td>
	                                            <td>
	                                                <?php
													//echo $totalRows_Recmember;//所有筆數
													//echo $totalPages_Recmember;//最後分頁的頁數,由0開始的陣列
													//echo $pageNum_Recmember;//現在顯示的頁面,由0開始的陣列
													//echo $currentPage;//現在的目錄路徑
													//echo $queryString_Recmember;//以字串顯示所有的筆數,如&totalRows_Recmember=11
													if($totalPages_Recmember<10) {
														if($totalRows_Recmember == 0) {
															//如果沒有任何資料，不顯示|符號
														} else {
															echo " | ";
														}

														for ($i=1; $i<=$totalPages_Recmember+1; $i++) {
															//如果非正在顯示的分頁則建立頁碼連結
															if ($i != $pageNum_Recmember+1 ) {
																echo "<a href=";
																printf("%s?pageNum_Recmember=%d%s", $currentPage, $i-1, $queryString_Recmember);
																echo ">" . $i . "</a> | " ;
															} else {
																//如果是正在顯示的方頁則單純顯示頁碼
																echo "<font style=\"text-decoration: underline;\">".$i ."</font>"." | " ;
															}
														}
													} else {
														//$totalPages_Recmember>10
														$morePage_num=$totalPages_Recmember-$pageNum_Recmember;//此頁面之後總共有多少
														if($morePage_num>7) {
															if($pageNum_Recmember<3) {
																if($totalRows_Recmember == 0) {
																	//如果沒有任何資料，不顯示|符號
																} else {
																	echo " | ";
																}

																for ($i=1; $i<=10; $i++) {
																	//如果非正在顯示的分頁則建立頁碼連結
																	if ($i != $pageNum_Recmember+1 ) {
																		echo "<a href=";
																		printf("%s?pageNum_Recmember=%d%s", $currentPage, $i-1, $queryString_Recmember);
																		echo ">" . $i . "</a> | " ;
																	} else {
																		//如果是正在顯示的方頁則單純顯示頁碼
																		echo "<font style=\"text-decoration: underline;\">".$i ."</font>"." | " ;
																	}
																}

																echo "<a href=";
																printf("%s?pageNum_Recmember=%d%s", $currentPage, $totalPages_Recmember, $queryString_Recmember);
																echo ">..." .($totalPages_Recmember+1). "</a> | " ;
															} else {
																//$pageNum_Recmember>=3
																echo "<a href=";
																printf("%s?pageNum_Recmember=%d%s", $currentPage, 0, $queryString_Recmember);
																echo ">" . 1 . "...</a> | " ;

																for ($i=$pageNum_Recmember-1; $i<=$pageNum_Recmember+8; $i++) {
																	//如果非正在顯示的分頁則建立頁碼連結
																	if ($i != $pageNum_Recmember+1 ) {
																		echo "<a href=";
																		printf("%s?pageNum_Recmember=%d%s", $currentPage, $i-1, $queryString_Recmember);
																		echo ">" . $i . "</a> | " ;
																	} else {
																		//如果是正在顯示的方頁則單純顯示頁碼
																		echo "<font style=\"text-decoration: underline;\">".$i ."</font>"." | " ;
																	}
																}

																echo "<a href=";
																printf("%s?pageNum_Recmember=%d%s", $currentPage, $totalPages_Recmember, $queryString_Recmember);
																echo ">..." .($totalPages_Recmember+1). "</a> | " ;
															}
														} else {
															//$morePage_num<=7
															$beforePage_num=9-$morePage_num;
															$beforePage=$pageNum_Recmember-$beforePage_num;

															//echo "<br>beforePage_num=".$beforePage_num."<br>";
															//echo "beforePage=".$beforePage."<br>";

															echo "<a href=";
															printf("%s?pageNum_Recmember=%d%s", $currentPage, 0, $queryString_Recmember);
															echo ">" . 1 . "...</a> | " ;

															for ($i=$beforePage+1; $i<=$totalPages_Recmember+1; $i++) {
																//如果非正在顯示的分頁則建立頁碼連結
																if ($i != $pageNum_Recmember+1 ) {
																	echo "<a href=";
																	printf("%s?pageNum_Recmember=%d%s", $currentPage, $i-1, $queryString_Recmember);
																	echo ">" . $i . "</a> | " ;
																} else {
																	//如果是正在顯示的方頁則單純顯示頁碼
																	echo "<font style=\"text-decoration: underline;\">".$i ."</font>"." | " ;
																}
															}
														}
													}
													?>
	                                            </td>
	                                            <td>
	                                                <?php if ($pageNum_Recmember < $totalPages_Recmember) { // Show if not last page ?>
	                                                <a href="<?php printf(" %s?pageNum_Recmember=%d%s ", $currentPage, min($totalPages_Recmember, $pageNum_Recmember + 1), $queryString_Recmember); ?>">></a>
	                                                <?php } // Show if not last page ?>
	                                            </td>
	                                        </tr>
	                                    </table>
	                                    <!-------顯示頁選擇與分頁設定結束---------->
	                                </td>
                                    <td width="110" align="right" class="page_display">
                                        <?php if ($totalRows_Recmember > 0) { // Show if recordset not empty ?> 頁數:
                                        <?php echo (($pageNum_Recmember+1)."/".($totalPages_Recmember+1)); ?>
                                        <?php } // Show if recordset not empty ?>
                                    </td>
                                    <td width="151" align="right" class="page_display">所有資料數: <?php echo $totalRows_Recmember ?> </td>
                                    <td width="24" align="right">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><img src="image/spacer.gif" width="1" height="1" /></td>
                                </tr>
                            </table>
                            <form action="member_process.php" method="post" name="form1" id="form1">
                                <?php if ($totalRows_Recmember > 0) { // Show if recordset not empty ?>
                                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
                                    <tr>
                                        <td width="759" align="center" class="table_title">盟主帳號</td>
                                        <td width="100" align="center" class="table_title">帳號是否有效</td>
                                        <td width="60" align="center" class="table_title">修改</td>
                                        <td width="60" align="center" class="table_title">刪除</td>
                                    </tr>
                                    <?php $i=0; do { $i++; ?>
						  			<tr <?php if ($i%2==0): ?>bgcolor='#E4E4E4'<?php endif ?>>
                                        <td align="center" class="table_data">
                                            <a href="member_edit.php?user_id=<?php echo $row_Recmember['user_id']; ?>">
                                                <?php echo $row_Recmember['user_name']; ?>
                                            </a>
                                        </td>
                                        <td align="center" class="table_data">
                                            <?php  //list使用
											if($row_Recmember['user_active']) {
												echo "<a href='".$row_Recmember['user_active']."' rel='".$row_Recmember['user_id']."' class='activeChMember'><img src=\"image/accept.png\" width=\"16\" height=\"16\"  ></a>";
											} else {
												echo "<a href='".$row_Recmember['user_active']."' rel='".$row_Recmember['user_id']."' class='activeChMember'><img src=\"image/delete.png\" width=\"16\" height=\"16\"  ></a>";
											} ?>
                                        </td>
                                        <td align="center" class="table_data"><a href="member_edit.php?user_id=<?php echo $row_Recmember['user_id']; ?>"><img src="image/pencil.png" width="16" height="16" /></a></td>
                                        <td align="center" class="table_data">
                                            <!-- <?php if( $row_Recmember['user_limit']!=1 ){?>
                                            <a href="member_del.php?user_id=<?php echo $row_Recmember['user_id']; ?>"><img src="image/cross.png" width="16" height="16" /></a>
                                            <?php }else{echo '不可刪除'; } ?> -->

                                            <a href="member_del.php?user_id=<?php echo $row_Recmember['user_id']; ?>"><img src="image/cross.png" width="16" height="16" /></a>
                                        </td>
				                    </tr>
				                    <?php } while ($row_Recmember = $Recmember->fetch()); ?>
			                    </table>
		                    	<?php } // Show if recordset not empty ?>
		                    </form>
		                    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
		                        <tr>
		                            <td width="739" align="right" class="page_display">
		                                <!-------顯示頁選擇與分頁設定開始---------->
		                                <table border="0">
		                                    <tr>
		                                        <td>
		                                            <?php if ($pageNum_Recmember > 0) { // Show if not first page ?>
		                                            <a href="<?php printf(" %s?pageNum_Recmember=%d%s ", $currentPage, max(0, $pageNum_Recmember - 1), $queryString_Recmember); ?>"><</a>
		                                            <?php } // Show if not first page ?>
		                                        </td>
		                                        <td>
		                                            <?php
													//echo $totalRows_Recmember;//所有筆數
													//echo $totalPages_Recmember;//最後分頁的頁數,由0開始的陣列
													//echo $pageNum_Recmember;//現在顯示的頁面,由0開始的陣列
													//echo $currentPage;//現在的目錄路徑
													//echo $queryString_Recmember;//以字串顯示所有的筆數,如&totalRows_Recmember=11
													if($totalPages_Recmember<10) {
														if($totalRows_Recmember == 0) {
															//如果沒有任何資料，不顯示|符號
														} else {
															echo " | ";
														}

														for ($i=1; $i<=$totalPages_Recmember+1; $i++) {
															//如果非正在顯示的分頁則建立頁碼連結
															if ($i != $pageNum_Recmember+1 ) {
																echo "<a href=";
																printf("%s?pageNum_Recmember=%d%s", $currentPage, $i-1, $queryString_Recmember);
																echo ">" . $i . "</a> | " ;
															} else {
																//如果是正在顯示的方頁則單純顯示頁碼
																echo "<font style=\"text-decoration: underline;\">".$i ."</font>"." | " ;
															}
														}
													} else {
														//$totalPages_Recmember>10
														$morePage_num=$totalPages_Recmember-$pageNum_Recmember; //此頁面之後總共有多少
														if($morePage_num>7) {
															if($pageNum_Recmember<3) {
																if($totalRows_Recmember == 0) {
																	//如果沒有任何資料，不顯示|符號
																} else {
																	echo " | ";
																}

																for ($i=1; $i<=10; $i++) {
																	//如果非正在顯示的分頁則建立頁碼連結
																	if ($i != $pageNum_Recmember+1 ) {
																		echo "<a href=";
																		printf("%s?pageNum_Recmember=%d%s", $currentPage, $i-1, $queryString_Recmember);
																		echo ">" . $i . "</a> | " ;
																	} else {
																		//如果是正在顯示的方頁則單純顯示頁碼
																		echo "<font style=\"text-decoration: underline;\">".$i ."</font>"." | " ;
																	}
																}

																echo "<a href=";
																printf("%s?pageNum_Recmember=%d%s", $currentPage, $totalPages_Recmember, $queryString_Recmember);
																echo ">..." .($totalPages_Recmember+1). "</a> | " ;
															} else {
																//$pageNum_Recmember>=3
																echo "<a href=";
																printf("%s?pageNum_Recmember=%d%s", $currentPage, 0, $queryString_Recmember);
																echo ">" . 1 . "...</a> | " ;

																for ($i=$pageNum_Recmember-1; $i<=$pageNum_Recmember+8; $i++) {
																	//如果非正在顯示的分頁則建立頁碼連結
																	if ($i != $pageNum_Recmember+1 ) {
																		echo "<a href=";
																		printf("%s?pageNum_Recmember=%d%s", $currentPage, $i-1, $queryString_Recmember);
																		echo ">" . $i . "</a> | " ;
																	} else {
																		//如果是正在顯示的方頁則單純顯示頁碼
																		echo "<font style=\"text-decoration: underline;\">".$i ."</font>"." | " ;
																	}
																}

																echo "<a href=";
																printf("%s?pageNum_Recmember=%d%s", $currentPage, $totalPages_Recmember, $queryString_Recmember);
																echo ">..." .($totalPages_Recmember+1). "</a> | " ;
															}
														} else {
															//$morePage_num<=7
															$beforePage_num=9-$morePage_num;
															$beforePage=$pageNum_Recmember-$beforePage_num;

															//echo "<br>beforePage_num=".$beforePage_num."<br>";
															//echo "beforePage=".$beforePage."<br>";

															echo "<a href=";
															printf("%s?pageNum_Recmember=%d%s", $currentPage, 0, $queryString_Recmember);
															echo ">" . 1 . "...</a> | " ;

															for ($i=$beforePage+1; $i<=$totalPages_Recmember+1; $i++) {
																//如果非正在顯示的分頁則建立頁碼連結
																if ($i != $pageNum_Recmember+1 ) {
																	echo "<a href=";
																	printf("%s?pageNum_Recmember=%d%s", $currentPage, $i-1, $queryString_Recmember);
																	echo ">" . $i . "</a> | " ;
																} else {
																	//如果是正在顯示的方頁則單純顯示頁碼
																	echo "<font style=\"text-decoration: underline;\">".$i ."</font>"." | " ;
																}
															}
														}
													}
													?>
		                                        </td>
		                                        <td>
		                                            <?php if ($pageNum_Recmember < $totalPages_Recmember) { // Show if not last page ?>
		                                            <a href="<?php printf(" %s?pageNum_Recmember=%d%s ", $currentPage, min($totalPages_Recmember, $pageNum_Recmember + 1), $queryString_Recmember); ?>">></a>
		                                            <?php } // Show if not last page ?>
		                                        </td>
		                                    </tr>
		                                </table>
		                                <!-------顯示頁選擇與分頁設定結束---------->
		                            </td>
		                            <td width="110" align="right" class="page_display">
		                                <?php if ($totalRows_Recmember > 0) { // Show if recordset not empty ?> 頁數:
		                                <?php echo (($pageNum_Recmember+1)."/".($totalPages_Recmember+1)); ?>
		                                <?php } // Show if recordset not empty ?>
		                            </td>
		                            <td width="151" align="right" class="page_display">所有資料數: <?php echo $totalRows_Recmember ?></td>
		                            <td width="24" align="right">&nbsp;</td>
		                        </tr>
		                    </table>
		                    <!-- InstanceEndEditable -->
            			</td>
					</tr>
    		    </table>
			</td>
        </tr>
    </table>
</body>
</html>