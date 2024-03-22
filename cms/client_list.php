<?php require_once('../Connections/connect2data.php'); ?>

<?php
$menu_is = "client";

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recclient = 20;
$pageNum = 0;
if (isset($_GET['pageNum'])) {
    $pageNum = $_GET['pageNum'];
}
$startRow_Recclient = $pageNum * $maxRows_Recclient;

$query_Recclient = "SELECT * FROM `client` ORDER BY user_sort ASC";
$query_limit_Recclient = sprintf("%s LIMIT %d, %d", $query_Recclient, $startRow_Recclient, $maxRows_Recclient);
$Recclient = $conn->query($query_limit_Recclient);
$row_Recclient = $Recclient->fetch();

if (isset($_GET['totalRows'])) {
    $totalRows = $_GET['totalRows'];
} else {
    $all_Recclient = $conn->query($query_Recclient);
    $totalRows = $all_Recclient->rowCount();
}
$totalPages = ceil($totalRows / $maxRows_Recclient) - 1;
$_SESSION['totalRows'] = $totalRows;
$TotalPage = $totalPages;

$queryString = "";
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
        $queryString = "&" . htmlentities(implode("&", $newParams));
    }
}
$queryString = sprintf("&totalRows=%d%s", $totalRows, $queryString);

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
else if ($R_pageNum > $totalPages) {
    $_SESSION["ToPage"] = $TotalPage;
} else {
    $_SESSION["ToPage"] = $R_pageNum;
}

//如果指定的頁面大於資料所擁有的頁面,轉到最大的頁面
if ($R_pageNum > $totalPages && $R_pageNum != 0) {
    header("Location:client_list.php?pageNum=" . $totalPages);
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

    $query_Recclient = "SELECT * FROM client WHERE user_id != '' ORDER BY user_sort ASC";
    $Recclient = $conn->query($query_Recclient);
    $row_Recclient = $Recclient->fetch();

    do {
        if ($row_Recclient['user_sort'] == 0) {} else if ($row_Recclient['user_id'] == $_GET['now_user_id']) {
            // echo '<pre>'; print_r($sort_num); echo '</pre>';

        } else if ($sort_num == $_GET['change_num']) {
            // echo '<pre>'; print_r($sort_num); echo '</pre>';
            $sort_num++;

            $updateSQL = "UPDATE client SET user_sort=:user_sort WHERE user_id=:user_id";

            $stat = $conn->prepare($updateSQL);
            $stat->bindParam(':user_sort', $sort_num, PDO::PARAM_INT);
            $stat->bindParam(':user_id', $row_Recclient['user_id'], PDO::PARAM_INT);
            $stat->execute();

            $sort_num++;
        } else {
            $updateSQL = "UPDATE client SET user_sort=:user_sort WHERE user_id=:user_id";

            $stat = $conn->prepare($updateSQL);
            $stat->bindParam(':user_sort', $sort_num, PDO::PARAM_INT);
            $stat->bindParam(':user_id', $row_Recclient['user_id'], PDO::PARAM_INT);
            $stat->execute();

            // echo '<pre>'; print_r($sort_num); echo '</pre>';

            $sort_num++;
        }
    } while ($row_Recclient = $Recclient->fetch());

    $updateSQL = "UPDATE client SET user_sort=:user_sort WHERE user_id=:user_id";

    $stat = $conn->prepare($updateSQL);
    $stat->bindParam(':user_sort', $_GET['change_num'], PDO::PARAM_INT);
    $stat->bindParam(':user_id', $_GET['now_user_id'], PDO::PARAM_INT);
    $stat->execute();

    if ($G_changeSort == 1) {
        header("Location:client_list.php?pageNum=" . $_GET['pageNum'] . "&totalRows=" . $_GET['totalRows']);
    } else if ($G_delchangeSort == 1) {
        header("Location:client_list.php?pageNum=" . $_GET['pageNum']);
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
                                    <td width="30%" class="list_title">列表</td>
                                    <td><span class="no_data">
                                    <?php if ($totalRows == 0) { // Show if recordset empty ?>
                                    <strong>抱歉!找不到任何資料~</strong>
                                    <?php } // Show if recordset empty ?>
                                    </span></td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
                                <tr>
                                    <td width="739" align="right" class="page_display">
                                        <!-------顯示頁選擇與分頁設定開始---------->
                                        <?php displayPages($pageNum, $queryString, $totalPages, $totalRows, $currentPage); ?>
                                        <!-------顯示頁選擇與分頁設定結束---------->
                                        <td width="110" align="right" class="page_display">
                                            <?php if ($totalRows > 0) { // Show if recordset not empty ?> 頁數:
                                            <?php echo (($pageNum+1)."/".($totalPages+1)); ?>
                                            <?php } // Show if recordset not empty ?>
                                        </td>
                                        <td width="151" align="right" class="page_display">所有資料數: <?php echo $totalRows ?> </td>
                                        <td width="24" align="right">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><img src="image/spacer.gif" width="1" height="1" /></td>
                                </tr>
                            </table>
                            <form action="client_process.php" method="post" name="form1" id="form1">
                                <?php if ($totalRows > 0) { // Show if recordset not empty ?>
                                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
                                    <tr>
                                        <td width="74" align="center" class="table_title">排序</td>
                                        <td width="250" align="center" class="table_title">建案</td>
                                        <td width="470" align="center" class="table_title">帳號</td>
                                        <!-- <td width="60" align="center" class="table_title">在經典顯示</td> -->
                                        <td width="60" align="center" class="table_title">在網頁顯示</td>
                                        <td width="30" align="center" class="table_title">編輯</td>
                                        <td width="30" align="center" class="table_title">刪除</td>
                                    </tr>
                                    <?php
                                    $i=0;
                                    do { 
                                        $query_RecproductsC = "SELECT * FROM class_set WHERE c_id = :c_id";
                                        $RecproductsC = $conn->prepare($query_RecproductsC);
                                        $RecproductsC->bindParam(':c_id', $row_Recclient['user_shop'], PDO::PARAM_INT);
                                        $RecproductsC->execute();
                                        $row_RecproductsC = $RecproductsC->fetch();
                                        $totalRows_RecproductsC = $RecproductsC->rowCount();

                                        $i++;
                                    ?>
                                    <tr <?php if ($i%2==0): ?>bgcolor='#E4E4E4'<?php endif ?>>
                                        <td align="center" class="table_data">
                                            <select name="user_sort" id="user_sort" onchange="changeSort('<?php echo $pageNum; ?>','<?php echo $totalRows; ?>','<?php echo $row_Recclient['user_id']; ?>',this.options[this.selectedIndex].value)">
                                                <option value="0" <?php if (!(strcmp(0, $row_Recclient[ 'user_sort']))) {echo "selected"; } ?>>至頂</option>
                                                <?php
                                                for($j=1;$j<=($totalRows);$j++) {
                                                    echo "<option value=\"".$j."\" ";
                                                    if (!(strcmp($j, $row_Recclient['user_sort']))) {echo "selected=\"selected\"";}
                                                    echo ">".$j."</option>";
                                                }
                                                $_SESSION['totalRows']=$totalRows;
                                                ?>
                                            </select>
                                        </td>
                                        <td align="center" class="table_data">
                                            <a href="client_edit.php?user_id=<?php echo $row_Recclient['user_id']; ?>">
                                                <?=$row_RecproductsC['c_title']?>
                                            </a>
                                        </td>
                                        <td align="center" class="table_data">
                                            <a href="client_edit.php?user_id=<?php echo $row_Recclient['user_id']; ?>">
                                                <?php echo $row_Recclient['user_name']; ?>
                                            </a>
                                        </td>
                                        <td align="center" class="table_data">
                                            <?php  //list使用
                                            if($row_Recclient['user_active']) {
                                                echo "<a href='".$row_Recclient['user_active']."' rel='".$row_Recclient['user_id']."' class='activeCh'><img src=\"image/accept.png\" width=\"16\" height=\"16\"  ></a>";
                                            } else {
                                                echo "<a href='".$row_Recclient['user_active']."' rel='".$row_Recclient['user_id']."' class='activeCh'><img src=\"image/delete.png\" width=\"16\" height=\"16\"  ></a>";
                                            }
                                            ?>
                                        </td>
                                        <td align="center" class="table_data"><a href="client_edit.php?user_id=<?php echo $row_Recclient['user_id']; ?>"><img src="image/pencil.png" width="16" height="16" /></a></td>
                                        <td align="center" class="table_data"><a href="client_del.php?user_id=<?php echo $row_Recclient['user_id']; ?>"><img src="image/cross.png" width="16" height="16" /></a></td>
                                    </tr>
                                    <?php } while ($row_Recclient = $Recclient->fetch()); ?>
                                </table>
                                <?php } // Show if recordset not empty ?>
                            </form>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1" class="list_title_table">
                                <tr>
                                    <td width="739" align="right" class="page_display">
                                    <!-------顯示頁選擇與分頁設定開始---------->
                                    <?php displayPages($pageNum, $queryString, $totalPages, $totalRows, $currentPage); ?>
                                    <!-------顯示頁選擇與分頁設定結束---------->
                                    <td width="110" align="right" class="page_display">
                                        <?php if ($totalRows > 0) { // Show if recordset not empty ?> 頁數:
                                        <?php echo (($pageNum+1)."/".($totalPages+1)); ?>
                                        <?php } // Show if recordset not empty ?>
                                    </td>
                                    <td width="151" align="right" class="page_display">所有資料數:
                                        <?php echo $totalRows ?> </td>
                                    <td width="24" align="right">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

<script type="text/javascript">
    function changeSort(pageNum, totalRows, now_user_id, change_num) { //v1.0
        //alert(pageNum+"+"+totalPages);
        window.location.href = "client_list.php?pageNum=" + pageNum + "&totalRows=" + totalRows + "&changeSort=1" + "&now_user_id=" + now_user_id + "&change_num=" + change_num;
    }
</script>