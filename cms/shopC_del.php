<?php require_once('../Connections/connect2data.php'); ?>

<?php
if (!1) {
    header("Location: shopC_list.php");
}

$colname_RecshopC = "-1";
if (isset($_GET['c_id'])) {
    $colname_RecshopC = $_GET['c_id'];
}

$query_RecshopC = "SELECT * FROM class_set WHERE c_id=:c_id";
$RecshopC = $conn->prepare($query_RecshopC);
$RecshopC->bindParam(':c_id', $colname_RecshopC, PDO::PARAM_INT);
$RecshopC->execute();
$row_RecshopC = $RecshopC->fetch();
$totalRows_RecshopC = $RecshopC->rowCount();

$menu_is = "shop";

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
                                            <table width="100%" border="0" cellspacing="3" cellpadding="5">
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">中文名稱</td>
                                                    <td width="532" class="table_data">
                                                        <?php echo $row_RecshopC['c_title']; ?>
                                                        <input name="c_id" type="hidden" id="c_id" value="<?php echo $row_RecshopC['c_id']; ?>" />
                                                        <input name="delsure" type="hidden" id="delsure" value="1" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文名稱</td>
                                                    <td width="532" class="table_data">
                                                        <?php echo $row_RecshopC['c_title_en']; ?>
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
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
if ((isset($_REQUEST['c_id'])) && ($_REQUEST['c_id'] != "") && (isset($_REQUEST['delsure']))) {

    //----------刪除圖片資料到資料庫begin(在主資料前)-----

    $sql = "SELECT * FROM file_set WHERE file_d_id=:file_d_id";

    $stat = $conn->prepare($sql);
    $stat->bindParam(':file_d_id', $_POST['c_id'], PDO::PARAM_INT);
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
    $sth->bindParam(':file_d_id', $_POST['c_id'], PDO::PARAM_INT);
    $sth->execute();

    //----------刪除圖片資料到資料庫end(在主資料前)-----


    $deleteSQL = "DELETE FROM class_set WHERE c_id=:c_id";

    $sth = $conn->prepare($deleteSQL);
    $sth->bindParam(':c_id', $_REQUEST['c_id'], PDO::PARAM_INT);
    $sth->execute();

    $deleteGoTo = "shopC_list.php?delchangeSort=1";

    if (isset($_SERVER['QUERY_STRING'])) {
        $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
        $deleteGoTo .= $_SERVER['QUERY_STRING'] . "&pageNum=" . $_SESSION["ToPage"];
    }
    header(sprintf("Location: %s", $deleteGoTo));
}
?>