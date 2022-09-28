<?php
$inquiry = $this->model_inquiry->find_all_active();
$product = $this->model_product->find_all_active();
?>

<?global $config;?>


	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat green-haze">
			<div class="visual">
				<i class="fa fa-comment-o"></i>
			</div>
			<div class="details">
				<div class="number">
					 <?count($inquiry)?>
				</div>
				<div class="desc">
                    Inquiries
				</div>
			</div>
			<a class="more" href="<?=g('base_url')?>admin/inquiry">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat purple-plum">
			<div class="visual">
				<i class="fa fa-shopping-cart"></i>
			</div>
			<div class="details">
				<div class="number">
					 <?=count($product)?>
				</div>
				<div class="desc">
                    Products
				</div>
			</div>
			<a class="more" href="<?=g('base_url')?>admin/product">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>



<!-- <div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat green-haze">
			<div class="visual">
				<i class="fa fa-users"></i>
			</div>
			<div class="details">
				<div class="number">
					 <?//number_format($total_members)?>
				</div>
				<div class="desc">
                    Members
				</div>
			</div>
			<a class="more" href="<?=g('base_url')?>admin/signup">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat purple-plum">
			<div class="visual">
				<i class="fa fa-cubes"></i>
			</div>
			<div class="details">
				<div class="number">
					 <?//$total_job?>
				</div>
				<div class="desc">
                    Joblist
				</div>
			</div>
			<a class="more" href="<?=g('base_url')?>admin/job">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat red-intense">
			<div class="visual">
				<i class="fa fa-id-badge"></i>
			</div>
			<div class="details">
				<div class="number">
					 <?//$total_company?>
				</div>
				<div class="desc">
                    Company
				</div>
			</div>
			<a class="more" href="<?=g('base_url')?>admin/company">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>


</div> -->
<?

?>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
