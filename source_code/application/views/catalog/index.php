<?php $this->load->view('widgets/inner_banner'); ?>
    <section class="catalog-main">
      <div class="container">
        <div class="row">

          <?php foreach ($catalogs as $key => $catalog){ ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=get_image($catalog['catalog_image_path'],$catalog['catalog_image'])?>" alt="">
           </div>
          </div>

          <?php } ?>
         <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=g('base_url')?>assets/front_assets/images/catalog-img-2.png" alt="">
       </div>
    </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=g('base_url')?>assets/front_assets/images/catalog-img-3.png" alt="">
       </div>
    </div>
        </div>
        <div class="clearfix"></div>
         <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=g('base_url')?>assets/front_assets/images/catalog-img-4.png" alt="">
       </div>
    </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=g('base_url')?>assets/front_assets/images/catalog-img-5.png" alt="">
       </div>
    </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=g('base_url')?>assets/front_assets/images/catalog-img-6.png" alt="">
       </div>
     </div>
        </div>
    <div class="clearfix"></div>
              <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=g('base_url')?>assets/front_assets/images/catalog-img-7.png" alt="">
       </div>
    </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=g('base_url')?>assets/front_assets/images/catalog-img-8.png" alt="">
       </div>
    </div> -->
         <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <div class="hovereffect">
             <img class="img-responsive" src="<?=g('base_url')?>assets/front_assets/images/catalog-img-9.png" alt="">
       </div>
     </div> -->
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
