<?


if(isset($_GET['ref'])) {
	$ref = clean($_GET['ref']);
	$sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `login` = '$ref'");
	$rdata = $sql->Fetch();
	$refid = intval($rdata['id']);
	$num = $sql->RowCount();
	if($num == 1) {
		setcookie("referer", $refid, time() + 864000);
	}


} 

?>