<?php require_once('../Connections/connect2data.php'); ?>

<?php
$menu_is = "city";

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_ReccityC = 15;
$pageNum = 0;
if (isset($_GET['pageNum'])) {
    $pageNum = $_GET['pageNum'];
}
$startRow_ReccityC = $pageNum * $maxRows_ReccityC;

$query_ReccityC = "SELECT * FROM class_set WHERE c_parent = 'cityC' ORDER BY c_sort ASC, c_id DESC";
$query_limit_ReccityC = sprintf("%s LIMIT %d, %d", $query_ReccityC, $startRow_ReccityC, $maxRows_ReccityC);
$ReccityC = $conn->query($query_limit_ReccityC);
$row_ReccityC = $ReccityC->fetch();

if (isset($_GET['totalRows_ReccityC'])) {
    $totalRows_ReccityC = $_GET['totalRows_ReccityC'];
} else {
    $all_ReccityC = $conn->query($query_ReccityC);
    $totalRows_ReccityC = $all_ReccityC->rowCount();
}
$totalPages_ReccityC = ceil($totalRows_ReccityC / $maxRows_ReccityC) - 1;
$TotalPage = $totalPages_ReccityC;

$queryString_ReccityC = "";
if (!empty($_SERVER['QUERY_STRING'])) {
    $params = explode("&", $_SERVER['QUERY_STRING']);
    $newParams = array();
    foreach ($params as $param) {
        if (stristr($param, "pageNum") == false &&
            stristr($param, "totalRows_ReccityC") == false) {
            array_push($newParams, $param);
        }
    }
    if (count($newParams) != 0) {
        $queryString_ReccityC = "&" . htmlentities(implode("&", $newParams));
    }
}
$queryString_ReccityC = sprintf("&totalRows_ReccityC=%d%s", $totalRows_ReccityC, $queryString_ReccityC);

// ====================================================================

$R_pageNum = 0;
if (isset($_REQUEST["pageNum"])) {
    $R_pageNum_RecHorse = $_REQUEST["pageNum"];
}
if (!isset($R_pageNum)) {
    $_SESSION["ToPage"] = 0;
}
//若指定分頁數小於1則預設顯示第一頁
else if ($R_pageNum < 0) {
    $_SESSION["ToPage"] = 0;
}
//若指定指定的分頁超過總分頁數則顯示最後一頁
else if ($R_pageNum > $totalPages_ReccityC) {
    $_SESSION["ToPage"] = $TotalPage;
} else {
    $_SESSION["ToPage"] = $R_pageNum;
}

//如果指定的頁面大於資料所擁有的頁面,轉到最大的頁面
if ($R_pageNum > $totalPages_ReccityC && $R_pageNum != 0) {
    header("Location:cityC_list.php?pageNum=" . $totalPages_ReccityC);
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

    $query_ReccityC = "SELECT * FROM class_set WHERE c_parent = 'cityC' ORDER BY c_sort ASC, c_id DESC";
    $ReccityC = $conn->query($query_ReccityC);
    $row_ReccityC = $ReccityC->fetch();

    do {
        if ($row_ReccityC['c_sort'] == 0) {} else if ($row_ReccityC['c_id'] == $_GET['now_c_id']) {
            // echo $sort_num . "<br/>";

        } else if ($sort_num == $_GET['change_num']) {
            // echo $sort_num . "<br/>";
            $sort_num++;

            $updateSQL = "UPDATE class_set SET c_sort=:c_sort WHERE c_id=:c_id";

            $stat = $conn->prepare($updateSQL);
            $stat->bindParam(':c_sort', $sort_num, PDO::PARAM_INT);
            $stat->bindParam(':c_id', $row_ReccityC['c_id'], PDO::PARAM_INT);
            $stat->execute();

            $sort_num++;
        } else {
            $updateSQL = "UPDATE class_set SET c_sort=:c_sort WHERE c_id=:c_id";

            $stat = $conn->prepare($updateSQL);
            $stat->bindParam(':c_sort', $sort_num, PDO::PARAM_INT);
            $stat->bindParam(':c_id', $row_ReccityC['c_id'], PDO::PARAM_INT);
            $stat->execute();

            // echo $sort_num . "<br/>";
            // echo $row_ReccityC['title'] . "->" . $sort_num . "<br/>";

            $sort_num++;
        }
    } while ($row_ReccityC = $ReccityC->fetch());

    $updateSQL = "UPDATE class_set SET c_sort=:c_sort WHERE c_id=:c_id";

    $stat = $conn->prepare($updateSQL);
    $stat->bindParam(':c_sort', $_GET['change_num'], PDO::PARAM_INT);
    $stat->bindParam(':c_id', $_GET['now_c_id'], PDO::PARAM_INT);
    $stat->execute();

    if ($G_changeSort == 1) {
        header("Location:cityC_list.php?pageNum=" . $_GET['pageNum'] . "&totalRows_ReccityC=" . $_GET['totalRows_ReccityC']);
    } else if ($G_delchangeSort == 1) {
        header("Location:cityC_list.php?pageNum=" . $_GET['pageNum']);
    }
}

require_once('display_page.php');

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
                                    <td width="140" class="list_title">列表</td>
                                    <td width="884"><span class="no_data">
                                    <?php if ($totalRows_ReccityC == 0) { // Show if recordset empty ?>
                                    <strong>目前資料庫中沒有任何資料</strong>
                                    <?php } // Show if recordset empty ?>
                                    </span></td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
                                <tr>
                                    <td width="739" align="right" class="page_display">
                                        <!-------顯示頁選擇與分頁設定開始---------->
                                        <?php displayPages($pageNum, $queryString_ReccityC, $totalPages_ReccityC, $totalRows_ReccityC, $currentPage); ?>
                                        <!-------顯示頁選擇與分頁設定結束---------->
                                    </td>
                                    <td width="110" align="right" class="page_display">
                                        <?php if ($totalRows_ReccityC > 0) { // Show if recordset not empty ?> 頁數:
                                        <?php echo (($pageNum+1)."/".($totalPages_ReccityC+1)); ?>
                                        <?php } // Show if recordset not empty ?>
                                    </td>
                                    <td width="151" align="right" class="page_display">所有資料數:
                                        <?php echo $totalRows_ReccityC ?> </td>
                                    <td width="24" align="right">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><img src="image/spacer.gif" width="1" height="1" /></td>
                                </tr>
                            </table>
                            <form action="cityC_process.php" method="post" name="form1" id="form1">
                                <?php if ($totalRows_ReccityC > 0) { // Show if recordset not empty ?>
                                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
                                    <tr>
                                        <td width="100" align="center" class="table_title">排序</td>
                                        <td align="center" class="table_title">名稱</td>
                                        <td width="40" align="center" class="table_title">狀態</td>
                                        <td width="40" align="center" class="table_title">編輯</td>
                                        <td width="40" align="center" class="table_title">刪除</td>
                                    </tr>
                                    <?php
                                    $i=0;
                                    do {
                                        $i++;
                                        $colname_RecImage = "-1";
                                        if (isset($row_ReccityC['c_id'])) {
                                          $colname_RecImage = $row_ReccityC['c_id'];
                                        }
                                        $query_RecImage = sprintf("SELECT * FROM file_set WHERE file_type='brandImage' AND file_d_id = %s", $colname_RecImage);
                                        $RecImage = $conn->query($query_RecImage);
                                        $row_RecImage = $RecImage->fetch();
                                        $totalRows_RecImage = $RecImage->rowCount();
                                    ?>
                                    <tr <?php if ($i%2==0): ?>bgcolor='#E4E4E4'<?php endif ?>>
                                        <td align="center" class="table_data">
                                            <select name="c_sort" id="c_sort" onchange="changeSort('<?php echo $pageNum; ?>','<?php echo $totalRows_ReccityC; ?>','<?php echo $row_ReccityC['c_id']; ?>',this.options[this.selectedIndex].value)">
                                                <option value="0" <?php if (!(strcmp(0, $row_ReccityC[ 'c_sort']))) {echo "selected";} ?>>至頂</option>
                                                <?php
                                                for ($j = 1; $j <= ($totalRows_ReccityC); $j++) {
                                                    echo "<option value=\"" . $j . "\" ";
                                                    if (!(strcmp($j, $row_ReccityC['c_sort']))) {echo "selected=\"selected\"";}
                                                    echo ">" . $j . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <?php $_SESSION['totalRows']=$totalRows_ReccityC; ?>
                                        </td>
                                        <td align="center" class="table_data">
                                            <a href="cityC_edit.php?c_id=<?php echo $row_ReccityC['c_id']; ?>">
                                                <?php echo $row_ReccityC['c_title']; ?>
                                            </a>
                                        </td>
                                        <td align="center" class="table_data">
                                            <?php  //list使用
                                            if($row_ReccityC['c_active']) {
                                                echo "<a href='".$row_ReccityC['c_active']."' rel='".$row_ReccityC['c_id']."' class='activeChC'><img src=\"image/accept.png\" width=\"16\" height=\"16\"  ></a>";
                                            } else {
                                                echo "<a href='".$row_ReccityC['c_active']."' rel='".$row_ReccityC['c_id']."' class='activeChC'><img src=\"image/delete.png\" width=\"16\" height=\"16\"  ></a>";
                                            }
                                            ?>
                                        </td>
                                        <td align="center" class="table_data"><a href="cityC_edit.php?c_id=<?php echo $row_ReccityC['c_id']; ?>"><img src="image/pencil.png" width="16" height="16" /></a></td>
                                        <td align="center" class="table_data"><a href="cityC_del.php?c_id=<?php echo $row_ReccityC['c_id']; ?>"><img src="image/cross.png" width="16" height="16" /></a></td>
                                    </tr>
                                    <?php } while ($row_ReccityC = $ReccityC->fetch()); ?>
                                </table>
                                <?php } // Show if recordset not empty ?>
                            </form>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
                                <tr>
                                    <td width="739" align="right" class="page_display">
                                        <!-------顯示頁選擇與分頁設定開始---------->
                                        <?php displayPages($pageNum, $queryString_ReccityC, $totalPages_ReccityC, $totalRows_ReccityC, $currentPage); ?>
                                        <!-------顯示頁選擇與分頁設定結束---------->
                                    </td>
                                    <td width="110" align="right" class="page_display">
                                        <?php if ($totalRows_ReccityC > 0) { // Show if recordset not empty ?> 頁數:
                                        <?php echo (($pageNum+1)."/".($totalPages_ReccityC+1)); ?>
                                        <?php } // Show if recordset not empty ?>
                                    </td>
                                    <td width="151" align="right" class="page_display">所有資料數:
                                        <?php echo $totalRows_ReccityC ?> </td>
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

<script type="text/javascript">
    function changeSort(pageNum, totalRows_ReccityC, now_c_id, change_num) {
        window.location.href = "cityC_list.php?pageNum=" + pageNum + "&totalRows_ReccityC=" + totalRows_ReccityC + "&changeSort=1" + "&now_c_id=" + now_c_id + "&change_num=" + change_num;
    }
</script>