
<?

//echo '������ ������� �� ������.'; exit();

if(isset($_POST['summa'])) {
$summ = floatval($_POST['summa']);
$last_time = time() + 86400;

if($summ <= 2000) 
{
$count = 3;
$percent = 40;
}
else if($summ >= 6000)
{
$count = 5;
$percent = 30;   
}

$login = $userdata['login'];

if($summ >= $minins AND $summ <= $maxins) {
    
$pdo->Query("INSERT INTO `tb_inserts` VALUES ('', '$sess', '$login', '$summ', '".time()."', '', '0')");
$insertId = $pdo->LastInsertId();
$pdo->Query("INSERT INTO `tb_depo` VALUES ('', '$insertId', '$sess', '$login', '$summ', '0', '".time()."', '$last_time', '$percent', '0', '$count', '2')");

$_SESSION['pay'] = $insertId;
$_SESSION['transsumm'] = $summ;

} else echo '<center><font color="red">����� ����� �������� �������� (���� ��� ���� ���������� �����).</font><br><br></center>'; 

}

if(isset($_POST['fail'])) {
    $id = (int)$_SESSION['transid'];
    $pdo->Query("UPDATE `tb_inserts` SET `status` = '2' WHERE `id` = '$id'");
    $pdo->Query("UPDATE `tb_depo` SET `status` = '3' WHERE `insid` = '$id'");
    unset($_SESSION['transaction']);
    unset($_SESSION['transid']);
    header("Location: /index.php?a=deposit");
}

?>


<? if(isset($_SESSION['pay'])) { ?>

<center>
<b>����������: � <?=$_SESSION['pay']; ?></b>&nbsp; <a href="https://qiwi.com/transfer/form.action?extra[%27account%27]=<?=$qiwiacc; ?>&amountInteger=<?=$_SESSION['transsumm']; ?>&amountFraction=00&extra[%27comment%27]=<?=$userdata['login'];?>" target="_blank">������� � ������</a>

<div style="font-size:14px;">���������� <b><?=$_SESSION['transsumm']; ?></b> ���. �� QIWI ������� <b>+<?=$qiwiacc; ?></b> <br /> ������ � ����������� � ������� ���� ����� <b><?=$userdata['login'];?></b><br />
����� ���������� �������, ������� ����� ���������� (����� �������) � ���� <br />� ������� �� ������ ��������� ������.<br />
<b>������ ����� ��������� �������������.</b> </div>
<? } else { ?>

<center>
<b>��� 2 ���������� ����� Qiwi Wallet</b>
<div style="font-size:14px;">������� � ����� ����� � ���������� ������ �� ������� �� ����������� ��������� �������������� ����. ����� ������������ ���������� ����� QIWI �� ������ ���� ������ <?=$minins; ?> ������ � �� ����� <?=$maxins; ?> ������.</div>
</center>
<? } ?>


<? 
if(isset($_SESSION['pay'])) { ?>


</br>
<table>
<tr>
<form method="POST" action="">
<input type="text" id="codeqiwi" value="" style="border: 1px solid #DDD; width:220px; height:25px; border-radius:2px; text-align:center;" placeholder="����� ������� (����������)">
</br>
</br>
<input class="button brand-1" style="margin:unset;" type="button" onclick="qiwi();" id="submit" value="��������� ������">
</form>

&#160;

<form method="POST">
<input class="button brand-1" type="submit" name="fail" value="�������� ������">
</form> 
</tr>
</table>



<br />


<div id="dele" class=""></div>
<div id="status" class=""></div>

<script type="text/javascript">
function qiwi()
{	

document.getElementById('submit').disabled=true;

var codeqiwi = $("#codeqiwi").val();

$("#status").html("������ �����������, ��������� ����������!");

$.ajax({
type: "POST",
url: "../ajax/qiwia.php",
data:"codeqiwi="+codeqiwi,
beforeSend: function(){
$("#dele"); },
success: function(rezult) {

$("#dele").empty();
$('#dele').fadeIn(2000).html(rezult);

document.getElementById('submit').disabled=false;

$("#status").html("");

}
   });
}	
</script>

<?

return; } 

?>
<center>
<br />
<form method="POST">
<input type="text" name="summa" style="border: 1px solid #DDD; width:30%; height:22px; border-radius:2px; text-align:center;" placeholder="������� �����">
</br>
<input class="buttop" style="margin:unset;" type="submit" value="�����������">
</form>
</center>
</br>
</br>