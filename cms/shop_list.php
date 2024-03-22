<?php require_once('../Connections/connect2data.php'); ?>

<?php
$menu_is = "shop";

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recshop = 20;
$pageNum = 0;
if (isset($_GET['pageNum'])) {
    $pageNum = $_GET['pageNum'];
}
$startRow_Recshop = $pageNum * $maxRows_Recshop;


// 主分類
$query_RecshopC = "SELECT * FROM class_set WHERE c_parent = 'shopC' AND c_active='1' AND c_level='1' ORDER BY c_sort ASC, c_id DESC";
$RecshopC = $conn->query($query_RecshopC);
$row_RecshopC = $RecshopC->fetch();
$totalRowsC = $RecshopC->rowCount();


$G_selected1 = '';

if (isset($_GET['selected1'])) {
    $_SESSION['selected_shopC'] = $G_selected1 = $_GET['selected1'];
    $G_selected1_SQL = "AND c_link=" . $_GET['selected1'];
} else if ($row_RecshopC['c_id']) {
    $_SESSION['selected_shopC'] = $G_selected1 = $row_RecshopC['c_id'];
    $G_selected1_SQL = "AND c_link=" . $row_RecshopC['c_id'];
} else{
    $G_selected1_SQL = "AND c_link=-1";
}



// 次分類
$query_RecshopC_level2 = "SELECT * FROM class_set WHERE c_parent = 'shopC' AND c_active='1' AND c_level='2' $G_selected1_SQL ORDER BY c_sort ASC, c_id DESC";
$RecshopC_level2 = $conn->query($query_RecshopC_level2);
$row_RecshopC_level2 = $RecshopC_level2->fetch();
$totalRowsC = $RecshopC_level2->rowCount();

$G_selected2 = '';

if (isset($_GET['selected2'])) {
    $_SESSION['selected_shopC_level2'] = $G_selected2 = $_GET['selected2'];
    $G_selected2_SQL = "AND d_class2=" . $_GET['selected2'];
} else if ($row_RecshopC_level2['c_id']) {
    $_SESSION['selected_shopC_level2'] = $G_selected2 = $row_RecshopC_level2['c_id'];
    $G_selected2_SQL = "AND d_class2=" . $row_RecshopC_level2['c_id'];
} else{
    $G_selected2_SQL = "AND d_class2=-1";
}





$query_Recshop = "SELECT data_set.*, class_set.c_title as c_title FROM data_set LEFT JOIN class_set ON data_set.d_class2 =class_set.c_id WHERE d_class1 = 'shop' $G_selected2_SQL ORDER BY d_sort ASC, d_date DESC";
$query_limit_Recshop = sprintf("%s LIMIT %d, %d", $query_Recshop, $startRow_Recshop, $maxRows_Recshop);
$Recshop = $conn->query($query_limit_Recshop);
$row_Recshop = $Recshop->fetch();


$S_original_selected = '';
if (isset($_SESSION['original_selected'])) {
    $S_original_selected = $_SESSION['original_selected'];
}
$all_Recshop = $conn->query($query_Recshop);
$totalRows = $all_Recshop->rowCount();

$all_Recshop = $conn->query($query_Recshop);
$totalRows = $all_Recshop->rowCount();
$totalPages_Recshop = ceil($totalRows / $maxRows_Recshop) - 1;
$TotalPage = $totalPages_Recshop;

$_SESSION['totalRows']=$totalRows;

$queryString_Recshop = "";
if (!empty($_SERVER['QUERY_STRING'])) {
    $params = explode("&", $_SERVER['QUERY_STRING']);
    $newParams = array();
    foreach ($params as $param) {
        if (stristr($param, "pageNum") == false &&
            stristr($param, "totalRows") == false) {
            array_push($newParams, $param);
        }
    }
    if (count($newParams) != 0) {
        $queryString_Recshop = "&" . htmlentities(implode("&", $newParams));
    }
}
$queryString_Recshop = sprintf("&totalRows=%d%s", $totalRows, $queryString_Recshop);

// ====================================================================

$R_pageNum = 0;
if (isset($_REQUEST["pageNum"])) {
    $R_pageNum = $_REQUEST["pageNum"];
}
if (!isset($R_pageNum)) {
    $_SESSION["ToPage"] = 0;
}
//若指定分頁數小於1則預設顯示第一頁
else if ($R_pageNum < 0) {
    $_SESSION["ToPage"] = 0;
}
//若指定指定的分頁超過總分頁數則顯示最後一頁
else if ($R_pageNum > $totalPages_Recshop) {
    $_SESSION["ToPage"] = $TotalPage;
} else {
    $_SESSION["ToPage"] = $R_pageNum;
}

//如果指定的頁面大於資料所擁有的頁面,轉到最大的頁面
if ($R_pageNum > $totalPages_Recshop && $R_pageNum != 0) {
    header("Location:shop_list.php?pageNum=" . $totalPages_Recshop);
}

//修改排序
$G_changeSort = 0;
$G_delchangeSort = 0;
if (isset($_GET['changeSort'])) {
    $G_changeSort = $_GET['changeSort'];
}
if (isset($_GET['delchangeSort'])) {
    $G_delchangeSort = $_GET['delchangeSort'];
}
if ($G_changeSort == 1 || $G_delchangeSort == 1) {

    $sort_num = 1;

    $query_Recshop = "SELECT data_set.*, class_set.c_title as c_title FROM data_set LEFT JOIN class_set ON data_set.d_class2 =class_set.c_id WHERE d_class1 = 'shop' $G_selected2_SQL ORDER BY d_sort ASC, d_date DESC";
    $_SESSION['selected_shopC'] = $G_selected1;
    $_SESSION['selected_shopC_level2'] = $G_selected2;

    $Recshop = $conn->query($query_Recshop);
    $row_Recshop = $Recshop->fetch();

    do {
        if ($row_Recshop['d_sort'] == 0) {} else if ($row_Recshop['d_id'] == $_GET['now_d_id']) {
            //echo 'sort_num(now_d_id) = '.$sort_num."<br/>";

        } else if ($sort_num == $_GET['change_num']) {
            //echo 'sort_num(change_num) = '.$sort_num."<br/>";
            $sort_num++;

            $updateSQL = "UPDATE data_set SET d_sort=:d_sort WHERE d_id=:d_id";

            $stat = $conn->prepare($updateSQL);
            $stat->bindParam(':d_sort', $sort_num, PDO::PARAM_INT);
            $stat->bindParam(':d_id', $row_Recshop['d_id'], PDO::PARAM_INT);
            $stat->execute();

            $sort_num++;
        } else {
            $updateSQL = "UPDATE data_set SET d_sort=:d_sort WHERE d_id=:d_id";

            $stat = $conn->prepare($updateSQL);
            $stat->bindParam(':d_sort', $sort_num, PDO::PARAM_INT);
            $stat->bindParam(':d_id', $row_Recshop['d_id'], PDO::PARAM_INT);
            $stat->execute();

            // echo $sort_num . "<br/>";
            // echo $row_Recshop['d_title'] . "->" . $sort_num . "<br/>";

            $sort_num++;
        }
    } while ($row_Recshop = $Recshop->fetch());

    $updateSQL = "UPDATE data_set SET d_sort=:d_sort WHERE d_id=:d_id";

    $stat = $conn->prepare($updateSQL);
    $stat->bindParam(':d_sort', $_GET['change_num'], PDO::PARAM_INT);
    $stat->bindParam(':d_id', $_GET['now_d_id'], PDO::PARAM_INT);
    $stat->execute();

    if ($G_changeSort == 1) {
        if (isset($_GET['now_d_id'])) {
            header("Location:shop_list.php?selected1=" . $G_selected1 . "&selected2=" . $G_selected2 . "&pageNum=" . $_GET['pageNum'] . "&totalRows=" . $_GET['totalRows'] . "#" . $_GET['now_d_id']);
        } else {
            $query1 = ($G_selected1) ? "selected1=$G_selected1" : "";
            $query2 = ($G_selected2) ? "selected2=$G_selected2" : "";
            header("Location:shop_list.php?". $query1 ."&". $query2 ."&pageNum=" . $_GET['pageNum'] . "&totalRows=" . $_GET['totalRows']);
        }
    } else if ($G_delchangeSort == 1) {
        header("Location:shop_list.php?selected1=" . $G_selected1 . "&selected2=" . $G_selected2 . "&pageNum=" . $_GET['pageNum']);
    }
}

require_once 'display_page.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php require_once('cmsTitle.php'); ?></title>

    <link rel="stylesheet" href="jquery/chosen_v1.8.5/chosen.css">

    <style>
        .chosen-container{
            position: relative;
            top: -3px;
        }
    </style>

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
                                    <td width="150" class="list_title">列表</td>
                                    <td width="874">
                                        <span class="table_data">主分類：
                                            <select name="select1" id="select1" class="chosen-select">
                                                <?php do {?>
                                                    <option value="<?php echo $row_RecshopC['c_id']?>"<?php if (!(strcmp($row_RecshopC['c_id'], $G_selected1))) {echo "selected=\"selected\"";} ?>><?php echo $row_RecshopC['c_title']?><?php //echo $row_RecshopC['c_id']?></option>
                                                    <?php
                                                } while ($row_RecshopC = $RecshopC->fetch());
                                                $rows = $RecshopC->rowCount();
                                                if($rows > 0) {
                                                    $RecshopC->execute();
                                                }
                                                ?>
                                            </select>
                                        </span>

                                        <span class="table_data" style="margin-left: 10px;">次分類：
                                            <select name="select2" id="select2" class="chosen-select">
                                                <?php do {?>
                                                    <option value="<?php echo $row_RecshopC_level2['c_id']?>"<?php if (!(strcmp($row_RecshopC_level2['c_id'], $G_selected2))) {echo "selected=\"selected\"";} ?>><?php echo $row_RecshopC_level2['c_title']?></option>
                                                    <?php
                                                } while ($row_RecshopC_level2 = $RecshopC_level2->fetch());
                                                $rows = $RecshopC_level2->rowCount();
                                                if($rows > 0) {
                                                    $RecshopC_level2->execute();
                                                }
                                                ?>
                                            </select>
                                        </span>

                                        <span class="no_data">
                                            <?php if ($totalRows == 0) { // Show if recordset empty ?>
                                            <strong>此分類沒有資料</strong>
                                            <?php } // Show if recordset empty ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
                                <tr>
                                    <td width="739" align="right" class="page_display">
                                        <!-------顯示頁選擇與分頁設定開始---------->
                                        <?php displayPages($pageNum, $queryString_Recshop, $totalPages_Recshop, $totalRows, $currentPage); ?>
                                        <!-------顯示頁選擇與分頁設定結束---------->
                                    </td>
                                    <td width="110" align="right" class="page_display">
                                        <?php if ($totalRows > 0) { // Show if recordset not empty ?> 頁數:
                                        <?php echo (($pageNum+1)."/".($totalPages_Recshop+1)); ?>
                                        <?php } // Show if recordset not empty ?>
                                    </td>
                                    <td width="151" align="right" class="page_display">所有資料數:
                                        <?php echo $totalRows ?> </td>
                                    <td width="24" align="right">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><img src="image/spacer.gif" width="1" height="1" /></td>
                                </tr>
                            </table>
                            <form action="shop_process.php" method="post" name="form1" id="form1">
                                <?php if ($totalRows > 0) { // Show if recordset not empty ?>
                                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
                                    <tr>
                                        <td width="142" align="center" class="table_title">日期</td>
                                        <td width="74" align="center" class="table_title">排序</td>
                                        <td width="470" align="center" class="table_title">標題</td>
                                        <td width="140" align="center" class="table_title">圖片</td>
                                        <td width="60" align="center" class="table_title">在網頁顯示</td>
                                        <td width="30" align="center" class="table_title">編輯</td>
                                        <td width="30" align="center" class="table_title">刪除</td>
                                    </tr>
                                    <?php
                                    $i=0;
                                    do {
                                        $i++;
                                        $colname_RecImage = "-1";
                                        if (isset($row_Recshop['d_id'])) {
                                          $colname_RecImage = $row_Recshop['d_id'];
                                        }
                                        $query_RecImage = "SELECT * FROM file_set  WHERE file_type='shopCover' AND file_d_id = ".$row_Recshop['d_id'];
                                        $RecImage = $conn->query($query_RecImage);
                                        $row_RecImage = $RecImage->fetch();
                                        $totalRows_RecImage = $RecImage->rowCount();
                                    ?>
                                    <tr <?php if ($i%2==0): ?>bgcolor='#E4E4E4'<?php endif ?>>
                                        <td align="center" class="table_data">
                                            <?php
                                            if(1){
                                                echo '<a href="shop_edit.php?d_id='.$row_Recshop['d_id'].'">'.$row_Recshop['d_date'].'</a>';
                                            }else{
                                                echo $row_Recshop['d_date'];
                                            }
                                            ?>
                                        </td>
                                        <td align="center" class="table_data">
                                            <select name="d_sort" id="d_sort" onchange="changeSort('<?php echo $pageNum; ?>','<?php echo $totalRows; ?>','<?php echo $row_Recshop['d_id']; ?>',this.options[this.selectedIndex].value,<?= $G_selected1 ?>,<?= $G_selected2 ?>)">
                                                <option value="0" <?php if (!(strcmp(0, $row_Recshop[ 'd_sort']))) {echo "selected";} ?>>至頂</option>
                                                <?php
                                                for($j=1;$j<=($totalRows);$j++) {
                                                    echo "<option value=\"".$j."\" ";
                                                    if (!(strcmp($j, $row_Recshop['d_sort']))) {echo "selected=\"selected\"";}
                                                    echo ">".$j."</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td align="center" class="table_data">
                                            <a href="shop_edit.php?d_id=<?php echo $row_Recshop['d_id']; ?>">
                                                <?php echo $row_Recshop['d_title']; ?>
                                            </a>
                                        </td>
                                        <td align="center" class="table_data"><a href="shop_edit.php?d_id=<?php echo $row_Recshop['d_id']; ?>">
                                            <?php if ($totalRows_RecImage==0): ?>
                                                <img src="image/default_image_s.jpg">
                                            <?php else: ?>
                                                <img src="../<?= $row_RecImage['file_link2'] ?>">
                                            <?php endif ?>
                                        </a></td>
                                        <td align="center" class="table_data">
                                            <?php  //list使用
                                            if($row_Recshop['d_active']) {
                                                echo "<a href='".$row_Recshop['d_active']."' rel='".$row_Recshop['d_id']."' class='activeCh'><img src=\"image/accept.png\" width=\"16\" height=\"16\"  ></a>";
                                            } else {
                                                echo "<a href='".$row_Recshop['d_active']."' rel='".$row_Recshop['d_id']."' class='activeCh'><img src=\"image/delete.png\" width=\"16\" height=\"16\"  ></a>";
                                            }
                                            ?>
                                        </td>
                                        <td align="center" class="table_data"><a href="shop_edit.php?d_id=<?php echo $row_Recshop['d_id']; ?>"><img src="image/pencil.png" width="16" height="16" /></a></td>
                                        <td align="center" class="table_data"><a href="shop_del.php?d_id=<?php echo $row_Recshop['d_id']; ?>"><img src="image/cross.png" width="16" height="16" /></a></td>
                                    </tr>
                                    <?php } while ($row_Recshop = $Recshop->fetch()); ?>
                                </table>
                                <?php } // Show if recordset not empty ?>
                            </form>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
                                <tr>
                                    <td width="739" align="right" class="page_display">
                                        <!-------顯示頁選擇與分頁設定開始---------->
                                        <?php displayPages($pageNum, $queryString_Recshop, $totalPages_Recshop, $totalRows, $currentPage); ?>
                                        <!-------顯示頁選擇與分頁設定結束---------->
                                    </td>
                                    <td width="110" align="right" class="page_display">
                                        <?php if ($totalRows > 0) { // Show if recordset not empty ?> 頁數:
                                        <?php echo (($pageNum+1)."/".($totalPages_Recshop+1)); ?>
                                        <?php } // Show if recordset not empty ?>
                                    </td>
                                    <td width="151" align="right" class="page_display">所有資料數:
                                        <?php echo $totalRows ?> </td>
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

<script src="jquery/chosen_v1.8.5/chosen.jquery.js"></script>

<script type="text/javascript">
    $(".chosen-select").chosen({
        disable_search_threshold: 6,
        no_results_text: "找不到資料。 目前輸入的是:",
        placeholder_text_single: "尚未新增分類",
        width: "120px"
    });

	function changeSort(pageNum, totalRows, now_d_id, change_num, selected1, selected2) {
	    window.location.href = "shop_list.php?selected1=" + selected1 + "&selected2=" + selected2 + "&changeSort=1" + "&now_d_id=" + now_d_id + "&change_num=" + change_num + "&pageNum=" + pageNum + "&totalRows=" + totalRows;
	}

	$(document).ready(function() {
		$('#select1').change(function() {
			window.location.href = "shop_list.php?changeSort=1&selected1="+$(this).val();
		});

        $('#select2').change(function() {
            window.location.href = "shop_list.php?changeSort=1&selected1="+$('#select1').val()+"&selected2="+$(this).val();
        });
	});
</script>