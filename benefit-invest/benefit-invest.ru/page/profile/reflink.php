<?  
$_OPTIMIZATION["title"] = "����������� ���������";
if(!isset($sess)) {
echo "��� ��������� ������ �������� ���������� ��������������!";
return; }

?>




        <!-- Breadcrumb -->

        <nav class="breadcrumb">
    <div class="container">

    </div>
</nav>
        <!-- Main Content -->
        
<section class="section primary welcome inactive" id="s-welcome">
    <div class="container">


<BR />
<div class="row">
<div class="span-6">
<table class="table table-bordered">
<thead>
  <tr>
<th><i class="fa fa-user"></i> ��� �������</th>
<th><i class="fa fa-credit-card"></i> ���������� ���������</th> </tr>
  </thead>
  <tbody>
    <tr>
<td><b><? if(!empty($userdata['refname'])) echo "��������: <b>".$userdata['refname']."</b>"; else echo '� ��� ��� �������'; ?></b></td>		
<td><b> <?=$userdata['numrefs']?> ���.</b></td>
    </tr>
   </tbody>
   </table>
 
<BR />
 
<div class="price-chart">
<div class="buy-now">
���� ����������� ������:<b> http://<?=$site; ?>/?ref=<?=$userdata['login']?></b></div>
</div>

<BR />

<div class="alert alert-help" role="alert"
<b>��������� ������ 468x60px</b><br />
<img src="/img/banners/468.gif" width="468" />
<textarea style="width:468px; height: 45px;">
<a href="http://<?=$site; ?>/?ref=<?=$userdata['login']?>" alt="������� �� ����"><img src="https://<?=$site; ?>/img/banners/468.gif"></a>
</textarea>
</div>

</div>

<div class="span-6">
<div class="alert alert-info" role="alert">
<p>

<b>��� ������� ������� �� ���������� ���������?</b>
����������� �������. ���� ������� �������� ����������� ������� �� ������� � ����������� ���������. ���� ��� ��������, ������ ����, �������� �������. ����� �������� ������������ � ���������� ���������� �� ������ �� ������� �������� � ����� ����������� ���������
<BR /><BR />
<b>���� �� � ������������ ������ �� ���������� ���������, �� �������� �������?</b>
��, ������. ������ Benefit-Invest.ru ������������� � ����������� ����������. �� ������ �������� ��������� ������� ��� ����������� �� ����, ���� �� � ��� �������.
<BR /><BR />
<b>��� � ���� ������������� ��������� ����������, ����������� �� ����������� ���������?</b>
���������� �������� �� ����������� ��������� ��������� ��������� � ���� ������������. ������ ������������� ��� �������.
<BR /><BR />
<b>��� ����� ����� ���� ����������?</b>
����� �������� ����� ����� ����� ���������������� �������. ������ �� ������������ ��� � ����������� ����������.
<BR /><BR />
<b>��� ��������� ���� ����������� ���������?</b>
������ ������������ ���� �������� ����� ��������� ��� 10% �� ����� �������.
</p>
</div>
</div>
</div>




<BR />





<table class="table table-bordered">
<thead>
  <tr>
<th>�����</th>
<th>EMail</th>
<th>���� �����������</th>
<th>������������</th>
 </tr>
  </thead>



  <tbody>
    <tr>




<?
$sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `refid` = '$sess'");
while($ins = $sql->Fetch()) {
$id = str($ins['login']);
$datereg = intval($ins['date_reg']);
$email = str($ins['mail']);
$inv = floatval($ins['inserts']);


?>	
	
<td><i class="fa fa-user"></i> <?=$id; ?></td>
<td><?=$email?></td>	
<td><?=date("d.m.Y", $datereg);?></td>
<td><?=$inv;?> <i class="fa fa-rub"></i></td>	


</tr>
<?php } ?>


 


 
</tbody>
</table>



<BR /><BR /><BR /><BR /><BR />



    </div>
</section>


