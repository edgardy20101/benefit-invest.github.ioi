<!DOCTYPE html>
<html> 
<head>
	<meta charset="windows-1251">
	<title>����������� � �������</title>
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

echo "<div id='exe'>�� ������� ��������������. <a style='color:#fff;' href='/".$diradm."/index.php'>������� � �������</a></div>";

return;

?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php';", 5000 ); </script> <? 

} else echo "<div id='exe'>���� �����/������ ����� �������� ��������</div>";
} else echo "<div id='exe'>�� ��������� ���� ������</div>";
} else echo "<div id='exe'>�� ��������� ���� �����</div>"; 

} 

?>


</center>

<div id="login_container">
	<div id="form_container">
		<p class="login-text">����������� � �������</p>
		<form method='POST'>
		<input type='text' onFocus="if(this.value=='�����')this.value=''" onblur="if(this.value=='')this.value='�����'" name='login' placeholder='�����' class='text_input' />
		<input type='text' onFocus="if(this.value=='������')this.value=''" onblur="if(this.value=='')this.value='������'" name='pass' placeholder='������' class='text_input' />
		<input type='text' onFocus="if(this.value=='����')this.value=''" onblur="if(this.value=='')this.value='����'" name='key' placeholder='����' class='text_input' />
		<input type='submit' id='login' name='ok' value="" />
		</form>
	</div>
</div>
</body>
</html>