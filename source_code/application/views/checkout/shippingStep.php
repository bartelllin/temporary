<?php
$ounces = 0;
$pound = 0;
foreach ($cart_data as $key => $value) {
$ounces += ($value['options']['product_ounces']*$value['qty']);
$pound += ($value['options']['product_pound']*$value['qty']);
}
?>
<div class="contentSec privacyPage">
<div class="container">
<div class="col-md-12">
<div class="secHead">
<?=$title?>
</div>
</div>
<div class="col-md-7">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
<div class="secHead" style="font-size:25px;">
Calculate Shipping
</div>

</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">

<form action="" method="post" id="shipping-zip-form">
<input type="hidden" name="originZip" value="59759">
<input type="hidden" name="ounces" value="<?=$ounces?>">
<input type="hidden" name="pound" value="<?=$pound?>">
<input type="hidden" name="grandTotal" id="grandTotal" value="<?=$this->cart->total()?>">
<div class="form-wrap">
<div class="form-group">
<input type="text" placeholder="Post Code" id="postcode" name="destination">
</div>
<button id="submitShip" class="highlight-button btn btn-very-small no-margin pull-left">Get Methods</button>
</div>
</form>
<div id="shipData" style="display:none;"></div>

</div>
</div>
</div>
</div>

</div>

<? $this->load->view("checkout/summary"); ?>

<div class="col-md-12">
<input type="submit" value="Proceed to Payment" style="background-color: transparent;
    border: 1px solid #f15d29;
    color: #f15d29;
    font-size: 20px;
    height: 40px;
    margin: 10px 0;
    width: 100%;" class="proceedshipmentbtn" />
</div>

</div>
</div>

<script>

$(document).ready(function(){
$(".paynow").click(function(){
$('#payment_form_submit').submit();
});
});

jQuery("#submitShip").click(function(){
var data = jQuery("#shipping-zip-form").serialize();

jQuery.ajax({
type: "POST",
url: "<?=g('base_url')?>checkout/get_usps",
data:  data,
dataType: "html",
success: function(msg)
{    
Loader.hide();
jQuery("#shipData").show();
jQuery("#shipData").html(msg);
//
//if(msg.status == 1){
//  notification_popup('success','Success','Your shopping cart has been updated.');
//  location.reload();
//}
//else
//  notification_popup('error','Error','Please try again.');         
},
beforeSend: function()
{
Loader.show();
}
});
return false;   
});


$(".proceedshipmentbtn").click(function(){
jQuery.ajax({
type: "POST",
url: "<?=g('base_url')?>checkout/check_shipment_set",
data:  "oid=<?=$_GET['oid']?>",
dataType: "json",
success: function(msg)
{    
Loader.hide();
if(msg.status == 1){
  AdminToastr.success('Your shopping cart has been updated.','Error');	
  window.location = msg.txt;
}
else
  AdminToastr.error('Please select the shipment method.','Error');	
},
beforeSend: function()
{
Loader.show();
}
});
return false;  
});
</script>

