<?
if(isset($_POST['success'])){
    $id = (int)$_POST['id'];
    $userid = (int)$_POST['userid'];
    $summa = floatval($_POST['summa']);
    $pdo->Query("UPDATE `tb_inserts` SET `status` = '1' WHERE `id` = '$id'");
    $pdo->Query("UPDATE `tb_depo` SET `status` = '0' WHERE `insid` = '$id'");
    $pdo->Query("UPDATE `tb_users` SET `inserts` = `inserts` + '$summa' WHERE `id` = '$userid'");
    $pdo->Query("UPDATE `tb_stats` SET `invest` = `invest` + '$summa' WHERE `id` = '1'");

$sql =  $pdo->Query("SELECT * FROM `tb_users` WHERE `id` = '$userid'");
$dataref = $sql->Fetch();
$ref = intval($dataref['refid']);
$refsum = floatval($summa / 100 * $refperc); 
$pdo->Query("UPDATE `tb_users` SET `money` = `money` + '$refsum' WHERE `id` = '$ref'");

    echo "<h4 class='alert_info'>Уважаемый админинстратор, депозит успешно обработан!</h4>";
}

if(isset($_POST['fail'])){
    $id = (int)$_POST['id'];
    $userid = (int)$_POST['userid'];
    $summa = floatval($_POST['summa']);
    $pdo->Query("UPDATE `tb_inserts` SET `status` = '2' WHERE `id` = '$id'");
    $pdo->Query("UPDATE `tb_depo` SET `status` = '3' WHERE `insid` = '$id'");
    echo "<h4 class='alert_info'>Уважаемый админинстратор, депозит отклнонен!</h4>";
}

?>

<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1251"><h3>Модерация вкладов</h3></header>
<div class="module_content">
			 
<table class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th><center>Пользователь</center></th>
<th><center>Дата</center></th>
<th><center>Сумма</center></th>
<th><center>Транкзация</center></th>
<th style="width:350px;"><center>Действие</center></th>
</tr>
</thead>

<tbody>

<?
$sql = $pdo->Query("SELECT * FROM `tb_inserts` WHERE `status` = '0' ORDER BY `id` DESC");
while($rows = $sql->Fetch()) {
$userid = (int)$rows['userid'];
$summa = floatval($rows['summa']);
$purse = $rows['codeqiwi'];
$date = date("d.m.Y в H:i", $rows['time'] + 7200);
$login = str($rows['login']);
    
?>

<tr>
<td><center><?=$login; ?></center></td>
<td><center><?=$date; ?></center></td>
<td><center><?=$summa; ?></center></td>
<td><center><?=$purse; ?></center></td>
<td style="width:350px;">

<center>
<table><tr><td>
<form method="POST">
<input type="submit" name="success" value="Обработать" />
<input type="hidden" name="id" value="<?=$rows['id']; ?>" />
<input type="hidden" name="userid" value="<?=$userid; ?>" />
<input type="hidden" name="summa" value="<?=$summa; ?>" />
</form>
</td><td>
<form method="POST">
<input type="submit" name="fail" value="Отклонить">
<input type="hidden" name="id" value="<?=$rows['id']; ?>" />
<input type="hidden" name="userid" value="<?=$userid; ?>" />
<input type="hidden" name="summa" value="<?=$summa; ?>" />
</form>
</td></tr></table>

</center>
</td>
</tr>

<? } ?>

</tbody>
</table>
	