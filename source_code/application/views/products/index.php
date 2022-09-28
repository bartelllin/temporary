<?php //$this->load->view('widgets/inner_banner')?> 

<section class="main-select">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-xs-12 col-sm-6">
            <div class="slect-img">
              <img style="margin-top: 46px;" src="<?=get_image($cms_page10['cms_page_image_path'],$cms_page10['cms_page_image'])?>" class="img-responsive" alt="">
            </div>
          </div>
          <div class="col-md-6 col-xs-12 col-sm-6">
            <div class="main-option">
              <div class="main-second-option">
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="done-img">
                  <img src="<?=get_image($cms_page3['cms_page_image_path'],$cms_page3['cms_page_image'])?>" class="img-responsive" alt="">
                </div>
                </div>
                <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="option-text">
                  <h1><?=$cms_page3['cms_page_title']?></h1>
                  <?=html_entity_decode($cms_page3['cms_page_content'])?>
                </div>
              </div>
              </div>

              <div class="clearfix"></div>
              <div class="main-second-option">
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="done-img">
                  <img src="<?=get_image($cms_page4['cms_page_image_path'],$cms_page4['cms_page_image'])?>" class="img-responsive" alt="">
                </div>
                </div>
                <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="option-text">
                  <h1><?=$cms_page4['cms_page_title']?></h1>
                  <?=html_entity_decode($cms_page4['cms_page_content'])?>
                </div>
              </div>
              </div>
                <div class="clearfix"></div>
                <div class="main-second-option">
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="done-img">
                  <img style="width: 34px; height: 42px;" src="<?=get_image($cms_page13['cms_page_image_path'],$cms_page13['cms_page_image'])?>" class="img-responsive" alt="">
                </div>
                </div>
                <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="option-text">
                  <h1><?=$cms_page13['cms_page_title']?></h1>
                  <?=html_entity_decode($cms_page13['cms_page_content'])?>
                </div>
              </div>
              </div>
              <div class="clearfix"></div>
                <div class="main-second-option">
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="done-img">
                  <img src="<?=get_image($cms_page5['cms_page_image_path'],$cms_page5['cms_page_image'])?>" class="img-responsive" alt="">
                </div>
                </div>
                <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="option-text">
                  <h1><?=$cms_page5['cms_page_title']?></h1>
                  <?=html_entity_decode($cms_page5['cms_page_content'])?>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="main-all-set">
<div class="container">
<div class="row">

<div class="col-md-3 col-xs-12 col-sm-3">
<div class="colect-main">
<h1>ALL CATEGORIES</h1>
<div class="whatpeopleSayDiv scrollbar-inner">
<ul class="">
<?php foreach ($categories as $key => $category){ ?>
<li><a href="<?=g('base_url')?>product?category=<?=$category['category_slug']?>"><?=$category['category_name']?></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>


<div class="col-md-9 col-xs-12 col-sm-9">
<div class="print-text">
<h1>SHOP PRINT COLLECTION</h1>
</div>

<?php if(empty($products)){ ?>
<h1>Products not found.</h1>

<?php }else{ ?>

<div class="second-slider">
<div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
 <?php 
 $i = 1;
 foreach(array_chunk($products, 9) as $product) { ?> 
<div class="item <?php if($i==1){ ?> active <?php } ?>">
<div class="maiN-shoP">

<?php foreach($product as $key => $prdct){ 
if($key%3==0){ ?> 
<div class="clearfix"></div>
<br>
<?php } ?>

<div class="col-md-4 col-xs-12 col-sm-4">
<a href="<?=g('base_url')?>product-detail/<?=$prdct['product_slug']?>">
<div class="main-produc">
<div class="pro-img">
<img style="width: 248px; height: 258px; object-fit: contain" src="<?=get_image($prdct['product_image_path'],$prdct['product_image'])?>" class="img-responsive" alt="">
</div>
<div class="main-set-cat">
<div class="produc-text pull-left">
<a href="<?=g('base_url')?>product-detail/<?=$prdct['product_slug']?>">
<h1><?=$prdct['product_name']?></h1>
</a>
<!-- <h2><?=price($prdct['product_price'])?></h2> -->
</div>
<!-- <div class="star-rat pull-right">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
</div> -->
</div>     
</div>
</a>
</div>
<?php } ?>
<?php $i = 0; ?>
</div>
</div>
<?php } ?>


</div>
<a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
<?php } ?>
</div>



</div>
</div>
</section>

    
<section class="main-catgry main-ProDucT">
      <?php /* $this->load->view('widgets/topCategory'); */?>
      </div>
    </section>
