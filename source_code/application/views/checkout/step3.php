<style type="text/css">
.ebooks_bg {
background-image: url(<?=get_image($banner['banner_image_path'],$banner['banner_image'])?>);
}

.paymentPage {  }

.paymentPage .form-group {
    border: 0px solid #b8b7b7;
}

.paymentPage  .panel-heading {background: #5ab2e8;
    border: 0px solid #ddd;
    color: #fff;
    padding: 25px; }

.paymentPage a:hover, a:focus {
text-decoration: none;
color: #fff;
}

.paymentPage .panel-heading2
{background: #5ab2e8;
    border: 0px solid #ddd;
    color: #fff;
    padding: 10px;
}


</style>


<? $this->load->view('widgets/inner_banner'); ?>



<section id="about_section" class="bdheight">
<div class="container">
<div class="row">

<?php
if (!empty($cart_data)) {?>

<div class="col-sm-12 col-md-12 div_center paymentPage">

<div class="section-title whitecolor text-center">
<h2 style="color: white; font-family: -webkit-pictograph;">SHOPPING CART - PAYMENT</h2>
</div>

<div class="row">

<div class="col-md-6">
<? $this->load->view("checkout/summary"); ?>
</div>

<div class="col-md-6">


<div class="row cart-body">


<!--SHIPPING METHOD-->
<div class="panel panel-info">
<div class="panel-heading" style="font-family: -webkit-pictograph;">Merchant Information</div>
<div class="panel-body">
<div class="form-group">
<div class="col-md-12">

<div class="panel-group" id="panel-264546">



<div class="panel panel-default">
<div class="panel-heading2">
<a class="panel-title" data-toggle="collapse" data-parent="#panel-264546" href="#panel-element-838185">
PayPal :</a>
</div>
<div id="panel-element-838185" class="panel-collapse collapse in">
<!-- <div class="panel-body">
<a href="javascript:void(0);" class="paynow">
<img src="<?=g('images_root')?>paypal.png" class="img-responsive" style="width:220px;" >
</a>
</div> -->
</div>
</div>
</div>
<?php //debug($this->layout_data['config_info']['admin']['paypal']); ?>

<form id="payment_form_submit" style="text-align: center;" action="<?=$this->layout_data['config_info']['admin']['paypal']?>" method="post">


<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">

<input type="hidden" name="business" value="<?=$this->layout_data['config_info']['admin']['paypal_email']?>">
<input type="hidden" name="currency_code" value="USD">
<?php
$cart_data = $this->cart->contents();
$i=1;
foreach ($cart_data as $key => $value) {?>
<input type="hidden" name="item_name_<?=$i?>" value="<?=$value['name']?>">
<input type="hidden" name="amount_<?=$i?>" value="<?php echo $this->total_amount; ?>">
<input type="hidden" name="quantity_<?=$i?>" value="1">
<?php
$i++;
}
?>

<input name="paymentaction" value="sale" type="hidden">
<input type="hidden" value="<?=$custom?>" name="custom" id="paypal_custom">
<input type="hidden" value="<?=$success_url;?>" name="return" id="paypal_return">
<input type="hidden" value="<?=$notify_url;?>" name="notify_url" id="paypal_notify_url">
<input type="hidden" value="<?=$cancel_url;?>" name="cancel_return" id="paypal_cancel_return">


<button type="submit">
	<img src="<?=g('images_root')?>paypal.png" class="img-responsive" style="width:124px;" >
</button>
<div>

</div>

</form>  
</div>

</div>
</div>
</div>


</div>

</div>

</div>

</div>

<?
}else{?>

<section id="about_section">
<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="span6">
<h1 class="muted" id="text">You do not have any item in your shopping cart.</h1>
</div>


</div>
</div>

</div>
</section>


<?
}
?>
</div>
</div>
</section>



<script>

$(document).ready(function(){
$(".paynow").click(function(){
	alert('asdas');
$('#payment_form_submit').submit();
});
});

</script>