<style type="text/css">
  .banner {
    background: url(<?=get_image($inner_banner['inner_banner_image_path'],$inner_banner['inner_banner_image'])?>) no-repeat top center/ cover;
    padding: 40px 0;
}
</style>

<section class="banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-xs-12 col-sm-5">
              <div class="abt-text">
                <h1><?=$inner_banner['inner_banner_title']?></h1>
              </div>
            </div>
            <div class="col-md-7 col-xs-12 col-sm-7 nopadding">
              <img style="width: 555px; height: 283px; object-fit: contain;" src="<?=get_image($inner_banner['inner_banner_image_path'],$inner_banner['inner_banner_image2'])?>" class="img-responsive" alt="">
            </div>
          </div>
        </div>
    </section>