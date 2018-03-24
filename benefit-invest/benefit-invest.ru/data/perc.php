<?

include 'config.php';

$sql = $pdo->Query("SELECT * FROM `tb_depo` WHERE `last_time` <= '".time()."' AND `status` = '0'");
while($depo = $sql->Fetch()) {
    $id = (int)$depo['id'];
    $userid = (int)$depo['userid'];
    $summa = $depo['summa'];
    $percent = $depo['percent'];
    $endsumm = ($summa / 100) * $percent;
    $count = (int)$depo['count'];
    $count_full = (int)$depo['count_full'];
    $latime = time() + 86400;
    
    $pdo->Query("UPDATE `tb_depo` SET `count` = `count` + '1', `last_time` = '$latime' WHERE `id` = '$id'");
    $pdo->Query("UPDATE `tb_users` SET `money` = `money` + '$endsumm' WHERE `id` = '$userid'");
    
    if ($count == $count_full) {
        $pdo->Query("UPDATE `tb_depo` SET `status` = '1' WHERE `id` = '$id'");
    }
}

?>