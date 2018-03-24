<?

if(isset($_POST['site'])){
$pdo->Query("UPDATE `tb_sitecfg` SET `site` = '".$_POST['site']."' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, название сайта успешно сменено!</h4>"; 
}

if(isset($_POST['refperc'])){
$pdo->Query("UPDATE `tb_sitecfg` SET `refperc` = '".$_POST['refperc']."' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, реф. процент успешно сменён!</h4>"; 
}

if(isset($_POST['toggle'])){
$toggle = $_POST['toggle'];
$pdo->Query("UPDATE `tb_sitecfg` SET `autoins` = '$toggle' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, статус автоматики успешно сменён!</h4>"; 
}

if(isset($_POST['toggle2'])){
$toggle = $_POST['toggle2'];
$pdo->Query("UPDATE `tb_sitecfg` SET `autopay` = '$toggle' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, статус автоматики успешно сменён!</h4>"; 
}

if(isset($_POST['minins'])){

$minpay = (float)$_POST['minpay'];
$maxpay = (float)$_POST['maxpay'];

$minins = (float)$_POST['minins'];
$maxins = (float)$_POST['maxins'];

$pdo->Query("UPDATE `tb_sitecfg` SET `minpay` = '$minpay', `maxpay` = '$maxpay', `minins` = '$minins', `maxins` = '$maxins' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, ограничения суммы успешно установлены!</h4>"; 
}

if(isset($_POST['qiwiacc'])) {

$qiwiacc = $_POST['qiwiacc'];
$qiwipass = $_POST['qiwipass'];
$payeerid = $_POST['payeerid'];
$payeerkey = $_POST['payeerkey'];
$cfgPerfect = $_POST['cfgPerfect'];
$cfgPerfectkey = $_POST['cfgPerfectkey'];

$paeracc = $_POST['paeracc'];
$paerid = $_POST['paerid'];
$perapi = $_POST['perapi'];

$fgPMID = $_POST['fgPMID'];
$cfgPMpass = $_POST['cfgPMpass'];

$pdo->Query("UPDATE `tb_sitecfg` SET 
`qiwiacc` = '$qiwiacc',
`qiwipass` = '$qiwipass',
`payeerid` = '$payeerid',
`payeerkey` = '$payeerkey',
`cfgPerfect` = '$cfgPerfect',
`cfgPerfectkey` = '$cfgPerfectkey',
`paeracc` = '$paeracc',
`paerid` = '$paerid',
`perapi` = '$perapi',
`fgPMID` = '$fgPMID',
`cfgPMpass` = '$cfgPMpass' WHERE `id` = '1'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, данные пл. систем сохранены!</h4>"; 
}



if(isset($_POST['dir'])){
$dirname = $_SERVER['DOCUMENT_ROOT']."/".$diradm;
$ttfile = $_POST['dir'];

if($ttfile == $diradm) { echo "<h4 class='alert_info'>Уважаемый админинстратор, не удается сменить адрес админки!</h4>"; ?> <script>  setTimeout( "location='/<?=$ttfile; ?>/index.php?a=setting';", 3000 ); </script> <?  }

$pdo->Query("UPDATE `tb_sitecfg` SET `dir` = '$ttfile' WHERE `id` = '1'");
$ddir = explode("/", $dirname);
$rdir = array_pop($ddir);
$comma_separated = implode("/", $ddir);
$new_dir = $comma_separated."/".$ttfile;
if ($dirname!=$new_dir) { 
if (rename ($dirname, $new_dir)) { echo "<h4 class='alert_info'>Уважаемый админинстратор, адрес админки успешно изменен!</h4>"; ?> 
<script>  setTimeout( "location='/<?=$ttfile; ?>/index.php?a=setting';", 500 ); </script> <? }
}
}

?>

<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"><h3>Настройки сайта</h3></header>
<div class="module_content">
			 
<table align="left" style="min-width:300px;">
   
   
   <form method="post" action="">
      <tr>
     <td>Название сайта: </td>
     <td><input type="text" name="site" value="<?=$site; ?>"></td>
   </tr> 
   <tr>
     <td>Папка админки: </td>
     <td><input type="text" name="dir" value="<?=$diradm; ?>"></td>
   </tr> 
         <tr>
     <td>Рефералка: </td>
     <td><input type="text" name="refperc" value="<?=$refperc; ?>"></td>
   </tr>
   	<tr><td><br /></td></tr>
            
   	      <tr>
     <td>Qiwi account: </td>
     <td><input type="text" name="qiwiacc" value="<?=$qiwiacc; ?>"></td>
   </tr> 
   
         <tr>
     <td>Qiwi Password: </td>
     <td><input type="password" name="qiwipass" value="<?=$qiwipass; ?>"></td>
   </tr> 
   
   
   <tr><td><br /></td></tr>
   
   	      <tr>
     <td>Payeer ID: </td>
     <td><input type="text" name="payeerid" value="<?=$payeerid; ?>"></td>
   </tr> 
   
         <tr>
     <td>Payeer KEY: </td>
     <td><input type="text" name="payeerkey" value="<?=$payeerkey; ?>"></td>
   </tr> 
   
      <tr><td><br /></td></tr>
      
         	      <tr>
     <td>PAY Payeer PURSE: </td>
     <td><input type="text" name="paeracc" value="<?=$paeracc; ?>"></td>
   </tr> 
   
         <tr>
     <td>PAY Payeer ID: </td>
     <td><input type="text" name="paerid" value="<?=$paerid; ?>"></td>
   </tr>
   
            <tr>
     <td>API Payeer KEY: </td>
     <td><input type="text" name="perapi" value="<?=$perapi; ?>"></td>
   </tr>
   
   
   <tr><td><br /></td></tr>
   
   	      <tr>
     <td>Perfect account: </td>
     <td><input type="text" name="cfgPerfect" value="<?=$cfgPerfect; ?>"></td>
   </tr> 
   
    <tr>
     <td>Perfect MD5 KEY: </td>
     <td><input type="text" name="cfgPerfectkey" value="<?=$cfgPerfectkey; ?>"></td>
   </tr> 
   
      <tr><td><br /></td></tr>
      
  <tr>
     <td>PAY Perfect ID: </td>
     <td><input type="text" name="fgPMID" value="<?=$fgPMID; ?>"></td>
   </tr> 
   
  <tr>
     <td>PAY Perfect PaSSW: </td>
     <td><input type="text" name="cfgPMpass" value="<?=$cfgPMpass; ?>"></td>
   </tr> 
   
   
   	<tr><td><br /></td></tr>
	
	      <tr>
     <td>Мин на вывод: </td>
     <td><input type="text" name="minpay" value="<?=$minpay; ?>"></td>
   </tr> 
   
         <tr>
     <td>Макс на вывод: </td>
     <td><input type="text" name="maxpay" value="<?=$maxpay; ?>"></td>
   </tr> 
   
      
   	<tr><td><br /></td></tr>
   
   	      <tr>
     <td>Мин на вклады: </td>
     <td><input type="text" name="minins" value="<?=$minins; ?>"></td>
   </tr> 
   
         <tr>
     <td>Макс на вклады: </td>
     <td><input type="text" name="maxins" value="<?=$maxins; ?>"></td>
   </tr> 
 
   
   <tr><td><br /><input class="input" type="submit" value="Сохранить"></td></tr>
   
   </form>
    
   	<tr><td><br /></td></tr>

   </table>
  
  

	