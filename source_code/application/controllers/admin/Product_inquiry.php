<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Product_inquiry extends MY_Controller {

	/**
	 * product_inquiry page
	 *
	 * @package		faq
	 * 
	 * @version		1.0 -- Robust , Advanced And More Frustating...
	 * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "product_inquiry_id,product_inquiry_name,product_inquiry_email,product_inquiry_status";
        $this->dt_params['searchable'] = array("product_inquiry_id","product_inquiry_name","product_inquiry_status");
        $this->dt_params['action'] = array(
        								"hide_add_button" => true,
                                        "hide" => false,
                                        "show_delete" => true,
                                        "show_edit" => false,
                                        "order_field" => false,
                                        "show_view" => true,
                                        "multi_lang" => false,
                                        "extra" => array() ,
                                      );
        
        $this->_list_data['product_inquiry_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];

        //$_POST = $this->input->post(NULL, true);  // return POST with xss filter
        $_POST = $this->input->post(NULL, false); // return POST without xss filter
		//$language = get_lang_details($_GET);
		//$config['js_config']['paginate']['uri'] .= '?lang=' . $language['lang_id'];
	}

	public function add($id='', $data=array())
	{
		// Popluated LISTDATA in constructor
		$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
		parent::add($id);
	}

	public function index()
	{
		// Popluated LISTDATA in constructor
		parent::index();
	}

	public function ajax_view($id='')
	{
		if($id)
		{
			$this->model_inquiry->update_by_pk($id, array("inquiry_status" => 0));
		}
		parent::ajax_view($id);
	}

	public function get_view($id=0){

		//debug($id,1);

		global $config;
		$result = array();
		$class_name = $this->router->class;
		$model_name = 'model_'.$class_name ;
		$model_obj = $this->$model_name ;
		$form_fields = $model_obj->get_fields();
		if($id)
		{
			$param['fields']='*,product_name as product_inquiry_productid,CONCAT(product_inquiry_image_path,product_inquiry_image) AS product_inquiry_image';
			$param['joins'][]=array(
									"table"=>"product" , 
                                                     "joint"=>"product.product_id = product_inquiry.product_inquiry_productid"
				);

			$result['record'] = $this->$model_name->find_by_pk($id , false,$param);

			// debug($result['record'],1);

			$result['record'] = $this->$model_name->prepare_view_data($result['record']);
			$result['record']['File'] = "<a href='".g('base_url').$result['record']['File']."' download> Download File<a>";
			// debug($result['record'],1);
			if(!$result['record'] )
				$result['failure'] = "No Item Found";
				// Load relation fields data
			$relation_data = $this->$model_name->get_relation_data($id);
			if(array_filled($relation_data))
				$result['record']['relation_data'] = $relation_data;
			//debug($result,1);
		}
		else
		{
			$result['failure'] = "No Item Found";
		}
	
		return $result;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
