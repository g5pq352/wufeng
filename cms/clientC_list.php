<?php require_once('../Connections/connect2data.php'); ?>

<?php
$menu_is = "client";

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_RecclientC = 10;
$pageNum_RecclientC = 0;
if (isset($_GET['pageNum_RecclientC'])) {
    $pageNum_RecclientC = $_GET['pageNum_RecclientC'];
}
$startRow_RecclientC = $pageNum_RecclientC * $maxRows_RecclientC;

$query_RecclientC = "SELECT * FROM a_set ORDER BY a_id ASC";
$query_limit_RecclientC = sprintf("%s LIMIT %d, %d", $query_RecclientC, $startRow_RecclientC, $maxRows_RecclientC);
$RecclientC = $conn->query($query_limit_RecclientC);
$row_RecclientC = $RecclientC->fetch();

if (isset($_GET['totalRows_RecclientC'])) {
    $totalRows_RecclientC = $_GET['totalRows_RecclientC'];
} else {
    $all_RecclientC = $conn->query($query_RecclientC);
    $totalRows_RecclientC = $all_RecclientC->rowCount();
}
$totalPages_RecclientC = ceil($totalRows_RecclientC / $maxRows_RecclientC) - 1;

$queryString_RecclientC = "";
if (!empty($_SERVER['QUERY_STRING'])) {
    $params = explode("&", $_SERVER['QUERY_STRING']);
    $newParams = array();
    foreach ($params as $param) {
        if (stristr($param, "pageNum_RecclientC") == false &&
            stristr($param, "totalRows_RecclientC") == false) {
            array_push($newParams, $param);
        }
    }
    if (count($newParams) != 0) {
        $queryString_RecclientC = "&" . htmlentities(implode("&", $newParams));
    }
}
$queryString_RecclientC = sprintf("&totalRows_RecclientC=%d%s", $totalRows_RecclientC, $queryString_RecclientC);

// ====================================================================

$R_pageNum_RecclientC = 0;
if (isset($_REQUEST["pageNum_RecclientC"])) {
    $R_pageNum_RecclientC = $_REQUEST["pageNum_RecclientC"];
}
if (!isset($R_pageNum_RecclientC)) {
    $_SESSION["ToPage"] = 0;
}
//若指定分頁數小於1則預設顯示第一頁
else if ($R_pageNum_RecclientC < 0) {
    $_SESSION["ToPage"] = 0;
}
//若指定指定的分頁超過總分頁數則顯示最後一頁
else if ($R_pageNum_RecclientC > $totalPages_RecclientC) {
    $_SESSION["ToPage"] = $TotalPage;
} else {
    $_SESSION["ToPage"] = $R_pageNum_RecclientC;
}

//如果指定的頁面大於資料所擁有的頁面,轉到最大的頁面
if ($R_pageNum_RecclientC > $totalPages_RecclientC && $R_pageNum_RecclientC != 0) {
    header("Location:clientC_list.php?pageNum_RecclientC=" . $totalPages_RecclientC);
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
                                    <td width="300" class="list_title">權限種類列表</td>
                                    <td width="724"><span class="no_data">
									<?php if ($totalRows_RecclientC == 0) { // Show if recordset empty ?>
										<strong>抱歉!找不到任何資料~</strong>
									<?php } // Show if recordset empty ?>
									</span> </td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
                                <tr>
                                    <td width="739" align="right" class="page_display">
                                        <!-------顯示頁選擇與分頁設定開始---------->
                                        <table border="0">
                                            <tr>
                                                <td>
                                                    <?php if ($pageNum_RecclientC > 0) { // Show if not first page ?>
                                                    <a href="<?php printf(" %s?pageNum_RecclientC=%d%s ", $currentPage, max(0, $pageNum_RecclientC - 1), $queryString_RecclientC); ?>"><</a>
                                                    <?php } // Show if not first page ?>
                                                </td>
                                                <td>
                                                	<?php
													//echo $totalRows_RecclientC;//所有筆數
													//echo $totalPages_RecclientC;//最後分頁的頁數,由0開始的陣列
													//echo $pageNum_RecclientC;//現在顯示的頁面,由0開始的陣列
													//echo $currentPage;//現在的目錄路徑
													//echo $queryString_RecclientC;//以字串顯示所有的筆數,如&totalRows_RecclientC=11
													if ($totalPages_RecclientC < 10) {
													    if ($totalRows_RecclientC == 0) {
													        //如果沒有任何資料，不顯示|符號
													    } else {
													        echo " | ";
													    }

													    for ($i = 1; $i <= $totalPages_RecclientC + 1; $i++) {
													        //如果非正在顯示的分頁則建立頁碼連結
													        if ($i != $pageNum_RecclientC + 1) {

													            echo "<a href=";
													            printf("%s?pageNum_RecclientC=%d%s", $currentPage, $i - 1, $queryString_RecclientC);
													            echo ">" . $i . "</a> | ";
													        }
													        //如果是正在顯示的方頁則單純顯示頁碼
													        else {
													            echo "<font style=\"text-decoration: underline;\">" . $i . "</font>" . " | ";
													        }
													    }
													} else {
													    //$totalPages_RecclientC>10
													    $morePage_num = $totalPages_RecclientC - $pageNum_RecclientC; //此頁面之後總共有多少
													    if ($morePage_num > 7) {
													        if ($pageNum_RecclientC < 3) {
													            if ($totalRows_RecclientC == 0) {
													                //如果沒有任何資料，不顯示|符號
													            } else {
													                echo " | ";
													            }

													            for ($i = 1; $i <= 10; $i++) {
													                //如果非正在顯示的分頁則建立頁碼連結
													                if ($i != $pageNum_RecclientC + 1) {

													                    echo "<a href=";
													                    printf("%s?pageNum_RecclientC=%d%s", $currentPage, $i - 1, $queryString_RecclientC);
													                    echo ">" . $i . "</a> | ";
													                } else {
													                    //如果是正在顯示的方頁則單純顯示頁碼
													                    echo "<font style=\"text-decoration: underline;\">" . $i . "</font>" . " | ";
													                }
													            }

													            echo "<a href=";
													            printf("%s?pageNum_RecclientC=%d%s", $currentPage, $totalPages_RecclientC, $queryString_RecclientC);
													            echo ">..." . ($totalPages_RecclientC + 1) . "</a> | ";
													        } else {
													            //$pageNum_RecclientC>=3
													            echo "<a href=";
													            printf("%s?pageNum_RecclientC=%d%s", $currentPage, 0, $queryString_RecclientC);
													            echo ">" . 1 . "...</a> | ";

													            for ($i = $pageNum_RecclientC - 1; $i <= $pageNum_RecclientC + 8; $i++) {
													                //如果非正在顯示的分頁則建立頁碼連結
													                if ($i != $pageNum_RecclientC + 1) {

													                    echo "<a href=";
													                    printf("%s?pageNum_RecclientC=%d%s", $currentPage, $i - 1, $queryString_RecclientC);
													                    echo ">" . $i . "</a> | ";
													                } else {
													                    //如果是正在顯示的方頁則單純顯示頁碼
													                    echo "<font style=\"text-decoration: underline;\">" . $i . "</font>" . " | ";
													                }
													            }

													            echo "<a href=";
													            printf("%s?pageNum_RecclientC=%d%s", $currentPage, $totalPages_RecclientC, $queryString_RecclientC);
													            echo ">..." . ($totalPages_RecclientC + 1) . "</a> | ";
													        }
													    } else {
													        //$morePage_num<=7
													        $beforePage_num = 9 - $morePage_num;
													        $beforePage = $pageNum_RecclientC - $beforePage_num;

													        echo "<a href=";
													        printf("%s?pageNum_RecclientC=%d%s", $currentPage, 0, $queryString_RecclientC);
													        echo ">" . 1 . "...</a> | ";

													        for ($i = $beforePage + 1; $i <= $totalPages_RecclientC + 1; $i++) {
													            //如果非正在顯示的分頁則建立頁碼連結
													            if ($i != $pageNum_RecclientC + 1) {
													                echo "<a href=";
													                printf("%s?pageNum_RecclientC=%d%s", $currentPage, $i - 1, $queryString_RecclientC);
													                echo ">" . $i . "</a> | ";
													            } else {
													                //如果是正在顯示的方頁則單純顯示頁碼
													                echo "<font style=\"text-decoration: underline;\">" . $i . "</font>" . " | ";
													            }
													        }
													    }
													}
													?>
                                                </td>
                                                <td>
                                                    <?php if ($pageNum_RecclientC < $totalPages_RecclientC) { // Show if not last page ?>
                                                    <a href="<?php printf(" %s?pageNum_RecclientC=%d%s ", $currentPage, min($totalPages_RecclientC, $pageNum_RecclientC + 1), $queryString_RecclientC); ?>">></a>
                                                    <?php } // Show if not last page ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-------顯示頁選擇與分頁設定結束---------->
                                    </td>
                                    <td width="110" align="right" class="page_display">
                                        <?php if ($totalRows_RecclientC > 0) { // Show if recordset not empty ?> 頁數:
                                        <?php echo (($pageNum_RecclientC+1)."/".($totalPages_RecclientC+1)); ?>
                                        <?php } // Show if recordset not empty ?>
                                    </td>
                                    <td width="151" align="right" class="page_display">所有資料數:
                                        <?php echo $totalRows_RecclientC ?> </td>
                                    <td width="24" align="right">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><img src="image/spacer.gif" width="1" height="1" /></td>
                                </tr>
                            </table>
                            <form action="clientC_process.php" method="post" name="form1" id="form1">
                                <?php if ($totalRows_RecclientC > 0) { // Show if recordset not empty ?>
                                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
                                    <tr>
                                        <td width="870" align="center" class="table_title">種類名稱</td>
                                        <td width="60" align="center" class="table_title">修改</td>
                                        <td width="60" align="center" class="table_title">刪除</td>
                                    </tr>
                                    <?php $i=0; do { $i++; ?>
						  			<tr <?php if ($i%2==0): ?>bgcolor='#E4E4E4'<?php endif ?>>
                                        <td align="center" class="table_data">
                                            <a href="clientC_edit.php?a_id=<?php echo $row_RecclientC['a_id']; ?>">
                                                <?php echo $row_RecclientC['a_title']; ?>
                                            </a>
                                        </td>
                                        <td align="center" class="table_data"><a href="clientC_edit.php?a_id=<?php echo $row_RecclientC['a_id']; ?>"><img src="image/pencil.png" width="16" height="16" /></a></td>
                                        <td align="center" class="table_data">
                                            <?php if( $row_RecclientC['a_id']!=1 ){?>
                                            <a href="clientC_del.php?a_id=<?php echo $row_RecclientC['a_id']; ?>"><img src="image/cross.png" width="16" height="16" /></a>
                                            <?php }else{echo '不可刪除'; } ?>
                                        </td>
				                    </tr>
				                    <?php } while ($row_RecclientC = $RecclientC->fetch()); ?>
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
		                                            <?php if ($pageNum_RecclientC > 0) { // Show if not first page ?>
		                                            <a href="<?php printf(" %s?pageNum_RecclientC=%d%s ", $currentPage, max(0, $pageNum_RecclientC - 1), $queryString_RecclientC); ?>"><</a>
		                                            <?php } // Show if not first page ?>
		                                        </td>
		                                        <td>
		                                            <?php
													//echo $totalRows_RecclientC;//所有筆數
													//echo $totalPages_RecclientC;//最後分頁的頁數,由0開始的陣列
													//echo $pageNum_RecclientC;//現在顯示的頁面,由0開始的陣列
													//echo $currentPage;//現在的目錄路徑
													//echo $queryString_RecclientC;//以字串顯示所有的筆數,如&totalRows_RecclientC=11
													if ($totalPages_RecclientC < 10) {
													    if ($totalRows_RecclientC == 0) {
													        //如果沒有任何資料，不顯示|符號
													    } else {
													        echo " | ";
													    }

													    for ($i = 1; $i <= $totalPages_RecclientC + 1; $i++) {
													        //如果非正在顯示的分頁則建立頁碼連結
													        if ($i != $pageNum_RecclientC + 1) {

													            echo "<a href=";
													            printf("%s?pageNum_RecclientC=%d%s", $currentPage, $i - 1, $queryString_RecclientC);
													            echo ">" . $i . "</a> | ";
													        } else {
													            //如果是正在顯示的方頁則單純顯示頁碼
													            echo "<font style=\"text-decoration: underline;\">" . $i . "</font>" . " | ";
													        }
													    }
													} else {
													    //$totalPages_RecclientC>10
													    $morePage_num = $totalPages_RecclientC - $pageNum_RecclientC; //此頁面之後總共有多少
													    if ($morePage_num > 7) {
													        if ($pageNum_RecclientC < 3) {
													            if ($totalRows_RecclientC == 0) {
													                //如果沒有任何資料，不顯示|符號
													            } else {
													                echo " | ";
													            }

													            for ($i = 1; $i <= 10; $i++) {
													                //如果非正在顯示的分頁則建立頁碼連結
													                if ($i != $pageNum_RecclientC + 1) {

													                    echo "<a href=";
													                    printf("%s?pageNum_RecclientC=%d%s", $currentPage, $i - 1, $queryString_RecclientC);
													                    echo ">" . $i . "</a> | ";
													                } else {
													                    //如果是正在顯示的方頁則單純顯示頁碼
													                    echo "<font style=\"text-decoration: underline;\">" . $i . "</font>" . " | ";
													                }
													            }

													            echo "<a href=";
													            printf("%s?pageNum_RecclientC=%d%s", $currentPage, $totalPages_RecclientC, $queryString_RecclientC);
													            echo ">..." . ($totalPages_RecclientC + 1) . "</a> | ";
													        } else {
													            //$pageNum_RecclientC>=3
													            echo "<a href=";
													            printf("%s?pageNum_RecclientC=%d%s", $currentPage, 0, $queryString_RecclientC);
													            echo ">" . 1 . "...</a> | ";

													            for ($i = $pageNum_RecclientC - 1; $i <= $pageNum_RecclientC + 8; $i++) {
													                //如果非正在顯示的分頁則建立頁碼連結
													                if ($i != $pageNum_RecclientC + 1) {

													                    echo "<a href=";
													                    printf("%s?pageNum_RecclientC=%d%s", $currentPage, $i - 1, $queryString_RecclientC);
													                    echo ">" . $i . "</a> | ";
													                } else {
													                    //如果是正在顯示的方頁則單純顯示頁碼
													                    echo "<font style=\"text-decoration: underline;\">" . $i . "</font>" . " | ";
													                }
													            }

													            echo "<a href=";
													            printf("%s?pageNum_RecclientC=%d%s", $currentPage, $totalPages_RecclientC, $queryString_RecclientC);
													            echo ">..." . ($totalPages_RecclientC + 1) . "</a> | ";
													        }
													    } else {
													        //$morePage_num<=7
													        $beforePage_num = 9 - $morePage_num;
													        $beforePage = $pageNum_RecclientC - $beforePage_num;

													        echo "<a href=";
													        printf("%s?pageNum_RecclientC=%d%s", $currentPage, 0, $queryString_RecclientC);
													        echo ">" . 1 . "...</a> | ";

													        for ($i = $beforePage + 1; $i <= $totalPages_RecclientC + 1; $i++) {
													            //如果非正在顯示的分頁則建立頁碼連結
													            if ($i != $pageNum_RecclientC + 1) {
													                echo "<a href=";
													                printf("%s?pageNum_RecclientC=%d%s", $currentPage, $i - 1, $queryString_RecclientC);
													                echo ">" . $i . "</a> | ";
													            } else {
													                //如果是正在顯示的方頁則單純顯示頁碼
													                echo "<font style=\"text-decoration: underline;\">" . $i . "</font>" . " | ";
													            }
													        }
													    }
													}
													?>
		                                        </td>
		                                        <td>
		                                            <?php if ($pageNum_RecclientC < $totalPages_RecclientC) { // Show if not last page ?>
		                                            <a href="<?php printf(" %s?pageNum_RecclientC=%d%s ", $currentPage, min($totalPages_RecclientC, $pageNum_RecclientC + 1), $queryString_RecclientC); ?>">></a>
		                                            <?php } // Show if not last page ?>
		                                        </td>
		                                        <?php ?>
		                                    </tr>
		                                </table>
		                                <!-------顯示頁選擇與分頁設定結束---------->
		                            </td>
		                            <td width="110" align="right" class="page_display">
		                                <?php if ($totalRows_RecclientC > 0) { // Show if recordset not empty ?> 頁數:
		                                <?php echo (($pageNum_RecclientC+1)."/".($totalPages_RecclientC+1)); ?>
		                                <?php } // Show if recordset not empty ?>
		                            </td>
		                            <td width="151" align="right" class="page_display">所有資料數:
		                                <?php echo $totalRows_RecclientC ?> </td>
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