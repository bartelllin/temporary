<? $this->load->view("home/slider"); ?>

<div class="contentSec">
<div class="contactSec">
<div class="container">
<div class="productHead"> Shopping Cart - Payment</div>


<div class="col-md-3 col-sm-3 customCS1"></div>
<div class="col-md-6 col-sm-6 customCS1">
<h3>Card Information</h3>
<form action="<?=g('base_url')?>checkout/payline_payment" id="cardForm" method="post">
<input type="hidden" name="order_id" value="<?=intval($_GET['oid'])?>">
<div class="form-group">
<label for="firstname">Card Holder <span class="require">*</span></label>
<input type="text" class="my-form-control" value="" id="firstname" name="card_name">
</div>
<div class="form-group">
<label for="lastname">Card No <span class="require">*</span></label>
<input type="text" class="my-form-control" value="" id="lastname" name="card_no">
</div>
<div class="form-group">
<label for="email">Card Expiry <span class="require">*</span></label>
<input type="text" class="my-form-control" value="" id="email" name="card_expiry">
</div>

<div class="form-group">

<input type="submit" value="Proceed" id="cardSubmit"  />
<a href="<?=g('base_url')?>checkout/invoice_preview?oid=<?=$_GET['oid']?>" style="color:#fff;">
&nbsp;
Order Preview</a>
</div>

</div>
<div class="col-md-3 col-sm-3 customCS1"></div>



</form>


<script type="text/javascript">

jQuery("#cardSubmit").click(function(){
var data = $("#cardForm").serialize();
var url = $("#cardForm").attr("action");
jQuery.ajax({
type: "POST",
url:  url,
data:  data,
dataType: "json",
success: function(response)
{
Loader.hide();
if(response.status == true){
	AdminToastr.success(response.message,'Success');
	window.location = response.url;
}
else{
AdminToastr.error(response.message,'Error');
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


<div class="clear"></div>
<div class="newsLetter">
<div class="col-md-4 newsCS1">
<div class="newsHead"><?=$newsletter['cms_page_name']?></div>
<div class="newsTxt"><?=html_entity_decode($newsletter['cms_page_content'])?></div>
<form method="post" id="newsletterconForm" action="">
<input type="text" placeholder="Enter Your Email" name="newsletter[newsletter_email]"/>
<input value="Submit Now" id="submitnewCo" type="submit" style="padding: 8px 18px;font-size:15px;">
</form>
</div>
<div class="col-md-4"></div>
<div class="col-md-4 newsCS2">
<div class="newsHead">Any Questions? <br/> Feel free to make a call</div>
<div class="headBorder"><span></span></div>

<div class="contactNumber">
<a href="#"></a><?=$this->layout_data['config_info']['admin']['company_phone']?>
</div>
<a href="mailto:<?=$this->layout_data['config_info']['admin']['sales_email']?>">or send an email <span>></span></a>
</div>
</div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function () {
$("#submitnewCo").click(function(e){
var data = $("#newsletterconForm").serialize();
var url = "<?=g('base_url')?>contactus/newsletter";
AjaxRequest.fire(url, data) ;
return false;
});

});
</script>

<!-- Footer Sec Starts Here -->
<?= $this->load->view("_layout/footer"); ?>
<!-- Footer Sec Ends Here -->
</div>