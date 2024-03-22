<?php require_once('../Connections/connect2data.php'); ?>

<?php
$menu_is = "member";

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$colname_Recmember = "-1";
if (isset($_GET['user_id'])) {
    $colname_Recmember = $_GET['user_id'];
}

$query_Recshop = "SELECT * FROM data_set WHERE d_class1 = 'shop' AND d_active='1' ORDER BY d_sort ASC, d_id DESC";
$Recshop = $conn->prepare($query_Recshop);
$Recshop->execute();
$row_Recshop = $Recshop->fetch();
$totalRows_Recshop = $Recshop->rowCount();

$query_Recmember = "SELECT * FROM client WHERE user_id = :user_id";
$Recmember = $conn->prepare($query_Recmember);
$Recmember->bindParam(':user_id', $colname_Recmember, PDO::PARAM_STR);
$Recmember->execute();
$row_Recmember = $Recmember->fetch();
$totalRows_Recmember = $Recmember->rowCount();

$query_RecLevel = "SELECT * FROM a_set WHERE a_id='3' ORDER BY a_id ASC";
$RecLevel = $conn->query($query_RecLevel);
$row_RecLevel = $RecLevel->fetch();
$totalRows_RecLevel = $RecLevel->rowCount();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php require_once('cmsTitle.php'); ?></title>

     <link rel="stylesheet" href="jquery/chosen_v1.8.5/chosen.css">

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
                                    <td width="300" class="list_title">修改客戶</td>
                                    <td width="724">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><img src="image/spacer.gif" width="1" height="1"></td>
                                </tr>
                            </table>
                            <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellspacing="3" cellpadding="5">
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">分類</td>
                                                    <td>
                                                        <select name="user_shop" id="user_shop" class="chosen-select">
                                                            <?php do { ?>
                                                                <option value="<?php echo $row_Recshop['d_id']?>" <?php if (!(strcmp($row_Recshop[ 'd_id'], $row_Recmember[ 'user_shop']))) {echo "selected";} ?>>
                                                                    <?php echo $row_Recshop['d_title']?>
                                                                </option>
                                                                <?php
                                                                } while ($row_Recshop = $Recshop->fetch());
                                                                $rows = $Recshop->rowCount();
                                                                if($rows > 0) {
                                                                   $Recshop->execute();
                                                                }
                                                                ?>
                                                        </select>
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">盟主名稱</td>
                                                    <td width="532">
                                                        <input name="user_name" type="text" class="table_data" id="user_name" value="<?php echo $row_Recmember['user_name']; ?>" size="50" />
                                                        <input name="user_id" type="hidden" id="user_id" value="<?php echo $row_Recmember['user_id']; ?>" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">盟主帳號</td>
                                                    <td width="532">
                                                        <input name="user_account" type="text" class="table_data" id="user_account" value="<?php echo $row_Recmember['user_account']; ?>" size="50" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">盟主密碼</td>
                                                    <td width="532">
                                                        <input name="user_password" type="password" class="table_data" id="user_password" value="<?php echo $row_Recmember['user_password']; ?>" size="50" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <!-- <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">管理種類</td>
                                                    <td width="532">
                                                        <select name="user_level" class="table_data" id="user_level">
                                                            <?php do { ?>
                                                                <option value="<?php echo $row_RecLevel['a_id']?>" <?php if (!(strcmp($row_RecLevel[ 'a_id'], $row_Recmember[ 'user_level']))) {echo "selected";} ?>>
                                                                    <?php echo $row_RecLevel['a_title']?>
                                                                </option>
                                                            <?php
                                                            } while ($row_RecLevel = $RecLevel->fetch());
                                                                $rows = $RecLevel->rowCount();
                                                                if($rows > 0) {
                                                                $RecLevel->execute();
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr> -->
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">帳號是否有效</td>
                                                    <td width="532">
                                                        <select name="user_active" class="table_data" id="user_active">
                                                            <option value="1" <?php if (!(strcmp(1, $row_Recmember[ 'user_active']))) {echo "selected";} ?>>有效</option>
                                                            <option value="0" <?php if (!(strcmp(0, $row_Recmember[ 'user_active']))) {echo "selected";} ?>>無效</option>
                                                        </select>
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
                                <input type="hidden" name="MM_update" value="form1" />
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

<script src="jquery/chosen_v1.8.5/chosen.jquery.js"></script>

<script type="text/javascript">
    $(".chosen-select").chosen({
        disable_search_threshold: 6,
        no_results_text: "找不到資料。 目前輸入的是:",
        placeholder_text_single: "尚未新增分類",
        width: "auto"
    });
</script>

<?php
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

    $updateSQL = "UPDATE client SET user_name=:user_name, user_account=:user_account, user_password=:user_password, user_level=:user_level, user_shop=:user_shop, user_active=:user_active WHERE user_id=:user_id";

    $sth = $conn->prepare($updateSQL);
    $sth->bindParam(':user_name', $_POST['user_name'], PDO::PARAM_STR);
    $sth->bindParam(':user_account', $_POST['user_account'], PDO::PARAM_STR);
    $sth->bindParam(':user_password', $_POST['user_password'], PDO::PARAM_STR);
    $sth->bindParam(':user_level', $_POST['user_level'], PDO::PARAM_INT);
    $sth->bindParam(':user_shop', $_POST['user_shop'], PDO::PARAM_INT);
    $sth->bindParam(':user_active', $_POST['user_active'], PDO::PARAM_INT);
    $sth->bindParam(':user_id', $_POST['user_id'], PDO::PARAM_INT);
    $sth->execute();

    $updateGoTo = "member_list.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'] . "&pageNum_Recmember=" . $_SESSION["ToPage"];
    }

    if ($image_result[0][0] == 1 || $file_type_wrong == 1) {
        echo "<script type=\"text/javascript\">call_alert('" . $updateGoTo . "');</script>";
    } else {
        header(sprintf("Location: %s", $updateGoTo));
    }
}
?>