<style type="text/css">
  .contentSec a {
    color:#F15D29;
  }
</style>
<style type="text/css">
  th{
    color:#e80d16;
  }

 .about_bg {
background-image: url(<?=get_image($banner['banner_image_path'],$banner['banner_image'])?>);
} 

a{
  font-family: initial;
}


</style>


<? $this->load->view('widgets/inner_banner'); ?>


<? $this->load->view("widgets/breadcrumb"); ?>
<div class="faqss container">


<section class="register-main">
<div class="container">

<div class="clearfix"></div>
<div class="main">

<!--login-banner-->
<div class="contentSec">
<div class="contactSec">
<div class="container">

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
              
            	<div class="row">
                <div class="portlet grey-cascade box">
                          <div class="portlet-body">
                            <div class="table-responsive">
                              <table class="table table-hover table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Order#</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Item Status</th>
                                <th>View Detail</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                             // / debug($orders);exit;
                              foreach ($orders as $key => $value) {                               
                              ?>
                              <tr>
                                <td style="font-family: -webkit-pictograph;"><?=$value['order_id']?></td>
                                <td style="font-family: -webkit-pictograph;">
                                   <?=date('d M Y',strtotime($value['order_createdon']))?>
                                </td>
                                <td style="font-family: -webkit-pictograph;">
                                   <?=price($value['order_item_subtotal']);?>
                                </td>
                                <td style="font-family: -webkit-pictograph;">
                                <?php
                                if($value['order_payment_status'] == 1){
                                ?>
                                  <span class="label label-sm label-success" style="font-size: 14px">
                                  Payment Accepted
                                  </span>
                                <?php
                                }
                                elseif($value['order_payment_status'] == 2){
                                ?>
                                  <span class="label label-sm label-warning" style="font-size: 14px">
                                  Payment Pending
                                  </span>
                                <?php
                                }
                                elseif($value['order_payment_status'] == 3){
                                ?>
                                  <span class="label label-sm label-danger" style="font-size: 14px">
                                  Transaction Failed
                                  </span>
                                <?php
                                }
                                elseif($value['order_payment_status'] == 4){
                                ?>
                                  <span class="label label-sm label-info" style="font-size: 14px">
                                  Held for Review
                                  </span>
                                <?php
                                }
                                elseif($value['order_payment_status'] == 0){
                                ?>
                                  <span class="label label-sm label-default" style="font-size: 14px">
                                  Order Placed
                                  </span>
                                <?php
                                }
                                ?>
                                </td>
                                <td>
                                  <a href="javascript:void(0);" data-invoiceID="<?=$value['order_id']?>" class="popupInvoice" style="color:#000">View</a>
                                </td>
                                
                              </tr>
                              <?php
                              }
                              ?>
                              </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
              </div>

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
<!--Signup-->

</div>
</section>
</div>

<style type="text/css">
  .modal-dialog {
    margin: 30px auto;
    width: 90%;
}
</style>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel" style="color:#000;">Invoice Detail</h4>
</div>
<div class="modal-body" id="bodyID"  style="color:#000;">

</div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function () {	
	$("#submitInfo").click(function(){
	var data = $("#saveForm").serialize();
	var url = $("#saveForm").attr("action");
	AjaxRequest.fire(url, data) ;
	//window.location = '<?=g("base_url")?>';
	return false;
	});
});


$(document).ready(function(){
  $(".popupInvoice").click(function(){
    var order_id = $(this).attr("data-invoiceID");
    //$('#myModal').modal('show');
    var site_url = "<?=g('base_url')?>";
    $.ajax({
    type: "POST",
    url: site_url+"account/getinvoice",
    data:  "order_id="+order_id,
    dataType: "html",
    success: function(response)
    {
      Loader.hide();
      $('#myModal').modal('show');
      $("#bodyID").html(response);
    },    
    beforeSend: function()
    {
      Loader.show();
    }
    });



  });
});
</script>