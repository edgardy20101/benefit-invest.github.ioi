<?
$_OPTIMIZATION["title"] = "Восстановление пароля";
?>

        <section class="hero sub-header">
    <div class="container inactive">
        <div class="sh-title-wrapper">
            <h1>Востановление пароля</h1>
            <p>Новый пароль будет выслан на ваш e-mail.</p>
        </div>
    </div>
</section>
        <!-- Breadcrumb -->

        <nav class="breadcrumb">
    <div class="container">

    </div>
</nav>
        <!-- Main Content -->
        
<section class="section primary welcome inactive" id="s-welcome">
    <div class="container">

                                    
									<div class="row">
									<div class="span-3"></div>
		                                <div class="span-6">

		<center>
			
					
<div id="del" class="err"></div>
<div style="width:500px;">
<form action="" method="post">

<div class="form-element">

EMail:<br><input  size="60" class="box" type="text" id="meil" name="meil" placeholder="Введите E-Mail"><div style="clear:both;"></div><br />

                                                              <label>Введите свой EMail</label>
                                                </div>
<input  value="Продолжить" type="button" onclick="vost();" id="dis" class="button large full-width brand-1" style="cursor:pointer; height: 34px; width:300px; margin: 0px; padding: 0px 20px; font-size: 14px; color: #FFF; text-transform: uppercase; border: medium none;
border-radius: 3px; float:left;">
</form>
<div style="float:right;"><a href="/?a=auth">Вход на сайт</a></div>
</div>
</center>

<br /><br /><br /><br />


	<BR /><BR /><BR /><BR /><BR />
			
    </div>
</section>?
					
<script>
function vost()
{
$('#btn').disabled = true;
//Получаем параметры
var meil = $("#meil").val()

console.log(meil);
// Отсылаем паметры
$.ajax({
type: "POST",
url: "../ajax/rem.php",
data:"&meil="+meil,
beforeSend: function(){
$("#dele"); },
success: function(rezult) {

$("#del").empty();
$('#del').fadeIn(2000).html(rezult);
//$("#del").fadeOut(2000);
//btn.disabled = false;


}
   });
}
</script>



