<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productbycat extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index($slug = '')
    {
        global $config;

        $param4['where']['inner_banner_id'] = 3;
        $param4['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param4);


        $param2['joins'][] = array(
            "table" => "category",
            "joint" => "category.category_id = product.product_category_id"
        );

        $param2['where']['category_slug'] = $slug;
        $data['productbycat'] = $this->model_product->find_all_active($param2);



        $param3['where']['cms_page_status'] = 1;
        $data['productcat_cms'] = $this->model_cms_page->find_by_pk(1,false,$param3);


                
        $this->load_view("index", $data);
    }



}
