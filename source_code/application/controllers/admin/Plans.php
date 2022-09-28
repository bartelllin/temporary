<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Plans extends MY_Controller {


	/**
	 * plans page
	 *
	 * @package		plans
	 * @author		Abdul Ovais Khan (abdul.ovais@tradekey.com)
	 * @version		2.0 -- Robust , Advanced And More Frustating...
	 * @since		Version 2.0 2014
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;

		// $this->load->model('model_plans');
		
		parent::__construct();
        $this->dt_params['dt_headings'] = 
        "plans_id,plans_name,plans_status";
        $this->dt_params['searchable'] = array("plans_id","plans_name","price_price","plans_status");
        $this->dt_params['action'] = array(
                                        "hide" => false ,
                                         "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        // "hide_add_button" => true ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        
        $this->_list_data['plans_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );


		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];

		// $this->_list_data['price_type'] = $this->model_price_type->find_all_list_active(array() , 'pt_name');

		$_POST = $this->input->post(NULL, true);
		
		if(isset($_GET['price_type_id']))
			$config['js_config']['paginate']['uri'] .= '?price_type_id=' . $_GET['price_type_id'];
		
    }

	public function add($id='',$data = array())
	{
		$param = array();
		$param['group'] = 'addons_name';
		$this->_list_data['attributes'] = $this->model_addons->find_all_list_active($param , 'addons_name');

		// $this->_list_data['price_value'] = $this->model_price->get_price_value($id , 3);


		if(intval($id) > 0)
			$this->_list_data['selected_attributes'] = $this->selected_attributes($this->model_plans_addons->find_all(array('where'=>array('pa_plans_id' => $id))));
		else
			$this->_list_data['selected_attributes'] = array();
		// Popluated LISTDATA in constructor
		$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );

		// if(!$id)
		// {
		// 	$this->form_params = array(
		// 		"action" => array(
		// 			"save_edit_attr" => "#tab_1" ,
		// 			"hide_save" => true ,
		// 			"hide_save_new" => true ,
		// 			"hide_cancel" => true ,
		// 		),
		// 	);
		// }
		

		
		parent::add($id);
	}


	public function save_in_strip()
	{
		
		echo 1;
		/*
		**Bug_007 : 
        **Issue : Fatal Error appears when user make a plans checkout for "QUICK 2 DAY PLAN" 
                section after making checkout for "SMALL PLAN" section
        **Result Required :   No fatal error occur and Plans Checkout page should be displayed when user clicks 
                            "Buy Now->" button for "Quick2 Day Plan" section
        **Date : 01 Nov 2016


		if(isset($_POST) AND array_filled($_POST))
		{
			$price_data = $_POST['price'];

			$data = $this->model_plans->find_by_pk($price_data['price_relational_id']);

			if(isset($data) && array_filled($data))// && ($data['plans_is_strip_add'] == 0))
			{
				// debug($price_data);
				// debug($data , 1);

				require_once(APPPATH.'libraries/Stripe/lib/Stripe.php');//or you
				Stripe::setApiKey(g('db.admin.secret_key')); //Replace with your Secret Key

				// price
				if(isset($price_data['price_price']) && array_filled($price_data['price_price']))
				{
					foreach($price_data['price_price'] as $value)
					{
						try {
							$stripPlanParam = array();
							$stripPlanParam = array(
											  "amount" => strip_payment($value),
											  "interval" => "month",
											  "name" => $data['plans_name'] . "-" . price($value),
											  "currency" => "usd",
											  "id" => $data['plans_name'] . "-" . price($value),
											  );

							$res = Stripe_Plan::create($stripPlanParam);
						}
						catch (Exception $e) {
							
						}
					}
				}


				echo 1;

				
			}
			
		}
		*/
	}



	/*
	// Plans data insert in strip account
	public function before_add_render(&$data)
	{
		$id = $data['id'];

		if(isset($id) && $id > 0 )
		{
			$package = $data['form_data']['plans'];

			
			if($package['plans_is_strip_add'] == 0)
			{
				require_once(APPPATH.'libraries/Stripe/lib/Stripe.php');//or you
				Stripe::setApiKey(g('db.admin.secret_key')); //Replace with your Secret Key

				// cheap price
				$stripPlanParam = array(
								  "amount" => strip_payment($package['plans_price']),
								  "interval" => "month",
								  "name" => $package['plans_name'] . "-" . price($package['plans_price']),
								  "currency" => "usd",
								  "id" => $package['plans_name'] . "-" . price($package['plans_price']),
								  );

				$res = Stripe_Plan::create($stripPlanParam);


				// Expensive price
				$stripPlanParam = array(
								  "amount" => strip_payment($package['plans_expensive_price']),
								  "interval" => "month",
								  "name" => $package['plans_name'] . "-" . price($package['plans_expensive_price']),
								  "currency" => "usd",
								  "id" => $package['plans_name'] . "-" . price($package['plans_expensive_price']),
								  );

				$res = Stripe_Plan::create($stripPlanParam);

				
				$pparam = array();
				$pparam['plans_is_strip_add'] = 1;
				$id = $this->model_plans->update_by_pk($id , $pparam);

				return true;
			}
			else {
				return true;
			}
		}
		else {
			return true;
		}

	}

	*/

	public function index()
	{
		// Popluated LISTDATA in constructor
		parent::index();
	}

	function selected_attributes($data)
	{
		$result = array();

		if(isset($data) && array_filled($data)) {
			foreach($data as $value) {
				$result[] = $value['pa_addons_id'];

			}
		}

		return $result;
	}

	public function save_attributes()
	{
		//debug($_POST , 1);
		if(isset($_POST) && array_filled($_POST)) {

			$form = $_POST['plans_addons'];		
			$plans_id = intval($form['plans_id']);
			unset($form['plans_id']);

			//debug($service_id , 1);

			/**
				Delete record before save if exist
			*/
			$where['pa_plans_id'] = $plans_id;
			$this->model_plans_addons->delete_record($where);

 $orderWaliArray = array_values(array_filter($form['pa_plans_order']));
 //debug($orderWaliArray);exit;

			foreach($form['pa_addons_id'] as $key11 => $value) {
				
				$param = array();
				$param['pa_plans_id'] = $plans_id;
				$param['pa_addons_id'] = $value;
				$param['pa_plans_order'] = $orderWaliArray[$key11];


				$id = $this->model_plans_addons->insert_record($param);
			
			}
			
		
			if($id > 0){
				echo 1;
			}
			else{
				echo 0;
			}

		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
