<?
$sql = $pdo->Query("SELECT * FROM `tb_online` WHERE `ip` = '".$_SERVER['REMOTE_ADDR']."'");
if($sql->RowCount() == 0) {
$pdo->Query("INSERT INTO `tb_online` (ip, date) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".time()."')");
} else { $pdo->Query("UPDATE `tb_online` SET date = '".time()."' WHERE ip ='".$_SERVER['REMOTE_ADDR']."'"); }
$delete = time() - 1200;
$pdo->Query("DELETE FROM `tb_online` WHERE date < '$delete'");

$sql = $pdo->Query("SELECT * FROM `tb_online`");
$online = $sql->RowCount();
?>