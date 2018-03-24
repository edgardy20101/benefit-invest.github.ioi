
        <section class="hero sub-header">
    <div class="container inactive">
        <div class="sh-title-wrapper">
            <h1>Регистрация</h1>
            
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



<?
$_OPTIMIZATION["title"] = "Регистрация";

if(isset($_SESSION['id'])) { ?> <script>  setTimeout( "location='/index.php?a=profile';", 0 ); </script> <? exit(); } ?>



<script type="text/javascript">
function register()
{	
$('#btn').disabled = true;
//Получаем параметры
var login = $("#login").val()
var mail = $("#mail").val()
var pass = $("#pass").val()
var rpass = $("#rpass").val()
var ref = $("#ref").val()

// Отсылаем паметры
$.ajax({
type: "POST",
url: "/ajax/reg.php",
data:"login="+login+"&mail="+mail+"&pass="+pass+"&rpass="+rpass+"&ref="+ref,
beforeSend: function(){
$("#dele"); },
success: function(rezult) {

$("#dele").empty();
$('#dele').fadeIn(2000).html(rezult);
$('#btn').disabled = false;


}
   });
}	
</script>

<center><div id="dele" class=""></div></center>
<form method="POST">

<div class="form-element">
<label>Придумайте логин</label><input name="login" id="login" style="width:97.5%;" type="text" maxlength="25" class="box" placeholder="Придумайте логин">
</div>


<div class="form-element">
<label>Придумайте пароль</label><input  name="pass" id="pass"  style="width:97.5%;" type="password" maxlength="25" class="box" placeholder="Придумайте пароль">
</div>


<div class="form-element">
<label>Повторите пароль</label><input name="rpass" id="rpass" style="width:97.5%;" type="password" maxlength="25" class="box" placeholder="Повторите пароль">
</div>

<div class="form-element">

<label>Введите E-mail</label><input name="mail" id="mail" style="width:97.5%;" type="text" maxlength="25" class="box" placeholder="Введите свой E-Mail">
</div>
</br>
<? if(isset($_COOKIE['referer'])){ $reff = (int)$_COOKIE['referer']; } else { $reff = 0; } ?>
<input type="hidden" name="ref" id="ref" value="<?=$reff; ?>">
<button type="button"  onclick="register();" name="submit" id="btns" style="width:100%;" name="submit" class="button large full-width brand-1" style="width: 100%;">Подтвердить регистрацию</button>
</form>
 <br />
<center><a href="/index.php?a=auth">Есть аккаунт? </a>   &nbsp;&nbsp; / &nbsp;&nbsp;  <a href="/index.php?a=forgot">Забыли пароль?</a></center>





	<BR /><BR /><BR /><BR /><BR />
			
    </div>
</section>
