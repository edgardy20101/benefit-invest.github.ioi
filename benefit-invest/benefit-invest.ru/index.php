<?

ob_start(); // Старт буфера
session_start(); // Старт сессии

$_OPTIMIZATION = array();
$_OPTIMIZATION["title"] = "KeyWords";



date_default_timezone_set('Africa/Lagos');

include_once 'data/config.php'; // Подключаем настройки

include_once 'temp/head.php'; // Подключаем верх шаблона

include_once 'data/pages.php'; // Подключаем загрузку страниц

include_once 'temp/foot.php'; // Подключаем подвал шаблона

$content = ob_get_contents();
ob_end_clean();
$content = str_replace("{!TITLE!}",$_OPTIMIZATION["title"],$content);
echo $content;

?>