

        
<section class="section primary welcome inactive" id="s-welcome">
    <div class="container">


<?  
$_OPTIMIZATION["title"] = "Система тикетов";
if(!isset($sess)) {
echo "Для просмотра данной страницы необходимо авторизоваться!";
return; }



$usid = intval($_SESSION['id']);
$logn = $userdata['login'];


if(isset($_GET['new'])) {

if (isset($_POST['title'])) {

$title = str(base64_encode(strip_tags($_POST['title'])));

$text = str(base64_encode(strip_tags($_POST['text'])));

$date = time();

if(!empty($title)) {

if(!empty($text)) {

$pdo->Query("INSERT INTO `tb_tickets` (userid, login, title, text, date, status) VALUES ('$usid', '$logn', '$title', '$text', '$date', '0')");

$lid = $pdo->LastInsertId();

$pdo->Query("INSERT INTO `tb_tickets_txt` (id_tick, userid, login, text, date) VALUES ('$lid', '$usid', '$logn', '$text', '$date')");

//$avto = base64_encode('Сегодня мы сделали рестарт, снова принимаются любые вклады стабильно и без риска 10 - 15 дней.');
//mysql_query("INSERT INTO tickets_txt (id_tik, user_id, login, text, date) VALUES ('$lid', '$user_id', 'Support', '$avto', '$date')");

echo '<center><font color="green">Новый тикет успешно создан. Ожидайте ответа администрации.</font></center><br />';

?> <script>  setTimeout( "location='/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?

}else echo '<font color="red">Введите текст обращения!</font><br />';

}else echo '<font color="red">Введите тему обращения!</font><br />';

}

?>

<center>
<form method="post" action="">
<div style="clear:both;"></div>
<input name="title" size="10"  style="width:300px; " class="inputs float" type="text" placeholder="Введите заголовок">
<div style="clear:both;"></div>
<textarea  style=" font-family: 'Open Sans',sans-serif;  width: 50%; margin: 5px 0px 0px; padding: 10px; border: 1px solid #CCC; font-size: 14px; 
color: #727272; border-radius: 3px; box-shadow: 0px 1px 1px #E9E9E9 inset;" placeholder=" Опишите вашу проблему подробнее..." name="text"></textarea><br /><br />

<input class="buttop"  style="margin:unset;"  type="submit" value="Отправить">

</form>
</center>
</br>
</br>
<?

return;

}

?>






<? #################################################################### ?>

<?

if(isset($_GET['id'])) {

$id = intval($_GET['id']);

$sql = $pdo->Query("SELECT * FROM `tb_tickets` WHERE `id` = '$id'");

$q = $sql->Fetch();

if(isset($_POST['otvet'])) {

$otvet = str(base64_encode(strip_tags($_POST['otvet'])));

$date = time();

if(!empty($otvet)) {

$pdo->Query("INSERT INTO `tb_tickets_txt` (id_tick, userid, login, text, date) VALUES ('$id', '$usid', '$logn', '$otvet', '$date')");

echo '<center><font color="green">Ваше сообщение успешно отправлено!</font></center>';

?> <script>  setTimeout( "location='/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?

}else echo '<center><font color="red">Введите текст обратного ответа.</font></center>';

}


$sqls = $pdo->Query("SELECT * FROM `tb_tickets_txt` WHERE `id_tick` = '$id' AND `userid` = '$usid' ORDER BY `id` DESC");

if($sqls->RowCount() == 0) {

echo '<center><font color="red">Данного обращения не существует!</font></center>';

} else {

if($q['status'] == 0) {

?>

<center>



<form method="post" action="">

<textarea  style=" font-family: 'Open Sans',sans-serif;  width: 50%; margin: 5px 0px 0px; padding: 10px; border: 1px solid #CCC; font-size: 14px; 
color: #727272; border-radius: 3px; box-shadow: 0px 1px 1px #E9E9E9 inset;" placeholder=" Поле для ввода ответа..." name="otvet"></textarea><br /><br />

<input class="buttop"  style="margin:unset;" type="submit" value="Отправить">

</form>

</center>

<br />
<hr />
<br /><br />

<? } ?>



<?

while($sup = $sqls->Fetch()) {

echo '<b>'. $sup['login']; echo '</b> :: ';  echo date("d.m.Y", $sup["date"]);

echo '<br />'. base64_decode(str($sup['text']));

echo '<br /><br /><hr /><br />';

} } return; }

?>



<br />

<table width="100%">
<tr>
<td><b style="font-weight:bold;">Ниже вы можете увидить свои заявки в тех. поддержку.</b></td>
<td align="right">
<a href="/index.php?a=tickets&new" class="button brand-1 style="margin:unset;" title="Новый тикет"> &nbsp;&nbsp;&nbsp; Открыть новый запрос &nbsp;&nbsp;&nbsp; </a>
</td>
</tr>
</table>


</p>




<center>

<table class="table table-striped">
<thead>
  <tr>
<th>#ID</th>
<th>Дата заявки</th>
<th>Заголовок</th>
<th>Статус</th>
 </tr>
  </thead>


<?

$sql = $pdo->Query("SELECT * FROM `tb_tickets` WHERE `userid` = '$usid' ORDER BY id DESC");
while($sup = $sql->Fetch()) {

if($sup['status'] == 0) {$status = 'Открытый';} elseif($sup['status'] == 1) {$status = 'Закрытый';}
$dtsup = $sup['date'];
?>


  <tbody>
    <tr>	
<tr>
<td><?=$sup['id']; ?></td>
<td><?=date("d.m.Y",$dtsup);?></td>
<td><a href="/index.php?a=tickets&id=<?=$sup['id'];?>"><?=base64_decode($sup['title']); ?></a></td>


<td><?=$status; ?></td>



<? } ?>
</tr>
</table>

</center>



<BR /><BR /><BR /><BR /><BR />
		
    </div>
</section>