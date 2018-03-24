<?
if(isset($_POST['success'])){
    $id = (int)$_POST['id'];
    $pdo->Query("UPDATE `tb_otziv` SET `status` = '1' WHERE `id` = '$id'");
    echo "<h4 class='alert_info'>Уважаемый админинстратор, отзыв успешно обработан!</h4>";
}

if(isset($_POST['fail'])){
    $id = (int)$_POST['id'];
    $pdo->Query("DELETE FROM `tb_otziv` WHERE `id` = '$id'");
    echo "<h4 class='alert_info'>Уважаемый админинстратор, отзыв удален!</h4>";
}

?>

<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"><h3>Модерация отзывов</h3></header>
<div class="module_content">
			 
<table class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th ><center>Пользователь</center></th>
<th><center>Дата</center></th>
<th><center>Текст</center></th>

<th style="width:250px;"><center>Действие</center></th>
</tr>
</thead>

<tbody>

<?
$sql = $pdo->Query("SELECT * FROM `tb_otziv` WHERE `status` = '0' ORDER BY `id` DESC");
while($rows = $sql->Fetch()) {
$login = $rows['login'];
$text = base64_decode($rows['text']);
$date = date("d.m.Y в H:i", $rows['date']);

?>

<tr>
<td><center><?=$login; ?></center></td>
<td><center><?=$date; ?></center></td>
<td style="max-width:500px;"><center><?=$text; ?></center></td>
<td style="width:250px;">

<center>
<table><tr><td>
<form method="POST">
<input type="submit" name="success" value="Пропустить" />
<input type="hidden" name="id" value="<?=$rows['id']; ?>" />
</form>
</td><td>
<form method="POST">
<input type="submit" name="fail" value="Удалить">
<input type="hidden" name="id" value="<?=$rows['id']; ?>" />
</form>
</td></tr></table>

</center>
</td>
</tr>

<? } ?>

</tbody>
</table>
	