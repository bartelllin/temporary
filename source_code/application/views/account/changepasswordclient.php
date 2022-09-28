<section id="about_section" class="bdheight" style="background-image: url(<?=get_image($innerbanner[0]['inner_banner_image_path'],$innerbanner[0]['inner_banner_image'])?>); background-position:top center; background-repeat:no-repeat; background-size:cover;">
<div class="container">
<div class="row">
<div class="col-sm-8 col-md-5 div_center memArea">
<div class="section-title whitecolor text-center">
<h1 style="">Change your password</h1>
</div>
<div class="login-wrap tab-content" style="margin-top: 40px;">
<div class="login-form tab-pane fade in active" id="logIn">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="img text-center">
<!-- <a href="<?=g('base_url')?>">
<img src="<?=get_image($logo['logo_image_path'],$logo['logo_image'])?>">
</a>   -->                 
</div>                  
</div>

<div class="panel-body">
<h2 class="text-center" style="text-transform: uppercase;color:#000">Enter your new password</h2>
<form method="post" id="changePassword" action="">
<input type="hidden" name="id" value="<?=$_GET['id']?>">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input id="password" type="password" class="form-control" name="password" placeholder="New Password">
</div>

<div class="form-group pull-right">
<input class="btn btn-primary" type="submit" value="Change Now" id="submitPasswordforgot">
</div>
<div class="clearfix"></div>

</form>
</div>

</div>
</div>



</div>
</div>
</div>
</div>
</section>


<script type="text/javascript">
$(document).ready(function(){
$("#submitPasswordforgot").click(function(){
var data = jQuery("#changePassword").serialize();
var url = "<?=g('base_url')?>account/resetpasswordclient";
var response = AjaxRequest.formrequest(url, data) ;

if(response.status == 1)
{
AdminToastr.success(response.txt,'Success');
//window.location='<?=g('base_url')?>checkout';
//window.location='<?=g('base_url')?>';
}
else
{
AdminToastr.error(response.txt,'Error'); 
}
return false;
});
});
</script>