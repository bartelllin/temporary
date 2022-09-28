<?global $config;?>

<!-- BEGIN LOGIN -->
<div class="content">
  <!-- BEGIN LOGIN FORM -->
  <div>
    <a href="<?=$config['base_url']?>admin">
    <img style="max-width: 50%;max-height: 50%;" src="<?=Links::img($logo[0]['logo_image_path'],$logo[0]['logo_image'])?>" alt=""/>
    </a>
  </div>

  <form class="login-form" action="<?=$config['base_url']?>admin/login/" method="post">
    <h3 class="form-title" style="color:#CB5702;">
    </h3>
    <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span>
      Enter any username and password. </span>
    </div>
    <?if(isset($error)){?>
      <div class="alert alert-danger">
          <button class="close" data-close="alert"></button>
          <span>
            <?echo $error;?> 
          </span>
      </div>
    <?}?>
    <div class="form-group">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <input type="hidden" value="<?=(isset($_GET['redirect_url']))?$_GET['redirect_url']:''?>" name="redirect_url" />
      <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="user_email"/>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="user_password"/>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-success uppercase">Login</button>
      <!--<label class="rememberme check">
      <input type="checkbox" name="remember" value="1"/>Remember </label>-->
    </div>
    <div class="clearfix"></div>
    
  </form>
  <!-- END LOGIN FORM -->
  <!-- BEGIN FORGOT PASSWORD FORM -->
  <form class="forget-form" action="index.html" method="post">
    <h3>Forget Password ?</h3>
    <p>
       Enter your e-mail address below to reset your password.
    </p>
    <div class="form-group">
      <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
    </div>
    <div class="form-actions">
      <button type="button" id="back-btn" class="btn btn-default">Back</button>
      <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
    </div>
  </form>
  <!-- END FORGOT PASSWORD FORM -->
</div>