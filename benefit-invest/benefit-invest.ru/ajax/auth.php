<?

session_start();
header("Content-type: text/html; charset=windows-1251");
include_once('../data/connect.php');
include_once('../data/config.php');

$login = $_POST['log'];
$password = $_POST['passw'];
$passmd5 = md5pass($password);

if (empty($login)) { echo "<font color='red'>�� ��������� ���� �����!</font><br /><br />"; exit(); }

if (empty($password)) { echo "<font color='red'>�� ��������� ���� ������!</font><br /><br />"; exit(); }

$load = $pdo->Query("SELECT * FROM `tb_users` WHERE `login` = '$login' LIMIT 1");
if($load->RowCount() == 0) { echo "<font color='red'>������������ �� ������ � ���� ������!</font><br /><br />"; exit(); }
$us = $load->Fetch(); 
if($us['pass'] != $passmd5) { echo "<font color='red'>���� �����/������ ����� ������� ��������!</font><br /><br />"; exit(); }
if($us['ban'] == 1) { echo "<font color='red'>�� �������� �������������� �����!</font><br /><br />"; exit(); }

$_SESSION['id'] = intval($us['id']);

echo "<font color='green'>�� ������� ��������������. <a href='/index.php?a=profile'>������� � �������</a></font><br /><br />";

?>

<script>  setTimeout( "location='/index.php?a=profile';", 3000 ); </script>

<? exit(); ?>

