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

$m_desc = base64_encode('Deposit FOR: ' .$login);
				$m_shop = $payeerid;
				$m_key = $payeerkey;
				$m_orderid = $insertId;
				$m_amount = number_format($summ, 2, '.', '');
				$m_curr = 'RUB';

				$arHash = array(
					$m_shop,
					$m_orderid,
					$m_amount,
					$m_curr,
					$m_desc,
					$m_key
				);
				$sign = strtoupper(hash('sha256', implode(":", $arHash)));

				print '
				<center><table><tr>
				<form method="GET" action="//payeer.com/merchant/" accept-charset="utf-8">
				<input type="hidden" name="m_shop" value="'.$m_shop.'">
				<input type="hidden" name="m_orderid" value="'.$m_orderid.'">
				<input type="hidden" name="m_amount" value="'.$m_amount.'">
				<input type="hidden" name="m_curr" value="'.$m_curr.'">
				<input type="hidden" name="m_desc" value="'.$m_desc.'">
				<input type="hidden" name="m_sign" value="'.$sign.'">
				���������� ������� ����� Payeer ���������� �������������,<br /> ��� ������ ����� ������ ����� � ��������� �����������.<br /><br />
				<input type="submit" class="button brand-1" style="margin:unset;" name="m_process"  value="������ �����������" />
				</form>
				&#160;
				<form method="POST">
				<input type="hidden" name="insertId" value="'.$insertId.'">
				<input class="button brand-1" style="margin:unset;" type="submit" name="fail" value="���������� �� �������"/>
				</form>
				</tr></table></center>
				';
				return;

} else echo '<font color="red">����� ����� �������� �������� (���� ��� ���� ���������� �����).</font><br><br>'; 

}

if(isset($_POST['fail'])) {
    $id = (int)$_POST['insertId'];
    $pdo->Query("UPDATE `tb_inserts` SET `status` = '2' WHERE `id` = '$id'");
    $pdo->Query("UPDATE `tb_depo` SET `status` = '3' WHERE `insid` = '$id'");
    header("Location: /index.php?a=history");
}

?>



<center>
<b>��� 2 ���������� ����� Payeer Wallet</b>
<div style="font-size:11px;">������� � ����� ����� � ���������� ������ �� ������� �� ����������� ��������� �������������� ����. ����� ������������ ���������� ����� Payeer �� ������ 
���� ������ <?=$minins; ?> ������ � �� ����� <?=$maxins; ?> ������.
<br />
<b>����� ������ ����� ������������� ������������.</b>
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
