<?php require_once('../Connections/connect2data.php'); ?>
<?php require_once('photo_process.php'); ?>
<?php require_once('file_process.php'); ?>
<?php require_once('imagesSize.php'); ?>

<?php
if (!1) {
    header("Location: shopC_level2_list.php");
}

$G_selected1 = '';
if (isset($_SESSION['selected_shopC_level2'])) {
    $G_selected1 = $_SESSION['selected_shopC_level2'];
}

$query_RecshopC = "SELECT * FROM class_set WHERE c_parent = 'shopC' AND c_level='1' AND c_active='1' ORDER BY c_sort ASC, c_id DESC";
$RecshopC = $conn->query($query_RecshopC);
$row_RecshopC = $RecshopC->fetch();
$totalRows_RecshopC = $RecshopC->rowCount();


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$menu_is = "shop";

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
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">分類</td>
                                                    <td>
                                                        <select name="c_link" id="c_link" class="chosen-select">
                                                            <?php do { ?>
                                                            <option value="<?php echo $row_RecshopC['c_id']?>" <?php if (!(strcmp($row_RecshopC[ 'c_id'], $G_selected1))) {echo "selected";} ?>>
                                                                <?php echo $row_RecshopC['c_title']?>
                                                            </option>
                                                            <?php
                                                            } while ($row_RecshopC = $RecshopC->fetch());
                                                            $rows = $RecshopC->rowCount();
                                                            if($rows > 0) {
                                                                $RecshopC->execute();
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">中文標題</td>
                                                    <td width="532">
                                                        <input name="c_title" type="text" class="table_data" id="c_title" size="50">
                                                        <input name="c_parent" type="hidden" id="c_parent" value="shopC" />
                                                        <input name="c_level" type="hidden" id="c_level" value="2" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文標題</td>
                                                    <td width="532">
                                                        <input name="c_title_en" type="text" class="table_data" id="c_title_en" size="50">
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <!-- <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">北半球</td>
                                                    <td width="532" bgcolor="#e5ecf6"></td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">季節</td>
                                                    <td width="532">
                                                        <input name="c_data1" type="text" class="table_data" id="c_data1" size="50">
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">溫度</td>
                                                    <td width="532">
                                                        <input name="c_data2" type="text" class="table_data" id="c_data2" size="50">
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">濕度</td>
                                                    <td width="532">
                                                        <input name="c_data3" type="text" class="table_data" id="c_data3" size="50">
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">內容</td>
                                                    <td><textarea name="c_north" cols="60" rows="8" class="table_data" id="c_north"></textarea></td>
                                                    <td bgcolor="#e5ecf6" class="table_col_title"><p class="red_letter">*小斷行請按Shift+Enter。<br />
                                                    輸入區域的右下角可以調整輸入空間的大小。</p></td>
                                                </tr>

                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">南半球</td>
                                                    <td width="532" bgcolor="#e5ecf6"></td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">季節</td>
                                                    <td width="532">
                                                        <input name="c_data4" type="text" class="table_data" id="c_data4" size="50">
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">溫度</td>
                                                    <td width="532">
                                                        <input name="c_data5" type="text" class="table_data" id="c_data5" size="50">
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">濕度</td>
                                                    <td width="532">
                                                        <input name="c_data6" type="text" class="table_data" id="c_data6" size="50">
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">內容</td>
                                                    <td><textarea name="c_south" cols="60" rows="8" class="table_data" id="c_south"></textarea></td>
                                                    <td bgcolor="#e5ecf6" class="table_col_title"><p class="red_letter">*小斷行請按Shift+Enter。<br />
                                                    輸入區域的右下角可以調整輸入空間的大小。</p></td>
                                                </tr> -->
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">狀態</td>
                                                    <td width="532">
                                                        <select name="c_active" class="table_data" id="c_active">
                                                            <option value="1">公佈</option>
                                                            <option value="0">不公佈</option>
                                                        </select>
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>

                                                <!-- <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">
                                                        <p>上傳圖片</p>
                                                    </td>
                                                    <td>
                                                        <table width="100%" border="0" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC" class="data">
                                                            <tr>
                                                                <td> <span class="table_data">選擇圖片：</span>
                                                                    <input name="imageCover[]" type="file" class="table_data" id="imageCover1" />
                                                                    <br>
                                                                    <span class="table_data">圖片說明：</span>
                                                                    <input name="imageCover_title[]" type="text" class="table_data" id="imageCover_title1"> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td bgcolor="#e5ecf6" class="table_col_title">
                                                        <p class="red_letter">*
                                                            <?php echo $imagesSize['shopCatCover']['note'];?>
                                                        </p>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">
                                                        <p>上傳banner圖片</p>
                                                    </td>
                                                    <td>
                                                        <table width="100%" border="0" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC" class="data">
                                                            <tr>
                                                                <td> <span class="table_data">選擇圖片：</span>
                                                                    <input name="imageBannerCover[]" type="file" class="table_data" id="imageBannerCover1" />
                                                                    <br>
                                                                    <span class="table_data">圖片說明：</span>
                                                                    <input name="imageBannerCover_title[]" type="text" class="table_data" id="imageBannerCover_title1"> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td bgcolor="#e5ecf6" class="table_col_title">
                                                        <p class="red_letter">*
                                                            <?php echo $imagesSize['shopCatBannerCover']['note'];?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">
                                                        <p>上傳banner mobile圖片</p>
                                                    </td>
                                                    <td>
                                                        <table width="100%" border="0" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC" class="data">
                                                            <tr>
                                                                <td> <span class="table_data">選擇圖片：</span>
                                                                    <input name="imageBannerMobileCover[]" type="file" class="table_data" id="imageBannerMobileCover1" />
                                                                    <br>
                                                                    <span class="table_data">圖片說明：</span>
                                                                    <input name="imageBannerMobileCover_title[]" type="text" class="table_data" id="imageBannerMobileCover_title1"> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td bgcolor="#e5ecf6" class="table_col_title">
                                                        <p class="red_letter">*
                                                            <?php echo $imagesSize['shopCatBannerMobileCover']['note'];?>
                                                        </p>
                                                    </td>
                                                </tr> -->
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

<script src="jquery/chosen_v1.8.5/chosen.jquery.js"></script>

<script>
    $(".chosen-select").chosen({
        disable_search_threshold: 6,
        no_results_text: "找不到資料。 目前輸入的是:",
        placeholder_text_single: "尚未新增分類",
        width: "auto"
    });
</script>

<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

    $insertSQL = "INSERT INTO class_set (c_title, c_title_en, c_data1, c_data2, c_data3, c_data4, c_data5, c_data6, c_class, c_level, c_parent, c_content, c_link, c_active) VALUES (:c_title, :c_title_en, :c_data1, :c_data2, :c_data3, :c_data4, :c_data5, :c_data6, :c_class, :c_level, :c_parent, :c_content, :c_link, :c_active)";

    $sth = $conn->prepare($insertSQL);
    $sth->bindParam(':c_title', $_POST['c_title'], PDO::PARAM_STR);
    $sth->bindParam(':c_title_en', $_POST['c_title_en'], PDO::PARAM_STR);
    $sth->bindParam(':c_data1', $_POST['c_data1'], PDO::PARAM_STR);
    $sth->bindParam(':c_data2', $_POST['c_data2'], PDO::PARAM_STR);
    $sth->bindParam(':c_data3', $_POST['c_data3'], PDO::PARAM_STR);
    $sth->bindParam(':c_data4', $_POST['c_data4'], PDO::PARAM_STR);
    $sth->bindParam(':c_data5', $_POST['c_data5'], PDO::PARAM_STR);
    $sth->bindParam(':c_data6', $_POST['c_data6'], PDO::PARAM_STR);
    $sth->bindParam(':c_class', $_POST['c_class'], PDO::PARAM_INT);
    $sth->bindParam(':c_level', $_POST['c_level'], PDO::PARAM_INT);
    $sth->bindParam(':c_parent', $_POST['c_parent'], PDO::PARAM_STR);
    $sth->bindParam(':c_content', $_POST['c_content'], PDO::PARAM_STR);
    $sth->bindParam(':c_link', $_POST['c_link'], PDO::PARAM_STR);
    $sth->bindParam(':c_active', $_POST['c_active'], PDO::PARAM_INT);
    $sth->execute();

    //找到insert ID
    $new_data_num = $conn->lastInsertId();

    // Cover
    $image_result = image_process($conn, $_FILES['imageCover'], $_REQUEST['imageCover_title'], $menu_is, "add", $imagesSize['shopCatCover']['IW'], $imagesSize['shopCatCover']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopCatCover', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }
    //----------插入圖片資料到資料庫end----------



    // CatBannerCover
    $image_result = image_process($conn, $_FILES['imageBannerCover'], $_REQUEST['imageBannerCover_title'], $menu_is, "add", $imagesSize['shopCatBannerCover']['IW'], $imagesSize['shopCatBannerCover']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopCatBannerCover', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }

    // CatBannerCover
    $image_result = image_process($conn, $_FILES['imageBannerMobileCover'], $_REQUEST['imageBannerMobileCover_title'], $menu_is, "add", $imagesSize['shopCatBannerMobileCover']['IW'], $imagesSize['shopCatBannerMobileCover']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopCatBannerMobileCover', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }
    //----------插入圖片資料到資料庫end----------

    $insertGoTo = "shopC_level2_list.php?selected1=" . $_POST['c_link'] . "&pageNum=0&totalRows_RecshopC=" . ($_SESSION['totalRows'] + 1) . "&changeSort=1&now_c_id=" . $new_data_num . "&change_num=1";

    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }

    header(sprintf("Location: %s", $insertGoTo));
}
?>