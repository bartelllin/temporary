<style type="text/css">
  a{
  font-family: initial;
}
</style>
<? $this->load->view('widgets/inner_banner'); ?>

<div class="clearfix"></div>
<div class="main">
<? $this->load->view("widgets/breadcrumb"); ?>
<div class="contentSec">
<div class="contactSec">
<div class="container">

<!--Signup-->
<div class="signup myfont">

<div class="container" id='goTo'>
        
        <br><br>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <? $this->load->view("account/menu"); ?>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            
            <div class="content-page" style="float: left;">
              <h3 style="color:#000;float: left;">My Account</h3>
                <br/>
                <a style="color:#000;float: left;" href="<?=g('base_url')?>my-account/info#goTo">
                Edit your account information</a><br/>
                <a style="color:#000;float: left;" href="<?=g('base_url')?>my-account/change-password#goTo">Change your password</a><br/>
              
              

              <h3  style="color:#000;float: left;">My Orders</h3><br/>
              <a style="color:#000;float: left;" href="<?=g('base_url')?>my-account/order-history#goTo">View your order history</a><br/>
              <!-- <a style="color:#000;float: left;" href="<?=g('base_url')?>my-account/my-wishlist">View your wishlist</a> --><br/>
                      <br/>        
            
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
<!--Signup-->

<script type="text/javascript">
$(document).ready(function () {	
	
});
</script>