
<div class="sliderSec">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<div class="item active">
<img src="<?=get_image($inner_banner['inner_banner_image_path'],$inner_banner['inner_banner_image'])?>" style="width:100%" class="img-responsive">
<div class="carousel-caption">
<div class="linebox">
<h5 class="pinkColor">SHOE BEVY</h5>
<h3><?=$productbycat[0]['category_name']?></h3>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="third shopSec">
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="head text-center">
<?=html_entity_decode($productcat_cms['cms_page_content'])?>
<p><?=$productcat_cms['cms_page_name']?></p>
</div>
</div>
</div>

<div class="row">

<?php
foreach ($productbycat as $key => $value) {
if ($key %4 == 0) {
echo '<div class="clearfix"></div>';
}
?>

<div class="col-md-3">
<div class="productbox">
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


