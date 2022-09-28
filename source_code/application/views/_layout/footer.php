<style>
    li{
    color: white;
  }
</style>
<!-- <section class="keepIn">
  <div class="container">
    <?php
$cmsPage12 = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 12,'cms_page_status'=>1)));
//debug($cmsPage12);
?>
    <form id="contactform" method="post">
    <h3><?=$cmsPage12['cms_page_title']?></h3>
    <?=html_entity_decode($cmsPage12['cms_page_content'])?>
    <div class="col-md-4 col-xs-12 col-sm-4">
      <div class="form-group">
        <div class="icon-addon addon-lg">
          <input type="text" name="inquiry[inquiry_name]" placeholder="Full Name" class="form-control">
          <label class="fa fa-user" rel="tooltip"></label>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-xs-12 col-sm-4">
      <div class="form-group">
        <div class="icon-addon addon-lg">
          <input type="email" name="inquiry[inquiry_email]" placeholder="Email Address" class="form-control">
          <label class="fa fa-envelope" rel="tooltip"></label>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-xs-12 col-sm-4">
      <div class="form-group">
        <div class="icon-addon addon-lg">
          <input type="text" name="inquiry[inquiry_website]" placeholder="Your Website" class="form-control">
          <label class="fa fa-phone" rel="tooltip"></label>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12">
      <div class="form-group">
        <div class="icon-addon addon-lg">
          <textarea name="inquiry[inquiry_detail]" placeholder="Type Here Message" class="form-control"></textarea>
         
        </div>
      </div>
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12">
      <input type="button" id="contactbtn" value="SEND MESSAGE">
      
    </div>
  </form>
  </div>
</section> -->

<footer>
<?php
$cmsPage11 = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 11,'cms_page_status'=>1)));

//debug($cmsPage11,1);

?>
      <div class="container">
        <div class="row">
            
            <?php if($this->uri->segment(1) == "product"){ ?>
            <div class="col-md-6 col-xs-12 col-sm-6">
            <div class="main-shifT">
            <div class="fotr-logo">
              <img src="<?=get_image($logo['logo_image_path'],$logo['logo_image'])?>" class="img-responsive" alt="">
              
              <? /*
              html_entity_decode($cmsPage11['cms_page_content'])
              */
              ?>
              
            </div>


          <?php if($this->uri->segment(1) == "product"){ ?>
            <h2 style="color: white;">Payment</h2>
            <div class="payMent">
              <a><img src="<?=g('base_url')?>assets/front_assets/images/img18.png" class="img-responsive" alt=""></a>
              <a><img src="<?=g('base_url')?>assets/front_assets/images/img19.png" class="img-responsive" alt=""></a>
              <a><img src="<?=g('base_url')?>assets/front_assets/images/img20.png" class="img-responsive" alt=""></a>
              <a><img src="<?=g('base_url')?>assets/front_assets/images/img21.png" class="img-responsive" alt=""></a>
              <a><img src="<?=g('base_url')?>assets/front_assets/images/img22.png" class="img-responsive" alt=""></a>
            </div>

            <?php } ?>


            </div>
          </div>
          <div class="col-md-6 col-xs-12 col-sm-6">
            <!-- <div class="newsleter">
              <h1>Newsletter</h1>
            </div> -->
            <!-- <div class="formSec">
              <form action="<?=g('base_url')?>contact_us/newsletter" class="newsletter_form" name="contact-form-newsletter" method="post">
                <div class="col-md-8 col-sm-8 col-xs-8 nopadding">
                  <input type="email" name="newsletter[newsletter_email]" placeholder="enter your email address">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 nopadding">
                  <input type="submit" id="btn_submit21" value="Subscribe">
                </div>
              </form>
            </div> -->
            <div class="clearfix"></div>
            <!-- <div class="fotr-soCial">
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['twitter']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['facebook']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['instagram']?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['pinterest']?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            </div> -->
            <div class="clearfix"></div>
             
            <!-- <div class="col-md-4 col-xs-12 col-sm-4">
              <div class="my-acOunt">
                <h1>Shopping Guide</h1>
                <ul>
                  <li><a href="#">Checkout</a></li>
                  <li><a href="#">Cart</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Blog</a></li>
                </ul>
              </div>
            </div> -->
            <!-- <div class="col-md-4 col-xs-12 col-sm-4">
              <div class="my-acOunt">
                <h1>Links</h1>
                <ul>
                  <li><a>About Us</a></li>
                  <li><a>Products</a></li>
                  <li><a>Contact us</a></li>
                  
                </ul>
              </div>
            </div>
             -->
            
            <div class="col-md-8 col-xs-12 col-sm-4">
              <div class="my-acOunt">
                <h1>Contact us</h1>
                <ul>
                  <li>Email : <a href="mailto:<?=$this->layout_data['config_info']['admin']['email_contact_us']?>"><?=$this->layout_data['config_info']['admin']['email_contact_us']?></a></li>
                  <li>Phone : <a href="tel:<?=$this->layout_data['config_info']['admin']['company_phone_2']?>"> <?=$this->layout_data['config_info']['admin']['company_phone_2']?></a></li>
                  <li>Address : <?=$this->layout_data['config_info']['admin']['company_address_1']?></li>
                  
                </ul>
              </div>
            </div> 
            
            
          </div>
            <?php
            }
            else{
            ?>
            
            <div class="innFooter">
          <div class="col-md-12 col-xs-12 col-sm-6">
            <div class="main-shifT innFooter">
            <div class="fotr-logo">
              <img src="<?=get_image($logo['logo_image_path'],$logo['logo_image'])?>" class="img-responsive" width="120" alt="">
              
              <? /*
              html_entity_decode($cmsPage11['cms_page_content'])
              */
              ?>
              
            </div>


          
            </div>
          </div>
          <div class="col-md-12 col-xs-12 col-sm-6">
            <!-- <div class="newsleter">
              <h1>Newsletter</h1>
            </div> -->
            <!-- <div class="formSec">
              <form action="<?=g('base_url')?>contact_us/newsletter" class="newsletter_form" name="contact-form-newsletter" method="post">
                <div class="col-md-8 col-sm-8 col-xs-8 nopadding">
                  <input type="email" name="newsletter[newsletter_email]" placeholder="enter your email address">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 nopadding">
                  <input type="submit" id="btn_submit21" value="Subscribe">
                </div>
              </form>
            </div> -->
            <div class="clearfix"></div>
            <!-- <div class="fotr-soCial">
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['twitter']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['facebook']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['instagram']?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['pinterest']?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            </div> -->
            <div class="clearfix"></div>
             
            <!-- <div class="col-md-4 col-xs-12 col-sm-4">
              <div class="my-acOunt">
                <h1>Shopping Guide</h1>
                <ul>
                  <li><a href="#">Checkout</a></li>
                  <li><a href="#">Cart</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Blog</a></li>
                </ul>
              </div>
            </div> -->
            <!-- <div class="col-md-4 col-xs-12 col-sm-4">
              <div class="my-acOunt">
                <h1>Links</h1>
                <ul>
                  <li><a>About Us</a></li>
                  <li><a>Products</a></li>
                  <li><a>Contact us</a></li>
                  
                </ul>
              </div>
            </div>
             -->
            
            <div class="col-md-12">
              <div class="my-acOunt">
                <h1>Contact us</h1>
                <ul>
                  <li><strong>Email :</strong> <a href="mailto:<?=$this->layout_data['config_info']['admin']['email_contact_us']?>"><?=$this->layout_data['config_info']['admin']['email_contact_us']?></a></li>
                  <li><strong>Phone :</strong> <a href="tel:<?=$this->layout_data['config_info']['admin']['company_phone_2']?>"> <?=$this->layout_data['config_info']['admin']['company_phone_2']?></a></li>
                  <li><strong>Address :</strong> <?=$this->layout_data['config_info']['admin']['company_address_1']?></li>
                  
                </ul>
              </div>
            </div> 
            </div>
            
          </div>
          <?php
            }
          ?>
        </div>
        
        <div class="copy-right">
          <p style="color: white;">@copyright <?=DATE('Y')?>. CALIFORNIA QUALITY PRINTING. All rights reserved.</p>
        </div>
      </div>
    </footer>

<script type="text/javascript">
$(document).ready(function () { 

 // .:hover 
$(".appoint ul li").click(function(){

    var id = $(this).data('class');
    console.log(id);

    $('.tab-pane').removeClass('in active');
    $('#'+id).addClass('in active');

})



$("#contactbtn").click(function(){
var data = $("#contactform").serialize();
var url = "<?=g('base_url')?>contact_us/store";
response = AjaxRequest.formrequest(url, data);
if(response.status == 1)
{
AdminToastr.success(response.txt,'Success');
$("#contactform").trigger('reset');
}else{
AdminToastr.error(response.txt,'Error');
}
return false;
});
});
</script>

<script>
    // Contact Form Submit Start
    $('#btn_submit21').on('click', function () {
        var obj = $(".newsletter_form");
        // Get form data
        var data = obj.serialize();
        // Get post url
        var url = obj.attr('action');
        // Submit action
        var response = AjaxRequest.fire(url, data);
        if(response.status){
            $(location).attr('href',window.location.href);
        }
        // Add return
        return false;
    });
    // Login Form Submit End
</script>
       