<?php $this->load->view('widgets/inner_banner')?>

      <section>
    <div class="container">
      <div class="contentSection_view contentSec">
    <div class="container">
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="Shipping-Address">
          <h3>Shipping Address</h3><br>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>First Name</label> <input placeholder="" type="text">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Last Name</label> <input placeholder="" type="text">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Country</label> <input placeholder="" type="text">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Address</label> <input placeholder="" type="text">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>City</label> <input placeholder="" type="text">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>State</label> <input placeholder="" type="text">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Zip/Postal Code</label> <input placeholder="" type="text">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Phone No.</label> <input placeholder="" type="tel">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Email Address</label> <input placeholder="" type="email">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="Shipping-Address">
          <h3>Secure Payment</h3><br>
          <label>Card Type</label> <select>
            <option value="">
              Visa
            </option>
            <option value="">
              MasterCard
            </option>
            <option value="">
              American Express
            </option>
            <option value="">
              Discover
            </option>
          </select> <label>Card Type</label> <input placeholder="Credit Card No." type="text"> <label>Card CVV</label> <input placeholder="" type="text"> <label>Expiration Date</label>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select>
                <option value="">
                  Month
                </option>
                <option value="">
                  January
                </option>
                <option value="">
                  February
                </option>
                <option value="">
                  March
                </option>
              </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select>
                <option value="">
                  Year
                </option>
                <option value="2015">
                  2015
                </option>
                <option value="2016">
                  2016
                </option>
                <option value="2017">
                  2017
                </option>
                <option value="2018">
                  2018
                </option>
                <option value="2019">
                  2019
                </option>
                <option value="2020">
                  2020
                </option>
                <option value="2021">
                  2021
                </option>
                <option value="2022">
                  2022
                </option>
                <option value="2023">
                  2023
                </option>
                <option value="2024">
                  2024
                </option>
                <option value="2025">
                  2025
                </option>
              </select>
            </div>
          </div>
          <p>Pay secure using your credit card.</p>
          <ul class="cards">
            <li>
              <a href="#"><img src="<?=g('base_url')?>assets/front_assets/images/visa.png"></a>
            </li>
            <li>
              <a href="#"><img src="<?=g('base_url')?>assets/front_assets/images/master-card.png"></a>
            </li>
            <li>
              <a href="#"><img src="<?=g('base_url')?>assets/front_assets/images/american-ex.png"></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        <div class="order-place">
          <input type="submit" value="Place Order">
        </div>
      </div>
    </div>
  </div>
    </div>
  </section>

    <!-- Begin: FOOTER -->
    
    
<!-- <form id="formStep2" method="post">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="check-form">
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<input placeholder="First Name" name="order[order_firstname]" value="<?=$userInfo['signup_fname']?>" type="text">
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<input placeholder="Last Name" name="order[order_lastname]" value="<?=$userInfo['signup_lname']?>" type="text">
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<input placeholder="Company Name" name="order[order_company]" type="text">
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="check-form-select"> 
<select name="order[order_country]">
<?php
foreach ($country as $key => $value) {
$country = 223;
?>
<option <?=($country == $value['id']) ? 'selected' : ''?> value="<?=$value['id']?>"><?=$value['country']?></option>
<?
}
?>
</select>
</div> 
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<input placeholder="Street address" name="order[order_address1]" type="text">
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<input placeholder="Town/City" name="order[order_city]" type="text">
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<input placeholder="State / County" name="order[order_state]" type="text">
</div>
</div>
<div class="row">
<div class="col-md-3 col-sm-3 col-xs-12">
<input placeholder="Postcode" name="order[order_zip]" type="text">
</div>
<div class="col-md-3 col-sm-3 col-xs-12 padd-0">
<input placeholder="Phone" name="order[order_phone]" value="<?=$userInfo['signup_phone']?>" type="text" maxlength="11">
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<input placeholder="Email" name="order[order_email]"  value="<?=$userInfo['signup_email']?>" type="text">
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="add-cart">
        <div class="cartsec">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="itm">Product</th>
                  <th class=""></th>
                  <th align="center"></th>
                  <th class="left-text" colspan="2"></th>
                </tr>
              </thead>

            </table>
          </div>
<div class="checkoutsec">

<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="checkout-total">

<?php
foreach ($cart_data as $key => $value) {?>
<h3><?=$value['name']?> (Quantity : <?=$value['qty']?>) <span><?=$value['price']?></span></h3>
<?
}
?>

</div>
<div class="clearfix"></div>
<div class="checkout-total">
<table>
<tbody>
<tr>
<td class="table-back">Subtotal</td>
<td class="table-back2"><?=price($this->cart->total())?></td>
</tr>

<tr>
<td class="table-back"><?=$this->session->userdata()['coupon']['coupon_discount']?>% Discount Applied</td>
<td class="table-back2"><?=price($this->coupon_discount)?></td>
</tr>

<tr>
<td class="table-back">Total</td>
<td class="table-back2"><?=price($this->total_amount)?></td>
</tr>


</tbody>
</table>
<div class="checkout-proced">
<input class="btn btn-primary" type="submit" id="submitStep2" value="Proceed Order">

</div>
</form> -->

  

<!-- <script type="text/javascript">
jQuery("#submitStep2").click(function(){
var data = $("#formStep2").serialize();
var url = $("#formStep2").attr("action");
jQuery.ajax({
type: "POST",
url:  "<?=g('base_url')?>checkout/save_order",
data:  data,
dataType: "json",
success: function(response)
{
Loader.hide();

if(response.status == true){
AdminToastr.info('Your order info successfully saved, You are redirecting to nex step','info');
setTimeout(function() {
window.location = response.txt;
}, 3000);  

}
else{
AdminToastr.error(response.txt,'Error');
}
},
beforeSend: function()
{
Loader.show();
}
});
return false;

});
</script>

 -->

  