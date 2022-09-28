<div class="clearfix"></div>
<div class="main">
<? $this->load->view("widgets/breadcrumb"); ?>

<section id="our-works">
<div class="container">
<div class="row">
<div class="col-md-8 center">
<div class="login_wrpr">
<div class="main-heading main-heading2"><h2>LOGIN</h2></div>
<div class="contact-information2">
<form method="post" action="" class="cp-form-box" id="FormLogin">
<div class="inner-holder">
<input placeholder="Email" type="text" name="signup[signup_email]">
</div>
<div class="inner-holder">
<input placeholder="Password" type="password" name="signup[signup_password]">
</div>
<div class="inner-holder">
<button class="checkout-button" style="width:100%;" id="LoginSubmit">LOGIN</button>
Are you a new user? <a href="<?=g('base_url')?>register" style="color: #000;">Register Now</a>
</div>
</form>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</section>
</div>


<script type="text/javascript">
$(document).ready(function(){
$("#LoginSubmit").click(function(){
var data = jQuery("#FormLogin").serialize();
var url = "<?=g('base_url')?>account/do_login";
var response = AjaxRequest.formrequest(url, data) ;


if(response.checkout == 1)
{
AdminToastr.success(response.txt,'Success');
//window.location='<?=g('base_url')?>checkout';
window.location='<?=g('base_url')?>';
}
else if(response.status == 1)
{
AdminToastr.success(response.txt,'Success');
window.location='<?=($this->session->userdata('checkout_referrer'))?$this->session->userdata('checkout_referrer'):g('base_url')?>';
}
else
{
AdminToastr.error(response.txt,'Error'); 
}
return false;
});
});
</script>