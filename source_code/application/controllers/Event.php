<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends MY_Controller {

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


        $param1['where']['inner_banner_id'] = 7;
        $param1['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param1);



        $param2['where']['cms_page_status'] = 1;
        $data['event_cms'] = $this->model_cms_page->find_by_pk(9,false,$param2);


        $data['events'] = $this->model_event->find_all_active();


                
        $this->load_view("index", $data);
    }



}
