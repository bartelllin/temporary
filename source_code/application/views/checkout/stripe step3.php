<style type="text/css">
.ebooks_bg {
background-image: url(<?=get_image($banner['banner_image_path'],$banner['banner_image'])?>);
}

.paymentPage {  }

.paymentPage .form-group {
    border: 0px solid #b8b7b7;
}

.paymentPage  .panel-heading {background: #0064a6;
    border: 0px solid #ddd;
    color: #fff;
    padding: 25px; }

.paymentPage a:hover, a:focus {
text-decoration: none;
color: #fff;
}

.paymentPage .panel-heading2
{background: #0064a6;
    border: 0px solid #ddd;
    color: #fff;
    padding: 10px;
}
</style>


<section class="breadcrumb_sec product_brbg" style="background-image:url(<?=get_image($inner_banner['inner_banner_image_path'],$inner_banner['inner_banner_image'])?>)">
<div class="container">
<h1><?=$inner_banner['inner_banner_title']?></h1>
</div>
</section>


<section id="about_section" class="bdheight">
<div class="container">
<div class="row">

<?php
if (!empty($cart_data)) {?>

<div class="col-sm-12 col-md-12 div_center paymentPage">

<div class="section-title whitecolor text-center">
<h2 style="color: white">SHOPPING CART - PAYMENT</h2>
</div>

<div class="row">

<div class="col-md-6">
<? $this->load->view("checkout/summary"); ?>
</div>

<div class="col-md-6">


<div class="row cart-body">


<!--SHIPPING METHOD-->
<div class="panel panel-info">
<div class="panel-heading">Merchant Information</div>
<div class="panel-body">
<div class="form-group">
<div class="col-md-12">

<form class="form-horizontal" method="post" action="<?=g('base_url')?>Checkout/charge_stripe_payment" id="checkout_form123321">

<input type="hidden" name="orderid" value="<?=intval($orderDetail['order_id'])?>">
<input type="hidden" name="token" value="" id="token">

<!--SHIPPING METHOD-->
<div class="panel panel-info" style="border:1px solid #ddd;">

<div class="panel-body">
<div class="form-group">
<div class="col-md-12">

<?php
if(isset($_GET['error'])){
?>
<span class="payment-errors" style="color:red"><?= $_GET['msg'] ?></span>
<?php
}
?>

<?php
$terms = $this->model_cms_page->find_one(array('where'=>array('cms_page_status'=>1,'cms_page_id'=>19)));
?>
<div class="form-group">
<div class="col-md-12 col-xs-12">
<strong>
<a href="javascript:Void(0);" id="terms">
<?=$terms['cms_page_name']?>
</a>
</strong>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#terms").click(function(){
      $('#myModal').modal('show')  ;
    });
  });
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"><?=$terms['cms_page_name']?></h4>
</div>
<div class="modal-body">
<?=html_entity_decode($terms['cms_page_content'])?>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<div class="form-group">
<div class="col-md-12 col-xs-12">
<strong>Card No:*</strong>
<input type="text" required  value="" data-stripe="number"  placeholder="Enter Card number" class="form-control" name="order[order_card_number]" aria-required="true">
</div>
</div>

<div class="form-group">
<div class="col-md-12 col-xs-12">
<strong>CVC:*</strong>
<input type="text" required class="form-control" data-stripe="cvc" value="" name="order[order_card_cvc]" aria-required="true" placeholder="CVV #">
</div>
</div>

<div class="form-group">
<div class="col-md-12 col-xs-12">
<strong>Expiry Month:*</strong>
<select class="form-control" required  data-stripe="exp_month" placeholder="MM" name="order[order_card_number_date_month]">
    <option value=''>Select Month</option>
    <?
    for ($i=1; $i <= 12; $i++) { 
        echo "<option value='".$i."'>".$i."</option>";
    }
    ?>
</select>
</div>
</div>

<div class="form-group">
<div class="col-md-12 col-xs-12">
<strong>Expiry Year:*</strong>
<select required data-stripe="exp_year" placeholder="YY" class="form-control" name="order[order_card_number_date_year]">
    <option value=''>Select Year</option>
    <?
    for ($i=0; $i <= 10; $i++) { 
        echo "<option value='".(2017+$i)."'>".(2017+$i)."</option>";
    }
    ?>
</select>   
</div>
</div>


<div class="form-group">
<div class="col-md-12"><strong></strong></div>
<div class="col-md-12">

<input type="submit" name="submitbtn" value="Proceed" id="continue_button" class="btn-submit form-control"  />
<div id='checkout_loading' class='row' style='display:none'>
    Loading...
</div>


</div>

</div>

</div>
</div>
</div>
</div>
<!--SHIPPING METHOD END-->
<!--CREDIT CART PAYMENT-->

<!--CREDIT CART PAYMENT END-->


</form>




</div>

</div>
</div>
</div>


</div>

</div>

</div>

</div>

<?
}else{?>

<div class="row">
<div class="col-sm-12 col-md-8 div_center">	
<h3 style="color: red;">You do not have any item in your shopping cart.</h3>
</div>
</div>

<?
}
?>
</div>
</section>



<script>

jQuery(document).ready(function(){
jQuery(".paynow").click(function(){
jQuery('#payment_form_submit').submit();
});
});

</script>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    // this identifies your website in the createToken call below
    Stripe.setPublishableKey("<?=PublishableKey?>");
  var $form = $('#checkout_form123321');

  jQuery(function($) {
    $form.submit(function(event) {

        $("#checkout_loading").show();
        $("#continue_button").hide();

        // event.preventDefault();
        Stripe.card.createToken($form, stripeResponseHandler);
        return false;
    });
  });

    function stripeResponseHandler(status, response) {
      // Grab the form:
      $form.find('.btn-submit').prop('disabled', true);
      //var $form = $('#checkout_form123321');
      
      $("#checkout_loading").hide();

      if (response.error) { // Problem!

        AdminToastr.error(response.error.message,'Error');

        // Show the errors on the form:
        //form.find('.payment-errors').text(response.error.message);
        $form.find('.btn-submit').prop('disabled', false); // Re-enable submission

        $("#checkout_loading").hide();
        $("#continue_button").show();

      }
      else { // Token was created!

        // Get the token ID:
        var token = response.id;
        
        $form.find('.btn-submit').prop('disabled', false); 
        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));

        // Submit the form:
        $form.get(0).submit();

        $("#checkout_loading").hide();
        $("#continue_button").show();

      }
    };

</script>