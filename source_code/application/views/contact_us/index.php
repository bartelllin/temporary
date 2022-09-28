<?php $this->load->view('widgets/inner_banner')?>
      <section class="main-contact">
          <div class="container">
            <div class="contact-text">
            </div>
            <div class="row">
              <form id="contactform2" method="post">
              <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="contact-info-text">
                  <h1>leave your message</h1>
                  <label>Name<span>*</span></label> 
                  <input type="text" name="inquiry[inquiry_name]" placeholder="" class="form-control">
                  <label>Email Address<span>*</span></label> 
                  <input type="text" name="inquiry[inquiry_email]" placeholder="" class="form-control">
                  <label>Subject<span>*</span></label> 
                  <input type="text" name="inquiry[inquiry_subject]" placeholder="" class="form-control">
                  <label>Your Message<span>*</span></label> 
                  <textarea name="inquiry[inquiry_detail]" placeholder="" class="form-control"></textarea>
                  <div class="suBmit-way">
                  <a href="javascript:void(0);" id="contactbtn2">Send Message</a>
                  </div>
                </div>
              </div>
              </form>
<div class="col-md-6 col-xs-12 col-sm-6">
<div class="map-text">
<h1 class="set-InFo"><?=$cms_page['cms_page_title']?></h1>
<?=html_entity_decode($cms_page['cms_page_content'])?>

<p><span>Phone:</span> <a href="tel:<?=$this->layout_data['config_info']['admin']['company_phone']?>">
  <?=$this->layout_data['config_info']['admin']['company_phone']?></a></p>

<p><span>Email:</span>  <a href="mailto:<?=$this->layout_data['config_info']['admin']['email_contact_us']?>"><?=$this->layout_data['config_info']['admin']['email_contact_us']?></a>
</p>

<p><span>Web:</span> <?=$this->layout_data['config_info']['admin']['website']?></p>

<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45575191.58287883!2d-130.27121258669223!3d45.797459207982556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2s!4v1531221962269" width="100%" height="339" frameborder="0" style="border:0" allowfullscreen=""></iframe> -->

<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.238363385053!2d-122.03455168466955!3d38.01822217971587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808567b1592fac87%3A0xfc4e888abfefc7de!2s5063+Commercial+Cir+D%2C+Concord%2C+CA+94520!5e0!3m2!1sen!2s!4v1540431888577" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->

<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.23818212735!2d-122.03455168494787!3d38.018226405888726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808567b1592fac87%3A0xfc4e888abfefc7de!2s5063+Commercial+Cir+D%2C+Concord%2C+CA+94520!5e0!3m2!1sen!2s!4v1542836185324" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.2381821273466!2d-122.03455168498847!3d38.0182264058888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808567b16788057d%3A0xceea3aa764b7fae8!2sCalifornia+Quality+Printing!5e0!3m2!1sen!2s!4v1546459282639" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

<!-- <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=40.7127837,-74.0059413&amp;key=AIzaSyAlZ-7-U81-rPTpCIKAY5IGBCiUl2tfLek"></iframe> -->

</div>
</div>
            </div>
          </div>
        </section>

<script type="text/javascript">
$(document).ready(function () { 
$("#contactbtn2").click(function(){
var data = $("#contactform2").serialize();
var url = "<?=g('base_url')?>contact_us/store";
response = AjaxRequest.formrequest(url, data);
if(response.status == 1)
{
AdminToastr.success(response.txt,'Success');
$("#contactform2").trigger('reset');
}else{
AdminToastr.error(response.txt,'Error');
}
return false;
});
});
</script>
    
    



           <!-- <a href="mailto:<?=$this->layout_data['config_info']['admin']['email_contact_us']?>"><?=$this->layout_data['config_info']['admin']['email_contact_us']?></a> -->
        
  <!-- <form id="contactform" method="post">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <h2>Interested in discussing?</h2>
  <div class="row">
  <div class="form-text">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <input type="text" name="inquiry[inquiry_name]" placeholder="Name">
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <input type="text" name="inquiry[inquiry_email]" placeholder="Email">  
  </div>  
  </div>
  </div>
  <div class="row">
  <div class="form-text">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <input type="text" name="inquiry[inquiry_subject]" placeholder="Subject">
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <input type="text" name="inquiry[inquiry_phone]" placeholder="Phone">  
  </div>  
  </div>
  </div>
 
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="form-text">
  <textarea cols="50" rows="4" name="inquiry[inquiry_detail]" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder='Message'"></textarea>
  </div>
  </div>
  </div>
  <div class="form-text">
  <input type="button" id="contactbtn" class="btn btn-primary btn" value="Submit">
  </div>
  </div>  
         <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="map">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50422.473229443436!2d144.93524649600283!3d-37.82741342019593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce7e0!2sMelbourne+VIC+3004%2C+Australia!5e0!3m2!1sen!2s!4v1532956859708" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
         </div> 
       </form> -->
      
<!-- <script type="text/javascript">
$(document).ready(function () { 
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
</script> -->

