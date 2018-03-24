<?
ob_start(); // Старт буфера
session_start(); // Старт сессии

date_default_timezone_set('Africa/Lagos');

include_once '../data/config.php'; // Подключаем настройки

if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1) {     ?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL /<?=$diradm; ?>/ was not found on this server.</p>
</body></html>

<? session_destroy(); exit(); } 

if(!isset($_SESSION['admin'])) {
include_once 'temp/login.php'; exit();
}


  $content = get_content();
  // Разбираем содержимое, при помощи регулярных выражений
  $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
  preg_match_all($pattern, $content, $out, PREG_SET_ORDER);
  $dollar = "";
  foreach($out as $cur)
  {
    if($cur[2] == 840) $dollar = str_replace(",",".",$cur[4]);
  }

function get_content()
{
    // Формируем сегодняшнюю дату
    $date = date("d/m/Y");
    // Формируем ссылку
    $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date;
    // Загружаем HTML-страницу
    $fd = @fopen($link, "r");
    $text="";
    if (!$fd) echo "Сервер ЦБ не отвечает";
    else
    {
      // Чтение содержимого файла в переменную $text
      while (!feof ($fd)) $text .= fgets($fd, 4096);
      // Закрыть открытый файловый дескриптор
      fclose ($fd);
    }
    return $text;
}

$cursdlr = number_format($dollar, 2, '.', '');

include_once 'temp/head.php'; // Подключаем верх шаблона

if(!isset($_GET['a'])) { include_once 'page/index.php'; }

if(isset($_GET['a'])) {
if(clean($_GET['a']) == 'pay') { include_once 'page/pay.php'; }
elseif(clean($_GET['a']) == 'depo') { include_once 'page/depo.php'; }
elseif(clean($_GET['a']) == 'setting') { include_once 'page/setting.php'; }
elseif(clean($_GET['a']) == 'fake') { include_once 'page/fake.php'; }
elseif(clean($_GET['a']) == 'page') { include_once 'page/page.php'; }
elseif(clean($_GET['a']) == 'users') { include_once 'page/users.php'; }
elseif(clean($_GET['a']) == 'news') { include_once 'page/news.php'; }
elseif(clean($_GET['a']) == 'tickets') { include_once 'page/tickets.php'; }
elseif(clean($_GET['a']) == 'otziv') { include_once 'page/otziv.php'; }
elseif(clean($_GET['a']) == 'exit') { unset($_SESSION['admin']); ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php';", 0 ); </script> <? }

else include_once 'page/404.php'; // Страница 404 ошибки
}

include_once 'temp/foot.php'; // Подключаем подвал шаблона

?>