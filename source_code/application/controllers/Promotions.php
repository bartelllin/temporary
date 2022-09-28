<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotions extends MY_Controller {

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

        $param2['where']['inner_banner_id'] = 4;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);

        $param['where']['product_type'] = "offer";
        $data['products'] = $this->model_product->find_all_active($param);

        //debug($data['products']);
        // Get about us data
        // $data['promotions'] = $this->model_cms_page->get_page(1);
        // $data['our_vision'] = $this->model_cms_page->get_page(20);
        // $data['mission_statement'] = $this->model_cms_page->get_page(21);
        // $data['core_values'] = $this->model_cms_page->get_page(22);
        // $data['goals'] = $this->model_cms_page->get_page(23);
        // // Set banner heading
        // //$data['banner_heading'] = "About Us";
        // // Get banner
        // $data['banner'] = $this->model_banner->get_banners(7);
        // Load View
        $this->load_view("index", $data);
    }



}
