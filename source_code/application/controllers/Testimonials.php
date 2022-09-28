<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends MY_Controller {

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

        $param['where']['banner_id'] = 14;
        $param['where']['banner_status'] = 1;
        $data['banner'] = $this->model_banner->find_one($param);


        $data['testimonial'] = $this->model_testimonial->find_all_active();


        $this->load_view("index", $data);
    }



}
