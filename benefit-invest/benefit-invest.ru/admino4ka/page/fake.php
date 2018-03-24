 <?  
 
     
   if(isset($_POST['deposum'])) {
   $deposum = $_POST['deposum']; 
   $depolog = $_POST['depolog']; 
   $last_time = time() + 8000000;
   $pdo->Query("INSERT INTO `tb_depo` (login, time, last_time, summa, status) 
        VALUES ('$depolog', '".time()."', '".$last_time."', '$deposum',  '0') ");
	$pdo->Query("UPDATE `tb_stats` SET `invest` = `invest` + '$deposum' WHERE `id` = '1'"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, фейковый депозит создан!</h4>";
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   }
   
   
if(isset($_POST['perc'])) {
   $perc = $_POST['perc']; 
   $time = time();
   
   $pdo->Query("INSERT INTO `tb_cash` (perc, time) VALUES ('$perc', '$time') ");

   echo "<h4 class='alert_info'>Уважаемый админинстратор, отчет о доходе за сегодня успешно добавлен в БД!</h4>";
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   }
   
   
   
      
   if(isset($_POST['paylog'])) {
   $paysum = $_POST['paysum']; 
   $paylog = $_POST['paylog']; 

   $pdo->Query("INSERT INTO `tb_pays` (login, summa, time, status) 
VALUES ('$paylog', '$paysum', '".time()."', '1') ");

	$pdo->Query("UPDATE `tb_stats` SET `pay` = `pay` + '$paysum' WHERE `id` = '1'"); 
	
   echo "<h4 class='alert_info'>Уважаемый админинстратор, фейковый трансфер создан!</h4>";
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   }
   
   
   
    if(isset($_POST['regref'])) {
   $regref = (int)$_POST['regref']; 
   $reglog = $_POST['reglog']; 

    $sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `login` = '$reglog'");
if($sql->RowCount() >= 1) { 
   $pdo->Query("UPDATE `tb_users` SET `numrefs` = `numrefs` +  ' $regref'  WHERE `login` = '$reglog'");
 } else { 
   $pdo->Query("INSERT INTO `tb_users` (login, pass, numrefs) VALUES ('$reglog', '".rand(10000000,90000000)."', '$regref')");
}

	$pdo->Query("UPDATE `tb_stats` SET `users` = `users` + '1' WHERE `id` = '1'"); // ДОбавляем в статистику
	
   echo "<h4 class='alert_info'>Уважаемый админинстратор, фейковый рефовод создан!</h4>";
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   }
   

 
if(isset($_POST['users'])) {
   $users = intval($_POST['users']); 
   
   if($_POST['ps'] == 1) {
   $pdo->Query("UPDATE `tb_stats` SET `fusers` = `fusers` + '$users' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, добавлено $users пользователей!</h4>";
   }

      if($_POST['ps'] == 2) {
   $pdo->Query("UPDATE `tb_stats` SET `fusers` = `fusers` - '$users' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, вычтено $users пользователей!</h4>";
   }
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   
   }


if(isset($_POST['online'])) {
   $users = intval($_POST['online']); 
   
   if($_POST['ps'] == 1) {
   $pdo->Query("UPDATE `tb_stats` SET `online` = `online` + '$users' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, добавлено $users посетителей!</h4>";
   }

      if($_POST['ps'] == 2) {
   $pdo->Query("UPDATE `tb_stats` SET `online` = `online` - '$users' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, вычтено $users посетителей!</h4>";
   }
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   
   }

   
      if(isset($_POST['inserts'])) {
   $inserts = $_POST['inserts'];
   
   if($_POST['ps'] == 1) {
   $pdo->Query("UPDATE `tb_stats` SET `finvest` = `finvest` + '$inserts' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, в пополнено - добавлено $inserts руб!</h4>";
   }
      if($_POST['ps'] == 2) {
   $pdo->Query("UPDATE `tb_stats` SET `finvest` = `finvest` - '$inserts' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, из пополнено - вычтено $inserts руб! </h4>";
   }
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   
   }
   
         if(isset($_POST['pay'])) {
   $pay = $_POST['pay']; 
   
   if($_POST['ps'] == 1) {
   $pdo->Query("UPDATE `tb_stats` SET `fpay` = `fpay` + '$pay' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, в выплачено - добавлено $pay руб!</h4>";
   }
      if($_POST['ps'] == 2) {
   $pdo->Query("UPDATE `tb_stats` SET `fpay` = `fpay` - '$pay' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>Уважаемый админинстратор, из выплачено - вычтено $pay руб! </h4>";
   }
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   
   }
   
   ?>
   
   
<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1251"><h3>Накрутка статистики</h3></header>
<div class="module_content">
			 
 <table align="left" style="min-width:300px;">
   
  
	   
   <form method="post" action="">
    <tr>
     <td>Накрутить пользователи: </td>
     <td><input type="text" name="users" placeholder="Введите кол-во" value=""></td>
	 <td><select name="ps"><option value="1">Прибавить</option><option value="2">Вычесть</optin></select></td>
	 	 <td><input class="input" type="submit" value="Сохранить"></td>
    </tr>   
    </form>

   <form method="post" action="">
    <tr>
     <td>Накрутить пополнено: </td>
     <td><input type="text" name="inserts" placeholder="Введите сумму" value=""></td>
	 <td><select name="ps"><option value="1">Прибавить</option><option value="2">Вычесть</optin></select></td>
	 	 <td><input class="input" type="submit" value="Сохранить"></td>
    </tr>   
    </form>

   <form method="post" action="">
    <tr>
     <td>Накрутить выплачено: </td>
     <td><input type="text" name="pay" placeholder="Введите сумму" value=""></td>
	 <td><select name="ps"><option value="1">Прибавить</option><option value="2">Вычесть</optin></select></td>
	 	 <td><input class="input" type="submit" value="Сохранить"></td>
    </tr>   
    </form>

  <form method="post" action="">
    <tr>
     <td>Накрутить посетителей: </td>
     <td><input type="text" name="online" placeholder="Введите кол-во" value=""></td>
	 <td><select name="ps"><option value="1">Прибавить</option><option value="2">Вычесть</optin></select></td>
	 	 <td><input class="input" type="submit" value="Сохранить"></td>
    </tr>   
    </form>
    
    	<tr><td><br /><br /></td></tr>
    
    <tr>
     <td>Накручено юзеров: <b><?=$stats['fusers']; ?></b> ЧЕЛ</td>
    </tr> 
     <tr>
     <td>Накручено пополнить: <b><?=$stats['finvest']; ?></b> RUB</td>
    </tr> 
     <tr>
     <td>Накручено выплачено: <b><?=$stats['fpay']; ?></b> RUB</td>
    </tr> 
     <tr>
     <td>Накручено посетителей: <b><?=$stats['online']; ?></b> ЧЕЛ</td>
    </tr> 
    
	<tr><td><br /><br /></td></tr>
	
	  <tr>
	  <form method="post" action="">
     <td>Отчет в диаграмму:</td>
     <td><input type="text" name="perc" placeholder="Введите процент" value=""></td>
	 <td><input class="input" type="submit" value="Добавить"></td>
	 </form>
    </tr> 
	
		<tr><td><br /><br /></td></tr>
	
     
       </table>
	     
	   <br /><br />
	   <div style="clear:both;"></div>
	   
	   
	   
	   
	   
	  <table> 
	<form method="post" action="">
    <tr>
     <td>Добавить фейк депозит: </td>
     <td><input type="text" name="deposum" placeholder="Введите сумму" value=""></td>
	 <td><input type="text" name="depolog" placeholder="Введите логин" value=""></td>
	 <td><input class="input" type="submit" value="OK"></td>
    </tr>   
    </form>
    
	<form method="post" action="">
    <tr>
     <td>Добавить фейк выплату: </td>
     <td><input type="text" name="paysum" placeholder="Введите сумму" value=""></td>
	 <td><input type="text" name="paylog" placeholder="Введите логин" value=""></td>
	 <td><input class="input" type="submit" value="OK"></td>
    </tr>   
    </form>
	
		<form method="post" action="">
    <tr>
     <td>Добавить фейк рефовода: &nbsp; &nbsp; &nbsp; </td>
     <td><input type="text" name="regref" placeholder="Введите рефералов" value=""></td>
	 <td><input type="text" name="reglog" placeholder="Введите логин" value=""></td>
	 <td><input class="input" type="submit" value="OK"></td>
    </tr>   
    </form>
	
</table>