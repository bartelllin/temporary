<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	/**
	 * login Controller. - The deafult controller
	 *
	 * @package		Main - Default
	 * 
	 * @version		2.0
	 * @since		01 Jun, 2015
	 */

	private $page_name = 'login_index';
	private $about_lady = 'aboutus_index';
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();

    }

	public function index()
	{ 	
		global $config;


	
	// if($this->session->userdata['id'] > 0){
	// 		redirect(g('base_url'));
	// 	}


$data['banner'] = $this->model_banner->find_one(array('where' => array('banner_id'=>11,'banner_status'=>1)));

//debug($data['banner'] ,1);

		// $para2['where']['inner_banners_status'] = 1;
		//  $data['innerbanner'] = $this->model_inner_banners->find_by_pk(16,false,$para2);

		$this->load_view("index",$data);
	}

	// public function notfound()
	// {
	// 	$data['title'] = '404 Error';
	// 	$this->load_view("404",$data);
	// }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
