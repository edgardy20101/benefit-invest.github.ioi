<?

//echo '������ ������� �� ������.'; exit();

// �������� ������� ����� ����� � rss-������� � ����� www.cbr.ru
  $content = get_content();
  // ��������� ����������, ��� ������ ���������� ���������
  $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
  preg_match_all($pattern, $content, $out, PREG_SET_ORDER);
  $dollar = "";
  foreach($out as $cur)
  {
    if($cur[2] == 840) $dollar = str_replace(",",".",$cur[4]);
  }

function get_content()
{
    // ��������� ����������� ����
    $date = date("d/m/Y");
    // ��������� ������
    $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date;
    // ��������� HTML-��������
    $fd = @fopen($link, "r");
    $text="";
    if (!$fd) echo "������ �� �� ��������";
    else
    {
      // ������ ����������� ����� � ���������� $text
      while (!feof ($fd)) $text .= fgets($fd, 4096);
      // ������� �������� �������� ����������
      fclose ($fd);
    }
    return $text;
}

$cursdlr = number_format($dollar, 2, '.', '');


if(isset($_POST['summa'])) {
$summ = floatval($_POST['summa']);
$summpay = number_format($summ / $cursdlr, 2, '.', '');
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
$pdo->Query("INSERT INTO `tb_depo` VALUES ('', '$insertId', '$sess', '$login', '$summ', '$summpay', '".time()."', '$last_time', '$percent', '0', '$count', '2')");

echo '<center><table><tr>
				<form action="https://perfectmoney.com/api/step1.asp" method="POST">
				<input type="hidden" name="PAYEE_ACCOUNT" value="'.$cfgPerfect.'">
				<input type="hidden" name="PAYEE_NAME" value="'.$site.'">
				<input type="hidden" name="PAYMENT_ID" value="'.$insertId.'">
				<input type="hidden" name="PAYMENT_AMOUNT" value="'.$summpay.'">
				<input type="hidden" name="PAYMENT_UNITS" value="USD">
				<input type="hidden" name="STATUS_URL" value="https://'.$site.'/pm.php">
				<input type="hidden" name="PAYMENT_URL" value="https://'.$site.'/index.php?a=history">
				<input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
				<input type="hidden" name="NOPAYMENT_URL" value="https://'.$site.'/index.php?a=history">
				<input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
				<input type="hidden" name="SUGGESTED_MEMO" value="">
				���������� ������� ����� PerfectMoney ���������� �������������,<br /> ��� ������ ����� ������ ����� � ��������� �����������.<br />
				�� ���������� <strong>'.$summpay.'</strong> USD �� ���� <strong>'.$cfgPerfect.'</strong> PerfectMoney<br />���������� ������� � ������� '.$site.'<br /><br />
				<input   name="PAYMENT_METHOD" class="button brand-1" style="margin:unset;" type="submit" value=" ����� ����������� " />
				</form>
&#160;
				
				<form method="POST">
				<input type="hidden" name="insertId" value="'.$insertId.'">
				<input  style="margin:unset;" class="button brand-1" name="fail" value="���������� �� �������"/>
				</form>
				
				</tr></table></center>';
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
<b>��� 2 ���������� ����� PerfectMoney</b>
<div style="font-size:14px;">������� � ����� ����� � ���������� ������ �� ������� �� ����������� ��������� �������������� ����. ����� ������������ ���������� ����� PerfectMoney �� ������ 
���� ������ <?=$minins; ?> ������ � �� ����� <?=$maxins; ?> ������.
<br />
<b>���� �����������: 1$ = <?=$cursdlr; ?> ������.</b>
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

