<?
session_start();
header("Content-type: text/html; charset=windows-1251");
date_default_timezone_set('Africa/Lagos');
include('../data/connect.php');
include('../data/config.php');
clearstatcache();

if(isset($_POST['sum'])){
    
$sum = str(clean($_POST['sum']));
$ps = str(clean($_POST['ps']));
$login = str($userdata['login']);
$money = floatval($userdata['money']);

if($ps == 1) { $purse = clean($userdata['qiwi']); } else
if($ps == 2) { $purse = clean($userdata['payeer']); } else
if($ps == 3) { $purse = clean($userdata['pm']); } 

if ($money - $sum >= 0) {
if ($sum >= $minpay AND $sum <= $maxpay) {
    
    $pdo->Query("INSERT INTO `tb_pays` VALUES ('', '$sess', '$login', '$sum', '".time()."', '$purse', '0')");
    $pdo->Query("UPDATE `tb_users` SET `money` = `money` - '$sum' WHERE `id` = '$sess'");

	echo "<font color='green'>Заявка успешно добавлена в базу данных.</font> <br /><br />";
				
	?> <script>  setTimeout( "location='/index.php?a=payment';", 3000 ); </script> <?
				
} else echo '<font color="red">Сумма имеет неверное значение (ниже или выше допустимой нормы).</font><br><br>'; exit(); 
} else echo '<font color="red">Сумма превышает остаток баланса.</font><br><br>'; exit(); 
}
?>