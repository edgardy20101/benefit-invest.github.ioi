<?

ob_start(); // ����� ������
session_start(); // ����� ������

$_OPTIMIZATION = array();
$_OPTIMIZATION["title"] = "KeyWords";



date_default_timezone_set('Africa/Lagos');

include_once 'data/config.php'; // ���������� ���������

include_once 'temp/head.php'; // ���������� ���� �������

include_once 'data/pages.php'; // ���������� �������� �������

include_once 'temp/foot.php'; // ���������� ������ �������

$content = ob_get_contents();
ob_end_clean();
$content = str_replace("{!TITLE!}",$_OPTIMIZATION["title"],$content);
echo $content;

?>