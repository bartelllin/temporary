<?php $this->load->view('widgets/inner_banner')?>

     <div class="contentSection_view">
    <div class="container">
      <div class="col-md-6 col-xs-6 col-sm-6">
        <div class="simple_Cart">
          <h1>YOUR CART</h1>
        </div>
      </div>
      <div class="col-md-6 col-xs-6 col-sm-6">
        <div class="simple_Cart">
          <a href="#"><i aria-hidden="true" class="fa fa-angle-left"></i>RETURN TO shop</a>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="col-md-1 col-sm-2">Product</th>
                <th class="col-md-3 col-sm-2"></th>
                <th class="col-md-2 col-sm-2 text-center">Price</th>
                <th class="col-md-2 col-sm-2 text-center">Quantity</th>
                <th class="col-md-2 col-sm-2 text-center">Total</th>
                <th class="col-md-2 col-sm-2 text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-md-1 col-sm-2 said" data-th="Image"><img src="<?=g('base_url')?>assets/front_assets/images/pro-img1.jpg"></td>
                <td class="col-md-3 col-sm-2" data-th="Description">
                  <div>
                    <h6>Lorem ipsum dolor ist amet</h6>
                  </div>
                </td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Quantity">$95.00</td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Unit Price"><input id="quantity" min="1" name="quantity" type="number" value="1"></td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Sub Price">$190.00</td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Action">
                  <ul>
                    <li>
                      <a href="#"><i aria-hidden="true" class="fa fa-times"></i></a>
                    </li>
                  </ul>
                </td>
              </tr>
              <tr>
                <td class="col-md-1 col-sm-2 said" data-th="Image"><img src="<?=g('base_url')?>assets/front_assets/images/pro-img1.jpg"></td>
                <td class="col-md-3 col-sm-2" data-th="Description">
                  <div>
                    <h6>Lorem ipsum dolor ist amet</h6>
                  </div>
                </td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Quantity">$95.00</td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Unit Price"><input id="quantity" min="1" name="quantity" type="number" value="1"></td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Sub Price">$190.00</td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Action">
                  <ul>
                    <li>
                      <a href="#"><i aria-hidden="true" class="fa fa-times"></i></a>
                    </li>
                  </ul>
                </td>
              </tr>
              <tr>
                <td class="col-md-1 col-sm-2 said" data-th="Image"><img src="<?=g('base_url')?>assets/front_assets/images/pro-img1.jpg"></td>
                <td class="col-md-3 col-sm-2" data-th="Description">
                  <div>
                    <h6>Lorem ipsum dolor ist amet</h6>
                  </div>
                </td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Quantity">$95.00</td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Unit Price"><input id="quantity" min="1" name="quantity" type="number" value="1"></td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Sub Price">$190.00</td>
                <td class="col-md-2 col-sm-2 text-center" data-th="Action">
                  <ul>
                    <li>
                      <a href="#"><i aria-hidden="true" class="fa fa-times"></i></a>
                    </li>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="container">
        <div class="row">
        <div class="col-md-6 col-xs-8 col-sm-6 one-Time">
          <div class="coupan_CodE">
            <input type="text" placeholder="Coupon Code"> <a class="apply_coupan" href="#">Apply Coupon</a>
          </div>
        </div>
        <div class="col-md-6 col-xs-4 col-sm-6 one-Time">
          <div class="coupan_CodE update-oNe">
            <a class="apply_coupan" href="#">Update Cart</a>
          </div>
        </div>
        </div>
      </div>
      <div class="col-md-7 pull-right fullRow">
        <div class="total_cArt">
          <h1>Cart Totals</h1>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered priceTable">
            <tbody>
              <tr class="Sub-Total">
                <th class="col-md-6">Sub Total</th>
                <td class="col-md-6" data-th="Sub Total">£87.00</td>
              </tr>
              <tr class="Pricing-Charge">
                <th class="col-md-6">Shipping</th>
                <td class="col-md-6" data-th="Pricing Charge">
                  <div class="roundradio">
                    <label class="radio-inline"><input id="inlineRadio1" name="inlineRadioOptions" type="radio" value="option1"> Free Shipping</label><br>
                    <label class="radio-inline"><input id="inlineRadio1" name="inlineRadioOptions" type="radio" value="option1"> Flat Rate: <span>$10.00</span></label>
                    <p>Calculate Shipping</p>
                  </div>
                </td>
              </tr>
              <tr class="Promotion-Discount">
                <th class="col-md-6">Total</th>
                <td class="col-md-6" data-th="Promotion Discount">$197.00</td>
              </tr>
            </tbody>
          </table>
          <div class="Continue-Shopping">
            <!-- <td class="col-md-6"><a href="" class=""></a></td> -->
            <div class="col-md-12 nopadding">
              <a class="form-control" href="#"><span>Proceed to checkout</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


 


<!-- <script type="text/javascript">
$(document).ready(function(){
$(".checkoutbutton").click(function(){
$.ajax({
type: "POST",
url: "<?=g('base_url')?>checkout/check_checkoutpage",
data:  "",
dataType: "json",
success: function(response)
{    
if(response.status){
window.location = '<?=g("base_url")?>checkout/step2';
}
else{
window.location = '<?=g("base_url")?>register';
// window.location = '<?=g("base_url")?>checkout/step2';
}
},
beforeSend: function()
{

}
});
return false;   
});    


});



$('.btn-send').on('click', function () {

        //alert("hi");
        //var totalVal = $(".totalVal").val();
        var coupon = $(".dis").val();

        var obj = $(".contact-form");
        // Get form data
        var data = obj.serialize();
        // Get post url
        var url = "<?=g('base_url')?>checkout/coupon";
        // Submit action
        var response = AjaxRequest.fire(url, data);
        if(response.status){

            $(location).attr('href',window.location.href);
        }
        // Add return
        return false;
    });


</script> -->
