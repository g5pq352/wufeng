<?php require_once('../Connections/connect2data.php'); ?>

<?php
if (!1) {
    header("Location: certificationC_list.php");
}

$colname_ReccertificationC = "-1";
if (isset($_GET['c_id'])) {
    $colname_ReccertificationC = $_GET['c_id'];
}

$query_ReccertificationC = "SELECT * FROM class_set WHERE c_id=:c_id";
$ReccertificationC = $conn->prepare($query_ReccertificationC);
$ReccertificationC->bindParam(':c_id', $colname_ReccertificationC, PDO::PARAM_INT);
$ReccertificationC->execute();
$row_ReccertificationC = $ReccertificationC->fetch();
$totalRows_ReccertificationC = $ReccertificationC->rowCount();

$menu_is = "certification";

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
                                                        <?php echo $row_ReccertificationC['c_title']; ?>
                                                        <input name="c_id" type="hidden" id="c_id" value="<?php echo $row_ReccertificationC['c_id']; ?>" />
                                                        <input name="delsure" type="hidden" id="delsure" value="1" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文名稱</td>
                                                    <td width="532" class="table_data">
                                                        <?php echo $row_ReccertificationC['c_title_en']; ?>
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

    $deleteSQL = "DELETE FROM class_set WHERE c_id=:c_id";

    $sth = $conn->prepare($deleteSQL);
    $sth->bindParam(':c_id', $_REQUEST['c_id'], PDO::PARAM_INT);
    $sth->execute();

    $deleteGoTo = "certificationC_list.php?delchangeSort=1";

    if (isset($_SERVER['QUERY_STRING'])) {
        $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
        $deleteGoTo .= $_SERVER['QUERY_STRING'] . "&pageNum=" . $_SESSION["ToPage"];
    }
    header(sprintf("Location: %s", $deleteGoTo));
}
?>