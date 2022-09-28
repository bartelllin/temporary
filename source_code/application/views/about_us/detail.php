<? $this->load->view('widgets/inner_banner'); ?>

<div class="featuredSec">
<div class="container">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="imageBox pull-right">
<img src="<?=get_image($about_shoe_bevy['cms_page_image_path'],$about_shoe_bevy['cms_page_image'])?>" alt="img">
</div>
<h1><?=$about_shoe_bevy['cms_page_name']?></h1>
<?=truncate(strip_tags(html_entity_decode($about_shoe_bevy['cms_page_content'])),150)?></br>
<a href="#" class="btnSed">SHOP NOW</a>
</div>
<div class="col-md-12 col-sm-12 col-xs-12"><div class="spacer"></div></div>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="imageBox pull-left">
<img src="<?=get_image($who_we['cms_page_image_path'],$who_we['cms_page_image'])?>" alt="img">
</div>
<h1><?=$who_we['cms_page_name']?></h1>
<?=truncate(strip_tags(html_entity_decode($who_we['cms_page_content'])),150)?></br>
<a href="#" class="btnSed">SHOP NOW</a>
</div>
</div>
</div>

