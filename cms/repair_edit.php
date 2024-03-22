<?php require_once('../Connections/connect2data.php'); ?>

<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$colname_RecData = "-1";
if (isset($_GET['d_id'])) {
    $colname_RecData = $_GET['d_id'];
}

$query_RecData = "SELECT * FROM data_set WHERE d_id = :d_id";
$RecData = $conn->prepare($query_RecData);
$RecData->bindParam(':d_id', $colname_RecData, PDO::PARAM_INT);
$RecData->execute();
$row_RecData = $RecData->fetch();
$totalRows_RecData = $RecData->rowCount();

$query_RecFile = "SELECT * FROM file_set WHERE file_d_id = :file_d_id";
$RecFile = $conn->prepare($query_RecFile);
$RecFile->bindParam(':file_d_id', $colname_RecData, PDO::PARAM_INT);
$RecFile->execute();
$row_RecFile = $RecFile->fetch();
$totalRows_RecFile = $RecFile->rowCount();

$menu_is = "repair";

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
                                    <td width="30%" class="list_title">查看維修服務</td>
                                    <td width="70%">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><img src="image/spacer.gif" width="1" height="1"></td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="table_outline">
                                        <table border="0" align="center" cellpadding="5" cellspacing="1">
                                            <tr>
                                                <td width="100%" align="left" class="table_data">客戶資訊：</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="3" cellpadding="5" id="forcolor">
                                            <tr>
                                                <td width="23%" align="center" class="table_title">姓名</td>
                                                <td width="78%" class="table_data"><?php echo (isset($row_RecData['d_title'])) ? $row_RecData['d_title'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">門市</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data1'])) ? $row_RecData['d_data1'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">廚具品牌</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data11'])) ? $row_RecData['d_data11'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">建案名稱</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data12'])) ? $row_RecData['d_data12'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">行動電話</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data2'])) ? $row_RecData['d_data2'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">市話</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data3'])) ? $row_RecData['d_data3'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">信箱</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data4'])) ? $row_RecData['d_data4'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">住址</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data5'])) ? $row_RecData['d_data5'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">簡述</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data6'])) ? $row_RecData['d_data6'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">品項</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data7'])) ? $row_RecData['d_data7'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">品牌</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data8'])) ? $row_RecData['d_data8'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">型號</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data9'])) ? $row_RecData['d_data9'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">簡述</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data10'])) ? $row_RecData['d_data10'] : '無'; ?></td>
                                            </tr>

                                            <?php if($totalRows_RecFile > 0) : ?>
                                                <?php do { ?>
                                                    <?php if($row_RecFile['file_link1'] != "") : ?>
                                                        <tr>
                                                            <td align="center" class="table_title">照片</td>
                                                            <td class="table_data"><a href="../<?=$row_RecFile['file_link1']?>" target="_blank"><img src="../<?=$row_RecFile['file_link1']?>" width="500"></a></td>
                                                        </tr>
                                                    <?php endif ?>
                                                <?php } while ($row_RecFile = $RecFile->fetch()); ?>

                                            <?php endif ?>

                                            <!-- <tr>
                                                <td align="center" class="table_title">訊息</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_content'])) ? nl2br($row_RecData['d_content']) : '無'; ?></td>
                                            </tr> -->
                                            <tr>
                                                <td align="center" class="table_title">諮詢時間</td>
                                                <td class="table_data"><?php echo $row_RecData['d_date']; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <input name="submitBtn" type="submit" class="btnType" id="submitBtn" value="回上一頁" onclick="history.back()" />
                                    </td>
                                </tr>
                            </table>
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

<script>
    $("#forcolor tr").each(function (i, el) {
        if (i%2==0) {
            $("td", el).eq(1).attr("bgcolor", "#E4E4E4");
        }
    })
</script>