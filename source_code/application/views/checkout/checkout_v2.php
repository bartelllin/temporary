
<? $this->load->view("home/slider"); ?>


<div class="contentSec">
<div class="productSec">
<div class="container">
<div class="productHead">Checkout - Shopping Cart</div>
<div class="productTxt">
</div>


</div>
</div>


<?php
if(count($cart_data)>0){
?>
<div class="container">


<div class="chexkout">

<div class="row"> <div class="col-md-2"><h3 class="item-heading text-center">ITEM</h3></div>
<div class="col-md-3"><h3 class="item-heading">DESCRIPTION</h3></div>
<div class="col-md-1"><h3 class="item-heading">COLOR</h3></div>
<div class="col-md-1"><h3 class="item-heading">SIZE</h3></div>
<div class="col-md-1"><h3 class="item-heading">QTY</h3></div>

<div class="col-md-2"><h3 class="item-heading">ACTIONS</h3></div>
<div class="col-md-2"><h3 class="item-heading text-center">PRICE</h3></div>
<div class="clearfix"></div></div>
<hr>



<?php
foreach ($cart_data as $key => $value) {
	$brand = $this->model_brand->find_by_pk($value['options']['product_brand_id']);
?>
<div class="row"> 

<div class="col-md-2">
<img src="<?=$value['options']['product_img']?>"></div>
<div class="col-md-3"><h3 class="item-heading"> 	
<a href="<?=$value['options']['product_slug']?>">
<?=$value['name']?></a>
<a href="<?=g('base_url')?>brands/<?=$brand['brand_slug']?>">
<?=$brand['brand_name']?></a>
</h3></div>
<div class="col-md-1"><h3 class="item-heading"><?=$value['options']['product_color']?></h3></div>
<div class="col-md-1"><h3 class="item-heading"><?=$value['options']['product_size']?></h3></div>
<div class="col-md-1" id="normalQty"><h3 class="item-heading"><?=$value['qty']?></h3></div>

<div class="col-md-1" id="editQty" style="display: none;">
<input type="text" name="qty" id="qtyVal" value="<?=$value['qty']?>" style="margin-top: 18px;
    text-align: center;
    width: 97%;">
<button value="Update" onclick="updateCart('<?=$key?>')" name="Update" style=" margin-left: -1px;">Update</button>
</h3></div>

<div class="col-md-2"><h3 class="item-heading">


<a href="javascript:void(0);" onclick="editcart()">Edit</a>

<a href="<?=g('base_url')?>checkout/delete/<?=$key?>">Remove</a>

</h3></div>
<div class="col-md-2">
<h3 class="item-heading text-center"><?=price($value['price'])?></h3>
<br/><del style="color: red;"><h3 class="item-heading text-center"><?=price($value['options']['product_label_price'])?></h3></del>
</div>
<div class="clearfix"></div>
</div>
<hr>
<?php
}
?>


</div>


<div class="clearfix"></div>


<div class="col-md-6">
<div class="paypal-sec">
<a href="<?=g("base_url")?>products"> &lt; CONTINUE SHOPPING</a> 

<img src="<?=g('images_root')?>paynow.png" style="width: 49%;">






</div>




</div>



<div class="col-md-6">
<div class="col-md-12"><div class="paypal-sec-text">
<div class="row">   <div class="col-md-8"><h3 class="item-heading2">SUBTOTAL</h3></div>
<div class="col-md-4"><h3 class="item-heading2 text-right"><?=price($this->cart->total())?></h3></div> 
<div class="col-md-8"><h3 class="item-heading2">ESTIMATED SHIPPING</h3> </div>
<div class="col-md-4"><h3 class="item-heading2 text-right">Free</h3></div> </div>
<div class="clearfix"></div>
<hr>

<div class="row">   <div class="col-md-8"><h3 class="item-heading2">ESTIMATED TOTAL</h3></div>
<div class="col-md-4"><h3 class="item-heading2 text-right"><?=price($this->cart->total())?></h3></div> 
<div class="col-md-8"><h3 class="item-heading2"></h3> </div>

</div>


<div class="clearfix"></div>


<div class="clearfix"></div>


<div class="row">   <div class="col-md-12"><button type="button" class="btn-checkout checkoutbutton">PROCEED TO CHECKOUT</button></div></div>

<div class="clearfix"></div>

</div>



</div>




</div>




</div>
<?php
}
else{
?>
<div style="color: #fff;">You do not have any item(s) in your shopping cart.</div>
<?php
}
?>

<?= $this->load->view("_layout/footer"); ?>

</div>


<script type="text/javascript">

function editcart(){
	$("#normalQty").hide();
	$("#editQty").show();	
}

function updateCart(id){
	var qty = $("#qtyVal").val();
	$.ajax({
    type: "POST",
    url: "<?=g('base_url')?>checkout/update_qty",
    data:  "id="+id+"&qty="+qty,
    dataType: "json",

    success: function(response)
    {      
      if(response.status == 1){
      	window.location = '<?=g("base_url")?>checkout';
      }
    },
    beforeSend: function()
    {
      //$("#loading-sp").show();
    }
    });
    return false; 
}

$(document).ready(function(){
$(".checkoutbutton").click(function(){
window.location = '<?=g("base_url")?>checkout/step2';
});
$(".checkoutbuttonLogin").click(function(){
window.location = '<?=g("base_url")?>register';
});
$(".continue").click(function(){
window.location = '<?=g("base_url")?>products';
});
});
</script>