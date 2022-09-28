<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Inner_banner extends MY_Controller {

	/**
	 * CSL Achievements page
	 *
	 * @package		inner_banner
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "inner_banner_id,inner_banner_title,inner_banner_image,inner_banner_status";
        $this->form_params['action'] = array(
            'hide_save_new' => true
        );        
        $this->dt_params['searchable'] = array("inner_banner_id","inner_banner_title","inner_banner_status");
        
        $this->dt_params['action'] = array(
        								"hide_add_button" => true ,
                                        "hide" => false ,
                                        "show_delete" => false ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        $this->_list_data['inner_banner_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files

		$config['js_config']['paginate'] = $this->dt_params['paginate'];


        $this->_list_data['inner_banner_page'] = array(
                    'home'=>'Home',
                    'about_us'=>'About Us',
                    'products'=>'Product',
                    'services'=>'Services',
                    'promotions'=>'Promotions',
                    'catalog'=>'Catalog',
                    'contact'=>'Contact',
        );

		//$this->_list_data['inner_banner_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");
		//$this->_list_data['inner_banner_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");

		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='', $data=array())
	{
		parent::add($id, $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
