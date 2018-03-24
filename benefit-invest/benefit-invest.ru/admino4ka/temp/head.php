<!doctype html>
<html>

<head>
	<meta charset="windows-1251"/>
	<title><?=$site; ?> :: AdminPanel</title>
	
	<link rel="stylesheet" href="/<?=$diradm;?>/css/layout.css" type="text/css" media="screen" />
	<script src="/<?=$diradm;?>/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="/<?=$diradm;?>/js/hideshow.js" type="text/javascript"></script>
	<script src="/<?=$diradm;?>/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/<?=$diradm;?>/js/jquery.equalHeight.js"></script>

</head>

<?
$sql = $pdo->Query("SELECT * FROM `tb_inserts` WHERE `status` = '0'");
$numins = $sql->RowCount();

$sql = $pdo->Query("SELECT * FROM `tb_pays` WHERE `status` = '0'");
$numpays = $sql->RowCount();

$sql = $pdo->Query("SELECT * FROM `tb_users`");
$numus = $sql->RowCount();

$sql = $pdo->Query("SELECT * FROM `tb_otziv` WHERE `status` = '0'");
$numotziv = $sql->RowCount();

$sql = $pdo->Query("SELECT * FROM `tb_tickets` WHERE `status` = '0'");
$numtick = $sql->RowCount();
?>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="/<?=$diradm;?>">AdminPanel</a></h1>
			<h2 class="section_title"><?=$site;?></h2><div class="btn_view_site"><a target="_blank" href="http://<?=$site;?>/">�� ����</a></div>
		</hgroup>
	</header> 


	
	<aside id="sidebar" class="column">
	
		<ul class="toggle">
	        <a href="/<?=$diradm; ?>/"><li class="icn_categories" <? if(!isset($_GET['a'])) { echo 'style="background-color: #080808;"'; } ?> >������� ��������</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=depo"><li class="icn_categories" <? if($_GET['a'] == 'depo') { echo 'style="background-color: #080808;"'; } ?> >��������� ������� (<?=$numins; ?>)</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=pay"><li class="icn_categories" <? if($_GET['a'] == 'pay') { echo 'style="background-color: #080808;"'; } ?> >��������� ������ (<?=$numpays; ?>)</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=otziv"><li class="icn_categories" <? if($_GET['a'] == 'otziv') { echo 'style="background-color: #080808;"'; } ?> >��������� ������� (<?=$numotziv; ?>)</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=news"><li class="icn_categories" <? if($_GET['a'] == 'news') { echo 'style="background-color: #080808;"'; } ?> >���������� ���������</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=tickets"><li class="icn_categories" <? if($_GET['a'] == 'tickets') { echo 'style="background-color: #080808;"'; } ?> >����������� ��������� (<?=$numtick; ?>)</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=setting"><li class="icn_categories" <? if($_GET['a'] == 'setting') { echo 'style="background-color: #080808;"'; } ?> >��������� �����</li></a>
			<a href="/<?=$diradm; ?>/index.php?a=page"><li class="icn_categories" <? if($_GET['a'] == 'page') { echo 'style="background-color: #080808;"'; } ?> >���������� ���������</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=fake"><li class="icn_categories" <? if($_GET['a'] == 'fake') { echo 'style="background-color: #080808;"'; } ?> >�������� �����</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=users"><li class="icn_categories" <? if($_GET['a'] == 'users') { echo 'style="background-color: #080808;"'; } ?> >������������ (<?=$numus; ?>)</li></a>
	        <a href="/<?=$diradm; ?>/index.php?a=exit"><li class="icn_categories" <? if($_GET['a'] == 'exit') { echo 'style="background-color: #080808;"'; } ?> >��������� ������</li></a>
	
		</ul>
				
		<div style="height:300px;"></div>
		
	</aside>
	
	
	
	
	<section id="main" class="column">
	
