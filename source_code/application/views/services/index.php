<?php $this->load->view('widgets/inner_banner'); ?>
   <section class="service-main">
      <div class="container">
          <ul>
            <li>
            <div class="sleekSecBox">
              <div class="doCircle">
                <div class="img1"></div>
              </div>
              <p>Consultaion</p>
            </div>
             
            </li>
                <li>
            <div class="sleekSecBox">
              <div class="doCircle">
                <div class="img2"></div>
              </div>
              <p>Cosmetic</p>
            </div>
            </li>
                <li>
                <div class="sleekSecBox">
              <div class="doCircle">
                <div class="img3"></div>
              </div>
              <p>Root Canals - RCT</p>
            </div>
            </li>
                <li>
                 <div class="sleekSecBox">
              <div class="doCircle">
                <div class="img4"></div>
              </div>
              <p>Tooth Extraction</p>
            </div>
            </li>
                <li>
                 <div class="sleekSecBox">
              <div class="doCircle">
                <div class="img5"></div>
              </div>
              <p>Crowns & Caps</p>
            </div>
            </li>
                     <li>
                   <div class="sleekSecBox">
              <div class="doCircle">
                <div class="img6"></div>
              </div>
              <p>Brace Implants</p>
            </div>
            </li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit 
anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem 
aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam </p>
      </div>
   </section>


   <?php foreach ($services as $key => $service){ 

    if($key % 2 == 0){

    ?>
<section class="srevice-first">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12 col-md-offset-3 padd-0">
          <div class="srevice-first-item">
            <div class="col-md-5 col-sm-5 col-xs-12 padd-0">
             <img src="<?=get_image($service['service_image_path'],$service['service_image'])?>" alt="">
              </div>
              <div class="col-md-7 col-sm-7 col-xs-12">
             <div class="srevice-first-info">
               <h3><?=$service['service_name']?></h3>
               <?=html_entity_decode($service['service_detail'])?>
               <a href="#">BOOK NOW</a>
               </div>
             </div> 
            </div>
          </div>
        </div>
      </div>
   </section>

   <?php }else{ ?>

   <div class="clearfix"></div>
<section class="srevice-second">
           <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12 padd-0">
          <div class="srevice-second-item">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
             <div class="srevice-second-info">
               <h3><?=$service['service_name']?></h3>
               <?=html_entity_decode($service['service_detail'])?>
               <a href="#">BOOK NOW</a>
               </div>
             </div> 
            <div class="col-md-5 col-sm-6 col-xs-12 padd-0">
             <img src="<?=get_image($service['service_image_path'],$service['service_image'])?>" alt="">
              </div>
        
            </div>
          </div>
        </div>
      </div>
   </section>

   <?php } ?>

<?php } ?>




   <!-- <div class="clearfix"></div>
<section class="srevice-second">
           <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12 padd-0">
          <div class="srevice-second-item">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
             <div class="srevice-second-info">
               <h3>Implant Dentistry</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
               <a href="#">BOOK NOW</a>
               </div>
             </div> 
            <div class="col-md-5 col-sm-6 col-xs-12 padd-0">
             <img src="<?=g('base_url')?>assets/front_assets/images/ser-img-2.png" alt="">
              </div>
        
            </div>
          </div>
        </div>
      </div>
   </section>
   <div class="clearfix"></div>
   <section class="srevice-first">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12 col-md-offset-3 padd-0">
          <div class="srevice-first-item">
            <div class="col-md-5 col-sm-5 col-xs-12 padd-0">
             <img src="<?=g('base_url')?>assets/front_assets/images/ser-img-3.png" alt="">
              </div>
              <div class="col-md-7 col-sm-7 col-xs-12">
             <div class="srevice-first-info">
               <h3>Cosmetic Dentistry</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
               <a href="#">BOOK NOW</a>
               </div>
             </div> 
            </div>
          </div>
        </div>
      </div>
   </section>
   <div class="clearfix"></div>
   <section class="srevice-second">
           <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12 padd-0">
          <div class="srevice-second-item">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
             <div class="srevice-second-info">
               <h3>Preventive Dentistry</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
               <a href="#">BOOK NOW</a>
               </div>
             </div> 
            <div class="col-md-5 col-sm-6 col-xs-12 padd-0">
             <img src="<?=g('base_url')?>assets/front_assets/images/ser-img-2.png" alt="">
              </div>
        
            </div>
          </div>
        </div>
      </div>
   </section> -->
    
      <script>
  //plugin bootstrap minus and plus
  //http://jsfiddle.net/laelitenetwork/puJ6G/
  $('.btn-number').click(function(e){
     e.preventDefault();
     
     fieldName = $(this).attr('data-field');
     type      = $(this).attr('data-type');
     var input = $("input[name='"+fieldName+"']");
     var currentVal = parseInt(input.val());
     if (!isNaN(currentVal)) {
         if(type == 'minus') {
             
             if(currentVal > input.attr('min')) {
                 input.val(currentVal - 1).change();
             } 
             if(parseInt(input.val()) == input.attr('min')) {
                 $(this).attr('disabled', true);
             }

         } else if(type == 'plus') {

             if(currentVal < input.attr('max')) {
                 input.val(currentVal + 1).change();
             }
             if(parseInt(input.val()) == input.attr('max')) {
                 $(this).attr('disabled', true);
             }

         }
     } else {
         input.val(0);
     }
  });
  $('.input-number').focusin(function(){
    $(this).data('oldValue', $(this).val());
  });
  $('.input-number').change(function() {
     
     minValue =  parseInt($(this).attr('min'));
     maxValue =  parseInt($(this).attr('max'));
     valueCurrent = parseInt($(this).val());
     
     name = $(this).attr('name');
     if(valueCurrent >= minValue) {
         $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
     } else {
         alert('Sorry, the minimum value was reached');
         $(this).val($(this).data('oldValue'));
     }
     if(valueCurrent <= maxValue) {
         $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
     } else {
         alert('Sorry, the maximum value was reached');
         $(this).val($(this).data('oldValue'));
     }
     
     
  });
  $(".input-number").keydown(function (e) {
         // Allow: backspace, delete, tab, escape, enter and .
         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
              // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) || 
              // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                  // let it happen, don't do anything
                  return;
         }
         // Ensure that it is a number and stop the keypress
         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
             e.preventDefault();
         }
     });

     
  </script>
