<? 
if(isset($_GET['ban'])) {
$usid = (int)$_GET['ban'];
$sql = $pdo->Query("UPDATE `tb_users` SET `ban` = '1' WHERE `id` = '$usid'");
echo "<h4 class='alert_info'>��������� ��������������, ������������ �������!</h4>";
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
}
if(isset($_GET['banoff'])) {
$usid = (int)$_GET['banoff'];
$sql = $pdo->Query("UPDATE `tb_users` SET `ban` = '0' WHERE `id` = '$usid'");
echo "<h4 class='alert_info'>��������� ��������������, ������������ ���������!</h4>";
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
}

?>

<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"><h3>������ �������������</h3></header>
<div class="module_content">

<? 

if(isset($_GET['id'])){
$usid = (int)$_GET['id'];
$sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `id` = '$usid'");
$data = $sql->Fetch();

echo '����� - <b>'.$data['login'].'</b> <br />';
echo '���� ����������� - '.date("d.m.Y � H:i", $data['date_reg']).' <br />';
echo '������ - <b>'.$data['money'].'</b> RUB <br />';
echo '���� � ������ - <b>'.$data['inserts'].'</b> RUB <br />';
echo '����� �� ������� - <b>'.$data['payouds'].'</b> RUB <br />';
echo 'Qiwi-������� - <b>+'.$data['qiwi'].'</b> <br />';
echo 'E-Mail ������ - <b>'.$data['mail'].'</b><br />';
echo '��������� IP - <b>'.$data['ip'].'</b> <br />- - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br />';
if(!empty($data['ref_name'])) { echo '������� - <b>'.$data['refname'].'</b><br />'; } else { echo'������� - <b>No Refer</b><br />'; }
echo '��������� ��������� - <b>'.$data['numrefs'].'</b> ��� <br />';
?>

<br />

<?
if(isset($_POST['qiwi'])){
	$qiwi = $_POST['qiwi'];
	$pdo->Query("UPDATE `tb_users` SET `qiwi` = '$qiwi' WHERE `id` = '$usid'");
	echo '<font color="green">���� ������� ������!</font><br /><br />';
}
?>

������� QIWI: <form method="POST"><input type="text" name="qiwi" value="<?=$data['qiwi']; ?>"><input type="submit" value="Oka'y"></form>

<br />


<?
if(isset($_POST['Payeer'])){
	$qiwi = $_POST['Payeer'];
	$pdo->Query("UPDATE `tb_users` SET `payeer` = '$qiwi' WHERE `id` = '$usid'");
	echo '<font color="green">Payeer ������� ������!</font><br /><br />';
}
?>

������� Payeer: <form method="POST"><input type="text" name="Payeer" value="<?=$data['payeer']; ?>"><input type="submit" value="Oka'y"></form>

<br />

<?
if(isset($_POST['Perfect'])){
	$qiwi = $_POST['Perfect'];
	$pdo->Query("UPDATE `tb_users` SET `pm` = '$qiwi' WHERE `id` = '$usid'");
	echo '<font color="green">Perfect ������� ������!</font><br /><br />';
}
?>

������� Perfect: <form method="POST"><input type="text" name="Perfect" value="<?=$data['pm']; ?>"><input type="submit" value="Oka'y"></form>

<br />

<?
if(isset($_POST['pass'])){
	$pass = md5pass($_POST['pass']);
	$pdo->Query("UPDATE `tb_users` SET `pass` = '$pass' WHERE `id` = '$usid'");
	echo '<font color="green">������ ������� ������!</font><br /><br />';
}
?>
<br />

������� ������: <form method="POST"><input type="text" name="pass" value=""><input type="submit" value="Oka'y"></form>

<br />
<table width="100%">
<td>
<table border="1" width="100%">
<tr bgcolor="#B5E5EF">
<td height="30px"><center>
�������� ������ ������������
</center></td>
</tr>
</table>

<table border="1" width="100%">
<tr>
<?
$sql = $pdo->Query("SELECT * FROM `tb_depo` WHERE `userid` = '$usid' AND `status` = 0 ORDER BY `id`");
while($depos = $sql->Fetch()) {
$summa = (float)$depos['summa'];
$datet = $depos['time'];
$idep = (int)$depos['id'];
?>

<td><center>#ID - <?=$idep; ?></center></td>
<td><center><?=$summa; ?> ���</center></td>
<td><center><? echo date("d.m.Y � H:i", $datet); ?></center></td>
</tr>
<? } ?>
</table>
</td>


<td>
<table border="1" width="100%">
<tr bgcolor="#B5E5EF">
<td height="30px"><center>
������� ������ �������
</center></td>
</tr>
</table>

<table border="1" width="100%">
<tr>
<?
$sql = $pdo->Query("SELECT * FROM `tb_pays` WHERE `userid` = '$usid' AND `status` = '1' ORDER BY `id`");
while($depos = $sql->Fetch()) {
$summa = (float)$depos['summa'];
$date = $depos['time'];
$idpay = (int)$depos['id'];
?>

<td><center>#ID - <?=$idpay; ?></center></td>
<td><center><?=$summa; ?> ���</center></td>
<td><center><? echo date("d.m.Y � H:i", $date); ?></center></td>
</tr>
<? } ?>
</table>
</td>

<td>
<table border="1" width="100%">
<tr bgcolor="#B5E5EF">
<td height="30px"><center>
������� ���������� �����
</center></td>
</tr>
</table>

<table border="1" width="100%">
<tr>
<?
$sql = $pdo->Query("SELECT * FROM `tb_inserts` WHERE `userid` = '$usid' AND `status` = '1' ORDER BY `id`");
while($depos = $sql->Fetch()) {
$summa = (float)$depos['summa'];
$datep = $depos['time'];
$idins = (int)$depos['id'];
?>

<td><center>#ID - <?=$idins; ?></center></td>
<td><center><?=$summa; ?> ���</center></td>
<td><center><? echo date("d.m.Y � H:i", $datep); ?></center></td>
</tr>
<? } ?>
</table>
</td>


</table>
<?
return;
 }
 
 ?>

<form method="post" action="">
<input type="text" style="width:85%; height: 30px; padding-left:10px;" name="search" placeholder="����� ������������ �� ������, e-mail, qiwi ��� IP ������">
<input type="submit" style="width:13%; height: 35px;" value="�����">
</form>
    			 
<table class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th><center>������������</center></th>
<th><center>���� �����������</center></th>
<th><center>������</center></th>
<th><center>IP �����</center></th>
<th style="width:350px;"><center>��������</center></th>
</tr>
</thead>

<tbody>


		 
<?
$num = 10;
$page = $_GET['page'];
$result00 = $pdo->Query("SELECT * FROM `tb_users`");
$temp = $result00->RowCount();
$posts = $temp;
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;
if($temp == 0) { echo '<tr><td><center><font color="red">������������� ����!</font></center></td></tr>'; exit(); }

if(isset($_POST['search'])) {
$search = $_POST['search'];
$sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `login` = '$search' OR `mail` = '$search' OR `qiwi` = '$search' OR `ip` = '$search'");
$ser = $sql->RowCount();
if($ser == 0) { echo '<tr><td><center><font color="red">����� �� ��� �����������!</font></center></td></tr>';  }
} else {
$sql = $pdo->Query("SELECT * FROM `tb_users` ORDER BY `id` ASC LIMIT $start, $num");
}

while($data = $sql->Fetch()){
$idq = intval($data['id']);
$login = str($data['login']);
$date = date("d.m.Y � H:i", $data['date_reg']);
$money = floatval($data['money']);
$ip = str($data['ip']);
$ban = (int)$data['ban'];
?>



<tr>
<td><center><?=$login; ?></center></td>
<td><center><?=$date; ?></center></td>
<td><center><?=$money; ?> RUB</center></td>
<td><center><?=$ip; ?></center></td>
<td ><center><a href="index.php?a=users&id=<?=$idq; ?>">��������� ����������</a> &nbsp; :: &nbsp;
 <? if($ban == 0) { ?>
<a href="index.php?a=users&ban=<?=$idq; ?>">��������</a>
<? } else { ?> <a href="index.php?a=users&banoff=<?=$idq; ?>"><font color="red">���������</font></a><? } ?>
</center> </td>
</tr>

<? } ?>

</tbody>
</table>

<br /><br /><center>
<?

// ��������� ����� �� ������� �����
if ($page != 1) $pervpage = '<a href=index.php?a='.$_GET[a].'&page=1> ������ </a> | ';
// ��������� ����� �� ������� ������
if ($page != $total) $nextpage = ' | <a href=index.php?a='.$_GET[a].'&page=' .$total. '> ��������� </a>';

// ������� ��� ��������� ������� � ����� �����, ���� ��� ����
if($page - 5 > 0) $page5left = ' <a href=index.php?a=users&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=index.php?a=users&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=index.php?a=users&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=index.php?a=users&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=index.php?a=users&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=index.php?a=users&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=index.php?a=users&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=index.php?a=users&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=index.php?a=users&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=index.php?a=users&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// ����� ���� ���� ������� ������ �����

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
}
?>

</center>