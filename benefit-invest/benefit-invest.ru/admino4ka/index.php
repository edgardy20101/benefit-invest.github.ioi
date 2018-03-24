<?
ob_start(); // ����� ������
session_start(); // ����� ������

date_default_timezone_set('Africa/Lagos');

include_once '../data/config.php'; // ���������� ���������

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
  // ��������� ����������, ��� ������ ���������� ���������
  $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
  preg_match_all($pattern, $content, $out, PREG_SET_ORDER);
  $dollar = "";
  foreach($out as $cur)
  {
    if($cur[2] == 840) $dollar = str_replace(",",".",$cur[4]);
  }

function get_content()
{
    // ��������� ����������� ����
    $date = date("d/m/Y");
    // ��������� ������
    $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date;
    // ��������� HTML-��������
    $fd = @fopen($link, "r");
    $text="";
    if (!$fd) echo "������ �� �� ��������";
    else
    {
      // ������ ����������� ����� � ���������� $text
      while (!feof ($fd)) $text .= fgets($fd, 4096);
      // ������� �������� �������� ����������
      fclose ($fd);
    }
    return $text;
}

$cursdlr = number_format($dollar, 2, '.', '');

include_once 'temp/head.php'; // ���������� ���� �������

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

else include_once 'page/404.php'; // �������� 404 ������
}

include_once 'temp/foot.php'; // ���������� ������ �������

?>