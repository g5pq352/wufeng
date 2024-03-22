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

$menu_is = "franchisee";

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
                                    <td width="30%" class="list_title">加盟表單</td>
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
                                                <td width="78%" class="table_data"><?php echo (isset($row_RecData['d_title'])) ? $row_RecData['d_title'].'-'.$row_RecData['d_data1'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">姓名</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data1'])) ? $row_RecData['d_data1'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">電話</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data2'])) ? $row_RecData['d_data2'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">信箱</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data3'])) ? $row_RecData['d_data3'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">戶籍地址-縣市</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data4'])) ? $row_RecData['d_data4'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">戶籍地址-地區</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data5'])) ? $row_RecData['d_data5'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">戶籍地址-地址</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data6'])) ? $row_RecData['d_data6'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">通訊地址-縣市</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data7'])) ? $row_RecData['d_data7'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">通訊地址-地區</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data8'])) ? $row_RecData['d_data8'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">通訊地址-地址</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data9'])) ? $row_RecData['d_data9'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">性別</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data10'])) ? $row_RecData['d_data10'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">生日</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data11'])) ? $row_RecData['d_data11'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">婚姻狀況</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data12'])) ? $row_RecData['d_data12'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">子女人數</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data13'])) ? $row_RecData['d_data13'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">配偶名</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data14'])) ? $row_RecData['d_data14'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">配偶職業</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data15'])) ? $row_RecData['d_data15'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">父名</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data16'])) ? $row_RecData['d_data16'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">父職業</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data17'])) ? $row_RecData['d_data17'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">母名</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data18'])) ? $row_RecData['d_data18'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">母職業</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data19'])) ? $row_RecData['d_data19'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">學歷</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data20'])) ? $row_RecData['d_data20'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">學校</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data21'])) ? $row_RecData['d_data21'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">科系</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data22'])) ? $row_RecData['d_data22'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">擁有證照</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data23'])) ? $row_RecData['d_data23'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">專長</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data24'])) ? $row_RecData['d_data24'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">目前工作行業</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data25'])) ? $row_RecData['d_data25'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">職稱</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data26'])) ? $row_RecData['d_data26'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">月收入</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data27'])) ? $row_RecData['d_data27'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">店面管理經驗</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data28'])) ? $row_RecData['d_data28'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">店名</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data29'])) ? $row_RecData['d_data29'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">經營時間</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data30'])) ? $row_RecData['d_data30'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">餐飲管理經驗</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data31'])) ? $row_RecData['d_data31'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">店名</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data32'])) ? $row_RecData['d_data32'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">職稱</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data33'])) ? $row_RecData['d_data33'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">經營時間</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data34'])) ? $row_RecData['d_data34'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">您是否飲用過本店商品?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data35'])) ? $row_RecData['d_data35'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">最喜歡的商品為</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data36'])) ? $row_RecData['d_data36'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">您之前是否有經商或販賣之經驗?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data37'])) ? $row_RecData['d_data37'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">您認為麻古與其他同業最大的差異為何?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data38'])) ? $row_RecData['d_data38'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">您認為麻古與其他同業最大的差異為何?(其他)</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data38_else'])) ? $row_RecData['d_data38_else'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問一杯飲料您可以接受的消費金額為多少?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data39'])) ? $row_RecData['d_data39'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">如果您想購買飲料，您所想到會前往購買的三大品牌為何?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data40'])) ? $row_RecData['d_data40'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您預計何時加盟創業?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data41'])) ? $row_RecData['d_data41'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您預計開店的的地點為何?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data42'])) ? $row_RecData['d_data42'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您會投入多少資本在麻古茶坊茶飲事業?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data43'])) ? $row_RecData['d_data43'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您的資金來源為何?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data44'])) ? $row_RecData['d_data44'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您選擇加盟創業的原因為何?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data45'])) ? $row_RecData['d_data45'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您選擇加盟創業的原因為何?(其他)</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data45_else'])) ? $row_RecData['d_data45_else'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您為何想加盟麻古茶坊?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data46'])) ? $row_RecData['d_data46'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您為何想加盟麻古茶坊?(其他)</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data46_else'])) ? $row_RecData['d_data46_else'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您預計合作創業的夥伴為何?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data47'])) ? $row_RecData['d_data47'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您預計合作創業的夥伴為何?(其他)</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data47_else'])) ? $row_RecData['d_data47_else'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您開店後由誰來管理店面?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data48'])) ? $row_RecData['d_data48'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您開店後由誰來管理店面?(其他)</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data48_else'])) ? $row_RecData['d_data48_else'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您是否參加過其他說明會或加盟展?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data49'])) ? $row_RecData['d_data49'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">品牌名稱</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data50'])) ? $row_RecData['d_data50'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您是從何處得知麻古茶坊的加盟訊息?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data51'])) ? $row_RecData['d_data51'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請問您是從何處得知麻古茶坊的加盟訊息?(其他)</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data51_else'])) ? $row_RecData['d_data51_else'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">您是否做好創業的準備： (長時間的投入與經營管理的風險)</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data52'])) ? $row_RecData['d_data52'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">您是否相信總部的各項訓練輔導?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data53'])) ? $row_RecData['d_data53'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">是否參與過麻古茶坊的工作?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data54'])) ? $row_RecData['d_data54'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">是否在面談前已經認識麻古茶坊的加盟店長?</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data55'])) ? $row_RecData['d_data55'] : '無'; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="table_title">請選擇</td>
                                                <td class="table_data"><?php echo (isset($row_RecData['d_data56'])) ? $row_RecData['d_data56'] : '無'; ?></td>
                                            </tr>
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