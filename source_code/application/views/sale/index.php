<? $this->load->view('widgets/inner_banner'); ?>

<div class="third shopSec">
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="head text-center">
<h3><?=html_entity_decode($sale_cms['cms_page_content'])?></h3>
<?=$sale_cms['cms_page_name']?>
</div>
</div>
</div>
<div class="row">

<?php
foreach ($sale as $key => $value) {?>

<div class="col-md-3">
<div class="productbox">
<?php
if ($key% 2 == 0) {?>
<div class="ribbon ribbon-top-left"><span>sale</span></div>
<?
}else{?>
<div class="ribbon ribbon-top-right"><span>sale</span></div>
<?
}
?>

<div class="productimage">
<img src="<?=get_image($value['product_image_path'],$value['product_image'])?>" alt="" class="img-responsive activepimage">
<img src="<?=get_image($value['product_image_path'],$value['product_cover_image'])?>" alt="" class="img-responsive nonactivepimage">
</div>
<div class="productdetails">
<h5><a href="<?=g('base_url')?>product-detail/<?=$value['product_slug']?>"><?=$value['product_name']?></a></h5>
<h5><?=price($value['product_price'])?></h5>
<div class="cartlink">
<a href="<?=g('base_url')?>product-detail/<?=$value['product_slug']?>"><i class="fa fa-eye"></i> Read More</a>
<!-- <a href=""><i class="fa fa-eye"></i></a> -->
</div>
</div>
</div>
</div>

<?
}
?>

</div>

</div>
</div>