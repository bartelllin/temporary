<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends MY_Controller {

	
	
	public function __construct()
    {
    	
        parent::__construct();
    }

    
	public function index()
	{
        global $config;


        $param2['where']['inner_banner_id'] = 16;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);
        // $data['sliders'] = $this->model_forgot_password_slider->find_all_active(
        //     array('where'=>array('forgot_password_slider_status'=>1)));

        // $data['banner'] = $this->model_banner->find_one(
        //      array('where'=>array('banner_id' => 42,'banner_status'=>1)));

        //    echo "<pre>";
        // print_r($data['cms_page6']);
        // exit;

      //   $que12 = $this->db->query("SELECT * FROM fgr_product WHERE product_status = 1 LIMIT 8");

      // $data['products'] = $que12->result_array($que12);

     
		$this->load_view("index",$data);
	}

}
