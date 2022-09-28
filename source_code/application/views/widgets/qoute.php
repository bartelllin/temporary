<div class="quoteSec">

<div class="container">

<div class="col-md-12 col-sm-12 col-xs-12">

<div class="quoteForm">

<div class="quoteHead text-center text-uppercase">

<h6>quit tech llc</h6>

<h2>get a quote</h2>
<form id="contactform" method="post" action="<?=g('base_url')?>home/inquiry">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">

<input type="text" name="inquiry[inquiry_name]" placeholder="Name"/>

<input type="email" name="inquiry[inquiry_email]" placeholder="Email"/>

<input type="tel" name="inquiry[inquiry_phone]" placeholder="Phone" onkeypress="return isNumberKey(event)" maxlength="11"/>

<input type="text" name="inquiry[inquiry_subject]" placeholder="Subject"/>

<? $this->load->view('widgets/google_captcha'); ?>

</div>

<div class="col-md-6 col-sm-6 col-xs-12">

<textarea name="inquiry[inquiry_detail]" placeholder="Details of scenerio"></textarea>

<input type="text" name="inquiry[inquiry_besttime]" placeholder="Best Time to Reach" id="datepicker"/>

<span class="btn btn-default btn-file">

attach supporting documents <input type="file" name="inquiry[inquiry_image]">

</span>
<input type="submit" id="contactbtn" value="Contact Now"/>

</div>

</div>
</form>
</div>

</div>

</div>

</div>

</div>



<script type="text/javascript">
$(document).ready(function () { 
$("#contactbtn").click(function(){

var data = new FormData(document.getElementById("contactform"));
var url = $("#contactform").attr("action");
result = FileUploadScript.fire(url, data, 'json') ;
return false;

}); 

});
</script>

<SCRIPT language=Javascript>

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;

return true;
}

</SCRIPT>