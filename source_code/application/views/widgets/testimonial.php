<!-- Testimonials section start -->
<?
// Get testimonials
$testimonials = $this->model_testimonial->get_testimonial();
if(array_filled($testimonials)){?>
<div class="clear"></div>

<div class="test-section">

<div class="container">

<div class="row">

<div class="test-heade">

<h3>Testimonial</h3>

<p>What people say about S2S INC.?</p>

</div>

<?
foreach($testimonials as $key => $value):?>
<div class="col-md-3 col-sm-6">

<div class="test-item">

<div class="desc">

<p><?=$value['testimonial_description']?></p>

<h4 class="author"><?=$value['testimonial_designation']?></h4>

</div>

<img src="<?=Links::img($value['testimonial_image_path'],$value['testimonial_image'])?>" alt="">

</div>

</div>
<? endforeach;
?>

</div>

</div>

</div>
<?}
?>
<!-- Testimonials section end -->