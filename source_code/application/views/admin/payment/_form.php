<?global $config;
$model_heads = explode("," , $dt_params['dt_headings'] );
?>
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet box green">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-shopping-cart"></i><?=humanize($class_name)?>
              <small>Add Details to <?=humanize($class_name)?></small>

        </div>
        <div class="tools">
          <a href="javascript:;" class="collapse">
          </a>
          <a href="#portlet-config" data-toggle="modal" class="config">
          </a>
          <a href="javascript:;" class="reload">
          </a>
          <a href="javascript:;" class="remove">
          </a>
        </div>
      </div>
      <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <?$this->load->view("admin/widget/form_generator");?>
        <!-- END FORM-->
      </div>
      <!-- END VALIDATION STATES-->
    </div>
  </div>
</div>
<script>

function copyToClipboard(element,obj) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).val()).select();
    document.execCommand("copy");
    $temp.remove();
    AdminToastr.success('Success','Text Copied');
    $(obj).text('Copied');
    setTimeout((a)=>{
      $(a).text('Copy Reference Link');
    },2000,obj);
  }
  
  $(document).ready(function() {   

    //alert("dlkhf");
    var count = 1;
    var link = $("#payment-payment_link").val();
    $("#payment-payment_paid_status").attr('disabled','true');
    //$(".green").attr('disabled','true');
    $("#payment-payment_link").attr('disabled','true');
    $("#payment-payment_link").css('width','700px');
    


   // $("#payment-payment_price").blur(function(){

     // var link2 = "<?=g('base_url')?>payment/"+count;

     // $("#payment-payment_link").val(link2);

    //  count++;
     
    //});



      Metronic.init(); // init metronic core components
      QuickSidebar.init(); // init quick sidebar
      Demo.init(); // init demo features
      UIAlertDialogApi.init(); //UI Alert API
      <?if(isset($error))
          echo "AdminToastr.error('".str_replace("\n","",validation_errors('<div>', '</div></br>'))."');";
      ?>   
 

      jQuery.datetimepicker.setLocale('de');

      jQuery('.datetimepicker').datetimepicker();

      jQuery('.datepicker').datetimepicker({
      i18n:{
      de:{
      months:[
      'Januar','Februar','März','April',
      'Mai','Juni','Juli','August',
      'September','Oktober','November','Dezember',
      ],
      dayOfWeek:[
      "So.", "Mo", "Di", "Mi", 
      "Do", "Fr", "Sa.",
      ]
      }
      },
      timepicker:false,
      format:'d-m-Y'
      }); 


      jQuery('.timepicker').datetimepicker({
      datepicker:false,
      format:'H:i'
      });      


  });

</script>
<script type="text/javascript">
  // $(document).ready(function(){

  //   $("#payment-payment_paid_status").attr('disabled','true');


  // });
</script>
