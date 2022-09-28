<?
$param['where']['banner_id'] = 12;
$param['where']['banner_status'] = 1;
$banner = $this->model_banner->find_one($param);
?>

<style>
.about_bg {
background-image: url(<?=get_image($banner['banner_image_path'],$banner['banner_image'])?>);
}
.paymenttext{
color: #000;
font-size: 50px;
font-weight: 600;
padding-top: 76px;
padding-bottom: 60px;
text-align: center;
}
</style>



<section class="breadcrumb_sec about_bg">

<div class="container">

<h1><?=$banner['banner_title']?></h1>

</div>

</section>

<section>
<div class="container">
<div class="row">

<div class="col-sm-8 col-md-10 div_center memArea">



<div class="row">

<div class="col-md-12">
<p   class="paymenttext">
Due to some error your card has been not charged.
</p>
</div>

</div>
</div>
</div>
</div>
</section>
