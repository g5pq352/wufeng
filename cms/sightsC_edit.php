<?php require_once('../Connections/connect2data.php'); ?>
<?php require_once('photo_process.php'); ?>
<?php require_once('file_process.php'); ?>
<?php require_once('imagesSize.php'); ?>

<?php
if (!1) {
    header("Location: sightsC_list.php");
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$colname_RecsightsC = "-1";
if (isset($_GET['c_id'])) {
    $colname_RecsightsC = $_GET['c_id'];
}

$query_RecsightsC = "SELECT * FROM class_set WHERE c_id = :c_id";

$RecsightsC = $conn->prepare($query_RecsightsC);
$RecsightsC->bindParam(':c_id', $colname_RecsightsC, PDO::PARAM_INT);
$RecsightsC->execute();
$row_RecsightsC = $RecsightsC->fetch();
$totalRows_RecsightsC = $RecsightsC->rowCount();

$query_RecCCover = "SELECT * FROM file_set WHERE file_d_id = :file_d_id AND file_type = 'sightsCCover'";
$RecCCover = $conn->prepare($query_RecCCover);
$RecCCover->bindParam(':file_d_id', $colname_RecsightsC, PDO::PARAM_INT);
$RecCCover->execute();
$row_RecCCover = $RecCCover->fetch();
$totalRows_RecCCover = $RecCCover->rowCount();

$menu_is = "sights";

//記錄帶資料去別地方的資訊
$_SESSION['nowPage'] = $selfPage;
$_SESSION['nowMenu'] = $menu_is;
$ifFile = 0;

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
                                    <td width="30%" class="list_title">修改</td>
                                    <td width="70%">&nbsp;</td>
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
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="3" cellpadding="5">
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">名稱</td>
                                                                            <td width="516">
                                                                                <input name="c_title" type="text" class="table_data" id="c_title" value="<?php echo $row_RecsightsC['c_title']; ?>" size="50" />
                                                                                <input name="c_id" type="hidden" id="c_id" value="<?php echo $row_RecsightsC['c_id']; ?>" />
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文名稱</td>
                                                                            <td width="516">
                                                                                <input name="c_title_en" type="text" class="table_data" id="c_title_en" value="<?php echo $row_RecsightsC['c_title_en']; ?>" size="50" />
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">標籤</td>
                                                                            <td width="532">
                                                                                <textarea name="c_content" cols="60" rows="4" class="table_data" id="c_content"><?php echo $row_RecsightsC['c_content']; ?></textarea>
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6"> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">狀態</td>
                                                                            <td width="516">
                                                                                <select name="c_active" class="table_data" id="c_active">
                                                                                    <option value="0" <?php if (!(strcmp(0, $row_RecsightsC[ 'c_active']))) {echo "selected";} ?>>不公佈</option>
                                                                                    <option value="1" <?php if (!(strcmp(1, $row_RecsightsC[ 'c_active']))) {echo "selected";} ?>>公佈</option>
                                                                                </select>
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr>

                                                                        <?php if ($totalRows_RecCCover > 0) { // Show if recordset not empty ?>
                                                                        <tr>
                                                                            <td align="center" bgcolor="#e5ecf6" class="table_col_title">目前封面圖片<a name="imageEdit" id="imageEdit"></a></td>
                                                                            <td>
                                                                                <?php do { ?>
                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td width="100" rowspan="2" align="center"><a href="../<?php echo $row_RecCCover['file_link1'].'?'.(mt_rand(1,100000)/100000); ?>" class="fancyboxImg" rel="group" title="<?php echo $row_RecCCover['file_title']; ?>"><img src="../<?php echo $row_RecCCover['file_link2'].'?'.(mt_rand(1,100000)/100000); ?>" alt="" class="image_frame"/></a></td>
                                                                                        <td align="left" class="table_data">&nbsp;圖片說明：
                                                                                            <?php echo $row_RecCCover['file_title']; ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left" class="table_data">&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center"><a href="image_edit.php?file_id=<?php echo $row_RecCCover['file_id'].'&type=sightsCCover'; ?>" class="fancyboxEdit" title="修改圖片"><img src="image/media_edit.gif" width="16" height="16" title="修改圖片"/></a><a href="image_del.php?file_id=<?php echo $row_RecCCover['file_id'].'&type=sightsCCover'; ?>" class="fancyboxEdit" title="刪除圖片"><img src="image/media_delete.gif" width="16" height="16" title="刪除圖片"/></a></td>
                                                                                        <td align="center">&nbsp;</td>
                                                                                    </tr>
                                                                                </table>
                                                                                <?php } while ($row_RecCCover = $RecCCover->fetch()); ?>
                                                                            </td>
                                                                            <td bgcolor="#e5ecf6" class="table_col_title">
                                                                                <p class="red_letter">*
                                                                                    <?php echo $imagesSize['sightsCCover']['note'];?>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } // Show if recordset not empty ?>
                                                                        <?php if ($totalRows_RecCCover == 0) { // Show if recordset not empty ?>
                                                                        <tr>
                                                                            <td align="center" bgcolor="#e5ecf6" class="table_col_title">
                                                                                <p>上傳封面圖片</p>
                                                                            </td>
                                                                            <td>
                                                                                <table width="100%" border="0" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC" class="data">
                                                                                    <tr>
                                                                                        <td> <span class="table_data">選擇圖片：</span>
                                                                                            <input name="imageCCover[]" type="file" class="table_data" id="imageCCover1" />
                                                                                            <br>
                                                                                            <span class="table_data">圖片說明：</span>
                                                                                            <input name="imageCCover_title[]" type="text" class="table_data" id="imageCCover_title1"> </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td bgcolor="#e5ecf6" class="table_col_title">
                                                                                <p class="red_letter">*
                                                                                    <?php echo $imagesSize['sightsCCover']['note'];?>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } // Show if recordset not empty ?>
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
                                                    </td>
                                                </tr>
                                            </table>
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

<script type="text/javascript" src="jquery/fancyapps-fancyBox/source/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/fancyapps-fancyBox/source/jquery.fancybox.css" media="screen" />

<script type="text/javascript">
    $(document).ready(function() {

        $("a[rel=group]").fancybox({
            autoSize: true,
            openEffect: 'elastic',
            closeEffect: 'elastic',
            helpers: {
                overlay: {
                    css: {
                        'background': 'rgba(0, 0, 0, 0.7)'
                    }
                }
            }
        });

        $("a.fancyboxEdit").fancybox({
            type: 'ajax',
            openEffect: 'fade',
            closeEffect: 'fade',
            autoSize: true,
            helpers: {
                overlay: {
                    css: {
                        'background': 'rgba(0, 0, 0, 0.7)'
                    }
                }
            },
            beforeShow: function() {
                //updateData();
            }
        });

        var fancyApp = $("a.fancyboxUpload").fancybox({
            type: 'iframe',
            openEffect: 'fade',
            closeEffect: 'fade',
            autoSize: false,
            width: '1000',
            closeBtn: true,
            helpers: {
                overlay: {
                    closeClick: true,
                    css: {
                        'background': 'rgba(0, 0, 0, 0.7)'
                    }
                }
            },
            beforeShow: function() {
                //updateData();
            },
            afterClose: function() {
                window.location.reload();
            }
        });
    });

    <?php
        if( isset($_SESSION["change_image"]) && ($_SESSION["change_image"]==1) ) {
            $_SESSION["change_image"]=0;
            echo "window.location.reload();";
        }
    ?>

    function call_alert(link_url) {
        alert("上傳得檔案中，有的不是圖片!");
        window.location = link_url;
    }
</script>

<?php
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

    $updateSQL = "UPDATE class_set SET c_title=:c_title, c_title_en=:c_title_en, c_slug=:c_slug, c_class=:c_class, c_content=:c_content, c_link=:c_link, c_active=:c_active WHERE c_id=:c_id";

    $sth = $conn->prepare($updateSQL);
    $sth->bindParam(':c_title', $_POST['c_title'], PDO::PARAM_STR);
    $sth->bindParam(':c_title_en', $_POST['c_title_en'], PDO::PARAM_STR);
    $sth->bindParam(':c_slug', generate_slug($_POST['c_title']), PDO::PARAM_STR);
    $sth->bindParam(':c_class', $_POST['c_class'], PDO::PARAM_STR);
    $sth->bindParam(':c_content', $_POST['c_content'], PDO::PARAM_STR);
    $sth->bindParam(':c_link', $_POST['c_link'], PDO::PARAM_STR);
    $sth->bindParam(':c_active', $_POST['c_active'], PDO::PARAM_INT);
    $sth->bindParam(':c_id', $_POST['c_id'], PDO::PARAM_INT);
    $sth->execute();

    //----------插入圖片資料到資料庫begin(須放入插入主資料後)----------

    // CCover
    $image_result = image_process($conn, $_FILES['imageCCover'], $_REQUEST['imageCCover_title'], $menu_is, "add", $imagesSize['sightsCCover']['IW'], $imagesSize['sightsCCover']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $type = 'sightsCCover';
        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type, PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $_POST['c_id'], PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }
    //----------插入圖片資料到資料庫end----------

    $updateGoTo = "sightsC_list.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'] . "&pageNum=" . $_SESSION["ToPage"];
    }

    if ($image_result[0][0] == 1) {
        echo "<script type=\"text/javascript\">call_alert('" . $updateGoTo . "');</script>";
    } else {
        //echo $updateGoTo;
        header(sprintf("Location: %s", $updateGoTo));
    }
    // header(sprintf("Location: %s", $updateGoTo));
}
?>