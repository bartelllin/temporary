<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Package extends MY_Controller {

	/**
	 * Perkglobal Achievements page
	 *
	 * @package		package
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "package_id,package_name,package_price,package_status";
        $this->dt_params['searchable'] = array("package_id","package_name","package_price","package_status");
        $this->dt_params['action'] = array(
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        
        $this->_list_data['package_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];

		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='')
	{
		$this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );

		// $this->_list_data['category_parent_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		$data['features'] = self::get_features();
		
		if($id > 0)
		{
			$data['package_features'] = self::get_package_features($id);			
		}


		$data['extra_content'] = $this->load_view("custom_form" , $data, true , false);

		parent::add($id , $data);
	}

	public function afterSave($insertId , $model)
	{
		/** delete existing records **/
		$package_id = intval($insertId);
		$this->model_package->delete_existing_records($package_id);	

		$data['package_id'] = $package_id;
		foreach ($_POST['package_feature'] as $key => $value) 
		{
			$data['feature_id'] = $key;
			$data['feature_value'] = $value;
			$id = $this->model_package->save_package_features($data);	
		}
		if($id > 0)
			return true ;
	}

	public function index()
	{
		// $this->_list_data['category_parent_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		parent::index();
	}

	public function get_features()
	{
		$features = $this->model_feature->get_all_features();
		return $features;
	}

	public function get_package_features($id)
	{
		$package_features = $this->model_feature->get_all_package_features($id);
		return $package_features;
	}


	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

