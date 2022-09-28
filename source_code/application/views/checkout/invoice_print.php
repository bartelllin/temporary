<?=$template?>


<a href="<?=g('base_url')?>checkout/step3?oid=<?=$_GET['oid']?>">Back</a> | 
<a href="javascript:void(0);" onclick="printout()">Print</a>

<script type="text/javascript">
function printout() {
	var newWindow = window.open();
	newWindow.document.write(document.getElementById("invoicecontainer").innerHTML);
	newWindow.print();
}
</script>