<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;


        $param['where']['inner_banner_id'] = 6;
        $param['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param);

                
        $param2['where']['cms_page_status'] = 1;
        $data['sale_cms'] = $this->model_cms_page->find_by_pk(8,false,$param2);


        $param3['where']['product_issale'] = 1;
        $data['sale'] = $this->model_product->find_all_active($param3);


        $this->load_view("index", $data);
    }



}
