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

$menu_is = "latest";

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
                                    <td width="30%" class="list_title">新增</td>
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
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">版型選擇</td>
                                                    <td width="532" class="select" id="version">
                                                        <label><input type="radio" name="l_class" value="1" checked=""><span>(五格)</span></label>
                                                        <label><input type="radio" name="l_class" value="2"><span>(輪播)</span></label>
                                                        <label><input type="radio" name="l_class" value="3"><span>(三格)</span></label>
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">名稱</td>
                                                    <td>
                                                        <textarea name="l_title" cols="60" rows="3" class="table_data" id="l_title"></textarea>
                                                        <input name="l_parent" type="hidden" id="l_parent" value="latestC" />
                                                    </td>
                                                    <td bgcolor="#e5ecf6" class="table_col_title">
                                                        <p class="red_letter">*小斷行請按Shift+Enter。
                                                            <br /> 輸入區域的右下角可以調整輸入空間的大小。
                                                        </p>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文名稱</td>
                                                    <td width="532">
                                                        <input name="l_title_en" type="text" class="table_data" id="l_title_en" size="50">
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">標籤</td>
                                                    <td width="532">
                                                        <textarea name="l_content" cols="60" rows="4" class="table_data" id="l_content"></textarea>
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr> -->
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">狀態</td>
                                                    <td width="532">
                                                        <select name="l_active" class="table_data" id="l_active">
                                                            <option value="1">公佈</option>
                                                            <option value="0">不公佈</option>
                                                        </select>
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">時間</td>
                                                    <td>
                                                        <input name="l_date" type="text" class="table_data" id="l_date" value="<?php echo date(" Y-m-d H:i:s "); ?>" size="50" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr id="v1_image">
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
                                <input type="hidden" name="MM_insert" value="form1" />
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

<script type="text/javascript">
    function call_alert(link_url) {
        alert("上傳得檔案中，有的不是圖片!");
        window.location = link_url;
    }

    $("#version input").on("change", function(){
        if($(this).val() == 1){
            $("#v1_image").show()
        }else{
            $("#v1_image").hide()
        }
    })
</script>

<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

    $insertSQL = "INSERT INTO latest_set (l_title, l_title_en, l_slug, l_class, l_parent, l_content, l_link, l_date, l_active) VALUES (:l_title, :l_title_en, :l_slug, :l_class, :l_parent, :l_content, :l_link, :l_date, :l_active)";

    $sth = $conn->prepare($insertSQL);
    $sth->bindParam(':l_title', $_POST['l_title'], PDO::PARAM_STR);
    $sth->bindParam(':l_title_en', $_POST['l_title_en'], PDO::PARAM_STR);
    $sth->bindParam(':l_slug', generate_slug($_POST['l_title']), PDO::PARAM_STR);
    $sth->bindParam(':l_class', $_POST['l_class'], PDO::PARAM_INT);
    $sth->bindParam(':l_parent', $_POST['l_parent'], PDO::PARAM_STR);
    $sth->bindParam(':l_content', $_POST['l_content'], PDO::PARAM_STR);
    $sth->bindParam(':l_link', $_POST['l_link'], PDO::PARAM_STR);
    $sth->bindParam(':l_date', $_POST['l_date'], PDO::PARAM_STR);
    $sth->bindParam(':l_active', $_POST['l_active'], PDO::PARAM_INT);
    $sth->execute();

    //----------插入圖片資料到資料庫begin(須放入插入主資料後)----------

    //找到insert ID
    $new_data_num = $conn->lastInsertId();

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
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }
    //----------插入圖片資料到資料庫end----------

    $insertGoTo = "latestC_list.php?pageNum=0&totalRows_ReclatestC=" . ($_SESSION['totalRows'] + 1) . "&changeSort=1&now_c_id=" . $new_data_num . "&change_num=1";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }

    if ($image_result[0][0] == 1) {
        echo "<script type=\"text/javascript\">call_alert('" . $insertGoTo . "');</script>";
    } else {
        header(sprintf("Location: %s", $insertGoTo));
    }

    header(sprintf("Location: %s", $insertGoTo));
}
?>