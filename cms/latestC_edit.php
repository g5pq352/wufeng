<?php require_once('../Connections/connect2data.php'); ?>
<?php require_once('photo_process.php'); ?>
<?php require_once('file_process.php'); ?>
<?php require_once('imagesSize.php'); ?>

<?php
if (!1) {
    header("Location: latestC_list.php");
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$colname_ReclatestC = "-1";
if (isset($_GET['l_id'])) {
    $colname_ReclatestC = $_GET['l_id'];
}

$query_ReclatestC = "SELECT * FROM latest_set WHERE l_id = :l_id";

$ReclatestC = $conn->prepare($query_ReclatestC);
$ReclatestC->bindParam(':l_id', $colname_ReclatestC, PDO::PARAM_INT);
$ReclatestC->execute();
$row_ReclatestC = $ReclatestC->fetch();
$totalRows_ReclatestC = $ReclatestC->rowCount();

$query_RecCCover = "SELECT * FROM file_set WHERE file_d_id = :file_d_id AND file_type = 'latestCCover'";
$RecCCover = $conn->prepare($query_RecCCover);
$RecCCover->bindParam(':file_d_id', $colname_ReclatestC, PDO::PARAM_INT);
$RecCCover->execute();
$row_RecCCover = $RecCCover->fetch();
$totalRows_RecCCover = $RecCCover->rowCount();

$menu_is = "latest";

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
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">版型選擇</td>
                                                                            <td width="532" hidden="">
                                                                                <label><input type="radio" name="l_class" value="1" <?php if (!(strcmp(1, $row_ReclatestC['l_class']))) {echo "checked";} ?>><span>(五格)</span></label>
                                                                                <label><input type="radio" name="l_class" value="2" <?php if (!(strcmp(2, $row_ReclatestC['l_class']))) {echo "checked";} ?>><span>(輪播)</span></label>
                                                                                <label><input type="radio" name="l_class" value="3" <?php if (!(strcmp(3, $row_ReclatestC['l_class']))) {echo "checked";} ?>><span>(三格)</span></label>
                                                                            </td>
                                                                            <td width="532" class="select">
                                                                                <?php if (!(strcmp(1, $row_ReclatestC['l_class']))) {echo "(五格)"; } ?>
                                                                                <?php if (!(strcmp(2, $row_ReclatestC['l_class']))) {echo "(輪播)"; } ?>
                                                                                <?php if (!(strcmp(3, $row_ReclatestC['l_class']))) {echo "(三格)"; } ?>
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">名稱</td>
                                                                            <td>
                                                                                <textarea name="l_title" cols="60" rows="3" class="table_data" id="l_title"><?php echo $row_ReclatestC['l_title']; ?></textarea>
                                                                                <input name="l_id" type="hidden" id="l_id" value="<?php echo $row_ReclatestC['l_id']; ?>" />
                                                                            </td>
                                                                            <td bgcolor="#e5ecf6" class="table_col_title">
                                                                                <p class="red_letter">*小斷行請按Shift+Enter。
                                                                                    <br /> 輸入區域的右下角可以調整輸入空間的大小。
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文名稱</td>
                                                                            <td width="516">
                                                                                <input name="l_title_en" type="text" class="table_data" id="l_title_en" value="<?php echo $row_ReclatestC['l_title_en']; ?>" size="50" />
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr> -->
                                                                        <!-- <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">標籤</td>
                                                                            <td width="532">
                                                                                <textarea name="l_content" cols="60" rows="4" class="table_data" id="l_content"><?php echo $row_ReclatestC['l_content']; ?></textarea>
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6"> </td>
                                                                        </tr> -->
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">狀態</td>
                                                                            <td width="516">
                                                                                <select name="l_active" class="table_data" id="l_active">
                                                                                    <option value="0" <?php if (!(strcmp(0, $row_ReclatestC[ 'l_active']))) {echo "selected";} ?>>不公佈</option>
                                                                                    <option value="1" <?php if (!(strcmp(1, $row_ReclatestC[ 'l_active']))) {echo "selected";} ?>>公佈</option>
                                                                                </select>
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">時間</td>
                                                                            <td>
                                                                                <input name="l_date" type="text" class="table_data" id="l_date" value="<?php echo $row_ReclatestC['l_date']; ?>" size="50" />
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
                                                                                        <td align="center"><a href="image_edit.php?file_id=<?php echo $row_RecCCover['file_id'].'&type=latestCCover'; ?>" class="fancyboxEdit" title="修改圖片"><img src="image/media_edit.gif" width="16" height="16" title="修改圖片"/></a><a href="image_del.php?file_id=<?php echo $row_RecCCover['file_id'].'&type=latestCCover'; ?>" class="fancyboxEdit" title="刪除圖片"><img src="image/media_delete.gif" width="16" height="16" title="刪除圖片"/></a></td>
                                                                                        <td align="center">&nbsp;</td>
                                                                                    </tr>
                                                                                </table>
                                                                                <?php } while ($row_RecCCover = $RecCCover->fetch()); ?>
                                                                            </td>
                                                                            <td bgcolor="#e5ecf6" class="table_col_title">
                                                                                <p class="red_letter">*
                                                                                    <?php echo $imagesSize['latestCCover']['note'];?>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } // Show if recordset not empty ?>
                                                                        <?php if ($totalRows_RecCCover == 0 && $row_ReclatestC['l_class'] == 1) { // Show if recordset not empty ?>
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
                                                                                    <?php echo $imagesSize['latestCCover']['note'];?>
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

    $updateSQL = "UPDATE latest_set SET l_title=:l_title, l_title_en=:l_title_en, l_slug=:l_slug, l_class=:l_class, l_content=:l_content, l_link=:l_link, l_date=:l_date, l_active=:l_active WHERE l_id=:l_id";

    $sth = $conn->prepare($updateSQL);
    $sth->bindParam(':l_title', $_POST['l_title'], PDO::PARAM_STR);
    $sth->bindParam(':l_title_en', $_POST['l_title_en'], PDO::PARAM_STR);
    $sth->bindParam(':l_slug', generate_slug($_POST['l_title']), PDO::PARAM_STR);
    $sth->bindParam(':l_class', $_POST['l_class'], PDO::PARAM_STR);
    $sth->bindParam(':l_content', $_POST['l_content'], PDO::PARAM_STR);
    $sth->bindParam(':l_link', $_POST['l_link'], PDO::PARAM_STR);
    $sth->bindParam(':l_date', $_POST['l_date'], PDO::PARAM_INT);
    $sth->bindParam(':l_active', $_POST['l_active'], PDO::PARAM_INT);
    $sth->bindParam(':l_id', $_POST['l_id'], PDO::PARAM_INT);
    $sth->execute();

    //----------插入圖片資料到資料庫begin(須放入插入主資料後)----------

    // CCover
    $image_result = image_process($conn, $_FILES['imageCCover'], $_REQUEST['imageCCover_title'], $menu_is, "add", $imagesSize['latestCCover']['IW'], $imagesSize['latestCCover']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $type = 'latestCCover';
        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type, PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $_POST['l_id'], PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }
    //----------插入圖片資料到資料庫end----------

    $updateGoTo = "latestC_list.php";
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