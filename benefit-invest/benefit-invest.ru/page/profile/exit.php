<?
$_OPTIMIZATION["title"] = "�����";
if(!isset($_SESSION['id'])) {
echo "��� ��������� ������ �������� ���������� ��������������!";
return;
}

session_start();
unset($_SESSION['id']);
header("location: /");
exit();
?>