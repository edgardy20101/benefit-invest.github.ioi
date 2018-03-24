<?

include_once('cpayeer.php');
$accountNumber = $paeracc;
$apiId = $paerid;
$apiKey = $perapi;
$payeer = new CPayeer($accountNumber, $apiId, $apiKey);

include($_SERVER['DOCUMENT_ROOT']."/data/qiwi.class.php");
$wallet = new Qiwi($qiwiacc, $qiwipass, $_SERVER['DOCUMENT_ROOT'].'/tmp/payment.txt');
$balance = $wallet->GetBalances();

$f = fopen('https://perfectmoney.is/acct/balance.asp?AccountID='.$fgPMID.'&PassPhrase='.$cfgPMpass, 'rb');

if($f===false){
   echo 'error openning url';
}

// getting data
$out=array(); $out="";
while(!feof($f)) $out.=fgets($f);

fclose($f);

// searching for hidden fields
if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER)){
   echo 'Ivalid output';
   exit;
}

// putting data to array
$ar="";
foreach($result as $item){
   $key=$item[1];
   $ar[$key]=$item[2];
}



if(isset($_POST['code'])) {
	$smsid = $_POST['smsid'];
	$smsusid = $_POST['smsusid'];
	$smsumm = $_POST['smsumm'];
	$code = (int)$_POST['code']; 
	$confirm = $wallet->paymentSMSConfirm( $code ); 

$pdo->Query("UPDATE `tb_pays` SET `status` = '1' WHERE `id` = '$smsid'");
$pdo->Query("UPDATE `tb_users` SET `payouds` = `payouds` + '$smsumm' WHERE `id` = '$smsusid'");
$pdo->Query("UPDATE `tb_stats` SET `pay` = `pay` + '$smsumm' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, выплата произведена!</h4>";

?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?  exit();	
    
} 

##############################################################


if(isset($_POST['success'])) {
$id = (int)$_POST['id'];
$userid = (int)$_POST['userid'];
$summa = floatval($_POST['summa']);
$purse = $_POST['purse'];
$sComment = 'Payment from '.$site;

$doll = $_POST['summa'] / $cursdlr;
$dollars = number_format($doll, 2, '.', '');

$srt = substr($purse, 0, 1);
if ($srt == 'U' OR $srt == 'E' OR $srt == 'G' OR $srt == 'B') { $method = 3; } elseif ($srt == 'P') { $method = 2; } else { $method = 1; }



##############################################################

if($method == 1) {
    
##############################################################

$pay = $wallet->SendMoney($purse, $summa, 'RUB', $sComment );

if($pay != false) {
$pdo->Query("UPDATE `tb_pays` SET `status` = '1' WHERE `id` = '$id'");
$pdo->Query("UPDATE `tb_users` SET `payouds` = `payouds` + '$summa' WHERE `id` = '$userid'");
$pdo->Query("UPDATE `tb_stats` SET `pay` = `pay` + '$summa' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, выплата произведена! Транкзация: ".$pay."</h4>";
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
} else {  

?>

<h4 class='alert_info'>
<form method="post" action="">
Код подтверждения из СМС: 
<input type="hidden" name="smsumm" value="<?=$summa; ?>">
<input type="hidden" name="smsusid" value="<?=$userid; ?>">
<input type="hidden" name="smsid" value="<?=$id; ?>">
<input type="text" name="code" placeholder="Код из смс" > 
<input type="submit" value="Подтвердить">
</form>
</h4>
<? 
} 


##############################################################

} // the end

##############################################################


if($method == 2) {

if ($payeer->isAuth()) {

$arTransfer = $payeer->transfer(array(
'curIn' => 'RUB',
'sum' => $summa,
'curOut' => 'RUB',
'comment' => iconv('windows-1251', 'utf-8', "Выплата пользователю #{$userid}"),
'to' => $purse ));

if (!empty($arTransfer["historyId"])) {

$pdo->Query("UPDATE `tb_pays` SET `status` = '1' WHERE `id` = '$id'");
$pdo->Query("UPDATE `tb_users` SET `payouds` = `payouds` + '$summa' WHERE `id` = '$userid'");
$pdo->Query("UPDATE `tb_stats` SET `pay` = `pay` + '$summa' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Перевод №".$arTransfer["historyId"]." успешно завершен!</h4>";
?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?

} else {

echo '<pre>'.print_r($arTransfer["errors"], true).'</pre>';

}

} 

}

##############################################################

if($method == 3) {

$f = fopen('https://perfectmoney.is/acct/confirm.asp?AccountID='.$fgPMID.'&PassPhrase='.$cfgPMpass.'&Payer_Account='.$cfgPerfect.'&Payee_Account='.$purse.'&Amount='.$dollars.'&PAY_IN=1&PAYMENT_ID='.$id.'&Memo='.$cfgURL, 'rb');

if($f === false) { print '<p class="er">Временно недоступен API PerfectMoney. Попробуйте пожалуйста позже.</p>';
$pdo->Query("UPDATE `tb_users` SET `money` = `money` + '$summa' WHERE `id` = '$userid'");
return; } else { 
    
$pdo->Query("UPDATE `tb_pays` SET `status` = '1' WHERE `id` = '$id'");
$pdo->Query("UPDATE `tb_users` SET `payouds` = `payouds` + '$summa' WHERE `id` = '$userid'");
$pdo->Query("UPDATE `tb_stats` SET `pay` = `pay` + '$summa' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, выплата на сумму ".$dollars."$ произведена!</h4>";

?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?  exit();	
}

}				
					
##############################################################

} // if success

##############################################################


if(isset($_POST['fail'])){
    $id = (int)$_POST['id'];
    $userid = (int)$_POST['userid'];
    $summa = floatval($_POST['summa']);
    $pdo->Query("UPDATE `tb_pays` SET `status` = '2' WHERE `id` = '$id'");
    $pdo->Query("UPDATE `tb_users` SET `money` = `money` + '$summa' WHERE `id` = '$userid'");
    echo "<h4 class='alert_info'>Уважаемый админинстратор, выплата отклонена!</h4>";
}

if(isset($_POST['hide'])){
	$id = (int)$_POST['id'];
	$userid = (int)$_POST['userid'];
    $pdo->Query("UPDATE `tb_pays` SET `status` = '3' WHERE `id` = '$id'");
	$pdo->Query("UPDATE `tb_users` SET `huck` = '1' WHERE `id` = '$userid'");
	echo "<h4 class='alert_info'>Уважаемый админинстратор, выплата скрыта!</h4>";
}


?>

<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1251"><h3>Модерация выплат</h3></header>
<div class="module_content">
<table width="100%">
<tr>
<td><? echo '<b>Баланс на киви: RUB = '.$balance['RUB'].' руб</b><br />'; ?></td>
<td> <b>Баланс на Payeer: 
<?
if ($payeer->isAuth())
{
	$arBalance = $payeer->getBalance();
	//var_dump($arBalance);
	echo $arBalance['balance']['RUB']['BUDGET'];
}
?> руб
 </b></td>
 
 <td>
 <b>Баланс на PerfectMoney: <? echo $ar[$cfgPerfect]; ?>$</b>
 </td>
 
<td align="right">
<? if(!isset($_GET['hide'])) { ?><a href="/<?=$diradm; ?>/index.php?a=pay&hide=1"><b>Показать скрытые выплаты</b></a><? } else { ?>
<a href="/<?=$diradm; ?>/index.php?a=pay"><b>Вернуться к обычным выплатам</b></a><? } ?>
</td>
</tr>
</table>
<br />


<table class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th><center>Пользователь</center></th>
<th><center>Дата</center></th>
<th><center>Сумма</center></th>
<th><center>Кошелек</center></th>
<th><center>Метод</center></th>
<th style="width:350px;"><center>Действие</center></th>
</tr>
</thead>

<tbody>

<?
$num = 10;
if(isset($_GET['page'])){
$page = (int)$_GET['page'];
} else { $page = 1; }

if(isset($_GET['hide'])) {
	$where = 3;
} else { $where = 0; }

$result00 = $pdo->Query("SELECT * FROM `tb_pays` WHERE `status` = '$where'");
$temp = $result00->RowCount();
$posts = $temp;
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;

if($temp == 0) { echo '<tr><td><center><font color="red">Выплат нету!</font></td></tr>'; exit(); }


$sql = $pdo->Query("SELECT * FROM `tb_pays` WHERE `status` = '$where' ORDER BY `id` DESC LIMIT $start, $num");


while($rows = $sql->Fetch()) {
$userid = (int)$rows['userid'];
$summa = floatval($rows['summa']);
$purse = $rows['purse'];
$date = date("d.m.Y в H:i", $rows['time'] + 7200);
$login = str($rows['login']);
$sqs = $pdo->Query("SELECT * FROM `tb_users` WHERE `id` = '$userid'");
$dat = $sqs->Fetch();
$huck = $dat['huck'];

$srt = substr($purse, 0, 1);
if ($srt == 'U' OR $srt == 'E' OR $srt == 'G' OR $srt == 'B') { $method = 'PerfectMoney'; } elseif ($srt == 'P') { $method = 'Payeer Wallet'; } else { $method = 'Qiwi Wallet'; }

$doll = $rows['summa'] / $cursdlr;
$dollars = number_format($doll, 2, '.', '');
?>

<tr>
<td><center><?if($huck == 1) { echo '<font color="red">^ </font>'; } echo $login; ?></center></td>
<td><center><?=$date; ?></center></td>
<td><center><?=$summa; ?> <? if($method == 'PerfectMoney') { ?> (<?=$dollars; ?>$) <? } ?></center></td>
<td><center><form method="POST"><input type="text" name="purse" value="<?=$purse; ?>"></center></td>
<td><center><?=$method; ?></center></td>
<td style="width:350px;">

<center>
<table><tr><td>

<input type="submit" name="success" value="Обработать" />
<input type="hidden" name="id" value="<?=$rows['id']; ?>" />
<input type="hidden" name="userid" value="<?=$userid; ?>" />
<input type="hidden" name="summa" value="<?=$summa; ?>" />
</form>
</td>
<td>
<form method="POST">
<input type="submit" name="fail" value="Отклонить">
<input type="hidden" name="id" value="<?=$rows['id']; ?>" />
<input type="hidden" name="userid" value="<?=$userid; ?>" />
<input type="hidden" name="summa" value="<?=$summa; ?>" />
</form>
</td>
<td>
<form method="POST">
<input type="submit" name="hide" value="Скрыть">
<input type="hidden" name="id" value="<?=$rows['id']; ?>" />
<input type="hidden" name="userid" value="<?=$userid; ?>" />
</form>
</td>
</tr></table>

</center>
</td>
</tr>

<? } ?>

</tbody>
</table>


<br /><br /><center>
<?

// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=index.php?a='.$_GET['a'].'&page=1> Первая </a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=index.php?a='.$_GET['a'].'&page=' .$total. '> Последняя </a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=index.php?a='.$_GET['a'].'&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=index.php?a='.$_GET['a'].'&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=index.php?a='.$_GET['a'].'&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=index.php?a='.$_GET['a'].'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=index.php?a='.$_GET['a'].'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=index.php?a='.$_GET['a'].'&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=index.php?a='.$_GET['a'].'&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=index.php?a='.$_GET['a'].'&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=index.php?a='.$_GET['a'].'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=index.php?a='.$_GET['a'].'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
}
?>

</center>
	