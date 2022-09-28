<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends MY_Controller {

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

        // debug($data['inner_banner'],1);

        $data['cms_page7'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 7,'cms_page_status'=>1)));

        $data['cms_page8'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 8,'cms_page_status'=>1)));

      //  debug($data['cms_page8'] ,1);

        // $data['cms_page5'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 5,'cms_page_status'=>1)));

        // $data['cms_page6'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 6,'cms_page_status'=>1)));

        // $data['cms_page7'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 7,'cms_page_status'=>1)));

        // $data['cms_page8'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 8,'cms_page_status'=>1)));

        // $data['cms_page9'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 9,'cms_page_status'=>1)));

        // $data['cms_page10'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 10,'cms_page_status'=>1)));

        // $data['cms_page11'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 11,'cms_page_status'=>1)));


        // $data['cms_page12'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 12,'cms_page_status'=>1)));

       // debug($data['cms_page12']);
        // $param1['where']['cms_page_status'] = 1;
        // $data['about_shoe_bevy'] = $this->model_cms_page->find_by_pk(6,false,$param1);
        // $data['who_we'] = $this->model_cms_page->find_by_pk(7,false,$param1);


                
        $this->load_view("index", $data);
    }


}
