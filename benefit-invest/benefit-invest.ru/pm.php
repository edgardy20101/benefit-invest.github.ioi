<?

include_once 'data/config.php';

$passphrase = strtoupper(md5($cfgPerfectkey));

        $string=
              $_REQUEST['PAYMENT_ID'].':'.$_REQUEST['PAYEE_ACCOUNT'].':'.
              $_REQUEST['PAYMENT_AMOUNT'].':'.$_REQUEST['PAYMENT_UNITS'].':'.
              $_REQUEST['PAYMENT_BATCH_NUM'].':'.
              $_REQUEST['PAYER_ACCOUNT'].':'.$passphrase.':'.
              $_REQUEST['TIMESTAMPGMT'];

        $hash=strtoupper(md5($string));

        if($hash==$_REQUEST['V2_HASH']){ // proccessing payment if only hash is valid
            if($_REQUEST['PAYMENT_UNITS']=='USD'){
                $summa = round($_REQUEST['PAYMENT_AMOUNT'],2);
                $id = (int)$_REQUEST["PAYMENT_ID"];
                
        $sql = $pdo->Query("SELECT * FROM `tb_inserts` WHERE `id` = '$id'");
	    $num = $sql->RowCount();
	    if($num == 0) { exit(); }
	    $data = $sql->Fetch();
	    $user = $data['userid'];
	    
	    $sql = $pdo->Query("SELECT * FROM `tb_depo` WHERE `insid` = '$id'");
	    $depo = $sql->Fetch();
	    $summ = $depo['sumpm'];
	    $summop = $depo['summa'];
	    
	    if($summ != $summa) { exit(); }
	    
	     
	    $pdo->Query("UPDATE `tb_depo` SET `status` = '0' WHERE `insid` = '$id'");
	    $pdo->Query("UPDATE `tb_inserts` SET `status` = '1' WHERE `id` = '$id'");
	    $pdo->Query("UPDATE `tb_stats` SET `invest` = `invest` + '$summop' WHERE `id` = '1'");
        $pdo->Query("UPDATE `tb_users` SET `inserts` = `inserts` + '$summop' WHERE `id` = '$user'");
	    
	    $sql = $pdo->Query("SELECT * FROM `tb_users` WHERE `id` = '$user'");
	    $dt = $data = $sql->Fetch();
	    $ref = (int)$dt['refid']; 
	    $refsum = floatval($summop / 100 * $refperc); 
        $pdo->Query("UPDATE `tb_users` SET `money` = `money` + '$refsum' WHERE `id` = '$ref'");
                
                
            }
        }
?> 