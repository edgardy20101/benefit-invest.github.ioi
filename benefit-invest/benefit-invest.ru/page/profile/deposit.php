


<?  
$_OPTIMIZATION["title"] = "����������� -> �������� ������";
if(!isset($sess)) {
echo "��� ��������� ������ �������� ���������� ��������������!";
return; }
?>

<? 
if(isset($_GET['paysys'])) { 
    
    if(clean($_GET['paysys']) == 'qiwi') {
        include 'qiwi.php'; return;
    }

     if(clean($_GET['paysys']) == 'payeer') {
        include 'payeer.php'; return;
    }

     if(clean($_GET['paysys']) == 'perfect') {
        include 'perfect.php'; return;
    }

      if(clean($_GET['paysys']) == 'reinvest') {
        include 'reinvest.php'; return;
    }
} 
?>


<center></br><b>�������� ��������� ������� ��� ����������</b> <br /></center>


<center><div style="font-size:14px;">�� ������ ��������� �������������� ���� � �������� ������� ����� �� ����� ���������� �� ���������� ������ � ����� ��� ����������� ��������� ������. ���������� ������� ���������� � �������������� ������ � ������ � ��� 2-5 ����� �������.</div></center>

<br />
<table style="width:100%;">
<tr>
<td width="110px" align="center"><center><a href="/index.php?a=deposit&paysys=perfect"><img style="margin-top:-6px;" src="/img/ico/pmh.png" ></a></center></td>
<td width="110px" align="center"><center><a href="/index.php?a=deposit&paysys=qiwi"><img style="margin-top:-6px;" src="/img/ico/qwh.png" ></a></center></td>
<td width="110px" align="center"><center><a href="/index.php?a=deposit&paysys=payeer"><img style="margin-top:-6px;" src="/img/ico/perh.png" ></a></center></td>
<td width="110px" align="center"><center><a href="/index.php?a=deposit&paysys=reinvest"><img style="margin-top:-6px;" src="/img/reinv.png" ></a></center></td>
</tr>
</table>