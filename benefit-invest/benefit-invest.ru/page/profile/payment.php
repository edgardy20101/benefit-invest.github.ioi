<?  
$_OPTIMIZATION["title"] = "Бухгалтерия -> Заказ выплат";
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

	

<center>
<div class="alert alert-info" role="alert">
<p>Выплаты производятся в полуавтоматическом режиме, в порядке очереди.<br /> В среднем выплата занимает от 1 минуты до 24 часов.<br />
Минимум для выплаты: <?=$minpay; ?> RUB. Максимальная сумма: <?=$maxpay; ?> RUB.<br /><br />
<b>Доступный баланс для вывода: <?=$userdata['money']; ?> RUB.</b>
<br /><br /></p> 
</div>
</center>

<BR />



<BR />

<div class="row">
<div class="span-6">
<div class="price-chart">
<div class="buy-now">
<form method="POST" action="">

<BR />

<div class="form-element">




<select id="ps" style="border: 1px solid #DDD; width:40%; height:25px; border-radius:2px; text-align:center; margin-bottom:3px;">
<? if($userdata['qiwi'] != 0 OR !empty($userdata['qiwi'])) { ?><option value="1">Qiwi Wallet</option><? } ?>
<? if(!empty($userdata['payeer'])) { ?><option value="2">Payeer Wallet</option><? } ?>
<? if(!empty($userdata['pm'])) { ?><option value="3">PerfectMoney</option><? } ?>
</select>
<br />
<input name="sum" id="sum" size="10" style="border: 1px solid #DDD; width:100%; height:40px; border-radius:2px; text-align:center; margin-bottom:3px;" type="text" placeholder="Введите сумму выплаты">
<br />
<input class="buttop"  style=" margin:unset; width: 100%; " type="button" onclick="payment();" id="btn" value="Подтвердить">

</form>





</div>
</div>
</div>
</div>

<div class="span-6">
<div class="alert alert-help" role="alert"
<p> Введите сумму в рублях, которую Вы хотите вывести из проекта и после проверки сумма вывода будет снята с баланса и переведена на Ваш кошелек.</p> 
<hr>

<p>В случае, если указанный вами счет недоступен и выплата не произведена, деньги возвращаются на Ваш баланс.</p>
</div>
</div>

<BR />



<?

$sql = $pdo->Query("SELECT * FROM `tb_pays` WHERE `userid` = '$sess' ORDER BY `id` DESC");
while($pays = $sql->Fetch()) {
$timse = date("d.m.Y", $pays['time']);
$purse = str($pays['purse']);
$summa = floatval($pays['summa']);
$status = intval($pays['status']);
$srt = substr($purse, 0, 1);
if ($srt == 'U' OR $srt == 'E' OR $srt == 'G' OR $srt == 'B') { $method = 'PerfectMoney'; } elseif ($srt == 'P') { $method = 'Payeer Wallet'; } else { $method = 'Qiwi Wallet'; }
?>


<table class="table table-striped">
<thead>
  <tr>
<th>Способ вывода</th>
<th>Сумма выплаты</th>
<th>Комиссия</th>
<th>Статус</th>
 </tr>
  </thead>
  <tbody>
    <tr>	
<tr>
<td><?=$method; ?></td>
<td><?=$summa; ?></td>
<td>нет (0</b>%)</td>


<td><? 
if($status == 0){ echo '<font color="orange">Обработка</font>'; }
if($status == 1){ echo '<font color="#fff">Выплачено</font>'; }
if($status == 2){ echo '<font color="#fff">Отклонен</font>'; }
?></td>

<? } ?>

</tr>
</table>

<BR /><BR /><BR /><BR /><BR />
		
    </div>
</section>








<script type="text/javascript">
function payment()
{	

//Получаем параметры
var sum = $("#sum").val();
var ps = $("#ps").val();

// Отсылаем паметры
$.ajax({
type: "POST",
url: "../ajax/pay.php",
data:"sum="+sum+"&ps="+ps,
beforeSend: function(){
$("#dele"); },
success: function(rezult) {

$("#dele").empty();
$('#dele').fadeIn(4000).html(rezult);
btn.disabled = false;


}
   });
}	
</script>

</br>
</br>