<?
session_start();
header("Content-type: text/html; charset=windows-1251");

include_once('../data/config.php');

$login = $_POST['login'];

$pass = $_POST['pass'];

$md5pass = md5pass($pass);

$rpass = str($_POST['rpass']);

$md5rpass = md5pass($rpass);

$mail = str($_POST['mail']);

$ref = intval($_POST['ref']);

$ip = $_SERVER['REMOTE_ADDR'];


$substr =  substr($login, 0, 4);
if($substr == 'SCAM') { exit(); }  

/*
$sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `ip` = '".$ip."'");
$num = $sql->RowCount();
if($num >= 1) { echo "<font color='red'>��������� ����������� ���������.</font><br /><br /><br />"; exit(); }
*/

if (empty($login)) { echo "<font color='red'>������� ��������� ���� �����.</font><br /><br /><br />"; exit(); }

if (empty($pass)) { echo "<font color='red'>�� ��������� ���� ������.</font><br /><br /><br />"; exit(); }

if (empty($rpass)) { echo "<font color='red'>�� ��������� ���� ������ ������.</font><br /><br /><br />"; exit(); }

if (empty($mail)) { echo "<font color='red'>������� ��������� ��� �� ��������� ���� E-MAIL.</font><br /><br /><br />"; exit(); }

if (!empty($_POST['refer'])) { $refer = str($_POST['refer']); } else { $refer = "No_Refer"; }

$time = time();

$sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `mail` = '".$mail."'");
$num = $sql->RowCount();
if($num >= 1) { echo "<font color='red'>������������ � ������ E-MAIL ���������������.</font><br /><br /><br />"; exit(); }

$sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `login` = '".$login."'");
$num = $sql->RowCount();
if($num >= 1) { echo "<font color='red'>��������� ����� �����.</font><br /><br /><br />"; exit(); }

if($pass != $rpass){ echo "<font color='red'>������ �� ���������.</font><br /><br /><br />";  exit(); }

$sqlqs = $pdo->Query("SELECT * FROM `tb_users` WHERE `id` = '$ref'");
$refdata = $sqlqs->Fetch();
$reflogin = $refdata['login'];

$pdo->Query("UPDATE `tb_stats` SET `users` = `users` + 1 WHERE `id` = '1'");
$pdo->Query("UPDATE `tb_users` SET `numrefs` = `numrefs` + 1 WHERE `id` = '$ref'");

$pdo->Query("INSERT INTO `tb_users` VALUES('', '$login', '$md5pass', '$mail', '$time', '$ip', '0', '$ref', '$reflogin', '0', '0', '0', '0', '', '', '0', '0')");

$insertId = $pdo->LastInsertId();

echo "<br /><font color='green'>�� ������� ���������������� � ������� ".$site.".<br /><br /><br />";

$_SESSION['id'] = intval($insertId);

$name_from = $adminmail;
$email_from = $adminmail;
$email_to = $mail;
$subject = "��������������� ������ $site";
$body = "��� �����: <b>$login</b> <br /> ��� ������: <b>$pass</b>
<br />� ���������, ������������� ����� $site";
$headers = "Content-type: text/html; charset=windows-1251 \r\n";
$headers .= "From:$email_from \r\n";
mail($email_to, $subject, $body, $headers);

?>


<script>  setTimeout( "location='/index.php?a=profile';", 3000 ); </script>


<? exit(); ?>