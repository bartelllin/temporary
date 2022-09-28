



<!-- breadcrumb_sec starts -->

<section class="breadcrumb_sec ebooks_bg">

<div class="container">

<h1>Payment Option</h1>

</div>

</section>

<!-- breadcrumb_sec ends -->
<!-- ebooks_page starts -->

<section class="ebooks_page allinnerpage">

<div class="main_heading">

<div class="container">

<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to </p>

</div>

</div>

<div class="clearfix"></div>





<div class="scheckout-sec">
<div class="container payment-sec">

<div class="col-md-6 col-md-offset-3 ">

<!-- <img src="<?=g('base_url')?>assets/front_assets/images/paypal-button.png"> -->

<form id="payment_form_submit" style="text-align: center;" action="<?=$this->layout_data['config_info']['admin']['paypal']?>" method="post">


<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">

<input type="hidden" name="business" value="<?=$this->layout_data['config_info']['admin']['paypal_email']?>">
<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="item_name_1" value="Printing Card">
<input type="hidden" name="amount_1" value="<?=$paymentInfo['payment_price']?>">
<input type="hidden" name="quantity_1" value="1">

<input name="paymentaction" value="sale" type="hidden">
<input type="hidden" value="<?=$custom?>" name="custom" id="paypal_custom">
<input type="hidden" value="<?=$success_url;?>" name="return" id="paypal_return">
<input type="hidden" value="<?=$notify_url;?>" name="notify_url" id="paypal_notify_url">
<input type="hidden" value="<?=$cancel_url;?>" name="cancel_return" id="paypal_cancel_return">


<button type="submit">
	<img src="<?=g('images_root')?>paypal-button.png" class="img-responsive" >
</button>
<div>

</div>

</form>

</div>

</div>
</div>
<br>
<br>
<br>



<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="clearfix"></div>

</section>

<script>

$(document).ready(function(){
$(".paynow").click(function(){
	alert('asdas');
$('#payment_form_submit').submit();
});
});

</script>