<?
$_OPTIMIZATION["title"] = "Личный кабинет";
if(isset($_SESSION['id'])) { ?> <script>  setTimeout( "location='/index.php?a=profile';", 0 ); </script> <? exit(); } ?>




        <section class="hero sub-header">
    <div class="container inactive">
        <div class="sh-title-wrapper">
            <h1>Авторизация</h1>
            <p>Авторизация на проекте через специальную форму фхода.</p>
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




<script type="text/javascript">
function login()
{	
$('#btn').disabled = true;
//Получаем параметры
var log = $("#log").val()
var passw = $("#passw").val()

$('#btn').disabled = true;
// Отсылаем паметры
$.ajax({
type: "POST",
url: "../ajax/auth.php",
data:"log="+log+"&passw="+passw,
beforeSend: function(){
$("#deles"); },
success: function(rezult) {

$("#deles").empty();
$('#deles').fadeIn(2000).html(rezult);
btn.disabled = false;


}
   });
}	
</script>	
<center><div id="deles" class=""></div></center>
<form method="POST">




												<div class="form-element">
                                                  Логин:<input name="log" id="log" style="width:97.5%;" type="text" maxlength="25" class="box" placeholder="Введите свой логин">
                                                               <label>Введите свой логин</label>
                                                </div>



												<div class="form-element">
                                                     Пароль:<input  name="passw" id="passw"  style="width:97.5%;" type="password" maxlength="25" class="box" placeholder="Введите свой пароль">
                                                               <label>Введите свой пароль</label>
                                                </div>
												<BR />





<button type="button"  onclick="login();" name="submit" id="btns" style="width:100%;" name="submit" class="button large full-width brand-1" style="width: 100%;">Подтвердить вход</button>
</form>
 <br />
<center><a href="/index.php?a=reg">Нет аккаунта? </a>   &nbsp;&nbsp; / &nbsp;&nbsp;  <a href="/index.php?a=forgot">Забыли пароль?</a></center>










	<BR /><BR /><BR /><BR /><BR />
			
    </div>
</section>?
