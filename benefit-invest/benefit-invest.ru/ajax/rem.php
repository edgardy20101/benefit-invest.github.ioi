<?
session_start();
header("Content-type: text/html; charset=windows-1251");

include_once '../data/config.php';

if(isset($_POST['meil'])) {
$meil = str($_POST['meil']);

$date = time();

$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
$max=10;
$size=StrLen($chars)-1;
$password=null;
while($max--)
$password.=$chars[rand(0,$size)]; 

if(empty($meil)) { echo '<font color="red">������������ c ������ E-MAIL �� ������! &nbsp;&nbsp;&nbsp;&nbsp;</font><br /><br />'; exit();  }


$load = $pdo->Query("SELECT * FROM `tb_users` WHERE `mail` = '$meil' LIMIT 1");
$num = $load->RowCount();
if($num <= 0) {
echo '<font color="red">������������ c ������ E-MAIL �� ������! &nbsp;&nbsp;&nbsp;&nbsp;</font>'; exit();
}

$us = $load->Fetch();

$pass = md5pass($password);

$login = $us['login'];

$pdo->Query("UPDATE `tb_users` SET `pass` = '$pass' WHERE `login` = '$login'");

/* ������� �������� ������ � ����������� */ 
$name_from = $adminmail;
$email_from = $adminmail;
$email_to = $meil;
$subject = "�������������� ������";
$body = "��� ������������ ����� ������: $password <br />
����� ����� � �������� ������������.<br />
<br />� ���������, ������������� ����� $site";
$headers = "Content-type: text/html; charset=windows-1251 \r\n";
$headers .= "From:$email_from \r\n";
mail($email_to, $subject, $body, $headers);


echo '<font color="green">����� ������ ������ ��� �� ��������� E-MAIL &nbsp;&nbsp;&nbsp;&nbsp;</font>'; exit();

}

?>