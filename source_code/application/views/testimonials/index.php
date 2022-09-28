<style>
.testimonials_bg {
background-image: url(<?=get_image($banner['banner_image_path'],$banner['banner_image'])?>);
}
</style>



<section class="breadcrumb_sec testimonials_bg">

<div class="container">

<h1><?=$banner['banner_title']?></h1>

</div>

</section>

<!-- breadcrumb_sec ends -->





<!-- testimonials_page starts -->

<section class="testimonials_page allinnerpage">



<div class="testimonals_sec">

<div class="container">


<?php
foreach ($testimonial as $key => $value) {
if ($key %2 == 0) {?>

<div class="testimonals_diver">

<div class="row">

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

<div class="testimonals_user">

<a href="javascript:void(0);"><img src="<?=get_image($value['testimonial_image_path'],$value['testimonial_image'])?>"></a>

</div>

</div>

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

<div class="testimonals_content">

<h4><a href="javascript:void(0);"><?=$value['testimonial_name']?></a></h4>

<h6><a href="javascript:void(0);"><?=$value['testimonial_designation']?></a></h6>
<p><?=html_entity_decode($value['testimonial_detail'])?></p>
<!-- <p>Just then her head struck against the roof of the hall: in fact she was now more than nine feet high, and she at once took up the little golden key and hurried off to the garden door. The first question of course was, how to get dry again: they had a consultation about this, and after a few minutes it seemed quite natural to Alice to find herself talking familiarly with them, as if she had known them all her life.</p> -->

</div>

</div>

</div>

</div>

<?
}else{?>

<div class="testimonals_diver">

<div class="row">

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

<div class="testimonals_content">

<h4><a href="javascript:void(0);"><?=$value['testimonial_name']?></a></h4>

<h6><a href="javascript:void(0);"><?=$value['testimonial_designation']?></a></h6>

<p><?=html_entity_decode($value['testimonial_detail'])?></p>
<!-- <p>Just then her head struck against the roof of the hall: in fact she was now more than nine feet high, and she at once took up the little golden key and hurried off to the garden door. The first question of course was, how to get dry again: they had a consultation about this, and after a few minutes it seemed quite natural to Alice to find herself talking familiarly with them, as if she had known them all her life.</p> -->

</div>

</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

<div class="testimonals_user">

<a href="javascript:void(0);"><img src="<?=get_image($value['testimonial_image_path'],$value['testimonial_image'])?>"></a>

</div>

</div>

</div>

</div>

<?
}
}
?>


</div>

<div class="clearfix"></div>

</div>





<div class="clearfix"></div>

</section>

<!-- testimonials_page ends -->






<? $this->load->view('widgets/qoute');?>
