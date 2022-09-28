<?php $this->load->view('widgets/inner_banner'); ?> 
<section class="promotions-main">
    <div class="container">
     <div class="row">
      <?php foreach ($products as $key => $product){ ?>
      <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1">
        <div class="promo-item">
          <img style="width: 174px; height: 118px;" src="<?=get_image($product['product_image_path'],$product['product_image'])?>" alt="">
        
          <h3><?=$product['product_name']?></h3>
          <?=html_entity_decode($product['product_detail'])?>
          <a href="<?=g('base_url')?>product-detail/<?=$product['product_id']?>">Add To Cart</a> 
          <h6><?=price($product['product_discount'])?><span><?=price($product['product_price'])?></span></h6>
          <small>Limited time only</small>
        </div>  
      </div>
      <?php } ?>

           <!--  <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="promo-item">
          <img src="<?=g('base_url')?>assets/front_assets/images/promo-img2.png" alt="">
          <h3>Parkell Universal Adhesive</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
          sed do eiusmod tempor incididunt ut labore </p>
          <a href="<?=g('base_url')?>product-detail">Add To Cart</a> <h6>$45.99<span>55.99</span></h6>
          <small>Limited time only</small>
        </div>  
       </div>
     </div> 
     <div class="clearfix"></div>
          <div class="row">
      <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1">
        <div class="promo-item">
          <img src="<?=g('base_url')?>assets/front_assets/images/promo-img1.png" alt="">
          <h3>Parkell Universal Adhesive</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
          sed do eiusmod tempor incididunt ut labore </p>
          <a href="<?=g('base_url')?>product-detail">Add To Cart</a> <h6>$25.99<span>$35.99</span></h6>
          <small>Limited time only</small>
        </div>  
      </div> -->
            <!-- <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="promo-item">
          <img src="<?=g('base_url')?>assets/front_assets/images/promo-img2.png" alt="">
          <h3>Parkell Universal Adhesive</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
          sed do eiusmod tempor incididunt ut labore </p>
          <a href="<?=g('base_url')?>product-detail">Add To Cart</a> <h6>$45.99<span>55.99</span></h6>
          <small>Limited time only</small>
        </div>  
       </div> -->
     </div>
    </div>
  </section>
  <section class="manufacture">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="manufc-text">
              <h1>MANUFACTURERS</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequa Duis aute irure dolor in deriti
              voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
              <a href="#">Learn More</a>
            </div>
          </div>
          <div class="col-md-7">
            <div class="multi-logo">
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-1.png" class="img-responsive" alt="">
                </div>
              </div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-2.png" class="img-responsive" alt="">
                </div>
              </div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-3.png" class="img-responsive" alt="">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-4.png" class="img-responsive" alt="">
                </div>
              </div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-5.png" class="img-responsive" alt="">
                </div>
              </div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-6.png" class="img-responsive" alt="">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-7.png" class="img-responsive" alt="">
                </div>
              </div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-8.png" class="img-responsive" alt="">
                </div>
              </div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo-set">
                  <img src="<?=g('base_url')?>assets/front_assets/images/logo-9.png" class="img-responsive" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
   
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
