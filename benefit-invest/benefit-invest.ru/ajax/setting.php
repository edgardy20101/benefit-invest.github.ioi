<?
/* session_start();
header("Content-type: text/html; charset=windows-1251");
date_default_timezone_set('Africa/Lagos');
include('../data/connect.php');
include('../data/config.php');
clearstatcache();

if(isset($_POST['old'])){
	$old = str($_POST['old']);
	$oldmd = md5pass($old);
	$new = str($_POST['newq']);
	$news = str($_POST['news']);
	$nw = md5pass($news);
	$pass = str($userdata['pass']);
	
	if ($oldmd == $pass){
		if ($new == $news){
			if (!empty($new) AND !empty($news)) {
				$pdo->Query("UPDATE `tb_users` SET `pass` = '$nw' WHERE `id` = '$sess'");
				echo "<font color='green'>Новый пароль успешно установлен.</font> <br /><br />";
				session_destroy();
			?>	<script>  setTimeout( "location='/index.php';", 3000 ); </script> <?
				
			} else echo "<font color='red'>Вы заполнили не все поля.</font> <br /><br />";
		} else echo "<font color='red'>Указанные пароли не совпадают.</font> <br /><br />";
	} else echo "<font color='red'>Неверно указан старый пароль.</font> <br /><br />";
	

}*/
?>