</div>
</div>

<div class="sweet">
<div class="right_cont">
<div class="block_cont">

<div style="background:#F1F5F5; padding:10px 0px 10px 0px; width:100%;"><center style="font-size:15px;">Привет, <b><?=$userdata['login']; ?></b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="asd_but_ner" href="/index.php?a=exit" style="display:inline-block;">Выход</a>
</center></div>

<br />


<table width="100%">
<tr>
<td><img src="/img/ref.png" width="55px"/></td>
<td><div style="text-align:right;font-weight:bold;">Реферальная ссылка</div>
<div style="text-align:right;font:12px obtext;">Приглашайте друзей и получайте<br /> прибыль от их вкладов</div></td>
</tr>
</table>
<br />


<form name="myform">
<input style="border: 1px solid #DDD; width:100%; height:35px; border-radius:2px; text-align:center;" type="text" onClick="document.myform.text_0.select()" name="text_0" value=" https://<?=$_SERVER['HTTP_HOST']; ?>/?ref=<?=$userdata['login']; ?>">
</form>

<br />

<div style="
  background: #1E84A4;
  width: 250px;
  height: 150px;
  float: right;
  border-radius: 10px;
  border: 1px solid#fff;
    margin: 0px 0px 50px 0px;
  box-shadow: 0 1px 0 10px rgba(0,0,0,.01),0 1px 1px 1px rgba(0,0,0,.1);
">
			     <div style="color: #EEE8DA;text-transform:uppercase;margin:10px 0 0 20px;">Общая статистика</div>
				 <div style="  font-size:12px;color: #EEE8DA;margin:12px 0 10px 20px;">
			
				Инвестировано: <b><?=number_format($stats['invest'] + $stats['finvest'], 0, ',', ' ');?> руб.</b><br />
				Выплачено: <b><?=number_format($stats['pay'] + $stats['fpay'], 0, ',', ' ');?> руб.</b><br />
				Новый юзер: <b><?=$lst_user['login'];?></b><br />
				Новый вклад: <b><?=$lst_depo['summa']; ?> Р (<?=$lst_depo['login']; ?>)</b><br />
				Новая выплата: <b><?=$lst_pay['summa']; ?> Р (<?=$lst_pay['login']; ?>)</b>
				 
				 </div>
			
					 
				 				
			 </div>
			

</div>


</div>


</div>
<div style="clear:both;"></div>
<br /><br /><br />
</div>

