<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_cover_stock extends MY_Controller {

    /**
     * Achievements page
     *
     * @package		product_cover_stock
     *
     * @version		1.0
     * @since		Version 1.0 2017
     */

    public $_list_data = array();

    public function __construct() {

        global $config;

        parent::__construct();
        $this->dt_params['dt_headings'] = "product_cover_stock_id,product_cover_stock_name,product_cover_stock_status";
        $this->dt_params['searchable'] = array("product_cover_stock_id","product_cover_stock_name","product_cover_stock_status");
        $this->dt_params['action'] = array(
            "hide_add_button" => false ,
            "hide" => false ,
            "show_delete" => true ,
            "show_edit" => true ,
            "order_field" => false ,
            "show_view" => false ,
            "extra" => array() ,
        );

        $this->_list_data['product_cover_stock_status'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );

        /*$this->_list_data['product_cover_stock_is_featured'] = array(
            STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,
            STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"
        );*/



        // Following are common so, defined in MY_Controller_Admin
        // $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
        // $this->dt_params['paginate']['uri'] = "paginate";
        // $this->dt_params['paginate']['update_status_uri'] = "update_status";

        // For use IN JS Files
        $config['js_config']['paginate'] = $this->dt_params['paginate'];

        $this->_list_data['product_cover_stock_product_id'] = $this->model_product->find_all_list_active(array(),"product_name");


        $this->_list_data['product_cover_stock_category_id'] = $this->model_category->find_all_list_active(array(),"category_name");

        $_POST = $this->input->post(NULL, true);
    }

    public function add($id='', $data=array())
    {
        $this->add_script(array( "jquery.validate.js" , "form-validation-script.js") , "js" );

        parent::add($id, $data);
    }

    public function index()
    {
        //$this->_list_data['product_cover_stock_parent_id'] = $this->model_product_cover_stock->find_all_list_active(array(),"product_cover_stock_name");
        parent::index();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
