<?

if (isset($_POST['txt'])) {

$text = ($_POST['txt']);
$title = ($_POST['title']);
$date = $_POST['date'];

if(!empty($text) AND !empty($title)) {

$pdo->Query("INSERT INTO `tb_news` (date,title,text) VALUES ('$date','$title','$text')");
echo "<h4 class='alert_info'>Уважаемый админинстратор, новая новость успешно добавлена!</h4>";
 ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?
} else echo "<h4 class='alert_info'>Уважаемый админинстратор, вы заполнили не все поля!</h4>";

}

if (isset($_POST['txtrename'])) {

$text = ($_POST['txtrename']);
$date = time();
$id = (int)$_POST['id'];


$pdo->Query("UPDATE `tb_news` SET `text` = '$text' WHERE `id` = '$id'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, новость успешно отредактирована!</h4>";
 ?> <script>  setTimeout( "location='/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>';", 500 ); </script> <?


}


if(isset($_POST['delete'])) {
$id = (int)$_POST['id'];
$pdo->Query("DELETE FROM `tb_news` WHERE `id` = '$id'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, новость #".$id." удалена!</h4>";
}

?>


<script type="text/javascript" src="/js/editor/jscripts/tiny_mce/tiny_mce.js"></script>

<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1251"><h3>Управление новостями проекта</h3></header>
<div class="module_content">

<? if(isset($_GET['menu']) AND $_GET['menu'] == 'new') { ?>

<link rel="stylesheet" type="text/css" href="/<?=$diradm; ?>/kalendar/tcal.css" />
<script type="text/javascript" src="/<?=$diradm; ?>/kalendar/tcal.js"></script> 


<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		editor_deselector : "mceNoEditor",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright",
		
		theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,fullscreen,media,advhr",
		
		theme_advanced_buttons3 : "bullist,numlist,|,outdent,indent,blockquote,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons4 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell",
		theme_advanced_buttons5 : "",
		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		content_css : "editor/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		extended_valid_elements : "iframe[*]",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		},

		
		// Style formats
		style_formats : [

			{title : 'DEFAULT', inline : 'span', classes : 'text-content'}
		],
		
		
		// Enable translation mode
		translate_mode : true,
		language : "ru"
	});
</script>
<form action="" method="post">
<input type="text" name="title" style="width:300px; height:30px;" placeholder="Введите заголовок новости" value="<?=base64_decode($title); ?>"><br /><br />
<div><input type="text" name="date" class="tcal" value=""  /></div>
<br />
<br />

<textarea name="txt" cols="78" rows="25"><?=base64_decode($text); ?></textarea>
<BR />
<input type="submit" value="Сохранить" />
</form>
    
<? return; } ?>




<?
if(isset($_POST['rename'])) {
$id = (int)$_POST['id']; 
$sql = $pdo->Query("SELECT * FROM `tb_news` WHERE `id` = '$id'");
$datanews = $sql->Fetch();
$textren = ($datanews['text']);
$titleren = ($datanews['title']);
?>
    
    
   <script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		editor_deselector : "mceNoEditor",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright",
		
		theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,fullscreen,media,advhr",
		
		theme_advanced_buttons3 : "bullist,numlist,|,outdent,indent,blockquote,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons4 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell",
		theme_advanced_buttons5 : "",
		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		content_css : "editor/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		extended_valid_elements : "iframe[*]",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		},

		
		// Style formats
		style_formats : [

			{title : 'DEFAULT', inline : 'span', classes : 'text-content'}
		],
		
		
		// Enable translation mode
		translate_mode : true,
		language : "ru"
	});
</script>
<form action="" method="post">
<input type="text" style="width:300px; height:30px;" disabled = "disabled" value="<?=$titleren; ?>"><br /><br />
<textarea name="txtrename" cols="78" rows="25"><?=$textren; ?></textarea>
<input type="hidden" name="id" value="<?=$id; ?>">
<BR />
<input type="submit" value="Сохранить" />
</form>
    
<? return; } ?>



		<a href="/<?=$diradm; ?>/index.php?a=<?=$_GET['a']; ?>&menu=new">	 Написать новую новость</a><br /><br />
<table class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th><center>#ID</center></th>
<th><center>Заголовок</center></th>
<th><center>Дата</center></th>
<th style="width:350px;"><center>Действие</center></th>
</tr>
</thead>

<tbody>

<?
$sql = $pdo->Query("SELECT * FROM `tb_news` ORDER BY `id` DESC");
while($rows = $sql->Fetch()) {
$id = (int)$rows['id'];
$title = ($rows['title']);
$date = $rows['date'];

?>

<tr>
<td><center><?=$id; ?></center></td>
<td><center><?=$title; ?></center></td>
<td><center><?=$date; ?></center></td>
<td style="width:350px;">

<center>
<table><tr><td>
<form method="POST">
<input type="submit" name="rename" value="Редактировать" />
<input type="hidden" name="id" value="<?=$id; ?>" />
</form>
</td><td>
<form method="POST">
<input type="submit" name="delete" value="Удалить">
<input type="hidden" name="id" value="<?=$id; ?>" />
</form>
</td></tr></table>

</center>
</td>
</tr>

<? } ?>

</tbody>
</table>
	