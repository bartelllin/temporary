<style type="text/css">
#text{

color: #ffffff;
text-shadow: 0 1px 0 #999999, 0 2px 0 #888888, 0 3px 0 #777777, 0 4px 0 #666666, 0 5px 0 #555555, 0 6px 0 #444444, 0 7px 0 #333333, 0 8px 7px rgba(0, 0, 0, 0.4), 0 9px 10px rgba(0, 0, 0, 0.2);

font-family: -webkit-body;
font-size: -webkit-xxx-large;
border: 1px solid beige;
padding: 45px;
background-color: #33d1ff;
/* -webkit-text-stroke: 2px #337ab7;*/
border-radius: 20px;
text-align: center;
}
</style>

<? //$this->load->view('widgets/inner_banner'); ?>

<section id="about_section">
<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="span6">
<h1 class="muted" id="text">Thank you! your card has been charged.</h1>
</div>


</div>
</div>

</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){

		setTimeout(function(){
			window.location="<?=g('base_url')?>";
		},1000);
	});
</script>
