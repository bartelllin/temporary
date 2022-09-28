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

                            <!-- form login -->
                            <form method="post" action="<?=g('base_url')?>user/save" id="signup-form">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" name="signup[signup_firstname]" placeholder="First Name" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" name="signup[signup_lastname]" placeholder="Last Name" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="signup[signup_email]" placeholder="Email" type="email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="signup[signup_password]" placeholder="Password" type="password">
                                </div>
                                <div class="form-group">
                                    <label>Re-type Password</label>
                                    <input class="form-control" name="signup_password_confirm" placeholder="Re-type Password" type="password">
                                </div>
                                <div class="white-space-10"></div>
                                <div class="form-group no-margin">
                                    <button class="btn btn-theme btn-lg btn-t-primary btn-block" id="btn-signup">Register</button>
                                </div>
                            </form><!-- form login -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="white-space-20"></div>
            <div class="text-center ">By creating an account, you agree to Sydney Maurice Business Services <br><a href="<?=g('base_url')?>terms-of-service" class=""><strong>Terms of Service</strong></a> and consent to our <a href="<?=g('base_url')?>privacy-policy" class=""><strong>Privacy Policy</strong></a>.</div>
        </div>
    </div>

</div>
<!--end body-content -->

<!-- Sign up ajax start-->
<script type="text/javascript">
    $(document).ready(function(){
        // Get form object
        var $form = $('#signup-form');
        // On submit action start
        //$form.submit(function(event) {
        $('#btn-signup').click(function(event) {

            // Disable the submit button to prevent repeated clicks:
            $form.find('#btn-signup').prop('disabled', true);
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
                $form.find('#btn-signup').prop('disabled', false);
                // Reset form
                $form[0].reset();
                setTimeout(function(){
                    location.href = '<?=g('base_url')?>';
                },3000);

            }
            // Register fail
            else {
                // Enable form
                $form.find('#btn-signup').prop('disabled', false);
            }

            event.preventDefault();
            return false;
        });
        // On submit action end
    });
</script>