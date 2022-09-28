<? $this->load->view("widgets/inner_banner"); ?>


<? $this->load->view("widgets/breadcrumb"); ?>
</br></br>
<div class="faqss container">

<section class="register-main">
<div class="container">
<div class="signup">

<div class="container" id='goTo'>

<!-- BEGIN SIDEBAR & CONTENT -->
<div class="row margin-bottom-40">
<!-- BEGIN SIDEBAR -->
<? $this->load->view("account/menu"); ?>
<!-- END SIDEBAR -->

<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-7">

<div class="content-page">

<div class="row">
<div class="portlet grey-cascade box">
<div class="portlet-body">
<div class="table-responsive">
<?php
if(count($wishlist) > 0){
?>
<table class="table table-hover table-bordered table-striped">
<thead>
<tr>
<th>Product</th>
<th>Image</th>
<th>Price</th>
<th></th>
</tr>
</thead>
<tbody>
<?php
foreach ($wishlist as $key => $value) {
$productId = $this->model_product->get_product_by_id($value['wishlist_product_id']);
?>
<tr>
<td>
<a href="<?=g('base_url')?>product-detail/<?=$productId['product_slug']?>">
<?=$productId['product_name']?> </a>
</td>
<td id="cart_image_container_<?=$value['product_id']?>">
<img width="90" height="90" src="<?=Links::img($productId['product_image_path'],$productId['product_cover_image'])?>">
</td>
<td>
<?=price($productId['product_price'])?>   
</td>

<td>
<input type="hidden" name="qty" id="qty_<?=$productId['product_id']?>" value="1"> 
<a href="javascript:void(0)" data-wishlist="1" data-productid="<?=$productId['product_id']?>" data-qty="1" class="btn-cart2" >
Add to Cart 
</a>
</td>


</tr>
<?php
}
?>
</tbody>
</table>
<?php
}
else{
echo "0 item(s) found";
}
?>
</div>
</div>
</div>
</div>

</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END SIDEBAR & CONTENT -->
</div>

</div>
<!--Signup-->

</div>
</section>
</div>


<script type="text/javascript">
$(".btn-cart2").click(function(){
var wishlist = $(this).attr('data-wishlist');
var productid = $(this).attr('data-productid');
var qtyID = $(this).attr('data-qty');
var size = $("#size").val();

if(qtyID == 0){
AdminToastr.error('Please select the quantity.','Error');
return false;
}
/*
if(size == ''){
AdminToastr.error('Please select the size.','Error');
return false;
}*/

var site_url = "<?=g('base_url')?>";
$.ajax({
type: "POST",
url: site_url+"checkout/add_cart",
data:  "product_id="+productid+"&product_qty="+qtyID+"&wishlist="+wishlist+"&size="+size,
dataType: "json",
success: function(msg)
{
Loader.hide();

if(msg.status == true){
AdminToastr.success('Your item has been added into shopping cart.','Success');  
$(".total_items").html(msg.total_items);
//$("#item_count").html("$"+msg.total);
}
else{
AdminToastr.error('You can not add this product because price is not set yet.','Error');
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

