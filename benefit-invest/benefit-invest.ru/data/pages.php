<?

if(isset($_GET['a'])) {
if(clean($_GET['a']) == 'exit') { include_once 'page/profile/exit.php'; }
elseif(clean($_GET['a']) == 'auth') { include_once 'page/auth.php'; }
elseif(clean($_GET['a']) == 'about') { include_once 'page/abo.php'; }
elseif(clean($_GET['a']) == 'faq') { include_once 'page/faq.php'; }
elseif(clean($_GET['a']) == 'news') { include_once 'page/news.php'; }
elseif(clean($_GET['a']) == 'cash') { include_once 'page/cash.php'; }
elseif(clean($_GET['a']) == 'otziv') { include_once 'page/otziv.php'; }
elseif(clean($_GET['a']) == 'support') { include_once 'page/support.php'; }
elseif(clean($_GET['a']) == 'rules') { include_once 'page/rules.php'; }
elseif(clean($_GET['a']) == 'reg') { include_once 'page/reg.php'; }
elseif(clean($_GET['a']) == 'forgot') { include_once 'page/forgot.php'; } 
elseif(clean($_GET['a']) == 'history') { include_once 'page/profile/last_depo.php'; }
elseif(clean($_GET['a']) == 'payment') { include_once 'page/profile/payment.php'; }  
elseif(clean($_GET['a']) == 'deposit') { include_once 'page/profile/deposit.php'; } 
elseif(clean($_GET['a']) == 'ref') { include_once 'page/profile/reflink.php'; } 
elseif(clean($_GET['a']) == 'profile') { include_once 'page/profile/setting.php'; } 
elseif(clean($_GET['a']) == 'tickets') { include_once 'page/profile/tickets.php'; } 
else include_once 'page/404.php'; 
} else include_once 'page/home.php';

?>