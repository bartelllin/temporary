<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bag extends MY_Controller {

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


        $param2['where']['inner_banner_id'] = 1;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);



        $param1['where']['cms_page_status'] = 1;
        $data['about_cms'] = $this->model_cms_page->find_by_pk(1,false,$param1);
        $data['whatwedo_cms'] = $this->model_cms_page->find_by_pk(6,false,$param1);
        $data['howit1_cms'] = $this->model_cms_page->find_by_pk(2,false,$param1);
        $data['howit2_cms'] = $this->model_cms_page->find_by_pk(3,false,$param1);
        $data['howit3_cms'] = $this->model_cms_page->find_by_pk(4,false,$param1);

                
        $this->load_view("index", $data);
    }



}
