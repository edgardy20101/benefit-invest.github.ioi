<?
sleep(1);
session_start();
header("Content-type: text/html; charset=windows-1251");
date_default_timezone_set('Africa/Lagos');
include('../data/config.php');
clearstatcache();

if(isset($_SESSION['pay']) AND isset($_POST['codeqiwi'])) {
$transaction = trim(clean($_POST['codeqiwi']));
$transid = (int)$_SESSION['pay'];

if(empty($_POST['codeqiwi'])) { echo '<center><font color="red">Вы не указали номер перевода (транкзацию).</font></center></br></br>'; exit();  }

$sql = $pdo->Query("SELECT * FROM `tb_inserts` WHERE `id` = '$transid'");
$datepay = $sql->Fetch();

$datanum = $sql->RowCount();

if($datanum == 0) { unset($_SESSION['pay']); echo '<center>Ошибка проверки платежа.</center></br></br>'; exit(); }




$sqlq = $pdo->Query("SELECT * FROM `tb_inserts` WHERE `codeqiwi` = '$transaction'");

$repeat = $sqlq->RowCount();

if($repeat >= 1) { unset($_SESSION['pay']); echo '<center>Ошибка проверки платежа.<center></br></br>'; exit(); }



include($_SERVER['DOCUMENT_ROOT']."/data/qiwi.class.php");
$qiwi = new Qiwi($qiwiacc, $qiwipass, $_SERVER['DOCUMENT_ROOT'].'/tmp/cookie.txt');
$date1 = date( 'd.m.Y', strtotime( '-1 day' ) );
$date2 = date( 'd.m.Y', strtotime( '+1 day' ) );
$operations = $qiwi->GetHistory($date1,$date2);	
		
foreach($operations as $value) {
if($value['iID'] == $transaction && $value["sType"] == "INCOME" && $value["sStatus"] == "SUCCESS" && $value["sCurrency"] == "RUB") {
$ok = true;
$summ = $value['dAmount'];
} }

if($summ == $datepay['summa']) {
if($ok == true) {
    
$pdo->Query("UPDATE `tb_stats` SET `invest` = `invest` + '$summ' WHERE `id` = '1'");
$pdo->Query("UPDATE `tb_users` SET `inserts` = `inserts` + '$summ' WHERE `id` = '$sess'");
$pdo->Query("UPDATE `tb_inserts` SET `status` = '1', `codeqiwi` = '$transaction'  WHERE `id` = '$transid'");
$pdo->Query("UPDATE `tb_depo` SET `status` = '0' WHERE `insid` = '$transid'");

unset($_SESSION['pay']);

echo '<center><font color="green">Вклад успешно подтвержден. Большого Вам профита!</font></center></br></br>';

$ref = intval($userdata['refid']);
$refs = floatval($summ / 100 * $refperc); 
$refsum = number_format($refs, 2, '.', '');
$pdo->Query("UPDATE `tb_users` SET `money` = `money` + '$refsum' WHERE `id` = '$ref'");

?>

<script>  setTimeout( "location='/index.php?a=history';", 3000 ); </script>

<?

} else echo '<center><font color="red">Оплата еще не получена, подождите 10 секунд.</font></center></br></br>'; exit();

} else echo '<center><font color="red">Сумма платежа не совпадает с отправленной суммой!</font></center></br></br>'; exit();

} else echo '<center><font color="red">Повторите попытку через 30 секунд!</font></center></br></br>';

exit(); 
 
?>

</br>
</br>