<?php $this->load->view('widgets/inner_banner')?>
<style type="text/css">
  /*.second-sec:after {
    content: '';
    position: absolute;
    right: 0;
    bottom: 0;
    width: 19%;
    height: 42%;
    background: url(../images/img3.png) no-repeat;
    background-size: 84%;*/
}
</style>
    <section class="second-sec">
      <div class="container">
          <div class="row main-DreAm">
            
            <div class="col-md-12 col-xs-12 col-sm-6">
              <div class="print-text">
                <!-- <h3><?=$cms_page7['cms_page_title']?></h3> -->
                <h1><?=$cms_page7['cms_page_title2']?></h1>
               <?=html_entity_decode($cms_page7['cms_page_content'])?>
               <?=html_entity_decode($cms_page7['cms_page_other_content'])?>
              </div>
            </div>
          </div>
      </div>
    </section>

    <section class="main-whAt">
      <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-6">
              <div class="who-We">
                <h1 style="font-size: 50px;"><?=$cms_page8['cms_page_title']?></h1>
                <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="who-We">
                <?=html_entity_decode($cms_page8['cms_page_content'])?>
                </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="who-We">
                <?=html_entity_decode($cms_page8['cms_page_other_content'])?>
                </div>
                </div>
              </div>
            </div>
            

            <div class="col-md-6 col-xs-12 col-sm-6">
              <div class="dream-img">
                <img src="<?=get_image($cms_page7['cms_page_image_path'],$cms_page7['cms_page_image'])?>" class="img-responsive" alt="">
              </div>
            </div>
          </div>
      </div>
    </section>

    

  