<?
if(isset($_POST['summa'])) {
$summ = floatval($_POST['summa']);
$last_time = time() + 86400;

if($summ <= 4999) 
{
$count = 5;
$percent = 30;
}
else if($summ >= 5000)
{
$count = 10;
$percent = 20;   
}


$login = $userdata['login'];

if($summ >= $minins AND $summ <= $maxins) {
if($userdata['money'] - $summ >= 0) {
    
$pdo->Query("INSERT INTO `tb_inserts` VALUES ('', '$sess', '$login', '$summ', '".time()."', '', '1')");
$insertId = $pdo->LastInsertId();
$pdo->Query("INSERT INTO `tb_depo` VALUES ('', '$insertId', '$sess', '$login', '$summ', '0', '".time()."', '$last_time', '$percent', '0', '$count', '0')");
$pdo->Query("UPDATE `tb_users` SET `money` = `money` - '$summ' WHERE `id` = '$sess'");

$pdo->Query("UPDATE `tb_stats` SET `invest` = `invest` + '$summ' WHERE `id` = '1'");
$pdo->Query("UPDATE `tb_users` SET `inserts` = `inserts` + '$summ' WHERE `id` = '$sess'");

$ref = intval($userdata['refid']);
$refsum = floatval($summ / 100 * $refperc); 
$pdo->Query("UPDATE `tb_users` SET `money` = `money` + '$refsum' WHERE `id` = '$ref'");

echo '<center><font color="green">�������� ������� ���������������.</font><br><br></center>';

} else echo '<center><font color="red">� ��� ������������ �������.</font><br><br></center>'; 
} else echo '<center><font color="red">����� ����� �������� �������� (���� ��� ���� ���������� �����).</font><br><br></center>'; 

}

if(isset($_POST['fail'])) {
    $id = (int)$_POST['insertId'];
    $pdo->Query("UPDATE `tb_inserts` SET `status` = '2' WHERE `id` = '$id'");
    $pdo->Query("UPDATE `tb_depo` SET `status` = '3' WHERE `insid` = '$id'");
    header("Location: /index.php?a=history");
}

?>


<center>

<b>�������������� ������� � �������</b>
<div style="font-size:14px;">������� � ����� ����� � ���������� ������ �� ������� �� ����������� ��������������� ��������. ����� �� ������ 
���� ������ <?=$minins; ?> ������ � �� ����� <?=$maxins; ?> ������. � �� ������ ��������� ��� ������.
<br />
<b>��������� ������ ��� ���������: <?=$userdata['money']; ?> RUB.</b>
</div>
<br />
<form method="POST">
<input type="text" name="summa" style="border: 1px solid #DDD; width:30%; height:22px; border-radius:2px; text-align:center;" placeholder="������� �����">
</br>
<input class="buttop" style="margin:unset;" type="submit" value="�����������">
</form>

</center>

</br>
</br>
