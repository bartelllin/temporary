<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Service extends MY_Controller {

	/**
	 * Services page
	 *
	 * @package		Service
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "service_id,service_name,service_image,service_status";
        $this->dt_params['searchable'] = array("service_id","service_name","service_status");
        $this->form_params['action'] = array(
            'hide_save_new' => true
        );          
        $this->dt_params['action'] = array(
        								"hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['service_status'] = array(
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        //$this->_list_data['service_icon'] = $this->model_icon->get_icon_list();

		//$this->_list_data['service_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		//$this->_list_data['service_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

        //$_POST = $this->input->post(NULL, true);  // return POST with xss filter
        $_POST = $this->input->post(NULL, false); // return POST without xss filter
	}

	public function add($id='', $data=array())
	{
		parent::add($id, $data);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
