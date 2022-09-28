<?global $config;
	
	//debug($form_data['service'] , 1);
?>

<form class="cmxform horizontal-form tasi-form" 
	id="plansAttributesForm" 
	method="POST" 
	action="<?=$config['base_url']?>admin/plans/save_attributes" 
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

        	<input type = "hidden" value="<?=$form_data['plans']['plans_id']?>" name = "plans_addons[plans_id]" />


				
				<div class="row item_set">
					<div class="col-md-12">
			            <div class="form-group ">
							<h1 class="control-label col-md-4 "> Add-ons </h1>

							<div class="col-md-12">
								<?php
								if(isset($this->_list_data['attributes']) && array_filled($this->_list_data['attributes']))
								{
									$i=1;
									foreach($this->_list_data['attributes'] as $id => $name)
									{
										$checked = in_array($id, $this->_list_data['selected_attributes']) ? 'checked=""' : '';

										if($i > 2) {
											echo '</div><div class="col-md-12">';
											$i=1;
										}
										?>
								          	<div class="col-md-12">

								          		<input <?=$checked?> type="checkbox" name="plans_addons[pa_addons_id][]" value='<?=$id?>' id='attribut-<?=$id?>'>
								          			<label for='attribut-<?=$id?>'><?=$name?></label>
								          			<select name="plans_addons[pa_plans_order][]">
								          			    <option value="">Select</option>
								          			    <option value="1" >1</option>
								          			    <option value="2">2</option>
								          			    <option value="3">3</option>
								          			    <option value="4">4</option>
								          			    <option value="5">5</option>
								          			    <option value="6">6</option>
								          			    <option value="7">7</option>
								          			    <option value="8">8</option>
								          			    <option value="9">9</option>
								          			    <option value="10">10</option>
								          			    </select>
								            </div>
							        <?php
							        	$i++;
							    	}
							    }
							    ?>
					        </div>


		        		</div>
	            	</div>

        		</div>


	        

		</div>

		<div class="form-actions">
		    <div class="row">
		      <div class="col-md-offset-3 col-md-9">
		        <button type="button" class="btn green" id="save_plans_addons">Save</button>	        
		      </div>
		    </div>
	  	</div>
</form>
	

<script>
	$(document).ready(function() {
		$("#save_plans_addons").click(function () {
			var data = $("#plansAttributesForm").serialize();
			var url = $("#plansAttributesForm").attr("action");
			response = AjaxRequest.fire(url, data);
			if(parseInt(response) > 0)
				AdminToastr.success( "Record Saved" , "Success" );
			else
				AdminToastr.error( "Record could not be saved. Please fill all fields" , "Failed" );
			//get_item_sets();
		});
	});	
		
</script>
