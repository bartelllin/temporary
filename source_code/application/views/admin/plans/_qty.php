<?global $config;
	
	//debug($form_data['service'] , 1);
?>

<form class="cmxform horizontal-form tasi-form" 
	id="serviceQtyForm" 
	method="POST" 
	action="<?=$config['base_url']?>admin/service/save_qty" 
>
		<div class="form-body">
            
            <div class="alert alert-danger display-hide">
              <button class="close" data-close="alert"></button>
              You have some form errors. Please check below.
            </div>
            <div class="alert alert-success display-hide">
              <button class="close" data-close="alert"></button>
              Your form validation is successful!
            </div>

        	<input type = "hidden" value="<?=$form_data['service']['service_id']?>" name = "service[service_id]" />


				
				<div class="row item_set">
					<div class="col-md-12">
						<h3 class="control-label col-md-4 "> Service Qty </h3>
			            
						
						<div class="col-md-12" style="padding:5px 0 ">
				            <div class="form-group ">
								<label for="" class="control-label col-md-2 "> 
										Qty Count Start
								</label>
					          	<div class="col-md-3">
					            	<input type="text" value="<?=empty($form_data['service']['service_qty_start']) ? 1 : $form_data['service']['service_qty_start']?>" name="service[service_qty_start]" id="service-service_qty_start" class=" form-control ">
					            </div>
					        </div>
					    </div>


					    <div class="col-md-12" style="padding:5px 0 ">
				            <div class="form-group ">
								<label for="" class="control-label col-md-2 "> 
										Qty Count End
								</label>
					          	<div class="col-md-3">
					            	<input type="text" value="<?=empty($form_data['service']['service_qty_end']) ? 100 : $form_data['service']['service_qty_end']?>" name="service[service_qty_end]" id="service-service_qty_end" class=" form-control ">
					            </div>
					        </div>
					    </div>


					    <div class="col-md-12" style="padding:5px 0 ">
				            <div class="form-group ">
								<label for="" class="control-label col-md-2 "> 
										Default Qty Set
								</label>
					          	<div class="col-md-3">
					            	<input type="text" value="<?=empty($form_data['service']['service_qty_default']) ? 50 : $form_data['service']['service_qty_default']?>" name="service[service_qty_default]" id="service-service_qty_default" class=" form-control ">
					            </div>
					        </div>
					    </div>

					    <div class="col-md-12" style="padding:5px 0 ">
				            <div class="form-group ">
								<label for="" class="control-label col-md-2 "> 
										Qty Note
								</label>
					          	<div class="col-md-3">
					            	<input type="text" value="<?=$form_data['service']['service_qty_note']?>" name="service[service_qty_note]" id="service-service_qty_note" class=" form-control ">
					            </div>
					        </div>
					    </div>


	            	</div>

        		</div>


	        

		</div>

		<div class="form-actions">
		    <div class="row">
		      <div class="col-md-offset-3 col-md-9">
		        <button type="button" class="btn green" id="qtyupdate">Save</button>	        
		      </div>
		    </div>
	  	</div>
</form>
	

<script>
	$(document).ready(function() {
		$("#qtyupdate").click(function () {
			var data = $("#serviceQtyForm").serialize();
			var url = $("#serviceQtyForm").attr("action");
			response = AjaxRequest.fire(url, data);
			if(parseInt(response) > 0)
				AdminToastr.success( "Record Saved" , "Success" );
			else
				AdminToastr.error( "Record could not be saved. Please fill all fields" , "Failed" );
			//get_item_sets();
		});
	});	
		
</script>
