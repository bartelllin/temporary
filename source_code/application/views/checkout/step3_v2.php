<? $this->load->view("home/slider"); ?>

<div class="contentSec">


<div class="productSec">
<div class="container">
<div class="productHead text-left">
Payment Options 
</div>



</div>
</div>



<div class="container">


<div class="shipping-address">


<div class="col-md-6">




<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title">


<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
<div class="radio">
<label>
<img src="<?=g('images_root')?>botom-aerow.png" class="form-two-aerow">


<p>Pay with paypal
</p>
</label>
</div>


</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

<form id="payment_form_submit" action="<?=$this->layout_data['config_info']['admin']['paypal']?>" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">

<input type="hidden" name="business" value="<?=$this->layout_data['config_info']['admin']['paypal_email']?>">
<input type="hidden" name="currency_code" value="USD">

<?php
$cart_data = $this->cart->contents();
$i=1;
foreach ($cart_data as $key => $value) 
{
?>
<input type="hidden" name="item_name_<?=$i?>" value="<?=$value['name']?>">
<input type="hidden" name="amount_<?=$i?>" value="<?=number_format($value['price'],2)?>">
<input type="hidden" name="quantity_<?=$i?>" value="<?=$value["qty"]?>">
<?php
$i++;
}
?>
<input name="paymentaction" value="sale" type="hidden">
<input type="hidden" value="<?=$custom?>" name="custom" id="paypal_custom">
<input type="hidden" value="<?=$success_url;?>" name="return" id="paypal_return">
<input type="hidden" value="<?=$notify_url;?>" name="notify_url" id="paypal_notify_url">
<input type="hidden" value="<?=$cancel_url;?>" name="cancel_return" id="paypal_cancel_return">
<div >
<a href="javascript:void(0);" class="paynow">
<img src="<?=g('images_root')?>paynow.png">
</a>
</div>
</form> 

</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingTwo">
<h4 class="panel-title">


<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<div class="radio">
<label>
<img src="<?=g('images_root')?>botom-aerow.png" class="form-two-aerow">


<p>Pay with card (Payline)
</p>
</label>
</div>


</a>
</h4>
</div>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">


<ul>
<li><a href="#"><img src="<?=g('images_root')?>p5.png"></a></li>
<li><a href="#"><img src="<?=g('images_root')?>p2.png"></a></li>
<li><a href="#"><img src="<?=g('images_root')?>p3.png"></a></li>
<li><a href="#"><img src="<?=g('images_root')?>p4.png"></a></li>
<li><a href="#"><img src="<?=g('images_root')?>p1.png"></a></li>

</ul>


<form action="<?=g('base_url')?>checkout/payline_payment" id="cardForm" method="post">
<input type="hidden" name="order_id" value="<?=intval($_GET['oid'])?>">
<div class="form-group">
<label for="firstname">Card Holder <span class="require">*</span></label>
<input type="text" class="my-form-control" value="" id="firstname" name="card_name">
</div>
<div class="form-group">
<label for="lastname">Card No <span class="require">*</span></label>
<input type="text" class="my-form-control" value="" id="lastname" name="card_no">
</div>
<div class="form-group">
<label for="email">Card Expiry <span class="require">*</span></label>
<input type="text" class="my-form-control" value="" id="email" name="card_expiry">
</div>

<div class="form-group">

<input type="submit" value="Proceed" id="cardSubmit"  />
<a href="<?=g('base_url')?>checkout/invoice_preview?oid=<?=$_GET['oid']?>" style="color:#fff;">
&nbsp;
Order Preview</a>
</div>

</form>

</div>








<div class="col-md-12">
<h3 class="text-white">Billing address same as the shipping</h3>
<p class="text-white">
<?=$orderDetail['order_firstname']?>
</p>
<p class="text-white">Address:
	<?=$orderDetail['order_address1']?>
</p>
<p class="text-white">Phone: <?=$orderDetail['order_phone']?></p>


</div>


<div class="col-md-12">
<h3 class="text-white"> 	
<a href="<?=g('base_url')?>checkout/step2" style="color:#fff;">
Use A New Address
</a>
</h3>


<div class="clearfix"></div>


</div>
</div>



</div>
</div>

<? $this->load->view("checkout/summary"); ?>


</div>




<div class="clearfix"></div>





</div>


<?= $this->load->view("_layout/footer"); ?>

</div>

<!-- Footer Sec Ends Here -->


<script>

$(document).ready(function(){
$(".paynow").click(function(){
$('#payment_form_submit').submit();
});
});

</script>


<script type="text/javascript">

jQuery("#cardSubmit").click(function(){
var data = $("#cardForm").serialize();
var url = $("#cardForm").attr("action");
jQuery.ajax({
type: "POST",
url:  url,
data:  data,
dataType: "json",
success: function(response)
{
Loader.hide();
if(response.status == true){
	AdminToastr.success(response.message,'Success');
	window.location = response.url;
}
else{
AdminToastr.error(response.message,'Error');
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