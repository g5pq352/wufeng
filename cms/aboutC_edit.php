<?php require_once('../Connections/connect2data.php'); ?>
<?php require_once('photo_process.php'); ?>
<?php require_once('file_process.php'); ?>
<?php require_once('imagesSize.php'); ?>

<?php
if (!1) {
    header("Location: aboutC_list.php");
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$colname_RecaboutC = "-1";
if (isset($_GET['c_id'])) {
    $colname_RecaboutC = $_GET['c_id'];
}

$query_RecaboutC = "SELECT * FROM class_set WHERE c_id = :c_id";

$RecaboutC = $conn->prepare($query_RecaboutC);
$RecaboutC->bindParam(':c_id', $colname_RecaboutC, PDO::PARAM_INT);
$RecaboutC->execute();
$row_RecaboutC = $RecaboutC->fetch();
$totalRows_RecaboutC = $RecaboutC->rowCount();

$query_RecCover = "SELECT * FROM file_set WHERE file_d_id = :file_d_id AND file_type = 'aboutCatCover' ORDER BY file_sort ASC";
$RecCover = $conn->prepare($query_RecCover);
$RecCover->bindParam(':file_d_id', $colname_RecaboutC, PDO::PARAM_INT);
$RecCover->execute();
$row_RecCover = $RecCover->fetch();
$totalRows_RecCover = $RecCover->rowCount();

$menu_is = "about";

//記錄帶資料去別地方的資訊
$_SESSION['nowPage'] = $selfPage;
$_SESSION['nowMenu'] = $menu_is;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php require_once('cmsTitle.php'); ?></title>
    <link rel="stylesheet" href="css/ImageSelect.css">

    <style>
        .ryder-cat-imagechosen .chosen-container .chosen-drop{
            top: auto;
            bottom: 100%;
            border-top: 1px solid;
            border-bottom: none;
        }
        .ryder-cat-imagechosen .chosen-container .chosen-results li.group-result{
            padding: 10px;
        }
        .ryder-cat-imagechosen .chosen-container .chosen-results li.group-option{
            padding-left: 30px;
        }
        .ryder-cat-imagechosen .chose-image-list{
            width: auto;
            height: 22px;
            max-height: initial;
            margin: -3px 5px 0 0;
        }
        .ryder-cat-imagechosen .chose-image{
            width: auto;
            height: 40px;
            max-height: initial;
        }
        .chose-image-list {
            width: 30px;
            max-height: 100%;
        }
    </style>

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
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">標題</td>
                                                                            <td width="516">
                                                                                <input name="c_title" type="text" class="table_data" id="c_title" value="<?php echo $row_RecaboutC['c_title']; ?>" size="50" />
                                                                                <input name="c_id" type="hidden" id="c_id" value="<?php echo $row_RecaboutC['c_id']; ?>" />
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr>
                                                                        <!-- <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">小標題</td>
                                                                            <td width="516">
                                                                                <input name="c_data1" type="text" class="table_data" id="c_data1" value="<?php echo $row_RecaboutC['c_data1']; ?>" size="50" />
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr> -->
                                                                        <!-- <tr>
                                                                            <td align="center" bgcolor="#e5ecf6" class="table_col_title">內容</td>
                                                                            <td><textarea name="c_content" cols="60" rows="8" class="table_data" id="c_content"><?php echo $row_RecaboutC['c_content']; ?></textarea></td>
                                                                            <td bgcolor="#e5ecf6" class="table_col_title"><p class="red_letter">*小斷行請按Shift+Enter。<br />
                                                                            輸入區域的右下角可以調整輸入空間的大小。</p></td>
                                                                        </tr> -->
                                                                        <!-- <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文大標題</td>
                                                                            <td width="516">
                                                                                <input name="c_data2" type="text" class="table_data" id="c_data2" value="<?php echo $row_RecaboutC['c_data2']; ?>" size="50" />
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文小標題</td>
                                                                            <td width="516">
                                                                                <input name="c_data3" type="text" class="table_data" id="c_data3" value="<?php echo $row_RecaboutC['c_data3']; ?>" size="50" />
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr> -->
                                                                        <tr>
                                                                            <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">狀態</td>
                                                                            <td width="516">
                                                                                <select name="c_active" class="table_data" id="c_active">
                                                                                    <option value="0" <?php if (!(strcmp(0, $row_RecaboutC[ 'c_active']))) {echo "selected";} ?>>不公佈</option>
                                                                                    <option value="1" <?php if (!(strcmp(1, $row_RecaboutC[ 'c_active']))) {echo "selected";} ?>>公佈</option>
                                                                                </select>
                                                                            </td>
                                                                            <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                                        </tr>
                                                                        <?php if ($totalRows_RecCover > 0) { // Show if recordset not empty ?>
                                                                        <tr>
                                                                            <td align="center" bgcolor="#e5ecf6" class="table_col_title">目前圖片<a name="imageEdit" id="imageEdit"></a></td>
                                                                            <td id="draggable">
                                                                                <?php do { ?>
                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" data-id="<?= $row_RecCover['file_id'] ?>">
                                                                                    <tr>
                                                                                        <td width="100" rowspan="2" align="center"><a href="../<?php echo $row_RecCover['file_link1'].'?'.(mt_rand(1,100000)/100000); ?>" class="fancyboxImg" rel="group" title="<?php echo $row_RecCover['file_title']; ?>"><img src="../<?php echo $row_RecCover['file_link2'].'?'.(mt_rand(1,100000)/100000); ?>" alt="" class="image_frame"/></a></td>
                                                                                        <td align="left" class="table_data">&nbsp;圖片說明：
                                                                                            <?php echo $row_RecCover['file_title']; ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left" class="table_data">&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center"><a href="image_edit.php?file_id=<?php echo $row_RecCover['file_id'].'&type=aboutCatCover'; ?>" class="fancyboxEdit" title="修改圖片"><img src="image/media_edit.gif" width="16" height="16" title="修改圖片"/></a><a href="image_del.php?file_id=<?php echo $row_RecCover['file_id'].'&type=aboutCatCover'; ?>" class="fancyboxEdit" title="刪除圖片"><img src="image/media_delete.gif" width="16" height="16" title="刪除圖片"/></a></td>
                                                                                        <td align="center">&nbsp;</td>
                                                                                    </tr>
                                                                                </table>
                                                                                <?php } while ($row_RecCover = $RecCover->fetch()); ?>
                                                                            </td>
                                                                            <td bgcolor="#e5ecf6" class="table_col_title">
                                                                                <p class="red_letter">*
                                                                                    <?php echo $imagesSize['aboutCatCover']['note'];?>
                                                                                </p>
                                                                                <p class="red_letter">* 若要排序照片，請直接施拉即可。</p>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } // Show if recordset not empty ?>
                                                                        <?php if (1) { // Show if recordset not empty ?>
                                                                        <tr>
                                                                            <td align="center" bgcolor="#e5ecf6" class="table_col_title">
                                                                                <p>上傳圖片</p>
                                                                            </td>
                                                                            <td>
                                                                                <table width="100%" border="0" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC" class="data" id="pTable">
                                                                                    <tr>
                                                                                        <td> <span class="table_data">選擇圖片：</span>
                                                                                            <input name="imageCover[]" type="file" class="table_data" id="imageCover1" />
                                                                                            <br>
                                                                                            <span class="table_data">圖片說明：</span>
                                                                                            <input name="imageCover_title[]" type="text" class="table_data" id="imageCover_title1"> </td>
                                                                                    </tr>
                                                                                </table>
                                                                                <table width="100%" border="0" cellspacing="5" cellpadding="2">
                                                                                    <tr>
                                                                                        <td height="28">
                                                                                            <table border="0" cellspacing="2" cellpadding="2">
                                                                                                <tr>
                                                                                                    <td><a href="javascript:addField()"><img src="image/add.png" width="16" height="16" border="0"></a></td>
                                                                                                    <td><a href="javascript:addField()" class="table_data">新增圖片</a></td>
                                                                                                    <td class="red_letter">&nbsp;</td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td bgcolor="#e5ecf6" class="table_col_title">
                                                                                <p class="red_letter">*
                                                                                    <?php echo $imagesSize['aboutCatCover']['note'];?>
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

<script type="text/javascript" src="jquery/fancyapps-fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="jquery/fancyapps-fancyBox/source/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/fancyapps-fancyBox/source/jquery.fancybox.css" media="screen" />
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.6.1/Sortable.min.js"></script>
<script src="js/ImageSelect.jquery.js"></script>

<script>

    if ($("#draggable")[0] != undefined) {
        var sortable = Sortable.create( $("#draggable")[0],{
            animation: 100,
            ghostClass: "ryder-ghost",
            chosenClass: "ryder-chosen",
            onSort(e) {

                $.ajax({
                    data: {
                        ids: sortable.toArray()
                    },
                    url: "image_sort.php",
                    type: "POST",
                    success: function(res){}
                });

            }
        } );
    }

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

    function addField() {
        var pTable = document.getElementById('pTable');
        var lastRow = pTable.rows.length;
        //alert(pTable.rows.length);
        var myField = document.getElementById('imageCover' + lastRow);
        //alert('image'+lastRow);
        if (myField.value) {
            var aTr = pTable.insertRow(lastRow);
            var newRow = lastRow + 1;
            var newImg = 'img' + (newRow);
            var aTd1 = aTr.insertCell(0);
            aTd1.innerHTML = '<span class="table_data">選擇圖片： </span><input name="imageCover[]" type="file" class="table_data" id="imageCover' + newRow + '"><br><span class="table_data">圖片說明： </span><input name="imageCover_title[]" type="text" class="table_data" id="imageCover_title' + newRow + '">';
        } else {
            alert("尚有未選取之圖片欄位!!");
        }
    }
</script>

<?php
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

    $updateSQL = "UPDATE class_set SET c_title=:c_title, c_title_en=:c_title_en, c_data1=:c_data1, c_data2=:c_data2, c_data3=:c_data3, c_data4=:c_data4, c_data5=:c_data5, c_data6=:c_data6, c_class=:c_class, c_content=:c_content, c_link=:c_link, c_active=:c_active WHERE c_id=:c_id";

    $sth = $conn->prepare($updateSQL);
    $sth->bindParam(':c_title', $_POST['c_title'], PDO::PARAM_STR);
    $sth->bindParam(':c_title_en', $_POST['c_title_en'], PDO::PARAM_STR);
    $sth->bindParam(':c_data1', $_POST['c_data1'], PDO::PARAM_STR);
    $sth->bindParam(':c_data2', $_POST['c_data2'], PDO::PARAM_STR);
    $sth->bindParam(':c_data3', $_POST['c_data3'], PDO::PARAM_STR);
    $sth->bindParam(':c_data4', $_POST['c_data4'], PDO::PARAM_STR);
    $sth->bindParam(':c_data5', $_POST['c_data5'], PDO::PARAM_STR);
    $sth->bindParam(':c_data6', $_POST['c_data6'], PDO::PARAM_STR);
    $sth->bindParam(':c_class', $_POST['c_class'], PDO::PARAM_STR);
    $sth->bindParam(':c_content', $_POST['c_content'], PDO::PARAM_STR);
    $sth->bindParam(':c_link', $_POST['c_link'], PDO::PARAM_STR);
    $sth->bindParam(':c_active', $_POST['c_active'], PDO::PARAM_INT);
    $sth->bindParam(':c_id', $_POST['c_id'], PDO::PARAM_INT);
    $sth->execute();


    // Cover
    $image_result = image_process($conn, $_FILES['imageCover'], $_REQUEST['imageCover_title'], $menu_is, "add", $imagesSize['aboutCatCover']['IW'], $imagesSize['aboutCatCover']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'aboutCatCover', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $_POST['c_id'], PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }
    //----------插入圖片資料到資料庫end----------

    $updateGoTo = "aboutC_list.php";
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
}
?>