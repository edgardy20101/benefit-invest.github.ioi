<?  
$_OPTIMIZATION["title"] = "Реферальная программа";
if(!isset($sess)) {
echo "Для просмотра данной страницы необходимо авторизоваться!";
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
<th><i class="fa fa-user"></i> Ваш спонсор</th>
<th><i class="fa fa-credit-card"></i> Количество рефералов</th> </tr>
  </thead>
  <tbody>
    <tr>
<td><b><? if(!empty($userdata['refname'])) echo "Инвестор: <b>".$userdata['refname']."</b>"; else echo 'У вас нет аплайна'; ?></b></td>		
<td><b> <?=$userdata['numrefs']?> чел.</b></td>
    </tr>
   </tbody>
   </table>
 
<BR />
 
<div class="price-chart">
<div class="buy-now">
Ваша реферальная ссылка:<b> http://<?=$site; ?>/?ref=<?=$userdata['login']?></b></div>
</div>

<BR />

<div class="alert alert-help" role="alert"
<b>Рекламный баннер 468x60px</b><br />
<img src="/img/banners/468.gif" width="468" />
<textarea style="width:468px; height: 45px;">
<a href="http://<?=$site; ?>/?ref=<?=$userdata['login']?>" alt="Перейти на сайт"><img src="https://<?=$site; ?>/img/banners/468.gif"></a>
</textarea>
</div>

</div>

<div class="span-6">
<div class="alert alert-info" role="alert">
<p>

<b>Вам выгодно платить по партнёрской программе?</b>
Естественно выгодно. Наши клиенты получают определённый процент за участие в реферальной программе. Ведь это является, своего рода, рекламой проекта. Более подробно ознакомиться с партнёрской программой вы можете на главной странице в блоке «Партнёрская программа»
<BR /><BR />
<b>Могу ли я зарабатывать только на партнёрской программе, не открывая депозит?</b>
Да, можете. Проект Benefit-Invest.ru заинтересован в привлечении инвестиций. Вы будете получать обещанную прибыль вне зависимости от того, есть ли у вас депозит.
<BR /><BR />
<b>Как я могу распоряжаться денежными средствами, полученными по реферальной программе?</b>
Полученные средства по реферальной программе полностью переходят в ваше распоряжение. Можете инвестировать или вывести.
<BR /><BR />
<b>Кто может стать моим рефераллом?</b>
Вашим партнёром может стать любой заинтересованный человек. Проект не ограничивает вас в привлечении инвестиций.
<BR /><BR />
<b>Как действует ваша реферальная программа?</b>
Каждый привлечённый вами инвестор будет приносить вам 10% от своей прибыли.
</p>
</div>
</div>
</div>




<BR />





<table class="table table-bordered">
<thead>
  <tr>
<th>Логин</th>
<th>EMail</th>
<th>Дата регистрации</th>
<th>Инвестировал</th>
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


