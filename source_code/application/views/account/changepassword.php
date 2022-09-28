<style type="text/css">
  .contentSec a {
    color:#F15D29;
  }
</style>
<style type="text/css">
  .form-control, input[type="text"], input[type="submit"], textarea {
    font-family: "Raleway",sans-serif;
    margin: 6px;    
}
.form-control {
    background-color: #ffffff;
    background-image: none;
    border: 1px solid #cccccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555555;
    display: block;
    font-size: 14px;
    height: 45px;
    line-height: 1.42857;
    margin-bottom: 10px;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    vertical-align: middle;
    width: 100%;
}
.contactSec input[type="submit"] {
    background-color: #e80d16;
    
    
    border-style: solid;
    border-width: 2px;
    float: left;
    font-size: 20px;
    font-weight: 600;
    padding: 4px 19px;
}

.about_bg {
background-image: url(<?=get_image($banner['banner_image_path'],$banner['banner_image'])?>);
}

a{
  font-family: initial;
}

</style>

<? $this->load->view('widgets/inner_banner'); ?>

<? $this->load->view("widgets/breadcrumb"); ?>
<div class="faqss container">


<section class="register-main">
<div class="container">

<div class="clearfix"></div>
<div class="main">

<div class="contentSec">
<div class="contactSec">
<div class="container">

<!--login-banner-->

<div class="signup myfont">

<div class="container" id='goTo'>
       <br/>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <? $this->load->view("account/menu"); ?>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            
            <div class="content-page">
              
            	<div class="row">
<form action="<?=g('base_url')?>account/update_password" method="post" id="saveForm">
<div class="col-lg-6 col-md-6 col-sm-6">
<input type="password" name="password" class="form-control my-form-control my-margin-bottom-15" value="" placeholder="Enter Your New Password *">
<input type="submit" class="btn btn-default" value="Update Now" id="submitInfo" style=";color:#fff;">
</div>


</form>
</div>

            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>

</div>

</div>
</div>
</div>
</div>


</div>
</section>
</div>

<!--Signup-->

<script type="text/javascript">
$(document).ready(function () {	
	$("#submitInfo").click(function(){
	var data = $("#saveForm").serialize();
	var url = $("#saveForm").attr("action");
	AjaxRequest.fire(url, data) ;
	//window.location = '<?=g("base_url")?>';
	return false;
	});
});
</script>