<?
// Banner heading
$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- body-content -->
<div class="body-content clearfix">

    <!-- block top -->
    <div class="bg-color1 block-section line-bottom">
        <div class="container">
            <form method="post" action="<?=g('base_url')?>user/reset-password" id="update-pa">
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="New Password">
                </div>
                <input type="hidden" name="token" value="<?=$token_user?>">
                <input type="hidden" name="user_id" value="<?=$user_id?>">
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-reset-password">
                </div>
            </form>

        </div>
    </div>
    <!-- end block top -->

</div>
<!--end body-content -->
<script>
    // On submit action start (all tabs form)
    $('.btn-reset-password').click(function(event) {
        // Get button obj
        var btn = $(this);
        // Get form
        var form = $(this).closest('form');
        // Get form id
        var $form = form.attr('id');
        // Disable the submit button to prevent repeated clicks:
        btn.prop('disabled', true);

        // Get action url
        var url = form.attr('action');
        // Get form data
        var data = form.serialize();
        // Submit action
        var response = AjaxRequest.fire(url, data);
        // Register success
        if (response.status) {
            btn.prop('disabled', false);
            window.location.href = '<?=g("base_url").'user/login'?>'
        }
        // Fail
        else {
            // Enable form
            btn.prop('disabled', false);
        }

        event.preventDefault();
        return false;
    });
    // On submit action end
</script>
