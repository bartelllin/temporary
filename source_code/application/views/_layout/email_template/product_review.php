<?
global $config;
$body_att = 'colspan="2" align="left" style="background-color:#05334D;color:#FFFFFF;"';
?>
<html>
	<head>
	</head>
	<body>
		<div style="margin-top:-10px;">
		<table width='70%' border='1' cellpadding='6' cellspacing='5' style='font-family:Verdana;font-size:12px; border-collapse:collapse'>
			<tr>
				<td border="0" colspan=2 <?=$body_att?>>
				<?=g('site_name')?>
				</td>
			</tr>
			<tr>
				<td colspan="2"> <b>Product Review</b> </td>
			</tr>
				<tr>
					<td>Product Name</td>
					<td><?=$review_product_name?></td>
				</tr>
				<tr>
					<td>Customer Name</td>
					<td><?=$review_name?></td>
				</tr>
				<tr>
					<td>Subject</td>
					<td><?=$review_subject?></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><?=$review_description?></td>
				</tr>
		</table>
	</div>
	</body>
</html>