<section class="section primary welcome inactive" id="s-welcome">
    <div class="container">

<?  
$_OPTIMIZATION["title"] = "���������";
if(!isset($sess)) {
echo "��� ��������� ������ �������� ���������� ��������������!";
return; }
?>
<center>
<style>
hr {
    border: 0;
    height: 0;
    border-top: 1px solid #dadada;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}
</style>

<? if(empty($userdata['qiwi']) AND empty($userdata['payeer']) AND empty($userdata['pm'])) { ?>

<b>��������� Qiwi ��������</b>
<div style="font-size:14px;">������� � ����� ���� qiwi �������.
<br />
<b>����� ��������� ����� ���������� ��������! ������������ ��� ������.</b>
</div>
<br />



<?
if(isset($_POST['qiwi'])) {
	$qiwi = clean($_POST['qiwi']); 
	
	$str = substr($qiwi, 0, 1);
	if($str != '+')  {
		 
			 $pdo->Query("UPDATE `tb_users` SET `qiwi` = '$qiwi' WHERE id = ".$userdata['id'].""); 
			 $URL="/index.php?a=profile";
		header("Refresh: 0; URL = $URL");
	} else { echo '������� + � ���������� �������� �����!'; 
	 $URL="/index.php?a=profile";
	 header("Refresh: 2; URL = $URL");
return; }
}
?>

<form method="POST">

<input type="text" name="qiwi" style="border: 1px solid #DDD; width:40%; height:22px; border-radius:2px; text-align:center;" placeholder="����� Qiwi ��� '+' (7xxxxxxxxxx)">


<br />
<hr />
<br />




<b>��������� Payeer ��������</b>
<div style="font-size:14px;">������� � ����� ���� payeer �������.
<br />
<b>����� ��������� ����� ���������� ��������! ������������ ��� ������.</b>
</div>
<br />


<?
if(isset($_POST['payeer'])) {
	$payeer = clean($_POST['payeer']); 
	
			 $pdo->Query("UPDATE `tb_users` SET `payeer` = '$payeer' WHERE id = ".$userdata['id'].""); 
			 $URL="/index.php?a=profile";
			 header("Refresh: 1; URL = $URL");
	  
}
?>


<input type="text" name="payeer" style="border: 1px solid #DDD; width:40%; height:22px; border-radius:2px; text-align:center;" placeholder="������� Payeer Wallet (PXXXXXXX)">


<br />
<hr />
<br />




<b>��������� PerfectMoney ��������</b>
<div style="font-size:14px;">������� � ����� ���� PerfectMoney �������.
<br />
<b>����� ��������� ����� ���������� ��������! ������������ ��� ������.</b>
</div>
<br />


<?
if(isset($_POST['pm'])) {
	$pm = clean($_POST['pm']); 

			 $pdo->Query("UPDATE `tb_users` SET `pm` = '$pm' WHERE id = ".$userdata['id'].""); 
			 $URL="/index.php?a=profile";
			 header("Refresh: 1; URL = $URL");

}
?>


<input type="text" name="pm" style="border: 1px solid #DDD; width:40%; height:22px; border-radius:2px; text-align:center;" placeholder="������� PerfectMoney (UXXXXXX)"><br /><br />
<input class="buttop" style="margin:unset;" type="submit" value="C��������">
</form>

<? } else {  ?>

��� Qiwi Wallet: &nbsp;
<input class="button brand-1" style="margin:unset;" type="submit" value="<? if($userdata['qiwi'] == 0) echo '�� ������'; else echo '+'.$userdata['qiwi']; ?>"><br />
<br />
<hr />
<br />

��� Payeer Wallet: &nbsp;
<input class="button brand-1" style="margin:unset;" type="submit" value="<? if(empty($userdata['payeer'])) echo '�� ������'; else echo $userdata['payeer']; ?>"><br />
<br />
<hr />
<br />

��� PerfectMoney: &nbsp;
<input class="button brand-1" style="margin:unset;" type="submit" value="<? if(empty($userdata['pm'])) echo '�� ������'; else echo $userdata['pm']; ?>"><br />

<? } ?>


<div style="clear:both;"></div><br />


</center>



<script type="text/javascript">
function repass()
{	

//�������� ���������
var old = $("#old").val();
var newq = $("#newq").val();
var news = $("#news").val();

// �������� �������
$.ajax({
type: "POST",
url: "../ajax/setting.php",
data:"old="+old+"&newq="+newq+"&news="+news,
beforeSend: function(){
$("#dele"); },
success: function(rezult) {

$("#dele").empty();
$('#dele').fadeIn(2000).html(rezult);
btn.disabled = false;


}
   });
}	
</script>

<hr class="stripes" />

<div class="row feature-blocks inactive">
            <div class="span-4 feature-block-wrapper">
                <div class="feature-block">
                    <i class="livicon" data-n="money" data-c="#C1C1C1" data-op="1" data-s="68" data-hc="false"></i>
                    <h4>������</h4>
                    <p><?=$userdata['money']; ?> ���.</p>
                </div>
            </div>
            <div class="span-4 feature-block-wrapper">
                <div class="feature-block">
                    <i class="livicon" data-n="money" data-c="#C1C1C1" data-op="1" data-s="68" data-hc="false"></i>
                    <h4>���������</h4>
                    <p><?=$userdata['payouds']; ?> ���.</p>
                </div>
            </div>
            <div class="span-4 feature-block-wrapper">
                <div class="feature-block">
                    <i class="livicon" data-n="money" data-c="#C1C1C1" data-op="1" data-s="68" data-hc="false"></i>
                    <h4>�������������</h4>
                    <p><?=$userdata['inserts']; ?> ���.</p>
                </div>
            </div>
        </div>

<BR /><BR /><BR /><BR /><BR />
		
    </div>
</section>