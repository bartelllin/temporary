<style type="text/css">
  .contentSec a {
    color:#F15D29;
  }
</style>
<style type="text/css">
  .form-control, input[type="text"], input[type="submit"], textarea {
    font-family: "Raleway",sans-serif;
    margin: 6px;
    
}

.contactSec input[type="button"] {
    background-color: #e80d16;
    border-style: solid;
    border-width: 2px;
    float: left;
    font-size: 20px;
    font-weight: 600;
    padding: 4px 19px;
}


.form-control {
    background-color: #ffffff;
    background-image: none;
    border: 1px solid #cccccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555555;
    display: block;
    font-size: 14px;
    height: 45px;
    line-height: 1.42857;
    margin-bottom: 10px;
    padding: 10px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    vertical-align: middle;
    width: 100%;
}
.contactSec input[type="submit"] {
    background-color: #e80d16;
    
    
    border-style: solid;
    border-width: 2px;
    float: left;
    font-size: 20px;
    font-weight: 600;
    padding: 4px 19px;
}


</style>
<? $this->load->view('widgets/inner_banner'); ?>
<div class="clearfix"></div>
<? $this->load->view("widgets/breadcrumb"); ?>
<div class="faqss container">

<section class="register-main">
<div class="container">
<div class="main">


<div class="contentSec">
<div class="contactSec">
<div class="container">

<!--login-banner-->

<div class="signup myfont">

<div class="container" id='goTo'>
        <br/>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <? $this->load->view("account/menu"); ?>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="content-page">

<?php

$Id = $this->userid;
$userData = $this->model_signup->find_one(
              array('where'=>array('signup_id' => $Id,'signup_status'=>1)));

//debug($userData,1);

?>

<div class="well well-sm">
  <form enctype="multipart/form-data" method="post" id="contactForm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                      <?php if($userData['signup_profile_image']){ ?>

                      <img style="width: 500px; height: 250px;" src="<?=get_image($userData['signup_image_path'],$userData['signup_profile_image'])?>" alt="" class="img-rounded img-responsive" />
                      <?php }else{ ?>
                        <img style="width: 500px; height: 250px;" src="http://placehold.it/500x250" alt="" class="img-rounded img-responsive" />
                    <?php } ?>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            <?=$userData['signup_name']?>
                        </h4>

                      <input type="hidden" name="signupId" value="<?=$this->userid?>">
                        <input type="file" id="uploadImg" name="signupImg" class="form-control my-form-control my-margin-bottom-15" value="">

                        <input type="button" class="btn btn-default" value="Upload" id="add_data" style="color:#fff">
                        
                        </div>
                    </div>
                  </form>
                </div>

            	<!-- <div class="row">

<form enctype="multipart/form-data" method="post" id="contactForm">


<input type="hidden" name="artist_profile[artist_profile_userid]" value="<?=$this->userid?>">

<div class="col-lg-6 col-md-6 col-sm-6">


<label>Title</label>
<input type="text" name="artist_profile[artist_profile_title]" class="form-control my-form-control my-margin-bottom-15" value="" placeholder="Title *">


<label for="comment">Description:</label>
  <textarea class="form-control" name="artist_profile[artist_profile_description]" rows="5" id="description"></textarea>

  <label for="comment">Biography:</label>
  <textarea class="form-control" name="artist_profile[artist_profile_bio]" rows="5" id="comment"></textarea>

  <label for="comment">Contact Info:</label>
  <textarea class="form-control" name="artist_profile[artist_profile_contactinfo]" rows="5" id="comment"></textarea>


</div>


</form>
</div> -->

            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>

</div>

</div>
</div>
</div>

</div>

</div>
</section>
</div>

<!--Signup-->
<script type="text/javascript">

$(document).ready(function(){

 $("#add_data").click(function(){


    if(document.getElementById("uploadImg").files.length == 0){

      alert("Upload Profile Photo!");

    }else{

      //$("#loader").show();

            var formData = new FormData($('#contactForm')[0]);
            //var formData = new FormData($('#contactForm')[0]);
         
            $.ajax({ 
               url: '<?=g('base_url')?>contact_us/Addprofile',
               type: 'POST',
               data: formData,
               async: false,
               cache: false,
               contentType: false,
               processData: false,
               dataType: "json",
          success: function (response) {
            console.log(response);
            if(response.status){

              
              setTimeout(function(){
                $("#loader").hide();
                AdminToastr.success(response.txt,'Success');

              },2000)
              
             location.reload(); 

            }
            else
            {
               AdminToastr.error(response.txt,'Error'); 
                return false;
            }
        },
      
      });
  } 

});

});



$("#add_data").click(function(){


    if(document.getElementById("uploadImg").files.length == 0){

      alert("Upload Profile Photo!");

    }else{

      //$("#loader").show();

            var formData = new FormData($('#contactForm')[0]);
            //var formData = new FormData($('#contactForm')[0]);
         
            $.ajax({ 
               url: '<?=g('base_url')?>contact_us/Addprofile',
               type: 'POST',
               data: formData,
               async: false,
               cache: false,
               contentType: false,
               processData: false,
               dataType: "json",
          success: function (response) {
            console.log(response);
            if(response.status){

              
              setTimeout(function(){
                $("#loader").hide();
                AdminToastr.success(response.txt,'Success');

              },2000)
              
             location.reload(); 

            }
            else
            {
               AdminToastr.error(response.txt,'Error'); 
                return false;
            }
        },
      
      });
  } 

});

</script>