<?php $this->load->view('widgets/inner_banner'); ?>
<style type="text/css">
  .loginSec{
    padding:60px 15px;
  }
  .loginSec .form-control{
    height:45px;
    border-radius: 0;width: -webkit-border-radius:0;
    color: #333333 !important;
  }
  .loginSec button{
    border:0;
    height:45px;
    padding:10px 30px;
    background:#33b2ff;
    color:white;
    text-transform: uppercase;
  }
  .loginSec h2{
    margin:0 0 20px 0;
    text-transform: uppercase;
    color:#333;
    font-weight:500;
  }
</style>
<div class="loginSec">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Login</h2>
        <form method="post" id="FormLogin" action="">

        <div class="form-group"><label for="">Email</label>
          <input type="text" name="signup[signup_email]" class="form-control"></div>
        <div class="form-group"><label for="">Password</label>
          <input type="password" name="signup[signup_password]" class="form-control"></div>

          <a style="font-weight: bold; font-family: initial;" class="pull-right forget-password" href="<?=g('base_url')?>forgot-password">Forgot password?</a>
          <button type="submit" id="LoginSubmit">Login</button>
        </form>
      </div>
      <div class="col-md-6">
        <h2>Registration</h2>
        <!-- <form id="regiForm" method="post"> -->
          <form id="contactForm" method="POST">
          <div class="form-group"><label for="">First Name</label><input type="text" name="signup[signup_fname]" class="form-control"></div>
          <div class="form-group"><label for="">Last Name</label><input type="text" name="signup[signup_lname]" class="form-control"></div>
          <div class="form-group"><label for="">Email</label><input type="text" name="signup[signup_email]" class="form-control"></div>
          <div class="form-group"><label for="">Password</label><input type="password" name="signup[signup_password]" class="form-control"></div>
          <button id="inquirySubmit" type="button">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
$("#LoginSubmit").click(function(){
var data = jQuery("#FormLogin").serialize();
var url = "<?=g('base_url')?>account/do_login";
var response = AjaxRequest.formrequest(url, data) ;


if(response.status == 1)
{
AdminToastr.success(response.txt,'Success');
window.location='<?=g('base_url')?>';
}
else
{
AdminToastr.error(response.txt,'Error'); 
}
return false;
});
});
</script>

<script type="text/javascript">

$(document).ready(function(){

$("#inquirySubmit").click(function(e){

var data = $("#contactForm").serialize();
var url = "<?=g('base_url')?>account/save_signup";
response = AjaxRequest.formrequest(url, data);
if(response.status == 0){

    AdminToastr.error(response.txt,'Error');

}

else if(response.status == 1){

AdminToastr.success(response.txt,'Success');   

$('#contactForm').trigger("reset");
window.location="<?=g('base_url')?>";
// $(location).attr('href',window.location.href);



}

return false;

});



});

</script>
