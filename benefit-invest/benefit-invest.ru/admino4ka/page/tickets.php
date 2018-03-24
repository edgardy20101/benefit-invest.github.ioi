<?

if(isset($_POST['close'])){
    $id = (int)$_POST['id'];
    $pdo->Query("UPDATE `tb_tickets` SET `status` = '1' WHERE `id` = '$id'");
    echo "<h4 class='alert_info'>Уважаемый админинстратор, тикет успешно закрыт!</h4>";
}

?>

<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"><h3>Служба поддержки</h3></header>
<div class="module_content">


<?
if(isset($_GET['id'])) {
$id = intval($_GET['id']);
$db = $pdo->Query("SELECT * FROM `tb_tickets` WHERE `id` = '$id'");
$q = $db->Fetch();

if(isset($_POST['otvet'])) {
$uid = intval($q['userid']);
$otvet = base64_encode($_POST['otvet']);
$date = time();
if(!empty($otvet)) {
$pdo->Query("INSERT INTO `tb_tickets_txt` (id_tick, userid, login, text, date) VALUES ('$id', '$uid', 'Support $site', '$otvet', '$date')");
echo '<font color="green">Ваше сообщение отправлено</font>';
} else echo '<font color="red">Введите текст ответа</font>';

}




$sql = $pdo->Query("SELECT * FROM `tb_tickets_txt` WHERE `id_tick` = '$id' ORDER BY `id` DESC");
if($sql->RowCount() == 0) {

echo '<font color="red">Тикета не существует</font>';

} else {

?>


<h3>Написать ответ</h3>
<form method="post" action="">
<textarea name="otvet" rows="2" cols="56"></textarea><br>
<input type="hidden" name="uid" value="<?=$q['user_id']; ?>">
<input type="submit" style="width:470px;" value="Отправить">
</form>


<br />
<hr />
<br /><br />

<?

while($sup = $sql->Fetch()) {

echo '<b>'. $sup['login']; echo '</b> :: ';  echo date("d.m.Y", $sup["date"]);

echo '<br />'. base64_decode($sup['text']);

echo '<br /><hr /><br />';

}  } return; } 

?>

			 
<table class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th><center>#ID</center></th>
<th><center>Пользователь</center></th>
<th><center>Заголовок</center></th>
<th><center>Дата</center></th>
<th style="width:350px;"><center>Действие</center></th>
</tr>
</thead>

<tbody>

<?
$sql = $pdo->Query("SELECT * FROM `tb_tickets` WHERE `status` = '0' ORDER BY `id` DESC");
while($rows = $sql->Fetch()) {
$id = (int)$rows['id'];
$login = str($rows['login']);
$date = date("d.m.Y в H:i", $rows['date']);
$title = base64_decode($rows['title']);
$title = strip_tags($title);
?>
<tr>
<td><center><?=$id; ?></center></td>
<td><center><?=$login; ?></center></td>
<td><center><a href="/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>&id=<?=$id; ?>"><?=$title; ?></a></center></td>
<td><center><?=$date; ?></center></td>
<td style="width:200px;">

<center>
<table>
<tr>
<td>
<form method="POST">
<input type="submit" name="close" value="Закрыть тикет">
<input type="hidden" name="id" value="<?=$id; ?>" />
</form>
</td></tr></table>

</center>
</td>
</tr>

<? } ?>

</tbody>
</table>
	