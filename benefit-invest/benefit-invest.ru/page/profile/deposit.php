


<?  
$_OPTIMIZATION["title"] = "Бухгалтерия -> Открытие вклада";
if(!isset($sess)) {
echo "Для просмотра данной страницы необходимо авторизоваться!";
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


<center></br><b>Выберите платежную систему для пополнения</b> <br /></center>


<center><div style="font-size:14px;">Вы можете пополнить Инвестиционный Счет с большого перечня одних из самых популярных на территории России и стран СНГ электронных платежных систем. Пополнения баланса происходит в автоматическом режиме и займет у Вас 2-5 минут времени.</div></center>

<br />
<table style="width:100%;">
<tr>
<td width="110px" align="center"><center><a href="/index.php?a=deposit&paysys=perfect"><img style="margin-top:-6px;" src="/img/ico/pmh.png" ></a></center></td>
<td width="110px" align="center"><center><a href="/index.php?a=deposit&paysys=qiwi"><img style="margin-top:-6px;" src="/img/ico/qwh.png" ></a></center></td>
<td width="110px" align="center"><center><a href="/index.php?a=deposit&paysys=payeer"><img style="margin-top:-6px;" src="/img/ico/perh.png" ></a></center></td>
<td width="110px" align="center"><center><a href="/index.php?a=deposit&paysys=reinvest"><img style="margin-top:-6px;" src="/img/reinv.png" ></a></center></td>
</tr>
</table>