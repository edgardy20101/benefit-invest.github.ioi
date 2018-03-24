<?
if(isset($_POST['txt'])) { 
$ids = (int)$_POST['id'];
$txt = $_POST['txt'];
$pdo->Query("UPDATE `tb_page` SET `text` = '$txt' WHERE `id` = '$ids'");
echo "<h4 class='alert_info'>Уважаемый админинстратор, текст страницы успешно сохранен!</h4>";
}
?>

<article class="module width_full">
<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"><h3>Управление контентом</h3></header>
<div class="module_content">


<? 
if(isset($_GET['id'])) { 
$sql = $pdo->Query("SELECT * FROM `tb_page` WHERE `id` = '$_GET[id]'");
$data = $sql->Fetch();
$text = $data['text'];
?>



<script type="text/javascript" src="/js/editor/jscripts/tiny_mce/tiny_mce.js"></script>
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
<textarea name="txt" cols="78" rows="25"><?=$text; ?></textarea>
<input type="hidden" name="id" value="<?=$_GET['id']; ?>">
<BR />
<input type="submit" value="Сохранить" />
</form>

<? return; } ?>

			 
<table class="table table-bordered table-hover" style="width:100%;">
<thead>
<tr>
<th><center>#ID</center></th>
<th><center>Заголовок</center></th>
<th><center>Действие</center></th>
</tr>
</thead>

<tbody>

<?
$sql = $pdo->Query("SELECT * FROM `tb_page` ORDER BY `id` DESC");
while($rows = $sql->Fetch()) {
$id = $rows['id'];
$title = $rows['title'];
?>

<tr>
<td><center><?=$id; ?></center></td>
<td><center><?=$title; ?></center></td>
<td>

<center>


<a href="/<?=$diradm; ?>/index.php?a=page&id=<?=$id; ?>" >Редактировать</a>




</center>
</td>
</tr>

<? } ?>

</tbody>
</table>
	