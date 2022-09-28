<? $this->load->view("widgets/breadcrumb"); ?>

<section id="our-works">
<div class="container">


<?php
if(count($cart_data) > 0){
?>
<div class="row">
<div class="col-xs-12">
<table class="shop_table" cellspacing="0">
<thead>
<tr>
<th class="product-thumbnail hidden-xs"></th>
<th class="product-name">Product</th>
<th class="product-price">Price</th>
<th class="product-quantity">Quantity</th>
<th class="product-subtotal">Total</th>
<th class="product-remove"></th>
</tr>
</thead>
<tbody>

<?php
foreach ($cart_data as $key => $value) {
?>
<tr class="cart_item">
<td class="product-thumbnail hidden-xs">
<a href="<?=$value['options']['product_slug']?>"><img src="<?=$value['options']['product_img']?>" class="img-responsive" alt=""></a>
</td>
<td class="product-name">
<a href="<?=$value['options']['product_slug']?>"><?=$value['name']?></a>
<br/>
SKU: <?=$value['options']['product_sku']?>
</td>
<td class="product-price">
<span><?=price($value['price'])?></span>
</td>
<td class="product-quantity">
<div class="quantity">
<input type="number" step="1" min="0" max="200" id="qtyVal" name="" value="<?=$value['qty']?>" title="Qty" class="input-text qty text" size="4">
</div>
</td>
<td class="product-subtotal">
<span class="amount"><span class="woocommerce-Price-currencySymbol"></span><?=price($value['price']*$value['qty'])?></span>
</td>
<td class="product-remove" style="text-align:center;">
<a href="<?=g('base_url')?>checkout/delete/<?=$key?>" class="remove" title="Remove this item"><i class="fa fa-close"></i></a>
|
<a href="javascript:void(0);" onclick="updateCart('<?=$key?>')"  class="remove" title="Edit quantity this item"><i class="fa fa-edit"></i></a>
</td>
</tr>
<?php
}
?>

</tbody>
</table>
</div>

<div class="col-sm-6 col-md-6 col-xs-12">
<!--div class="coupon">
<h4>Coupon</h4>
<p>Enter your coupon code if you have one.</p>
<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
<input type="submit" class="checkout-button" name="apply_coupon" value="Apply Coupon">
</div-->
</div>
<div class="col-sm-6 col-md-6 col-xs-12">
<div class="cart_totals ">
<h4>Cart Totals</h4>
<table cellspacing="0">
<tbody>
<tr class="cart-subtotal">
<td align="left">Subtotal</td>
<td><span><?=price($this->cart->total())?></span></td>
</tr>
<!--tr class="shipping">
<td align="left">Shipping</td>
<td>
<span><?=price($this->cart->total())?></span> 
</td>
</tr-->
<tr class="order-total">
<th><strong>Total</strong></th>
<td>
<strong> <span><?=price($this->cart->total())?> </span> </strong>
</td>
</tr>
</tbody>
</table>
<div class="proceed-to-checkout">
<a href="checkout.html" class="checkout-button checkoutbutton">Proceed to Checkout</a>
</div>
</div>
</div>
</div>

<?php
}
else{
echo "You do not have any item in your shopping cart.";
}
?>

</div>
</section>


