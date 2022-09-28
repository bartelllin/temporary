<style type="text/css">

  .productBanner {

    background: url(<?=get_image($banner['banner_image_path'],$banner['banner_image'])?>) no-repeat;

    background-size: cover;

}

.login_wrpr{
    padding: 10px 30px 10px 30px;
    background: #FFF;
    border: #ddd solid 1px;
    width: 100%;
    max-width: 540px;
    margin:40px auto;
    border-bottom: #fee516 solid 3px;
    border-top: #fee516 solid 3px;
}

.contact-information2 input[type="text"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-bottom: 1px solid #cfcfcf;
    margin: 10px 0;
    color: #000;
    font-size: 20px;
    background-color: transparent;
}

.contact-information2 input[type="password"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-bottom: 1px solid #cfcfcf;
    margin: 10px 0;
    color: #000;
    font-size: 20px;
    background-color: transparent;
}
.contact-information2 input[type="submit"]{
    border: none;
    border-radius: 40px;
    background-color: #485355;
    color: #fff;
    padding: 10px 20px;
    font-size: 18px;
    text-transform: uppercase;
    margin: 10px 0;
}


</style>

<section class="innerBanner productBanner">



  <div class="container">



    <div class="row">



      <div class="col-md-12 col-sm-12">



        <h3><?=$banner['banner_title']?></h3>



      </div>



    </div>



  </div>



</section>

<section id="our-works">

    <div class="container">

      <div class="row">

              <div class="col-md-8 center col-md-offset-2">

                    <div class="login_wrpr">

                        <div class="main-heading main-heading2"><h2><?=$banner['banner_title']?></h2></div>

                        <div class="contact-information2">

                            <form id="LoginForm" method="POST" class="cp-form-box">

                                <!-- <form class="omb_loginForm" id="LoginForm" method="POST"> -->

                                <div class="inner-holder">

                                    <input placeholder="Email" name="signup[signup_email]" type="text">

                                </div>

                                <div class="inner-holder">

                                    <input placeholder="Password" name="signup[signup_password]" type="password">

                                </div>

                                <br>

                             <!--   <div class="inner-holder">

                               <h3><span><input type="checkbox">Remember</span>

                                <a href="signup.html">Sign Up</a></h3>

                               </div>  -->

                                

                                <div class="inner-holder">

                                    <button id="LoginSubmit" class="btn checkout-button" style="width:100%;">Login</button>

                                    

                                </div>



                            </form>

                            <span style="margin-left: 15px;">Don't have an account!</span><a href="<?=g('base_url')?>sign-up">Registration</a>

                        </div>

                        

                        <div class="clearfix"></div>

                    </div>

                </div>

      </div>

     <!--  <div class="row">
        
        <div class="col-md-12">
          
          <a href="">Registration</a>
        </div>
      </div>
 -->
       

    </div>

  </section>

<!-- End: innerBanner Sec -->



<!-- Begin: Product Sec-->




<script type="text/javascript">

  

  jQuery("#LoginSubmit").click(function(){

  var data = jQuery("#LoginForm").serialize();

  var url = "<?=g('base_url')?>account/do_login";

  response = AjaxRequest.formrequest(url, data) ;

  console.log(response);

  if(response.status == 1)

  {

    AdminToastr.success(response.txt,'Success');

     window.location='<?=g('base_url').$_GET['redirect']?>';

  }

  else

  {

    AdminToastr.error(response.txt,'Error'); 

  }

return false;

});

</script>