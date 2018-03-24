<!DOCTYPE html>
<html> 
<head>
	<meta charset="windows-1251">
	<title>Авторизация в админке</title>
	<link rel="stylesheet" href="/<?=$diradm; ?>/css/login.css">
</head>
<body>

<center>
<?

if(isset($_POST['ok'])) {

session_start();

$login = str($_POST['login']);
$password = $_POST['pass'];
$key = $_POST['key'];
$passmd5 = md5pass($password);

if (!empty($login)) { 
if (!empty($password)) { 

$load = $pdo->Query("SELECT * FROM `tb_adm` WHERE `id` = '1' LIMIT 1");
$data = $load->Fetch(); 
if($data['pass'] == $passmd5 AND $data['login'] == $login AND $data['key'] == $key) {

$_SESSION['admin'] = true;

echo "<div id='exe'>Вы успешно авторизовались. <a style='color:#fff;' href='/".$diradm."/index.php'>Перейти в админку</a></div>";

return;

?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php';", 5000 ); </script> <? 

} else echo "<div id='exe'>Пара логин/пароль имеет неверное значение</div>";
} else echo "<div id='exe'>Не заполнено поле пароль</div>";
} else echo "<div id='exe'>Не заполнено поле логин</div>"; 

} 

?>


</center>

<div id="login_container">
	<div id="form_container">
		<p class="login-text">Авторизация в админке</p>
		<form method='POST'>
		<input type='text' onFocus="if(this.value=='Логин')this.value=''" onblur="if(this.value=='')this.value='Логин'" name='login' placeholder='Логин' class='text_input' />
		<input type='text' onFocus="if(this.value=='Пароль')this.value=''" onblur="if(this.value=='')this.value='Пароль'" name='pass' placeholder='Пароль' class='text_input' />
		<input type='text' onFocus="if(this.value=='Ключ')this.value=''" onblur="if(this.value=='')this.value='Ключ'" name='key' placeholder='Ключ' class='text_input' />
		<input type='submit' id='login' name='ok' value="" />
		</form>
	</div>
</div>
</body>
</html>