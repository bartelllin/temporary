
<!--REVIEW ORDER-->
<div class="panel panel-info" style="border:1px solid #ddd;">
<div class="panel-heading" style="font-family: -webkit-pictograph;">
Review Order
<div class="pull-right"><small>
<a style="color:#fff; font-family: -webkit-pictograph;" class="afix-1" href="<?=g('base_url')?>products">Continue Shopping</a></small></div>
</div>
<div class="panel-body">

<?php
foreach ($cart_data as $key => $value) {
?>
<div class="row">
<div class="form-group">
<div class="col-sm-3 col-xs-3">
<a href="<?=$value['options']['product_slug']?>">
<img class="img-responsive" src="<?=$value['options']['product_img']?>" /></a>
</div>
<div class="col-sm-6 col-xs-6">
<div class="col-xs-12" style="font-family: -webkit-pictograph;"><?=$value['name']?></div>

<div class="col-xs-12"><small style="font-family: -webkit-pictograph;">Quantity:</small></div>
</div>
<div class="col-sm-3 col-xs-3 text-right">
<h6><span style="font-family: -webkit-pictograph;"><?=price($value['price'])?></span></h6>
<!-- <h6><span><?=$value['options']['product_sku']?></span></h6> -->
<h6><span style="font-family: -webkit-pictograph;"><?=$value['qty']?></span></h6>
</div>
</div>
</div>
<hr>
<?php
}
?>

<div class="form-group"><hr /></div>

<div class="form-group"><hr /></div>
<div class="form-group">
<div class="col-xs-12">
<strong style="font-family: -webkit-pictograph;">Subtotal</strong>
<div class="pull-right"><span style="font-family: -webkit-pictograph;"><?=price($this->cart->total())?></span></div>
</div>
</div>

<div class="form-group">
<div class="col-xs-12">
<strong style="font-family: -webkit-pictograph;">
	<?=$this->session->userdata()['coupon']['coupon_discount']?>% Discount Applied
</strong>
<div class="pull-right" style="font-family: -webkit-pictograph;"><span><?=price($this->coupon_discount)?></span></div>
</div>
</div>


<div class="form-group"><hr /></div>
<div class="form-group">
<div class="col-xs-12">
<strong style="font-family: -webkit-pictograph;">Order Total</strong>
<div class="pull-right"><span style="font-family: -webkit-pictograph;">
	<?=price($this->total_amount)?></span></div>
</div>
</div>
</div>
</div>
<!--REVIEW ORDER END-->
