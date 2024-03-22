<?php require_once('../Connections/connect2data.php'); ?>
<?php require_once('photo_process.php'); ?>
<?php require_once('file_process.php'); ?>
<?php require_once('imagesSize.php'); ?>

<?php
if (!1) {
    header("Location: shop_list.php");
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$G_selected1 = '';
if (isset($_SESSION['selected_shopC'])) {
    $G_selected1 = $_SESSION['selected_shopC'];
}

$G_selected2 = '';
if (isset($_SESSION['selected_shopC_level2'])) {
    $G_selected2 = $_SESSION['selected_shopC_level2'];
}


$query_RecshopC = "SELECT * FROM class_set WHERE c_parent = 'shopC' AND c_active='1' AND c_level='1' ORDER BY c_sort ASC, c_id DESC";
$RecshopC = $conn->query($query_RecshopC);
// $row_RecshopC = $RecshopC->fetch();
$totalRows_RecshopC = $RecshopC->rowCount();

while ($row_RecshopC = $RecshopC->fetch()) {
    $cat_level_1[] = $row_RecshopC;
}



$query_RecshopC_level2 = "SELECT * FROM class_set WHERE c_parent = 'shopC' AND c_active='1' AND c_level='2' ORDER BY c_sort ASC, c_id DESC";
$RecshopC_level2 = $conn->query($query_RecshopC_level2);
// $row_RecshopC_level2 = $RecshopC_level2->fetch();
$totalRows_RecshopC_level2 = $RecshopC_level2->rowCount();

while ($row_RecshopC_level2 = $RecshopC_level2->fetch()) {
    $cat_level_2[] = $row_RecshopC_level2;
}

if ($totalRows_RecshopC_level2 <= 0) {
    $cat_level_2[] = "";
}


$query_Recfruit = "SELECT * FROM data_set WHERE d_class1 = 'fruit' AND d_active='1' ORDER BY d_sort ASC";
$Recfruit = $conn->query($query_Recfruit);
// $row_Recfruit = $Recfruit->fetch();
$totalRows_Recfruit = $Recfruit->rowCount();


$query_ReccityC = "SELECT * FROM class_set WHERE c_parent = 'cityC' AND c_active='1' ORDER BY c_sort ASC, c_id DESC";
$ReccityC = $conn->query($query_ReccityC);
$row_ReccityC = $ReccityC->fetch();
$totalRows_ReccityC = $ReccityC->rowCount();


$query_RecshopCC = "SELECT * FROM class_set WHERE c_parent = 'shopC' AND c_id=$G_selected1 AND c_active='1' AND c_level='1' ORDER BY c_sort ASC, c_id DESC";
$RecshopCC = $conn->query($query_RecshopCC);
$row_RecshopCC = $RecshopCC->fetch();
$totalRows_RecshopCC = $RecshopCC->rowCount();

$menu_is = "shop";
$_SESSION['nowMenu'] = $menu_is;
$ifFile = 0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php require_once('cmsTitle.php'); ?></title>

    <link rel="stylesheet" href="jquery/chosen_v1.8.5/chosen.css">
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
        .ryder-fade-1, .ryder-fade-2{
            display: none;
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
                                            <table width="100%" border="0" cellpadding="5" cellspacing="3">
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">分類</td>
                                                    <td>
                                                        <select name="d_class4" id="d_class4" class="chosen-select">
                                                            <?php do { ?>
                                                            <option value="<?php echo $row_ReccityC['c_id']?>" <?php if (!(strcmp($row_ReccityC[ 'c_id'], $row_RecshopCC['c_class']))) {echo "selected";} ?>>
                                                                <?php echo $row_ReccityC['c_title']?>
                                                            </option>
                                                            <?php
                                                            } while ($row_ReccityC = $ReccityC->fetch());
                                                            $rows = $ReccityC->rowCount();
                                                            if($rows > 0) {
                                                                $ReccityC->execute();
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">分類</td>
                                                    <td id="ryder-cat">
                                                        <select name="d_class3" id="d_class3" class="chosen-select" v-model="nowlevel1">
                                                            <option v-for="l1 in level1" :value="l1.c_id">{{l1.c_title}}</option>
                                                        </select>

                                                        <select name="d_class2" id="d_class2" class="chosen-select" v-model="nowlevel2">
                                                            <option v-for="l2 in level2" :value="l2.c_id">{{l2.c_title}}</option>
                                                        </select>
                                                    </td>
                                                    <td bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">標題</td>
                                                    <td width="532">
                                                        <input name="d_title" type="text" class="table_data" id="d_title" size="60" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <!-- <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">英文名稱</td>
                                                    <td width="532">
                                                        <input name="d_title_en" type="text" class="table_data" id="d_title_en" size="60" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr> -->
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">地址</td>
                                                    <td width="532">
                                                        <input name="d_data1" type="text" class="table_data" id="d_data1" size="60" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">電話</td>
                                                    <td width="532">
                                                        <input name="d_data2" type="text" class="table_data" id="d_data2" size="60" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">營業時間</td>
                                                    <td width="532">
                                                        <input name="d_data3" type="text" class="table_data" id="d_data3" size="60" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">google map</td>
                                                    <td width="532">
                                                        <input name="d_data4" type="text" class="table_data" id="d_data4" size="60" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <!-- <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">內容</td>
                                                    <td><textarea name="d_content" cols="60" rows="8" class="table_data" id="d_content"></textarea></td>
                                                    <td bgcolor="#e5ecf6" class="table_col_title"><p class="red_letter">*小斷行請按Shift+Enter。<br />
                                                    輸入區域的右下角可以調整輸入空間的大小。</p></td>
                                                </tr> -->
                                                <tr>
                                                    <td width="200" align="center" bgcolor="#e5ecf6" class="table_col_title">時間</td>
                                                    <td>
                                                        <input name="d_date" type="text" class="table_data" id="d_date" value="<?php echo date(" Y-m-d H:i:s "); ?>" size="50" />
                                                    </td>
                                                    <td width="250" bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">在網頁顯示</td>
                                                    <td>
                                                        <label>
                                                            <select name="d_active" class="table_data" id="d_active">
                                                                <option value="1">顯示</option>
                                                                <option value="0">不顯示</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                    <td bgcolor="#e5ecf6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">
                                                        <p>上傳封面圖片</p>
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
                                                            <?php echo $imagesSize['shopCover']['note'];?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">
                                                        <p>上傳圖片</p>
                                                    </td>
                                                    <td>
                                                        <table width="100%" border="0" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC" class="data" id="pTable">
                                                            <tr>
                                                                <td> <span class="table_data">選擇圖片：</span>
                                                                    <input name="image[]" type="file" class="table_data" id="image1" />
                                                                    <br>
                                                                    <span class="table_data">圖片說明：</span>
                                                                    <input name="image_title[]" type="text" class="table_data" id="image_title1"> </td>
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
                                                        <p class="red_letter">* 若要上傳多張照片，請於新增完成後，至該筆資料編輯區點選上傳。</p>
                                                        <p class="red_letter">* 若要排序照片，請於新增完成後，至該筆資料編輯區排序。</p>
                                                        <p class="red_letter">*
                                                            <?php echo $imagesSize[$_SESSION['nowMenu']]['note'];?>
                                                        </p>
                                                    </td>
                                                </tr> -->

                                                <?php if($ifFile){ ?>
                                                <tr>
                                                    <td align="center" bgcolor="#e5ecf6" class="table_col_title">
                                                        <p>上傳檔案</p>
                                                    </td>
                                                    <td>
                                                        <table border="0" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC" class="data" id="pTable2">
                                                            <tr>
                                                                <td> <span class="table_data">選擇檔案：</span>
                                                                    <input name="upfile[]" type="file" class="table_data" id="upfile1" />
                                                                    <br>
                                                                    <span class="table_data">檔案說明：</span>
                                                                    <input name="upfile_title[]" type="text" class="table_data" id="upfile_title1"> </td>
                                                            </tr>
                                                        </table>
                                                        <table width="100%" border="0" cellspacing="5" cellpadding="2">
                                                            <tr>
                                                                <td>
                                                                    <table border="0" cellspacing="2" cellpadding="2">
                                                                        <tr>
                                                                            <td width="16"><a href="javascript:addField2()"><img src="image/add.png" width="16" height="16" border="0"></a></td>
                                                                            <td width="48"><a href="javascript:addField2()" class="table_data">新增檔案</a></td>
                                                                            <td width="390" class="red_letter">&nbsp;</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td bgcolor="#e5ecf6" class="table_col_title">
                                                        <p><span class="red_letter">*上傳之檔案請勿超過2M。</span></p>
                                                    </td>
                                                </tr>
                                                <?php } ?>
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
                                <input type="hidden" name="d_class4" value="1" />
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
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="js/ImageSelect.jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2@2.0.0/dist/spectrum.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2@2.0.0/dist/spectrum.min.css">

<script type="text/javascript">
    new Vue({
        el: '#ryder-cat',
        data: {
            'nowlevel1': <?= $G_selected1 ?>,
            'nowlevel2': <?= $G_selected2 ?>,
            'level1': <?= json_encode($cat_level_1) ?>,
            'level2temp': <?= json_encode($cat_level_2) ?>,
        },
        computed: {
            level2() {
                return this.level2temp.filter((v) => v.c_link == this.nowlevel1)
            }
        },
        methods: {},
        watch: {
            nowlevel1(val) {
                this.nowlevel2 = this.level2[0].c_id

                setTimeout(function () {
                    $("#d_class2").trigger("chosen:updated")
                }, 5)
            }
        },
        mounted() {
            $("#d_class3").on("change", () => this.nowlevel1 = $("#d_class3").val())
            // $("#d_class3").on("change", () => this.nowlevel2 = $("#d_class3").val())
        },
        updated() {},
    })


    $(".chosen-select").chosen({
        disable_search_threshold: 6,
        no_results_text: "找不到資料。 目前輸入的是:",
        placeholder_text_single: "尚未新增分類",
        width: "100px"
    });

    function call_alert(link_url) {
        alert("上傳得檔案中，有的不是圖片!");
        window.location = link_url;
    }

    function addField() {
        var pTable = document.getElementById('pTable');
        var lastRow = pTable.rows.length;
        var myField = document.getElementById('image' + lastRow);
        if (myField.value) {
            var aTr = pTable.insertRow(lastRow);
            var newRow = lastRow + 1;
            var newImg = 'img' + (newRow);
            var aTd1 = aTr.insertCell(0);
            aTd1.innerHTML = '<span class="table_data">選擇圖片： </span><input name="image[]" type="file" class="table_data" id="image' + newRow + '"><br><span class="table_data">圖片說明： </span><input name="image_title[]" type="text" class="table_data" id="image_title' + newRow + '">';
        } else {
            alert("尚有未選取之圖片欄位!!");
        }
    }

    function addField2() {
        var pTable2 = document.getElementById('pTable2');
        var lastRow = pTable2.rows.length;
        var myField = document.getElementById('upfile' + lastRow);
        if (myField.value) {
            var aTr = pTable2.insertRow(lastRow);
            var newRow = lastRow + 1;
            var newFile = 'file' + (newRow);
            var aTd1 = aTr.insertCell(0);
            aTd1.innerHTML = '<span class="table_data">選擇檔案： </span><input name="upfile[]" type="file" class="table_data" id="upfile' + newRow + '"><br><span class="table_data">檔案說明： </span><input name="upfile_title[]" type="text" class="table_data" id="upfile_title' + newRow + '">';
        } else {
            alert("尚有未選取之檔案欄位!!");
        }
    }

    function addFieldIndex() {
        var pTable = document.getElementById('pTableIndex');
        var lastRow = pTable.rows.length;
        var myField = document.getElementById('indexImage' + lastRow);
        if (myField.value) {
            var aTr = pTable.insertRow(lastRow);
            var newRow = lastRow + 1;
            var newImg = 'img' + (newRow);
            var aTd1 = aTr.insertCell(0);
            aTd1.innerHTML = '<span class="table_data">選擇圖片： </span><input name="indexImage[]" type="file" class="table_data" id="indexImage' + newRow + '"><br><span class="table_data">圖片說明： </span><input name="indexImage_title[]" type="text" class="table_data" id="indexImage_title' + newRow + '">';
        } else {
            alert("尚有未選取之圖片欄位!!");
        }
    }

    $(".imagechosen-select").chosen({
        width: "90%",
        placeholder_text_multiple: "請選擇"
    });


    $('.addTage').on('click', function(){
        var rowindex = (($('#addArea tr').length)/3)+1;
        //var rowindex = $("#addArea").closest('tr').index();
        // console.debug('rowindex', rowindex);
        // console.log('rowindex', rowindex);
        console.log("tab_title = "+ $("#tab_title"+(rowindex-1)).val());
        console.log("tab_tooth = "+ $("#tab_tooth"+(rowindex-1)).val());
        console.log("tab_tube = "+ $("#tab_tube"+(rowindex-1)).val());

        // if(( $("#tab_title"+(rowindex-1)).val()=="" ) || ( $("#tab_tooth"+(rowindex-1)).val()=="" ) || ( $("#tab_tube"+(rowindex-1)).val()=="" )){
        if(( $("#tab_tooth"+(rowindex-1)).val()=="" ) || ( $("#tab_tube"+(rowindex-1)).val()=="" )){
            alert("尚有牙頭或管身未填寫!!");
        }else{
            $(".imagechosen-select").chosen('destroy')

            $(".tab_title"+(rowindex-1)).clone().attr("class", "tab_title"+(rowindex)).appendTo("#addArea");
            $("#addArea"+" .tab_title"+(rowindex)).find("#tab_title"+(rowindex-1)).attr("id", "tab_title"+(rowindex));

            $(".tab_tooth"+(rowindex-1)).clone().attr("class", "tab_tooth"+(rowindex)).appendTo("#addArea");
            $("#addArea"+" .tab_tooth"+(rowindex)).find("#tab_tooth"+(rowindex-1)).attr("id", "tab_tooth"+(rowindex));

            $(".tab_tube"+(rowindex-1)).clone().attr("class", "tab_tube"+(rowindex)).appendTo("#addArea");
            $("#addArea"+" .tab_tube"+(rowindex)).find("#tab_tube"+(rowindex-1)).attr("id", "tab_tube"+(rowindex));

            $("#addArea"+" .tab_tube"+(rowindex)).find("select[name='tab_tube"+ (rowindex-1) +"[]']").attr("name", "tab_tube"+(rowindex)+"[]");




            $(".imagechosen-select").chosen({
                width: "90%",
                placeholder_text_multiple: "請選擇"
            });
        }

        /*$("#tab_content"+rowindex).load(function(){
        initTinyMce();
        });*/
    });
</script>

<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

    $class1 = 'shop';

    $insertSQL = "INSERT INTO data_set (d_title, d_title_en, d_content, d_class1, d_class2, d_class3, d_class4, d_class5, d_class6, d_data1, d_data2, d_data3, d_data4, d_data5, d_data6, d_data7, d_data8, d_data9, d_data10, d_data11, d_date, d_active) VALUES (:d_title, :d_title_en, :d_content, :d_class1, :d_class2, :d_class3, :d_class4, :d_class5, :d_class6, :d_data1, :d_data2, :d_data3, :d_data4, :d_data5, :d_data6, :d_data7, :d_data8, :d_data9, :d_data10, :d_data11, :d_date, :d_active)";

    $stat = $conn->prepare($insertSQL);
    $stat->bindParam(':d_title', $_POST['d_title'], PDO::PARAM_STR);
    $stat->bindParam(':d_title_en', $_POST['d_title_en'], PDO::PARAM_STR);
    $stat->bindParam(':d_content', $_POST['d_content'], PDO::PARAM_STR);
    $stat->bindParam(':d_class1', $class1, PDO::PARAM_STR);
    $stat->bindParam(':d_class2', $_POST['d_class2'], PDO::PARAM_STR);
    $stat->bindParam(':d_class3', $_POST['d_class3'], PDO::PARAM_STR);
    $stat->bindParam(':d_class4', $_POST['d_class4'], PDO::PARAM_STR);
    $stat->bindParam(':d_class5', $_POST['d_class5'], PDO::PARAM_STR);
    $stat->bindParam(':d_class6', $_POST['d_class6'], PDO::PARAM_STR);
    $stat->bindParam(':d_data1', $_POST['d_data1'], PDO::PARAM_STR);
    $stat->bindParam(':d_data2', $_POST['d_data2'], PDO::PARAM_STR);
    $stat->bindParam(':d_data3', $_POST['d_data3'], PDO::PARAM_STR);
    $stat->bindParam(':d_data4', $_POST['d_data4'], PDO::PARAM_STR);
    $stat->bindParam(':d_data5', $_POST['d_data5'], PDO::PARAM_STR);
    $stat->bindParam(':d_data6', $_POST['d_data6'], PDO::PARAM_STR);
    $stat->bindParam(':d_data7', $_POST['d_data7'], PDO::PARAM_STR);
    $stat->bindParam(':d_data8', $_POST['d_data8'], PDO::PARAM_STR);
    $stat->bindParam(':d_data9', $_POST['d_data9'], PDO::PARAM_STR);
    $stat->bindParam(':d_data10', $_POST['d_data10'], PDO::PARAM_STR);
    $stat->bindParam(':d_data11', $_POST['d_data11'], PDO::PARAM_STR);
    $stat->bindParam(':d_date', $_POST['d_date'], PDO::PARAM_STR);
    $stat->bindParam(':d_active', $_POST['d_active'], PDO::PARAM_INT);
    $stat->execute();

    //----------插入圖片資料到資料庫begin(須放入插入主資料後)----------

    //找到insert ID
    $new_data_num = $conn->lastInsertId();

    //一般附圖
    $image_result = image_process($conn, $_FILES['image'], $_REQUEST['image_title'], $menu_is, "add", $imagesSize[$_SESSION['nowMenu']]['IW'], $imagesSize[$_SESSION['nowMenu']]['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'image', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }

    // Cover
    $image_result = image_process($conn, $_FILES['imageCover'], $_REQUEST['imageCover_title'], $menu_is, "add", $imagesSize['shopCover']['IW'], $imagesSize['shopCover']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopCover', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }

    // Map
    $image_result = image_process($conn, $_FILES['imageMap'], $_REQUEST['imageMap_title'], $menu_is, "add", $imagesSize['shopMap']['IW'], $imagesSize['shopMap']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopMap', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }

    // Banner
    $image_result = image_process($conn, $_FILES['imageBanner'], $_REQUEST['imageBanner_title'], $menu_is, "add", $imagesSize['shopBanner']['IW'], $imagesSize['shopBanner']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopBanner', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }

    // BannerMobile
    $image_result = image_process($conn, $_FILES['imageBannerMobile'], $_REQUEST['imageBannerMobile_title'], $menu_is, "add", $imagesSize['shopBannerMobile']['IW'], $imagesSize['shopBannerMobile']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopBannerMobile', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }

    // Content
    $image_result = image_process($conn, $_FILES['imageContent'], $_REQUEST['imageContent_title'], $menu_is, "add", $imagesSize['shopContent']['IW'], $imagesSize['shopContent']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopContent', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }

    // ContentMobile
    $image_result = image_process($conn, $_FILES['imageContentMobile'], $_REQUEST['imageContentMobile_title'], $menu_is, "add", $imagesSize['shopContentMobile']['IW'], $imagesSize['shopContentMobile']['IH']);

    for ($j = 1; $j < count($image_result); $j++) {
        $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_link2, file_link3, file_type, file_d_id, file_title, file_show_type) VALUES (:file_name, :file_link1, :file_link2, :file_link3, :file_type, :file_d_id, :file_title, :file_show_type)";

        $stat = $conn->prepare($insertSQL);
        $stat->bindParam(':file_name', $image_result[$j][0], PDO::PARAM_STR);
        $stat->bindParam(':file_link1', $image_result[$j][1], PDO::PARAM_STR);
        $stat->bindParam(':file_link2', $image_result[$j][2], PDO::PARAM_STR);
        $stat->bindParam(':file_link3', $image_result[$j][3], PDO::PARAM_STR);
        $stat->bindParam(':file_type', $type = 'shopContentMobile', PDO::PARAM_STR);
        $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_INT);
        $stat->bindParam(':file_title', $image_result[$j][4], PDO::PARAM_STR);
        $stat->bindParam(':file_show_type', $image_result[$j][5], PDO::PARAM_INT);
        $stat->execute();

        $_SESSION["change_image"] = 1;
    }
    //----------插入圖片資料到資料庫end----------

    //----------插入檔案資料到資料庫begin(須放入插入主資料後)----------
    if ($ifFile) {
        $file_result = file_process($conn, "shopFile", "add");

        for ($j = 0; $j < count($file_result); $j++) {
            $insertSQL = "INSERT INTO file_set (file_name, file_link1, file_type, file_d_id, file_title) VALUES (:file_name, :file_link1, :file_type, :file_d_id, :file_title)";

            $stat = $conn->prepare($insertSQL);
            $stat->bindParam(':file_name', $file_result[$j][0], PDO::PARAM_STR);
            $stat->bindParam(':file_link1', $file_result[$j][1], PDO::PARAM_STR);
            $stat->bindParam(':file_type', $type = 'file', PDO::PARAM_STR);
            $stat->bindParam(':file_d_id', $new_data_num, PDO::PARAM_STR);
            $stat->bindParam(':file_title', $file_result[$j][2], PDO::PARAM_STR);
            $stat->execute();
        }
    }
    //----------插入檔案資料到資料庫end----------

    $_SESSION['original_selected'] = $_SESSION['selected_shopC'];
    $insertGoTo = "shop_list.php?selected1=" . $_POST['d_class3'] . "&selected2=" . $_POST['d_class2'] . "&pageNum=0&totalRows=" . ($_SESSION['totalRows'] + 1) . "&changeSort=1&now_d_id=" . $new_data_num . "&change_num=1";

    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }

    if ($image_result[0][0] == 1) {
        echo "<script type=\"text/javascript\">call_alert('" . $insertGoTo . "');</script>";
    } else {
        header(sprintf("Location: %s", $insertGoTo));
    }
}
?>