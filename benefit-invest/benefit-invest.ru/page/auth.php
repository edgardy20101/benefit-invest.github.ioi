<?
$_OPTIMIZATION["title"] = "������ �������";
if(isset($_SESSION['id'])) { ?> <script>  setTimeout( "location='/index.php?a=profile';", 0 ); </script> <? exit(); } ?>




        <section class="hero sub-header">
    <div class="container inactive">
        <div class="sh-title-wrapper">
            <h1>�����������</h1>
            <p>����������� �� ������� ����� ����������� ����� �����.</p>
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
//�������� ���������
var log = $("#log").val()
var passw = $("#passw").val()

$('#btn').disabled = true;
// �������� �������
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
                                                  �����:<input name="log" id="log" style="width:97.5%;" type="text" maxlength="25" class="box" placeholder="������� ���� �����">
                                                               <label>������� ���� �����</label>
                                                </div>



												<div class="form-element">
                                                     ������:<input  name="passw" id="passw"  style="width:97.5%;" type="password" maxlength="25" class="box" placeholder="������� ���� ������">
                                                               <label>������� ���� ������</label>
                                                </div>
												<BR />





<button type="button"  onclick="login();" name="submit" id="btns" style="width:100%;" name="submit" class="button large full-width brand-1" style="width: 100%;">����������� ����</button>
</form>
 <br />
<center><a href="/index.php?a=reg">��� ��������? </a>   &nbsp;&nbsp; / &nbsp;&nbsp;  <a href="/index.php?a=forgot">������ ������?</a></center>










	<BR /><BR /><BR /><BR /><BR />
			
    </div>
</section>?
