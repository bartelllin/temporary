<style type="text/css">
#gallery_01 a img {
    width: 135px;
    float: left;
    padding: 22px;
    margin-top: 10px;
    border: 1px solid #ddd;
}
.detailImg {
        border: 1px solid #ccc;
    background: #fff;
    text-align: center;
    padding: 44px 0;
}
.detailImg img {
    width: 67%;
    margin: 0 auto;
}


.btn-unique{
  background-color: #b7936d;
    color: white;
}
.modal-content{
  background-color: rgba(150, 25, 97, 0.93);
    color: white;
}
.modal-footer{
  border-top: 0px solid #e5e5e5;
}
.modal-header {
    
    border-bottom: 0px solid #e5e5e5;
}
  /*------------------------
}
}
}
Rating Custom
-------------------------------*/
/* ratings css */


/****** Style Star Rating Widget *****/
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700 !important;   } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85  !important ;  } 

/*checkbox css*/

.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: right;
    margin-left: .7em;
}
.mailingSection input[type="radio"] {

    
    float: right;
    margin-left: 10px;
    width: 1.1em;
    height: 1.1em;
    float: right;
   margin-top: 3px;

}
.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}



</style>
<?php $this->load->view('widgets/inner_banner')?> 
  <section>
    <div class="contentSection_view-two">
      <div class="container">
        <div class="detail-text">
          <h1>product detail</h1>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="">
              <div class="detailImg">
                <img id="zoom_05" src="<?=get_image($product['product_image_path'],$product['product_image'])?>" data-zoom-image="<?=get_image($product['product_image_path'],$product['product_image'])?>"/>
              </div>
              <!--<div id="gallery_01">-->
              <!--  <a href="#" data-image="<?=get_image($product['product_image_path'],$product['product_image'])?>" data-zoom-image="<?=get_image($product['product_image_path'],$product['product_image'])?>">-->
              <!--    <img id="zoom_05" src="<?=get_image($product['product_image_path'],$product['product_image'])?>" class="img-responsive" />-->
              <!--  </a>-->
              <!--  <a href="#" data-image="<?=get_image($product['product_image_path'],$product['product_image'])?>" data-zoom-image="<?=get_image($product['product_image_path'],$product['product_image'])?>">-->
              <!--    <img id="zoom_05" src="<?=get_image($product['product_image_path'],$product['product_image'])?>" class="img-responsive"/>-->
              <!--  </a>-->
              <!--  <a href="#" data-image="<?=get_image($product['product_image_path'],$product['product_image'])?>" data-zoom-image="<?=get_image($product['product_image_path'],$product['product_image'])?>">-->
              <!--    <img id="zoom_05" src="<?=get_image($product['product_image_path'],$product['product_image'])?>" class="img-responsive"/>-->
              <!--  </a>-->
              <!--  <a href="#" data-image="<?=get_image($product['product_image_path'],$product['product_image'])?>" data-zoom-image="<?=get_image($product['product_image_path'],$product['product_image'])?>">-->
              <!--    <img id="zoom_05" src="<?=get_image($product['product_image_path'],$product['product_image'])?>" class="img-responsive"/>-->
              <!--  </a>-->
              <!--</div>-->
            </div>
            
<!-- <div class="proImageSlider">-->
<!-- Tab panes -->
<!-- <div class="main-one-this">-->
<!-- <div class="pro-big-img">-->             
<!-- <img id="zoom_05" alt="img"  src="<?=get_image($product['product_image_path'],$product['product_image'])?>" data-zoom-image="<?=get_image($product['product_image_path'],$product['product_image'])?>" class="img-responsive">-->
<!-- <div class="half-at">-->
<!-- <a data-fancybox="gallery" class=" info-btn" href="<?=get_image($product['product_image_path'],$product['product_image'])?>"><img src="<?=g('images_root');?>34.png" alt=""></a>-->
<!-- <img id="zoom_05" src='<?=get_image($product['product_image_path'],$product['product_image'])?>' data-zoom-image="<?=get_image($product['product_image_path'],$product['product_image'])?>"/> -->
<!--</div>-->
<!-- </div>-->
<!-- </div> Nav tabs -->       
<!-- </div>-->
        </div>
        <?php //debug($product['product_category_id'],1); ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="proDetail">
            <h4><?=$product['product_name']?></h4>
           <!--  <div class="proRating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <span>(5 Customers reviews) <i>SKU:</i> 8124-ESO</span> 
            </div> -->
            <!-- <h1><?=price($product['product_price'])?></h1> -->
          </div>
 <!--    <div class="file-upload">
      <h1>UPLOAD VECTOR FILE</h1>
  <div class="file-select">
    
    <div class="file-select-name" id="noFile">Select File</div>
    <div class="file-select-button" id="fileName">UPLOAD</div> 
    <input type="file" name="chooseFile" id="chooseFile">
  </div>
</div> -->
<form id="contactform2" method="post">
<div class="row">
    <div class="col-md-6">
    <div class="emaiL-remindr">
    <h1>SIZE</h1>
    <select name="product_inquiry[product_inquiry_size]">
      <option>Please select</option>
      <?php foreach ($productSize as $key => $size){ ?>
      <option value="<?=$size['product_size_title']?>"><?=$size['product_size_title']?></option>
      <?php } ?>
      
    </select>
  </div>
  </div>
  <div class="col-md-6">
      <div class="emaiL-remindr">
    <h1>COLOR</h1>
    <select name="product_inquiry[product_inquiry_color]">
      <option>Please select</option>
      <?php foreach ($productColor as $key => $colorname){ ?>
      <option value="<?=$colorname['product_color_name']?>"><?=$colorname['product_color_name']?></option>
      <?php } ?>
      
    </select>
  </div>
  </div>
</div>
 <div class="row">
   <div class="col-md-6">
       <div class="emaiL-remindr">
    <h1>SIDED</h1>
    <select name="product_inquiry[product_inquiry_sided]">
      <option>Please select</option>
      <?php foreach ($productSided as $key => $sided){ ?>
      <option value="<?=$sided['product_sided_name']?>"><?=$sided['product_sided_name']?></option>
      <?php } ?>
      
    </select>
  </div>
   </div>
   <div class="col-md-6"> 
      <div class="emaiL-remindr">
    <h1>PAPER STOCK</h1>
    <select name="product_inquiry[product_inquiry_paperstock]">
      <option>Please select</option>
      
      <?php foreach ($productPaperStock as $key => $paperstock){ ?>
      <option value="<?=$paperstock['product_paper_stock_name']?>"><?=$paperstock['product_paper_stock_name']?></option>
      <?php } ?>
      
    </select>
  </div>
     
   </div>
 </div>

<!--<div class="row">-->
<!--   <div class="col-md-6">-->
<!--       <div class="emaiL-remindr">-->
<!--    <h1>SIDED</h1>-->
<!--    <select name="product_inquiry[product_inquiry_sided]">-->
<!--      <option>Please select</option>-->
<!--      <?php foreach ($productSided as $key => $sided){ ?>-->
<!--      <option value="<?=$sided['product_sided_name']?>"><?=$sided['product_sided_name']?></option>-->
<!--      <?php } ?>-->
      
<!--    </select>-->
<!--  </div>-->
<!--   </div>-->
<!--   <div class="col-md-6"> -->
<!--      <div class="emaiL-remindr">-->
<!--    <h1>COVER STOCK</h1>-->
<!--    <select name="product_inquiry[product_inquiry_coverstock]">-->
<!--      <option>Please select</option>-->
<!--      <?php foreach ($productCoverStock as $key => $coverstock){ ?>-->
<!--      <option value="<?=$coverstock['product_cover_stock_name']?>"><?=$coverstock['product_cover_stock_name']?></option>-->
<!--       <?php } ?>-->
      
<!--    </select>-->
<!--  </div>-->
     
<!--   </div>-->
<!-- </div>-->


<?php 

$catSlug = $this->uri->segment(2); 

//debug($catSlug);

// $param4['where']['category_slug'] = $catSlug;
// $category = $this->model_category->find_one($param4);

// debug($category);
// $catId = $category['category_id'];

// debug($catId);


$param5['where']['product_slug'] = $catSlug;
$product = $this->model_product->find_one($param5);

$catId = $product['product_category_id'];

if($catId == 9 || $catId == 19 || $catId == 20){

  $param6['where']['product_folding_cat_id'] = $catId;
  $productFolding = $this->model_product_folding->find_all_active($param6); 

  //debug($productFolding,1);

  ?>
  <div class="row">
   <div class="col-md-12">
       <div class="emaiL-remindr">
    <h1>FOLDING</h1>
    <select name="product_inquiry[product_inquiry_folding]" style="width: 100%;">
      <option>Please select</option>
      <?php foreach ($productFolding as $key => $folding){ ?>
      <option value="<?=$folding['product_folding_name']?>"><?=$folding['product_folding_name']?></option>
      <?php } ?>
      
    </select>
  </div>
   </div>
   
 </div>

<?php }else if($catId == 7 || $catId == 12 ){ 

  $param7['where']['product_material_cat_id'] = $catId;
  $productMaterial = $this->model_product_material->find_all_active($param7); 

  ?>

<div class="row">
   <div class="col-md-12">
       <div class="emaiL-remindr">
    <h1>MATERIAL</h1>
    <select name="product_inquiry[product_inquiry_material]" style="width: 100%;">
      <option>Please select</option>
      <?php foreach ($productMaterial as $key => $material){ ?>
      <option value="<?=$material['product_material_name']?>"><?=$material['product_material_name']?></option>
      <?php } ?>
      
    </select>
  </div>
   </div>
   
 </div>

<?php }else if($catId == 8 || $catId == 27){ 

  $param8['where']['product_binding_cat_id'] = $catId;
  $productBinding = $this->model_product_binding->find_all_active($param8);

?>

<div class="row">

<div class="col-md-12">
       <div class="emaiL-remindr">
    <h1>COVER STOCK</h1>
    <select name="product_inquiry[product_inquiry_coverstock]" style="width: 100%;">
      <option>Please select</option>
      <?php foreach ($productCoverStock as $key => $coverstock){ ?>-->
      <option value="<?=$coverstock['product_cover_stock_name']?>"><?=$coverstock['product_cover_stock_name']?></option>-->
       <?php } ?>
      
    </select>
  </div>
   </div>


<!--<div class="col-md-6">-->
<!--       <div class="emaiL-remindr">-->
<!--    <h1>BINDING</h1>-->
<!--    <select name="product_inquiry[product_inquiry_binding]" style="width: 100%;">-->
<!--      <option>Please select</option>-->
<!--      <?php foreach ($productBinding as $key => $binding){ ?>-->
<!--      <option value="<?=$binding['product_binding_name']?>"><?=$binding['product_binding_name']?></option>-->
<!--      <?php } ?>-->
      
<!--    </select>-->
<!--  </div>-->
<!--   </div>-->

 </div>
 
 <div class="row">
     <div class="col-md-12">
       <div class="emaiL-remindr">
    <h1>BINDING</h1>
    <select name="product_inquiry[product_inquiry_binding]" style="width: 100%;">
      <option>Please select</option>
      <?php foreach ($productBinding as $key => $binding){ ?>
      <option value="<?=$binding['product_binding_name']?>"><?=$binding['product_binding_name']?></option>
      <?php } ?>
      
    </select>
  </div>
   </div>
     
 </div>

<?php }else if($catId == 11){ 

$param9['where']['product_drilling_cat_id'] = $catId;
  $productDrilling = $this->model_product_drilling->find_all_active($param9);

  ?>

<div class="row">
   <div class="col-md-12">
       <div class="emaiL-remindr">
    <h1>DRILLING</h1>
    <select name="product_inquiry[product_inquiry_drilling]" style="width: 100%;">
      <option>Please select</option>
      <?php foreach ($productDrilling as $key => $drilling){ ?>
      <option value="<?=$drilling['product_drilling_name']?>"><?=$drilling['product_drilling_name']?></option>
      <?php } ?>
      
    </select>
  </div>
   </div>
   
 </div>

  

<?php }else if($catId == 15){ 

$param10['where']['product_hole_position_cat_id'] = $catId;
  $productHole = $this->model_product_hole_position->find_all_active($param10);

  ?>

<div class="row">
   <div class="col-md-12">
       <div class="emaiL-remindr">
    <h1>HOLE</h1>
    <select name="product_inquiry[product_inquiry_hole]" style="width: 100%;">
      <option>Please select</option>
      <?php foreach ($productHole as $key => $hole){ ?>
      <option value="<?=$hole['product_hole_position_name']?>"><?=$hole['product_hole_position_name']?></option>
      <?php } ?>
      
    </select>
  </div>
   </div>
   
 </div>


<?php 
}else if($catId == 22){

  $param11['where']['product_sheets_pad_cat_id'] = $catId;
  $productSheets = $this->model_product_sheets_pad->find_all_active($param11);

  ?>

<div class="row">
   <div class="col-md-12">
       <div class="emaiL-remindr">
    <h1>SHEETS/PAD</h1>
    <select name="product_inquiry[product_inquiry_sheets_pad]" style="width: 100%;">
      <option>Please select</option>
      <?php foreach ($productSheets as $key => $sheets){ ?>
      <option value="<?=$sheets['product_sheets_pad_name']?>"><?=$sheets['product_sheets_pad_name']?></option>
      <?php } ?>
      
    </select>
  </div>
   </div>
   
 </div>


<?php }else{


}

?>



  <div class="clearfix"></div>

<div class="row">
  <div class="col-md-6">
     <!--  <div class="quantity_div">
              <div class="input-group">
                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="" min="1" max="100" placeholder="">
                <span class="input-group-btn">
                <button type="button" class="quantity-right-plus btn-number" data-type="plus" data-field=""> <span class="glyphicon glyphicon-plus"></span> </button>
                </span> <span class="input-group-btn">
                <button type="button" class="quantity-left-minus btn-number" data-type="minus" data-field=""> <span class="glyphicon glyphicon-minus"></span> </button>
                </span> </div>
                <span></span>
              <div class="clearfix"></div>
            </div>
            <div class="qtY">
              <h1>CUSTOM SIZE</h1>
            </div> -->
<div class="emaiL-remindr">
    <h1>CUSTOM SIZE</h1>
    <div class="quantity_div">
              <div class="input-group">
     <input type="text" id="quantity1" name="product_inquiry[product_inquiry_cutomsize]" class="form-control input-number" value="" min="1" max="100" placeholder="">
   </div>
 </div>
  </div>

<?php if($this->uri->segment(2) == "Booklets" || $this->uri->segment(2) == "Yearbooks"){ ?>
  <div class="emaiL-remindr">
    <h1>Total Pages</h1>
    <div class="quantity_div">
              <div class="input-group">
     <input type="text" id="quantity1" name="product_inquiry[product_inquiry_totalpages]" class="form-control input-number" value="" min="1" max="100" placeholder="">
   </div>
 </div>
  </div>
  <?php } ?>




  </div>
  
  <div class="col-md-6" style="margin-top: 16px;">
      <div class="md-form">
<label data-error="wrong" data-success="right" for="form8">Upload file <span style="color:rgba(158, 158, 158, 0.67)">(jpg, jpeg, png, pdf, ai, indd) </span></label>
<input type="file" name="inquiryImg" id="uploadImg">
</div>
  </div>
  
  <!-- <div class="col-md-6">
      <div class="emaiL-remindr">
    <h1>EMAIL REMINDER</h1>
    <select name="product_inquiry[product_inquiry_email_reminder]">
      <option>Please select</option>
      <option value="Every 3 Months">Every 3 Months</option>
    </select>
  </div>
  </div> -->
</div>
<div class="row">
  <div class="col-md-12">
       <div class="emaiL-remindr">
    <h1>SPECIAL INSTRUCTION</h1>
    <div class="quantity_div">
    <div class="input-group">
    <textarea rows="2" cols="78" name="product_inquiry[product_inquiry_instructions]"  placeholder="Special Instruction..."></textarea>
   </div>
 </div>
  </div>
  </div>
</div>

<?php if($product['product_category_id'] == 5 || $product['product_category_id'] == 9 || $product['product_category_id'] == 20 ){ ?>

<div class="row">
  <div class="col-md-12">
    <div class="checkbox" style="background-color: #822159;
    color: white;
    padding: 8px;">
          <label>
            
            <span style="font-weight: bold;">Mailing Service Option</span>
            <input type="checkbox" value="" name="mailingCheckbox">
            <span class="cr"><i class="cr-icon glyphicon glyphicon glyphicon-ok"></i></span>
          </label>
        </div>
  </div>
</div>

<div class="mailingSection">
<div class="row">
  <h3>Mailing Service</h3>
  <div class="col-md-6">
    <div class="checkbox" style="background-color: #822159;
    color: white;
    padding: 8px;">
          <label>
            <input type="radio"  value="EDDM" name="product_inquiry[product_inquiry_mailing]">
            <!--<span class="cr"><i class="cr-icon glyphicon glyphicon glyphicon-ok"></i></span>-->
            <span style="font-weight: bold;">EDDM</span>
            
           
        </div>
  </div>

  <div class="col-md-6">
    <div class="checkbox" style="background-color: #822159;
    color: white;
    padding: 8px;">
          <label>
            <input type="radio" value="Mailing List" name="product_inquiry[product_inquiry_mailing]">
            <!--<span class="cr"><i class="cr-icon glyphicon glyphicon glyphicon-ok"></i></span>-->
            <span style="font-weight: bold;">Mailing List</span>
          </label>
        </div>
  </div>
</div>

<!--<div class="row">-->
<!--  <div class="col-md-6">-->
<!--    <div class="form-group">-->
<!--      <label for="usr">Mailing address 1:</label>-->
<!--        <input type="text" class="form-control" id="usr">-->
<!--    </div>-->
<!--  </div>-->

<!--  <div class="col-md-6">-->
<!--    <div class="form-group">-->
<!--      <label for="usr">Mailing address 2:</label>-->
<!--        <input type="text" class="form-control" id="usr">-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

</div>
<?php } ?>

<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-4">
<div class="procart_div"> 
<a href="javascript:void(0);" class="btn btn-default btn-rounded mb-4 procart_btn" data-toggle="modal" data-target="#modalContactForm">Get a quote

</a>  
</div>
</div>
<div class="col-md-4">
<div class="quant_main">
<div class="quantity_div">
<div class="input-group input-groupedetail">
<input type="text" id="quantity" name="product_inquiry[product_inquiry_quantity]" class="form-control input-number" value="1" min="1" max="100">
<span class="input-group-btn">
<button type="button" class="quantity-right-plus btn-number" data-type="plus" data-field=""> <span class="glyphicon glyphicon-plus"></span> </button>
</span> <span class="input-group-btn">
<button type="button" class="quantity-left-minus btn-number" data-type="minus" data-field=""> <span class="glyphicon glyphicon-minus"></span> </button>
</span> </div>
<span></span>
<div class="clearfix"></div>
</div>
<div class="qtY">
<h1>QTY</h1>
</div> 
</div>
</div>
<div class="col-md-4">
<div class="customr">
<p> CUSTOMER SERVICE</p>
<p class="number"><?=$this->layout_data['config_info']['admin']['company_phone']?></p>
</div>
</div>
</div>

<!-- modal code start -->

<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold" style="font-weight: bold;">Product Inquiry</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body mx-3">
<div class="md-form mb-5">
<label data-error="wrong" data-success="right" for="form34">Your name</label>
<input type="text" id="form34" name="product_inquiry[product_inquiry_name]" class="form-control validate">
<input type="hidden" name="product_inquiry[product_inquiry_productid]" value="<?=$product['product_id']?>">
</div>

<div class="md-form mb-5">
<label data-error="wrong" data-success="right" for="form29">Your email</label>
<input type="email" id="form29" name="product_inquiry[product_inquiry_email]" class="form-control validate">
</div>

<div class="md-form mb-5">
<label data-error="wrong" data-success="right" for="form32">Phone</label>
<input type="text" id="form32" name="product_inquiry[product_inquiry_phone]" class="form-control validate">
</div>

<div class="md-form">
<label data-error="wrong" data-success="right" for="form8">Your message</label>
<textarea type="text" id="form8" name="product_inquiry[product_inquiry_msg]" class="md-textarea form-control" rows="4"></textarea>
</div>

<!--<div class="md-form">-->
<!--<label data-error="wrong" data-success="right" for="form8">Upload file</label>-->
<!--<input type="file" name="inquiryImg" id="uploadImg">-->
<!--</div>-->

</div>
<div class="modal-footer d-flex justify-content-center">
<button type="button" class="btn btn-unique" id="contactbtn2">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
</div>
</div>
</div>
</div>
</form>

<!-- modal code ends  -->


<div class="clearfix"></div>
<div class="proshare">
       <!--    <ul>
            <li>share</li>
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>share</a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>Tweet</a></li>
            <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i>Pin it</a></li>
            <li><a href="#">+521</a></li>
          </ul> -->
        </div>

        </div>
      </div>
    </div>
  </section>
<form class="form-horizontal" enctype="multipart/form-data" id="reviewform" method="post">
    <section>
      <div class="container">
        <div class="leave-review">
<h3 class="small-title">Leave your review</h3>
<div class="your-rating mb-30">
<p class="mb-10"><strong>Your Rating</strong></p>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12"> 

<fieldset class="rating">

    <input type="radio" id="star5" name="review[review_rating]" value="5" /><label class = "full" for="star5"></label>
   
    <input type="radio" id="star4" name="review[review_rating]" value="4" /><label class = "full" for="star4"></label>
   
    <input type="radio" id="star3" name="review[review_rating]" value="3" /><label class = "full" for="star3"></label>

    
    <input type="radio" id="star2" name="review[review_rating]" value="2" /><label class = "full" for="star2"></label>
    
    <input type="radio" id="star1" name="review[review_rating]" value="1" /><label class = "full" for="star1"></label>
    
</fieldset>
<!-- <span class="rating">
<input type="radio" id="star5" name="review[review_rating]" value="5">
<input type="radio" id="star4" name="review[review_rating]" value="4">
<input type="radio" id="star3" name="review[review_rating]" value="3">
<input type="radio" id="star2" name="review[review_rating]" value="2">
<input type="radio" id="star1" name="review[review_rating]" value="1">
</span>  -->

</div>
</div>
</span>
</div>
<div class="reply-box">
<div class="form-group">
<div class="col-md-6">
<input type="hidden" name="review[review_product_id]" value="<?=$product['product_id']?>">
<input type="hidden" name="review[review_user_id]" value="<?=$this->userid?>">
<input type="hidden" name="review[review_product_name]" value="<?=$product['product_name']?>">
<input class="form-control" type="text" name="review[review_name]" placeholder="Your name here...">
</div>
<div class="col-md-6">
<input class="form-control" name="review[review_subject]" type="text" placeholder="Subject...">
</div>
</div>
<div class="form-group">
<div class="col-md-12">
<textarea class="form-control" name="review[review_description]" placeholder="Your review here..."></textarea>
</div>
</div>
<div class="form-group">
<div class="col-md-12">
<button class="btn btn-common" type="button" id="reviewbtn3">Submit Review</button>
</div>
</div>

</div>
</div>
      </div>
    </section>
    
</form>

    <section class="main-catgry main-ProDucT">
      <?php $this->load->view('widgets/topCategory'); ?>
    </section>

    <script>
$(document).ready(function(){

  $(".mailingSection").hide();

   
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $(".mailingSection").fadeIn(1000);
            }
            else if($(this).prop("checked") == false){
                $(".mailingSection").hide();
            }
        });
    

$("#reviewbtn3").click(function(){
var data = $("#reviewform").serialize();
var url = "<?=g('base_url')?>contact_us/review";
response = AjaxRequest.formrequest(url,data);
if(response.status == 1)
{
AdminToastr.success(response.txt,'Success');
$("#reviewform").trigger('reset');
}else{
AdminToastr.error(response.txt,'Error');
}
return false;
});
});
</script>

<script>
  $(document).ready(function(){
var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
        $('#quantity').val(quantity + 1);
    });
     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
        // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
});
</script>

<script type="text/javascript">
$(document).ready(function () { 
$("#contactbtn2").click(function(){
//var data = $("#contactform2").serialize();
// var formData = new FormData($('#contactform2')[0]);
// var url = "<?=g('base_url')?>contact_us/product_inquiry";
// response = AjaxRequest.fire(url, formData);
// if(response.status == 1)
// {
// AdminToastr.success(response.txt,'Success');
// $("#contactform2").trigger('reset');
// }else{
// AdminToastr.error(response.txt,'Error');
// }
// return false;

if(document.getElementById("uploadImg").files.length == 0){

      alert("Upload File");

    }else{

var formData = new FormData($('#contactform2')[0]);
         
            $.ajax({ 
               url: '<?=g('base_url')?>contact_us/product_inquiry',
               type: 'POST',
               data: formData,
               async: false,
               cache: false,
               contentType: false,
               processData: false,
               dataType: "json",
          success: function (response) {
            console.log(response);
            if(response.status == 1){
              //setTimeout(function(){
                //$("#loader").hide();
                AdminToastr.success(response.txt,'Success');
                $("#contactform2").trigger('reset');

             // },2000)
              
             //location.reload(); 

            }
            else
            {
               AdminToastr.error(response.txt,'Error'); 
                return false;
            }
        },
      
      });
  }

});
});
</script>

