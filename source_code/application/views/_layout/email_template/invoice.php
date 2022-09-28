<?php 

$country =  $this->model_country->find_by_pk($order[0][ 'order_country' ]);

$countryname = $country['country'];

$price = 0;
$items = 0;

  
  
  
  $para['joins'][] = array(
                  "table"=>"order_item" ,
                  "joint"=>"order_item.order_item_order_id = order.order_id ", 
                );


  $para['joins'][] = array(
                  "table"=>"signup" ,
                  "joint"=>"signup.signup_id = order.order_user_id ", 
                  "type"=>"left"
                );

  
  $para['joins'][] = array(
                  "table"=>"product" ,
                  "joint"=>"product.product_id = order_item.order_item_product_id ", 
                );

    $para['where']['order_item_order_id'] = $invoiceID; 
    $order_item = $this->model_order->find_all($para);





foreach ($order_item as $key => $value) {
  $price = $price + $value['order_item_subtotal'];
  $items = $items + 1 ;
}


// debug($order_item); exit;



$amount = 0;
foreach ($order_item as $key => $value) {

  $amount  = $amount  + $value['order_item_subtotal'];
}


// $order = $this->model_order->find_by_pk();


if($order_item[0]['order_discount_code'] != '')
{

  $coupondiscount =  $discount = $order_item[0]['order_discount_percent'];

}
else
{
  $discount = 0;
}

if($order_item[0]['order_item_discount'] > 19 )
{
  $qtydiscount = $discount = $discount + 10 ;
}
else
{
    $qtydiscount = 0;
}



  $deliverycharges = $order_item[0]['order_shipping_rate'];
// if($order_item[0]['order_shipping'] != '' )
// {
// }
// else
// {
//   $deliverycharges = g("db.admin.dilevery_charges");
// }


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>


</head>

<body style="background:url()">
<table width="600" border="0" align="center" bgcolor="ffffff" border="10px" style=" background:url(bgggg.png)">
  <tbody>
   

    <tr>
      <td><h1 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    color: #8BC34A;
    font-size: 40px;
    text-align: center;
    ">


    <center>
      <img  src="<?=g('site_logo');?>" style=";display: block; width: 200px;"/>
    </center>

    </h1></td>
    </tr>
    
    <tr>
      <td>
	
	

<table style="font-family: sans-serif;" >
                <tr class="span-cus">
                	<td style="width: 200px;">
                        <!--<strong style="display:block;">Main Contain L.L.C</strong> 
                        <span style="display:block;">P.O Box 7367</span>--> 
						          <span style=" color: #26336d; display:block;"><?=g('db.admin.sales_email');?></span>
                      <span style=" color: #26336d; display:block;"><?=g('db.admin.company_address');?></span>
                        
                    </td>
                    <td style="width: 100px;"></td>

                </tr>	
             </table>
			 
        
            <table style="font-family: sans-serif;" width="600">
            	<tr>
              <center>
                <h2 style="font-family: sans-serif; color: #26336d;">SALES RECEIPT</h2>
              </center>
                    	
                  
                </tr>
            	
            	<tr>
                	<th style="text-align:left; width:30%; color: #26336d">BILL TO</th>
                    <th style="text-align:left; width:30%;"></th>
                    <th style="text-align:left; width:30%; font-weight:200;">
                    	<strong  style="color: #26336d;"  >Invoice  #</strong> <span   style="color: #26336d;" ><?=$invoiceID?></span><br />
                        
                        </th>
                </tr>
                <tr>
                	<td>
                        <Span style="display:block; color: #26336d;  "></Span>
                        <span style="display:block; color: #26336d;  "><?=$order_item[0]['order_firstname']. ' ' .$order_item[0]['order_firstname']?></span>
                        <span style="display:block; color: #26336d;  "><?=$order_item[0]['order_address1']?></span>
                    </td>
                    <td>
                        
                    </td>
                    
                    <td>
                  
                    </td>

                </tr>
                <tr>
                <td colspan="3">
                	<hr  style="margin-top: 20px; margin-bottom: 30px; border-color: #8BC34A;"/>
                </td>
                </tr>	
             </table>
             
           
             
			 
    <table style="border:1px solid #8BC34A ; margin: 0px auto;
width: 95%;">
      <tr style="background: #8bc34a24; color: #8BC34A;">
              <th style="border:1px solid #8BC34A ; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; padding:5px;" >#</th>
              <th style="border:1px solid #8BC34A ; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; padding:5px;" >Order Id</th>
              <th style="border:1px solid #8BC34A ; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; padding:5px;" >Item Name</th>
              <th style="border:1px solid #8BC34A ; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; padding:5px;" >Item Price</th>
              <th style="border:1px solid #8BC34A ; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; padding:5px;" >Qty</th>
              <th style="border:1px solid #8BC34A ; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; padding:5px;" >Item Subtotal</th>

      </tr>

      <?php 

      $x =1 ;
      foreach ($order_item as $key => $value) {
       ?>

          <tr style="border:1px solid #8BC34A ; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;">
                  <td style="border:1px solid #8BC34A  ; padding:5px; color: #26336d; "><?=$x?></td>
              

                  <td style="border:1px solid #8BC34A  ; padding:5px; color: #26336d; "><?=$value['order_item_id']?></td>
                  <td style="border:1px solid #8BC34A  ; padding:5px; color: #26336d; "><?=$value['product_name']?></td>
                  <td style="border:1px solid #8BC34A  ; padding:5px; color: #26336d; "><?=price($value['order_item_price'])?></td>
                  <td style="border:1px solid #8BC34A  ; padding:5px; color: #26336d; "><?=$value['order_item_qty']?></td>
                  <td style="border:1px solid #8BC34A  ; padding:5px; color: #26336d; "><?=price($value['order_item_subtotal'])?></td>

          </tr>


       <?php 
       $x ++;
      }
      ?>
    </table>



    <div class="row">
      <div class="col-xs-4">
          &nbsp;
      </div>
      <div class="col-xs-8 invoice-block">
        <ul class="list-unstyled amounts" style="float:right !important;">
          
          <?php 
          ?>



          <li style="color: #8BC34A);
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px; list-style:none !important; color: #8BC34A;" ><strong style="color: #8BC34A;">No of Items</strong> : <?=$items?>  </li>
          <li style="color: #8BC34A;
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px; list-style:none !important; color: #8BC34A;" ><strong style="color: #8BC34A;">Total Price</strong> :  <?=price($price+$order[0]['order_shipping' ])?> </li>
          <br>
          <br>

          <?php 
          if($discount != 0 )
          {
            ?>
          <li style="color: #8BC34A;
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px; list-style:none !important; color: #8BC34A;" ><strong style="color: #8BC34A;">Discount  Calculated</strong> : <?=price(($price * $discount)/100) ?></li>

            <?php 
          }
          ?>


          <?php 
          if($qtydiscount != 0 )
          {
            ?>
          <li style="color: #8BC34A;
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px; list-style:none !important; color: #8BC34A;" ><strong style="color: #8BC34A;">Qty Discount </strong> : 10 % </li>

            <?php 
          }
          ?>

          <?php 
          if($coupondiscount != 0 )
          {
            ?>
          <li style="color: #8BC34A;
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px; list-style:none !important; color: #8BC34A;" ><strong style="color: #8BC34A;">Coupon Discount </strong> : <?=$coupondiscount?> % </li>

            <?php 
          }
          ?>


          

          <br>
          <br>
          <li style="color: #8BC34A;
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px; list-style:none !important; color: #8BC34A;" ><strong style="color: #8BC34A;">Price</strong> : <?=price($amount - ($amount * $discount)/100)?></li>

<!---	<li style="color: rgb(114, 162, 48);
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px; list-style:none !important; color: rgb(114, 162, 48);" ><strong style="color: rgb(114, 162, 48);">Delivery Charges </strong> : <?=price($deliverycharges)?> </li>
-->

          <li style="color: #8BC34A;
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px; list-style:none !important; color: #8BC34A;" ><strong style="color: #8BC34A;">Grand Total </strong> :<?=price(($amount - ($amount * $discount)/100)+ $deliverycharges ) ?> </li>

          
          
          

        </ul>
        <br>
        <!--a onclick="javascript:window.print();" class="btn btn-lg blue hidden-print margin-bottom-5">
        Print <i class="fa fa-print"></i>
        </a>
        <a class="btn btn-lg green hidden-print margin-bottom-5">
        Submit Your Invoice <i class="fa fa-check"></i>
        </a-->
      </div>
    </div>



    

<h3 style="color: #8BC34A;
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 15px;
    margin-left: 20px; margin-right: 20px; letter-spacing: 0.5px; position: relative;
top: 170px; font-weight:500; line-height:22px;">If you have any questions, please email us at <a href="" style="color: #8BC34A; font-weight:600; text-decoration:none;"><?=g('db.admin.email_conatct_us');?></a>, or call us at <a href="#" style="color: #8BC34A; text-decoration:none; font-weight:600; "><?=g('db.admin.company_phone');?></a> </h3>
<h3 style="color: #8BC34A;
 font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 16px; position: relative;
top: 170px;
    margin-left: 20px; margin-right: 20px; font-weight:600; letter-spacing: 0.5px; font-weight: 600;">
Thank you,
<h3 style="color: #8BC34A;
   font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
    font-size: 16px; position: relative;
top: 170px;
    margin-left: 20px; margin-right: 20px; letter-spacing: 0.5px; font-weight:600;"><?=g('site_name');?></h3>
    
    
    
    
    
    
    
    </td>
 </tr>
 
 
 
 
 
    
    
    

  </tbody>

</table>



</body>
</html>


