<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body style="font:14px/20px 'Open Sans', sans-serif;">
<table style="width: 100% !important;height: 100%;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;border-collapse:collapse;"
       cellpadding="0" cellspacing="0">
    <tr>
        <td class="container"
            style="display: block !important;clear: both !important;margin: 0 auto !important;max-width: 580px !important;">
            <table style="border-collapse:collapse;" cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="2" style="padding:10px;border:1px solid #eee;">
                        <a href="<?=g('base_url')?>"><img src="<?=l('assets/front_assets/images/')?>logo.png" alt="img"/></a>
                    </td>
                </tr>

                <tr>
                    <td style="width:50%;padding:10px;background-color: #eee;">
                        <p>Hi <?=$signup_firstname?>,,&nbsp;</p>

                        <p>Your Login ID: <?=$signup_email?></p>

                        <p>Click on the following link to reset your password:</p>

                        <p><a href="<?=g('base_url')?>account/resetpassword?id=<?=$id?>&code=<?=md5($id)?>"><strong>click here</strong></a></p>

                        <p>Thank you for being part of our website. </p>

                        <p><?=g('site_name')?></p>

                    </td>
                </tr>
                <tr>
<!--                     <td colspan="2">
                        <div style="height:112px;background:url('<?=g('images_root')?>footer-strip.jpg') repeat-x;"></div>
                    </td> -->
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>