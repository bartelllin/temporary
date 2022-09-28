<style type="text/css">
  .login-form input {
    height: 55px;
    line-height: 55px;
    margin-bottom: 20px;
    background: #f2f2f2;
    border: #f2f2f2;
}
</style>
<?php $this->load->view('widgets/inner_banner'); ?>
<!-- Main Content Start -->
<div class="cp-main-content"> 
<!-- Up Coming Events Start -->
<section class="team-sec">
<div class="container">

<!-- <section class="register-main">
<div class="container">
<div class="row">
<div class="col-sm-8 col-md-5 col-md-offset-3 div_center memArea">
<div class="login-wrap tab-content" style="margin-top: 40px;">
<div class="login-form tab-pane fade active in" id="logIn">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="img text-center">
<a href="#">

</a>                   
</div>                  
</div>


<div class="panel-body">
<h2 class="text-center" style="text-transform: uppercase;color: black; font-size: 22px;">Forgot Password</h2>
<form method="post" id="FormLogin" action="">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="email" type="text" class="form-control" name="signup[signup_email]" placeholder="Enter your email">
</div>


<div class="form-group pull-right"></div>
<div class="clearfix"></div>
<div class="sign-call text-center">



<input style="background: #da3038;" class="btn btn-primary signup_btn" id="submitQuery" type="button" value="Submit">


</div>
</form>
</div>

</div>
</div>






</div>
</div>
</div>
</div>
</section> -->


<section class="loginlogout-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-10 col-xs-12">
          <div class="login-form">
          	<h2 class="text-center" style="text-transform: uppercase;color: black; font-size: 22px;">Forgot Password</h2>
         <form method="post" id="FormLogin" action="">

            <div class="form-group">
              <!-- <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email:</label> -->
              <div class="col-md-6 col-md-offset-3">
                <input type="text" placeholder="Email" name="signup[signup_email]" class="form-control" id="email">
                <!-- <a class="pull-right forget-password" href="<?=g('base_url')?>forgot-password">Forgot password?</a> -->
              </div>
            </div>


            <div class="form-group">
              <!-- <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email:</label> -->
              <div class="col-md-6 col-md-offset-3">
           <button class="btn btn-success btn-lg" id="submitQuery" style="width: 100%; background: #da3038;">Submit</button>
                </div>
            </div>
            
            <!-- <div class="form-group"> 
              <div class="col-sm-10 col-sm-10 col-xs-12">
                <div class="checkbox">
                 
                  <label> <input type="checkbox"> Remember me</label>
                </div>
              </div>
            </div> -->
            <!-- <div class="form-group"> 
              <div class="col-md-12 col-sm-10 col-xs-12">
                <a href="">Log in</a>
                <input style="background: #da3038;" class="btn btn-primary signup_btn" id="submitQuery" type="button" value="Submit">
              </div>
            </div> -->
        </form>
        </div>
      </div>
    </div>
  </div>
  </section>





</div>
</section>
</div>
<!-- Main Content End --> 

<script type="text/javascript">
$(document).ready(function(){

$("#submitQuery").click(function(){
var data = $("#FormLogin").serialize();
var url = "<?=g('base_url')?>account/ForgotPasswordEmail";
var response = AjaxRequest.formrequest(url, data) ;

if(response.status == 1)
{
AdminToastr.success(response.txt,'Success');
//window.location='<?=g('base_url')?>checkout';

setTimeout(function(){

window.location='<?=g('base_url')?>';
},2000)

//$("#tab2").hide();
//$("#tab3").show();

//$("#active2").removeClass('active');
//$("#active3").addClass('active');
}
else
{
AdminToastr.error(response.txt,'Error'); 
}      
return false;
});	
});
</script>



