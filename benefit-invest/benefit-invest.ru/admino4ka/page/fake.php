 <?  
 
     
   if(isset($_POST['deposum'])) {
   $deposum = $_POST['deposum']; 
   $depolog = $_POST['depolog']; 
   $last_time = time() + 8000000;
   $pdo->Query("INSERT INTO `tb_depo` (login, time, last_time, summa, status) 
        VALUES ('$depolog', '".time()."', '".$last_time."', '$deposum',  '0') ");
	$pdo->Query("UPDATE `tb_stats` SET `invest` = `invest` + '$deposum' WHERE `id` = '1'"); 
   echo "<h4 class='alert_info'>��������� ��������������, �������� ������� ������!</h4>";
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   }
   
   
if(isset($_POST['perc'])) {
   $perc = $_POST['perc']; 
   $time = time();
   
   $pdo->Query("INSERT INTO `tb_cash` (perc, time) VALUES ('$perc', '$time') ");

   echo "<h4 class='alert_info'>��������� ��������������, ����� � ������ �� ������� ������� �������� � ��!</h4>";
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   }
   
   
   
      
   if(isset($_POST['paylog'])) {
   $paysum = $_POST['paysum']; 
   $paylog = $_POST['paylog']; 

   $pdo->Query("INSERT INTO `tb_pays` (login, summa, time, status) 
VALUES ('$paylog', '$paysum', '".time()."', '1') ");

	$pdo->Query("UPDATE `tb_stats` SET `pay` = `pay` + '$paysum' WHERE `id` = '1'"); 
	
   echo "<h4 class='alert_info'>��������� ��������������, �������� �������� ������!</h4>";
   
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

	$pdo->Query("UPDATE `tb_stats` SET `users` = `users` + '1' WHERE `id` = '1'"); // ��������� � ����������
	
   echo "<h4 class='alert_info'>��������� ��������������, �������� ������� ������!</h4>";
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   }
   

 
if(isset($_POST['users'])) {
   $users = intval($_POST['users']); 
   
   if($_POST['ps'] == 1) {
   $pdo->Query("UPDATE `tb_stats` SET `fusers` = `fusers` + '$users' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>��������� ��������������, ��������� $users �������������!</h4>";
   }

      if($_POST['ps'] == 2) {
   $pdo->Query("UPDATE `tb_stats` SET `fusers` = `fusers` - '$users' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>��������� ��������������, ������� $users �������������!</h4>";
   }
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   
   }


if(isset($_POST['online'])) {
   $users = intval($_POST['online']); 
   
   if($_POST['ps'] == 1) {
   $pdo->Query("UPDATE `tb_stats` SET `online` = `online` + '$users' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>��������� ��������������, ��������� $users �����������!</h4>";
   }

      if($_POST['ps'] == 2) {
   $pdo->Query("UPDATE `tb_stats` SET `online` = `online` - '$users' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>��������� ��������������, ������� $users �����������!</h4>";
   }
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   
   }

   
      if(isset($_POST['inserts'])) {
   $inserts = $_POST['inserts'];
   
   if($_POST['ps'] == 1) {
   $pdo->Query("UPDATE `tb_stats` SET `finvest` = `finvest` + '$inserts' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>��������� ��������������, � ��������� - ��������� $inserts ���!</h4>";
   }
      if($_POST['ps'] == 2) {
   $pdo->Query("UPDATE `tb_stats` SET `finvest` = `finvest` - '$inserts' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>��������� ��������������, �� ��������� - ������� $inserts ���! </h4>";
   }
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   
   }
   
         if(isset($_POST['pay'])) {
   $pay = $_POST['pay']; 
   
   if($_POST['ps'] == 1) {
   $pdo->Query("UPDATE `tb_stats` SET `fpay` = `fpay` + '$pay' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>��������� ��������������, � ��������� - ��������� $pay ���!</h4>";
   }
      if($_POST['ps'] == 2) {
   $pdo->Query("UPDATE `tb_stats` SET `fpay` = `fpay` - '$pay' WHERE `id` = 1"); 
   echo "<h4 class='alert_info'>��������� ��������������, �� ��������� - ������� $pay ���! </h4>";
   }
   
   ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
   
   }
   
   ?>
   
   
<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1251"><h3>�������� ����������</h3></header>
<div class="module_content">
			 
 <table align="left" style="min-width:300px;">
   
  
	   
   <form method="post" action="">
    <tr>
     <td>��������� ������������: </td>
     <td><input type="text" name="users" placeholder="������� ���-��" value=""></td>
	 <td><select name="ps"><option value="1">���������</option><option value="2">�������</optin></select></td>
	 	 <td><input class="input" type="submit" value="���������"></td>
    </tr>   
    </form>

   <form method="post" action="">
    <tr>
     <td>��������� ���������: </td>
     <td><input type="text" name="inserts" placeholder="������� �����" value=""></td>
	 <td><select name="ps"><option value="1">���������</option><option value="2">�������</optin></select></td>
	 	 <td><input class="input" type="submit" value="���������"></td>
    </tr>   
    </form>

   <form method="post" action="">
    <tr>
     <td>��������� ���������: </td>
     <td><input type="text" name="pay" placeholder="������� �����" value=""></td>
	 <td><select name="ps"><option value="1">���������</option><option value="2">�������</optin></select></td>
	 	 <td><input class="input" type="submit" value="���������"></td>
    </tr>   
    </form>

  <form method="post" action="">
    <tr>
     <td>��������� �����������: </td>
     <td><input type="text" name="online" placeholder="������� ���-��" value=""></td>
	 <td><select name="ps"><option value="1">���������</option><option value="2">�������</optin></select></td>
	 	 <td><input class="input" type="submit" value="���������"></td>
    </tr>   
    </form>
    
    	<tr><td><br /><br /></td></tr>
    
    <tr>
     <td>��������� ������: <b><?=$stats['fusers']; ?></b> ���</td>
    </tr> 
     <tr>
     <td>��������� ���������: <b><?=$stats['finvest']; ?></b> RUB</td>
    </tr> 
     <tr>
     <td>��������� ���������: <b><?=$stats['fpay']; ?></b> RUB</td>
    </tr> 
     <tr>
     <td>��������� �����������: <b><?=$stats['online']; ?></b> ���</td>
    </tr> 
    
	<tr><td><br /><br /></td></tr>
	
	  <tr>
	  <form method="post" action="">
     <td>����� � ���������:</td>
     <td><input type="text" name="perc" placeholder="������� �������" value=""></td>
	 <td><input class="input" type="submit" value="��������"></td>
	 </form>
    </tr> 
	
		<tr><td><br /><br /></td></tr>
	
     
       </table>
	     
	   <br /><br />
	   <div style="clear:both;"></div>
	   
	   
	   
	   
	   
	  <table> 
	<form method="post" action="">
    <tr>
     <td>�������� ���� �������: </td>
     <td><input type="text" name="deposum" placeholder="������� �����" value=""></td>
	 <td><input type="text" name="depolog" placeholder="������� �����" value=""></td>
	 <td><input class="input" type="submit" value="OK"></td>
    </tr>   
    </form>
    
	<form method="post" action="">
    <tr>
     <td>�������� ���� �������: </td>
     <td><input type="text" name="paysum" placeholder="������� �����" value=""></td>
	 <td><input type="text" name="paylog" placeholder="������� �����" value=""></td>
	 <td><input class="input" type="submit" value="OK"></td>
    </tr>   
    </form>
	
		<form method="post" action="">
    <tr>
     <td>�������� ���� ��������: &nbsp; &nbsp; &nbsp; </td>
     <td><input type="text" name="regref" placeholder="������� ���������" value=""></td>
	 <td><input type="text" name="reglog" placeholder="������� �����" value=""></td>
	 <td><input class="input" type="submit" value="OK"></td>
    </tr>   
    </form>
	
</table>