<?
$_OPTIMIZATION["title"] = "Новости";

$sql = $pdo->Query("SELECT * FROM `tb_news` ORDER BY `id` DESC");



while($ins = $sql->Fetch()) {


$text = ($_POST['txt']);
$title = ($_POST['title']);
$date = $_POST['date'];


?>





<td><i class="fa fa-user"></i> <?=$text; ?></td>
	

<?php } ?>
