<?php require_once('../Connections/connect2data.php'); ?>

<?php
if (!1) {
    header("Location: news_list.php");
}

$colname_Recnews = "-1";
if (isset($_GET['d_id'])) {
    $colname_Recnews = $_GET['d_id'];
}

$query_Recnews = "SELECT data_set.*, class_set.c_title as c_title FROM data_set LEFT JOIN class_set ON data_set.d_class2 = class_set.c_id WHERE d_id = :d_id";
$Recnews = $conn->prepare($query_Recnews);
$Recnews->bindParam(':d_id', $colname_Recnews, PDO::PARAM_INT);
$Recnews->execute();
$row_Recnews = $Recnews->fetch();
$totalRows_Recnews = $Recnews->rowCount();

$query_RecImage = "SELECT * FROM file_set WHERE file_d_id = :file_d_id AND file_type = 'image'";
$RecImage = $conn->prepare($query_RecImage);
$RecImage->bindParam(':file_d_id', $colname_Recnews, PDO::PARAM_INT);
$RecImage->execute();
$row_RecImage = $RecImage->fetch();
$totalRows_RecImage = $RecImage->rowCount();

$query_RecnewsC = "SELECT * FROM class_set WHERE c_parent = 'newsC' AND c_active='1' ORDER BY c_sort ASC, c_id DESC";
$RecnewsC = $conn->prepare($query_RecnewsC);
$RecnewsC->execute();
$row_RecnewsC = $RecnewsC->fetch();
$totalRows_RecnewsC = $RecnewsC->rowCount();

$G_selected1 = '';
if (isset($_SESSION['selected_newsC'])) {
    $G_selected1 = $_SESSION['selected_newsC'] = $row_Recnews['d_class2'];
}

$menu_is = "news";

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
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="30%" class="list_title">刪除</td>
                                    <td width="70%"><span class="no_data">確定刪除以下內容?</span></td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><img src="image/spacer.gif" width="1" height="1"></td>
                                </tr>
                            </table>
                            <form action="" method="POST" enctype="multipart/form-data" name="form1" id="form1">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="5" cellspacing="3">
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">分類</td>
                                                    <td class="table_data">
                                                        <?php
                                                        do {
                                                            if (!(strcmp($row_RecnewsC['c_id'], $row_Recnews['d_class2']))) {
                                                            echo $row_RecnewsC['c_title'];
                                                            }
                                                        } while ($row_RecnewsC = $RecnewsC->fetch());
                                                        $rows = $RecnewsC->rowCount();
                                                        if($rows > 0) {
                                                        $RecnewsC->execute();
                                                        }
                                                        ?>
                                                    </td>
                                                    <td bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">標題</td>
                                                    <td class="table_data">
                                                        <?php echo $row_Recnews['d_title']; ?>
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">時間</td>
                                                    <td class="table_data">
                                                        <?php echo $row_Recnews['d_date']; ?>
                                                    </td>
                                                    <td bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <input name="submitBtn" type="submit" class="btnType" id="submitBtn" value="送出" />
                                        </td>
                                    </tr>
                                </table>
                                <input name="d_id" type="hidden" id="d_id" value="<?php echo $row_Recnews['d_id']; ?>" />
                                <input name="delsure" type="hidden" id="delsure" value="1" />
                            </form>
                            <table width="100%" height="1" border="0" align="center" cellpadding="0" cellspacing="0" class="buttom_dot_line">
                                <tr>
                                    <td>&nbsp;</td>
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

<?php
if ((isset($_REQUEST['d_id'])) && ($_REQUEST['d_id'] != "") && (isset($_REQUEST['delsure']))) {

    //----------刪除圖片資料到資料庫begin(在主資料前)-----

    $sql = "SELECT * FROM file_set WHERE file_d_id=:file_d_id";

    $stat = $conn->prepare($sql);
    $stat->bindParam(':file_d_id', $_POST['d_id'], PDO::PARAM_INT);
    $stat->execute();

    while ($row = $stat->fetch()) {
        if ((isset($row['file_link1'])) && file_exists("../" . $row['file_link1'])) {
            unlink("../" . $row['file_link1']); //刪除檔案
        }
        if ((isset($row['file_link2'])) && file_exists("../" . $row['file_link2'])) {
            unlink("../" . $row['file_link2']); //刪除檔案
        }
        if ((isset($row['file_link3'])) && file_exists("../" . $row['file_link3'])) {
            unlink("../" . $row['file_link3']); //刪除檔案
        }
        if ((isset($row['file_link4'])) && file_exists("../" . $row['file_link4'])) {
            unlink("../" . $row['file_link4']); //刪除檔案
        }
        if ((isset($row['file_link5'])) && file_exists("../" . $row['file_link5'])) {
            unlink("../" . $row['file_link5']); //刪除檔案
        }
    }

    $deleteSQL = "DELETE FROM file_set WHERE file_d_id=:file_d_id";

    $sth = $conn->prepare($deleteSQL);
    $sth->bindParam(':file_d_id', $_POST['d_id'], PDO::PARAM_INT);
    $sth->execute();

    //----------刪除圖片資料到資料庫end(在主資料前)-----

    $deleteSQL = "DELETE FROM data_set WHERE d_id=:d_id";

    $sth = $conn->prepare($deleteSQL);
    $sth->bindParam(':d_id', $_POST['d_id'], PDO::PARAM_INT);
    $sth->execute();

    $deleteGoTo = "news_list.php?delchangeSort=1&selected1=" . $G_selected1 . "&selected2=" . $G_selected2;
    if (isset($_SERVER['QUERY_STRING'])) {
        $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
        $deleteGoTo .= $_SERVER['QUERY_STRING'] . "&pageNum=" . $_SESSION["ToPage"];
    }
    header(sprintf("Location: %s", $deleteGoTo));
}
?>