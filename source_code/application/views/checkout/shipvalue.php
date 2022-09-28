<br/><br/>

<label for="postcode">Shipment Rate</label>
<div class="input-box">
<select id="shipmentRate" name="shipmentRate" title="" defaultvalue="" class=" validate-select">
<option value="">Please select shipment</option>


<?php


foreach ($newArr as $key => $value) {
/*
  $temp = preg_replace("(<([a-z]+)>.*?</\\1>)is","",html_entity_decode($value['Service'][0]));
  



  
  if($temp  == 'Priority Mail Express 2-Day')
  { 
          ?>
             <option  value="7.05~USPS Priority Mail (Estimated 2-4 days)">USPS Priority Mail (Estimated 2-4 days) - $7.05</option>
          <?php

  }



  else if($temp  =='First-Class Mail Parcel')
  { 

     
          ?>
             <option  value="2.62~USPS First Class Mail (Estimated 4-8 days)">USPS First Class Mail (Estimated 4-8 days) - $2.62</option>
          <?php
  }

  else if($temp  =='Priority Mail Express 2-Day Legal Flat Rate Envelope')
  { 

     
          ?>
             <option  value="22.95~USPS Priority Mail Express (Estimated 1-2 days))">USPS Priority Mail Express (Estimated 1-2 days)) - $22.95</option>
          <?php
  }
  */
  //else
  //{
    ?>

      <option  value="<?=$value['Rate'][0]?>~<?=$value['Service'][0]?>"><?=preg_replace("(<([a-z]+)>.*?</\\1>)is","",html_entity_decode($value['Service'][0]))?> - $<?=$value['Rate'][0]?></option>


    <?php 
  //}

?>
   
    
  <?php

  // }

}
?>

</select>
</div>


<script type="text/javascript">
    jQuery( "#shipmentRate" ).change(function() {

       var ShipRate = jQuery( "#shipmentRate" ).val();
       var grandTotal = jQuery( "#grandTotal" ).val();
       

       jQuery.ajax({
        type: "POST",
        url: "<?=g('base_url')?>checkout/updateShippment",
        data:  "grandTotal="+grandTotal+"&ShipRate="+ShipRate,
        dataType: "json",

        success: function(response)
        {      

           //hide_loader();
           jQuery("#shipmentPrice").html("$"+response.shipPrice);
           jQuery("#grandTotalDivID").html(response.totalShipGrand);
           jQuery("#item_count").html(response.totalShipGrand);
           
           
        },
        beforeSend: function()
        {
           //show_loader();
        }
        });
        return false; 


    });
</script>