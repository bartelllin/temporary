<? $this->load->view("home/slider"); ?>

<div class="contentSec">

<div class="productSec">
<div class="container">
<div class="productHead text-left">
Shipping Address
</div>



</div>
</div>


<div class="container">


<div class="shipping-address">


<div class="col-md-6">

<form action="<?=g('base_url')?>checkout/" id="submitStep2" method="post">



<div class="form-group">
<label for="exampleInputEmail1">Country</label>
<select class="form-control" name="order[order_country]">
<option value=""> --- Select Country --- </option>
<?php
foreach ($country as $key => $value) {
$country = 223;
?>
<option <?=($country == $value['id'] ? 'selected=""' : '')?> value="<?=$value['id']?>"> <?=$value['country']?> </option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label>First Name * </label>
<input type="text" class="form-control" value="<?=$userInfo['signup_firstname']?>" id="firstname" name="order[order_firstname]">
</div>

<div class="form-group">
<label>Last Name * </label>
<input type="text" class="form-control" value="<?=$userInfo['signup_lastname']?>" id="firstname" name="order[order_lastname]">
</div>

<div class="form-group">
<label for="exampleInputPassword1">Street Name and House Address *</label>
<input type="text" class="form-control" value="<?=$userInfo['signup_address1']?>" name="order[order_address1]">
</div>


<div class="form-group">
<label >Town / City *</label>
<input type="text" class="form-control" value="<?=$userInfo['signup_city']?>" name="order[order_city]">
</div>

<div class="form-group">
<label>Province / County / State</label>
<input type="text" class="form-control" name="order[order_state]">
</div>


<div class="form-group">
<label>Postcode</label>
<input type="text" class="form-control" name="order[order_zip]">
</div>


<div class="form-group">
<label>Telephone *</label>
<input type="text" class="form-control" value="<?=$userInfo['signup_telephone']?>" id="telephone" name="order[order_phone]">
</div>

<div class="form-group">
<label>Email *  (Your email will only be used for order & shipping notifications.)</label>
<input type="text" class="form-control" value="<?=$userInfo['signup_email']?>" id="email" name="order[order_email]">
</div>

<div class="form-group">
<label>Company</label>
<input type="text" class="form-control" value="<?=$userInfo['signup_company']?>" name="order[order_company]">
</div>


<?php
if($this->userid == 0){
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title">


<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
<div class="radio">
<label>
<img src="<?=g('images_root')?>botom-aerow.png" class="form-one-aerow">
<h2>Create An Account</h2>

<p>Save your information for future checkouts
</p>
</label>
</div>


</a>

</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" name="password">
</div>

<div class="form-group">
<label>Verify Password</label>
<input type="password" class="form-control" name="repassword">
</div>
</div>
</div>
</div>
</div>
<?php
}
?>


<button id="button-payment-address" type="submit" class="btn btn-default">Save And Continue </button>
</form>


<div class="clearfix"></div>





</div>




</div>

<? $this->load->view("checkout/summary"); ?>



<!-- Footer Sec Starts Here -->
<div class="footerSec">
<div class="container">
<div class="col-md-12">
<div class="linksDiv">
<ul class="smallLinks">
<li><a href="index.html">Home</a></li>
<li><a href="about.html">about us</a></li>
<li><a href="contact.html">contact us</a></li>
</ul>
</div>
</div>
<div class="col-md-4">
<a href="#"><img src="images/logo.png" alt="logo"/></a>
</div>
<div class="col-md-5">
<div class="linksSec">
<ul class="socialLinks">
<li><a href="#"></a></li>
<li><a href="#"></a></li>
</ul>
</div>
<div class="fooTxt"> terms of use  security policy and returns/exchange policy.</div>
<div class="copyrightTxt">Coco Sorisi &copy; 2016</div>
</div>
<div class="col-md-3"></div>
</div>
</div>
<!-- Footer Sec Ends Here -->


</div>
<!-- Footer Sec Starts Here -->
<?= $this->load->view("_layout/footer"); ?>
<!-- Footer Sec Ends Here -->
</div>


<script type="text/javascript">

jQuery("#button-payment-address").click(function(){
var data = $("#submitStep2").serialize();
var url = $("#submitStep2").attr("action");
jQuery.ajax({
type: "POST",
url:  "<?=g('base_url')?>checkout/save_order/",
data:  data,
dataType: "json",
success: function(response)
{
Loader.hide();
if(response.status == true){
window.location = response.txt;
}
else{
AdminToastr.error(response.txt,'Error');
}
},
beforeSend: function()
{
Loader.show();
}
});
return false;

});



</script>