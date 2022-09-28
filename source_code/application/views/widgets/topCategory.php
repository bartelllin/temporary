<div class="container">
<div class="top-tab">
<h1>top category</h1>
</div>

<?php 
$param['limit'] = 5;
$categories = $this->model_category->find_all_active($param); ?>
<div class="row">
  <div class="col-md-12">
      <div class="appoint">
          <ul class="nav nav-tabs" role="tablist">

          <?php foreach ($categories as $key => $cvalue){ ?>  
          <li role="presentation" data-class="<?=$cvalue['category_slug']?>" class="<?=($key == 0)? 'active':'';?>">
            <a href="#<?=$cvalue['category_slug']?>" aria-controls="<?=$cvalue['category_slug']?>" role="tab" data-toggle="tab">
              <?=$cvalue['category_name']?></a>
          </li>
          <?php } ?>

          </ul>
      </div>
  </div>
</div>


 <?php 

 foreach ($categories as $key => $cvalue){ 


//$param2['limit'] = 12;
 // $product = $this->model_product->find_all_active($param2);
 $products = $this->db->query("

SELECT * FROM sb_product p 
inner join sb_category cat ON cat.category_id = p.product_category_id
WHERE cat.category_slug = ? AND p.product_status = 1
ORDER BY p.product_id DESC
LIMIT 12",array($cvalue['category_slug']));

$products = $products->result_array();

//debug($products);
 ?> 
<div class="tab-content">
<div role="tabpanel" class="tab-pane  <?=($key == 0)? 'fade  in active':'';?>" id="<?=$cvalue['category_slug']?>">
<div class="main-AT-this">
<div class="row">


<?
foreach ($products as $key => $value) {

  if($value['product_category_id'] == $cvalue['category_id'])
  {

    if($key%4==0){ ?> 

  <div class="clearfix"></div>
  <br>
 <?php } ?>

<div class="col-md-3 col-xs-12 col-sm-3">
<a href="<?=g('base_url')?>product-detail/<?=$value['product_slug']?>">
<div class="main-produc" style="min-height: 349px;">
<div class="pro-img">
<img style="width: 248px; height: 258px; object-fit: contain" src="<?=get_image($value['product_image_path'],$value['product_image'])?>" class="img-responsive" alt="">

</div>
<!-- <div class="sale"><a href="#">SALE</a></div> -->
<div class="main-set-cat">
<div class="produc-text pull-left">
<a href="<?=g('base_url')?>product-detail/<?=$value['product_slug']?>">
<h1><?=$value['product_name']?></h1>
</a>
<!-- <h2><?=price($value['product_price'])?></h2> -->
</div>
<!-- <div class="star-rat pull-right">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
</div> -->
</div>
<!-- <div class="main-list">
<div class="list-img">
<img src="<?=g('base_url')?>assets/front_assets/images/img11.png" class="img-responsive" alt="">
<p>Pawel Kadysz</p>
</div>
<div class="list-whislst pull-right">
<a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
</div>
</div> -->
</div>
<div class="borde-check"></div>
<div class="borde-check-two"></div>
</a>
</div>

<?
  }

}
?>

</div>
</div>
</div>
</div>

<?php } ?>




</div>