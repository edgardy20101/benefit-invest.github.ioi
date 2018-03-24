<?
$_OPTIMIZATION["title"] = "Выход";
if(!isset($_SESSION['id'])) {
echo "Для просмотра данной страницы необходимо авторизоваться!";
return;
}

session_start();
unset($_SESSION['id']);
header("location: /");
exit();
?>