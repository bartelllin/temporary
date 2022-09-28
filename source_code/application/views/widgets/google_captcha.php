<!--  For Single Capthac... -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="g-recaptcha" data-sitekey="<?=GOOGLE_CAPTCHA_SITE_KEY?>"></div> 




<!-- For Multiple Captcha... -->

<!--   
<script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
<script>
var recaptcha1;
var recaptcha2;
var myCallBack = function() {
//Render the recaptcha1 on the element with ID "recaptcha1"
recaptcha1 = grecaptcha.render('recaptcha1', {
'sitekey' : '<?=GOOGLE_CAPTCHA_SITE_KEY?>', //Replace this with your Site key
'theme' : 'light'
});

//Render the recaptcha2 on the element with ID "recaptcha2"
recaptcha2 = grecaptcha.render('recaptcha2', {
'sitekey' : '<?=GOOGLE_CAPTCHA_SITE_KEY?>', //Replace this with your Site key
'theme' : 'dark'
});
};
</script>
-->