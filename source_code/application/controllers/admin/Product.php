<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Product extends MY_Controller {

    /**
     * product page
     *
     *
     * @version		1.0
     * @since		2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();
        $this->dt_params['dt_headings'] = "product_id,product_name,product_image,product_status";
        $this->dt_params['searchable'] = array("product_id","product_name","product_status","product_category_id");
        $this->dt_params['action'] = array(
            "hide_add_button" => false ,
            "hide" => false ,
            "show_delete" => true ,
            "show_edit" => true ,
            "order_field" => false ,
            "show_view" => false ,
            "extra" => array() ,
        );

        $this->_list_data['product_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );

        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];


        $this->_list_data['product_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");


        $_POST = $this->input->post(NULL, true);
    }

    public function index()
    {
        // Popluated LISTDATA in constructor
        parent::index();
    }

    public function add($id='', $data=array())
    {
        // Popluated LISTDATA in constructor
        $this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );
        $this->register_plugins("jquery-file-upload");


/*
        if(!$id)
        {
            $this->form_params = array(
                "action" => array(
                    "save_edit_attr" => "#tab_1" ,
                    "hide_save" => false ,
                    "hide_save_new" => false ,
                    "hide_cancel" => false ,
                ),
            );
        }
*/


        parent::add($id, $data);
    }



	
	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */