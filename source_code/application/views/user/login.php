<?
// Banner heading
$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- body-content -->
<div class="body-content clearfix">

    <div class="block-section ">
        <div class="container">
            <div class="panel panel-md">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- buttons top -->
                            <p><a href="javascript:void(0)" onclick="loginFB()" class="btn btn-primary btn-theme btn-block"><i class="fa fa-facebook pull-left bordered-right"></i> Login with Facebook</a></p>
                            <p><a href="<?= g('base_url').'hauth/login/Google';?>" class="btn btn-danger btn-theme btn-block"><i class="fa fa-google-plus pull-left bordered-right"></i> Login with Google</a></p>
                            <!-- end buttons top -->

                            <div class="white-space-10"></div>
                            <p class="text-center"><span class="span-line">OR</span></p>

                            <!-- form login -->
                            <form method="post" action="<?=g('base_url')?>user/login_process" id="login-form">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" placeholder="Email" type="email" name="signup[signup_email]" id="email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Password" type="password" name="signup[signup_password]" id="password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12 text-right">
                                            <div class="">
                                                <label><a href="#" data-toggle="modal" data-target="#forgot-password" class="forgot-password">Forgot password?</a> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group no-margin">
                                    <?
                                    if(isset($_GET['refer'])){?>
                                        <input type="hidden" value="<?=$_GET['refer']?>" name="refer">
                                    <?}
                                    ?>
                                    <button class="btn btn-theme btn-lg btn-t-primary btn-block" id="btn-login">Log In</button>
                                </div>
                            </form><!-- form login -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="white-space-20"></div>
            <div class="text-center ">Not a member? &nbsp; <a href="<?=g('base_url')?>user/register" class=""><strong>Create an account free</strong></a></div>
        </div>
    </div>

    <!-- Forgot Password Start Modal-->
    <div class="modal fade" id="forgot-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
                </div>
                <form method="post" action="<?=g('base_url')?>user/forgot" id="forgot-form">
                    <div class="modal-body form-group">
                        <p><label>Email</label></p>
                        <p><input class="form-control" name="signup[signup_email]" type="email" placeholder="Email"></p>
                        <p><?$this->load->view('widgets/google_captcha')?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary user-pass-rec-btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Forgot Password End Modal-->

</div>
<!--end body-content -->

<!-- Login and forgot pass ajax start-->
<script type="text/javascript">
    $(document).ready(function(){
        var $form = $('#login-form');
        // On submit login action start
        //$form.submit(function(event) {
        $('#btn-login').click(function(event) {
            // Get input data
            var email    = $('#email').val();
            var password = $('#password').val();
            // Define regular expression
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            // Checking fields (both fields empty)
            if((email=='') && (password=='')){
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Email field is required.</span>' +
                '<span for="%s" style="color:#fff" class="has-error help-block">Password field is required.</span>','Error');
            }
            // Email validation
            else if(email==''){
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Email field is required.</span>');
            }
            else if(!regex.test(email)){
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Invalid email address</span>');
            }
            // Password validation
            else if(password==''){
                AdminToastr.error('<span for="%s" style="color:#fff" class="has-error help-block">Password field is required.</span>');
            }
            else{
                // Disable the submit button to prevent repeated clicks:
                $form.find('#btn-login').prop('disabled', true);
                // Get form
                var form = $(this).closest('form');
                // Get action url
                var url = form.attr('action');
                // Get form data
                var data = form.serialize();
                // Submit action
                var response = AjaxRequest.fire(url, data);
                // Register success
                if (response.status) {
                    $form.find('#btn-login').prop('disabled', false);
                    // Reset form
                    $form[0].reset();
                    // Redirect to Time line page
                    window.location.href = response.refer;

                }
                // Register fail
                else {
                    // Enable form
                    $form.find('#btn-login').prop('disabled', false);

                }
            }

            return false;
        });
        // On submit login action end

        // Submit Form Modal Start
        $('.user-pass-rec-btn').on('click',function(){
            // Get form obj
            var $form = $('#forgot-form');
            // Get form
            var form = $(this).closest('form');
            // Get action and form data
            var data = form.serialize();
            var url = form.attr('action');

            // Submit action
            var response = AjaxRequest.fire(url, data);
            // Register success
            if (response.status) {
                // Reset form
                $form[0].reset();
                // Close Dialog box
                $('#forgot-password').modal('toggle');

            }

            return false;
        });
        // Submit Form Modal End
    });
</script>

<!--FACEBOOK LOGIN START-->
<script>
    var test;
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1535745989876524',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.11'
        });
        FB.AppEvents.logPageView();
        checkLoginState();
    };
    function returnLoginStateFB(){
        var result = '';
        FB.getLoginStatus(function(response) {
            result = response.status;
        });
        return result;
    }

    function login()
    {
        FB.api('/me', { locale: 'en_US', fields: 'name, email' },
            function(e) {

                var id  = e.id;
                var email  = e.email;
                var name  = e.name;

                var data = {id:id,email:email,name:name};

                var url = "<?=l('hauth/fb_login')?>";
                var response = AjaxRequest.fire(url, data) ;

                if(response.status)
                {
                    location.reload();
                }
                else
                {
                    //window.location = response.url;
                }


            }
        );
    }

    function logoutFB(){
        FB.logout(function(response) {
            checkLoginState();
        });
    }
    function loginFB() {

        FB.login(function(response) {
            checkLoginState();
            login();
        }, {scope: 'email,public_profile,user_friends'});
        login();

    }

    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            console.log("1");
            if(response.status=='connected'){
                $('#fbLinkLog').html('').append('<a id="linkId" href="#" onclick="logoutFB();"> Logout</a>');
            }
            else{
                $('#fbLinkLog').html('').append('<a id="linkId" href="#" onclick="loginFB();"> Login</a>');
            }
        });
    }
    function showError(id,msg){
        $('#'+id).html('');
        $('#'+id).show();
        $('#'+id).html('<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">Ã—</a><strong>Error!</strong> '+msg+'.</div>').delay(1000).fadeOut();
    }
    function showSuccess(id,msg){
        $('#'+id).html('');
        $('#'+id).show();
        $('#'+id).html('<div class="alert alert-success"><strong>Success! </strong>'+msg+'</div>').delay(1000).fadeOut();
    }
    function postOnwallFB(){
        var checkLinked = $('#check-fb').prop('checked');
        if(!checkLinked) return;
        if(returnLoginStateFB()=='connected'){
            var hash = {link:$('#link').val(),url:$('#imagepath').val()};
            var postingMethod = false;
            var prefix = '';
            if(hash['url']=="" && hash['link']==""){
                postingMethod = true;
            }
            if(hash['link']!=""&&!postingMethod){
                hash['message'] = $('#fb_description').val();
                hash['link'] = $('#link').val();
                postingMethod = true;
                prefix = 'feed';
            }
            if(hash['url']!=""&&!postingMethod){
                hash['message'] = $('#fb_description').val();
                postingMethod = true;
                prefix = 'photos';
            }
            FB.api('/me/'+prefix, 'post', hash, function(response) {
                if (!response || response.error) {
                    showError('msg','Some error occured.');
                } else {
                    showSuccess('msg','Posted on your wall.');
                }
            });
        } else {
            showError('msg','Facebook Account is not logged in');
        }
    }
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--FACEBOOK LOGIN END-->