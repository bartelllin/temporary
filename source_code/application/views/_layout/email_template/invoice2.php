<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Order Confirmation</title>
</head>
<style>
    table tr:first-child > td > center{
        background: #05509d;
    }
</style>
<body>
<table style="background:#05509d; border:#05509d 1px solid;" width="622" cellspacing="0" cellpadding="0" border="0"
       align="center">
    <tbody>
    <tr class="first">
        <td>
            <center>
                <img src="<?=get_image($this->layout_data['logo']['logo_image_path'],$this->layout_data['logo']['logo_image'])?>" style="padding: 15px;">
            </center>
        </td>
    </tr>
    <tr>
        <td height="1"></td>
    </tr>
    <tr>
        <td style="font-family:Arial, Helvetica, sans-serif;" bgcolor="#f5f9f6">
            <table width="622" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                <tr>
                    <td style="padding:8px 15px;"><p><strong>Dear <?=ucfirst($userdata['signup_firstname'])?></strong></p></td>
                </tr>
                <tr>
                    <td style="font-size:13px; line-height:22px; padding:0 15px; margin-bottom:15px;">
                        This email is to let you know that we have received your order.
                        Thank you for shopping with us. Below are your order details:
                    </td>
                </tr>
                <tr style="margin:20px 0; float:left;height:86px;     background-color: #05509d;" bgcolor="#68A13E">
                    <td width="622">
                        <table style="margin-top:20px;" width="580" cellspacing="0" cellpadding="0" border="0"
                               align="center">
                            <tbody>
                            <tr style="color:#fff;  ">
                                <td width="251" align="left ">Order number : <b><?=$order_id?></b></td>
                                <td width="50">&nbsp;</td>
                                <td width="251" align="right">Order date : <?=date('d-M-y')?></td>
                            </tr>
                            <tr style="color:#fff">

                                <td width="451" align="left">Payment status :
										<span style="font-size:13px;font-weight:bold">
											<span class="label label-danger">Approved</span>										</span>
                                </td>

                                <td width="25">&nbsp;</td>
                                <?
                                $total = 0;
                                foreach($cart as $item):
                                    $total = $total + ($item['qty']*$item['price']);
                                endforeach;
                                ?>
                                <td style="font-size:30px;" id="total_sum" width="50" align="right">$<?=$total?></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-size:13px; line-height:22px; padding:0 15px; margin-bottom:15px;">
                        <!-- <strong>
                            Expected delivery within 5 working days (please allow for up to 10 working days for delivery outside the UK).
                        </strong><br /> -->
                        Your email ID: <?=$userdata['signup_email']?> <br>
                        <!--Your delivery address: <?/*=$userdata['signup_address1']*/?> <br>-->
                        <!-- Scedule date & time : <strong></strong> -->
                    </td>
                </tr>

                <tr style="margin:0px 0; float:left; height:50px;" bgcolor="#f6f5f5">
                    <td width="622">
                        <table style="margin-top:15px;" width="580" cellspacing="0" cellpadding="0" border="0"
                               align="center">
                            <tbody>
                            <tr style="color:#000;  ">
                                <td style="font-size:28px;" width="251" align="left ">Payment details</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr style="float:left; padding:0 0 10px;border-bottom: 1px solid #cbcaca; margin-bottom:15px; "
                    bgcolor="#f6f5f5">

                    <td width="622">
                        <table style="margin-top:20px;" width="580" cellspacing="0" cellpadding="0" border="0"
                               align="center">
                            <tbody>
                                <?
                                foreach($cart as $item): ?>
                                <tr style="color:#000; height:30px;  ">
                                    <td colspan="3" width="251" align="left">
                                        Product Name : <?=$item['name']?>
                                    </td>
                                </tr>
                                    <tr style="color:#000; height:30px;  ">
                                        <td width="251" align="left ">
                                            Sub total (Qty <?=$item['qty']?> @ <?=$item['price']?>)
                                        </td>
                                        <td width="50">&nbsp;</td>
                                        <td width="251" align="right">$<?=$item['qty']*$item['price']?></td>
                                    </tr>
                                <?
                                endforeach;?>

                            <tr>
                                <td colspan="3" style="color:#000;font-weight:bold">
                                    ------------------------------------------------------------------------------------------------------------
                                </td>
                            </tr>


                            <!--<tr style="color:#68A13E;height:30px;">
                                <td width="251" align="left">Add : Total shipping charges</td>
                                <td width="50">&nbsp;</td>
                                <td width="251" align="right">
                                    $10.00
                                </td>
                            </tr>-->


                            <tr style="color:#000;height:30px;">
                                <td width="251" align="left"><strong>Total cost</strong></td>
                                <td width="50">&nbsp;</td>
                                <td width="251" align="right"><strong>$<?=$total?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                <tr>
                    <td style="font-size:13px; line-height:22px; padding:0 15px; margin-bottom:15px; padding-bottom:10px;">
                        To make sure our emails reach your inbox, please add <a
                            href="mailto:<?=$this->layout_data['config_info']['admin']['sales_email']?>"><?=$this->layout_data['config_info']['admin']['sales_email']?></a> to your safe
                        list or address book.<br>
                        <!-- Please note that there will be a delivery charge for re-sending returned items if an incorrect address has been provided. <br /> -->
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>