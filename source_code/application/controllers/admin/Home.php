<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		global $config;
		//Set template configurations before calling load_template
		//Visit MY_Controller for details
		$this->layout_data['page_title'] = "Dashboard";
		//$this->layout_data['page_title_min'] = "Dashboard";
		$this->layout_data['bread_crumbs'] = array(array("home/"=>"Home"));
		$this->layout_data['additional_tools'] = array(						
														"jquery-ui",
														"bootstrap",
														"bootstrap-hover-dropdown",
														"jquery-slimscroll",
														"boots",
														"font-awesome",
														"simple-line-icons" ,
													);

		$this->add_script("pages/tasks.css");
		$this->add_script(array("tasks.js" , "index.js") , "js");
		
		//$data[ 'products' ] = $this->model_product->find_count_active();
		
		
		//$profit_params = array();
		//$profit_params[ 'fields' ] = "SUM(order_total - order_discount) AS total";
		//$data[ 'profit' ] = $this->model_order->find_one_active($profit_params);
		
		//$data[ 'orders' ] = $this->model_order->find_count_active();
		
		//$params_today = array() ;
		//$params_today['where']['DATE(order_created_on)'] = date("Y-m-d") ;
		//$data[ 'today_orders' ] = $this->model_order->find_count_active($params_today);

		$data['config'] = $this->config->config;
		$this->load_view("dashboard",$data);
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */