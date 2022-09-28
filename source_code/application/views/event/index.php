<? $this->load->view('widgets/inner_banner'); ?>

<div class="container">
<br><br>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="head text-center">
<h3><?=html_entity_decode($event_cms['cms_page_content'])?></h3>
<?=html_entity_decode($event_cms['cms_page_name'])?>

</div>
</div>
</div>

<div class="five">
<?php
foreach ($events as $key => $value) {
if ($key%2 == 0) {
echo '<div class="clearfix"></div></br>';
}
?>

<div class="col-md-6">
<div class="row fiveRow">
<div class="col-md-6">
<div class="">
<img src="<?=get_image($value['event_image_path'],$value['event_image'])?>" alt="" class="img-responsive" style="width:100%;">
<div class="fiveimageOverlay">
<div class="fiveimageDetails">
<h5><?=$value['event_title']?></h5>
<h5><?=price($value['event_price'])?></h5>
<div class="cartlink">
<!-- <a href="<?=g('base_url')?>product-detail/<?=$value['event_slug']?>"><i class="fa fa-eye"></i> Read More</a> -->
<!-- <a href=""><i class="fa fa-eye"></i></a> -->
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="fiveDetails">
<h3><?=$value['event_title']?></h3>
<?=html_entity_decode($value['event_detail'])?>

<!-- <ul class="list-unstyled">
<li><strong>Colors:</strong>  Black, Red, Blue,Pink</li>
<li><strong>Details:</strong>  high heels, flat, Longer front and back</li>
<li><strong>Size and Fit:</strong> Loose fit, True to size</li>
</ul> -->
</div>
</div>
</div>
</div>

<?
}
?>



<div class="clearfix"></div>
</div>
<div class="clearfix"></div>

</div>
