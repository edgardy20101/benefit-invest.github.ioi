<?  
$_OPTIMIZATION["title"] = "Аккаунт";

if(!isset($sess)) {
echo "Для просмотра данной страницы необходимо авторизоваться!";
return; }

$sql = $pdo->Query("SELECT * FROM `tb_depo` WHERE `userid` = '$sess'");
$row = $sql->RowCount();

if($row == 0) { echo '<font color="red">Вы еще не открывали депозитов.</font>'; return; }

?>

<script type="text/javascript"src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript"src="/js/scripts.js"></script>





<?

$sql = $pdo->Query("SELECT * FROM `tb_depo` WHERE `userid` = '$sess' ORDER BY `id` DESC");
while($depos = $sql->Fetch()) {
$timse = intval($depos['time']);
$last_time = intval($depos['last_time']);
$summa = floatval($depos['summa']);
$status = intval($depos['status']);
$polychy = (($summa / 100) * $depos['percent'] * $depos['count_full']) - $summa;
?>









        <!-- Main Content -->
        
<section class="section primary welcome inactive" id="s-welcome">
    <div class="container">



<BR />	
<table class="table table-striped">
<thead>
  <tr>
<th>До завершения</th>
<th>Сумма депозита</th>
<th>Прибыль от вклада</th>
<th>Количество начислений</th>
<th>Статус</th>
 </tr>
  </thead>
  <tbody>
    <tr>	
<tr>
<td>	<? if($status == 0){
            
            print "<span id=\"deptimer".$depos['id']."\"></span>";

print "<script language=\"JavaScript\">
		<!--
			CalcTimePercent(".$depos['id'].", ".$timse.", ".$last_time.", ".time().");
		//-->
		</script>";
} else echo '00:00:00';

?></td>
<td><?=$summa; ?></td>
<td><?=$polychy; ?></td>
<td><?=$depos['count']; ?> / <?=$depos['count_full']; ?></td>

<td><?
if($status == 0){ echo '<font color="green">Депозит в работе</font>'; }
if($status == 1){ echo '<font color="blue">Депозит разморожен</font>'; }
if($status == 2){ echo '<font color="orange">Депозит ожидает</font>'; }
if($status == 3){ echo '<font color="red">Депозит отклонен</font>'; }
?></td>

<? } ?>

</tr>
</table>

<BR /><BR /><BR /><BR /><BR />
		
    </div>
</section>