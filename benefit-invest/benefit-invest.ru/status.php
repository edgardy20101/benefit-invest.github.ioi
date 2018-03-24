<?

include_once 'data/config.php';

if (isset($_POST["m_operation_id"]) && isset($_POST["m_sign"]))
{
	$m_key = $payeerkey;
	$arHash = array($_POST['m_operation_id'],
			$_POST['m_operation_ps'],
			$_POST['m_operation_date'],
			$_POST['m_operation_pay_date'],
			$_POST['m_shop'],
			$_POST['m_orderid'],
			$_POST['m_amount'],
			$_POST['m_curr'],
			$_POST['m_desc'],
			$_POST['m_status'],
			$m_key);
	
	$sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));
	if ($_POST['m_sign'] == $sign_hash && $_POST['m_status'] == 'success')
	{
	    
	    $id = $_POST['m_orderid'];
	    $summa = $_POST['m_amount'];
	    
	    
	    $sql = $pdo->Query("SELECT * FROM `tb_inserts` WHERE `id` = '$id'");
	    $num = $sql->RowCount();
	    if($num == 0) { exit(); }
	    $data = $sql->Fetch();
	    $user = $data['userid'];
	    $summ = $data['summa'];
	    if($summ != $summa) { exit(); }
	    
	    $pdo->Query("UPDATE `tb_depo` SET `status` = '0' WHERE `insid` = '$id'");
	    $pdo->Query("UPDATE `tb_inserts` SET `status` = '1' WHERE `id` = '$id'");
	    $pdo->Query("UPDATE `tb_stats` SET `invest` = `invest` + '$summ' WHERE `id` = '1'");
        $pdo->Query("UPDATE `tb_users` SET `inserts` = `inserts` + '$summ' WHERE `id` = '$user'");
	    
	    $sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `id` = '$user'");
	    $dt = $data = $sql->Fetch();
	    $ref = (int)$dt['refid']; 
	    $refsum = floatval($summa / 100 * $refperc); 
        $pdo->Query("UPDATE `tb_users` SET `money` = `money` + '$refsum' WHERE `id` = '$ref'");
	    
	    
		echo $_POST['m_orderid'].'|success';
		exit;
	}
	
	echo $_POST['m_orderid'].'|error';
}
?>