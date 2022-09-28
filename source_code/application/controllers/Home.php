<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	/**
	 * Default Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Home Page
	public function index()
	{
        global $config;

         $data['banner'] = $this->model_banner->find_all_active();

         //debug( $data['banner'],1);

        // $param['limit'] = 6;
        // $param['order'] = 'product_id DESC';
        // $data['products'] = $this->model_product->find_all_active($param);

        $data['cms_page1'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 1,'cms_page_status'=>1)));

        //debug($data['cms_page1'],1);

        $data['cms_page2'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 2,'cms_page_status'=>1)));

        $data['cms_page3'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 3,'cms_page_status'=>1)));

         $data['cms_page10'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 10,'cms_page_status'=>1)));

        //debug($data['cms_page3'],1);

        $data['cms_page4'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 4,'cms_page_status'=>1)));

        $data['cms_page5'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 5,'cms_page_status'=>1)));

        $data['cms_page13'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 13,'cms_page_status'=>1)));

        $data['cms_page6'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 6,'cms_page_status'=>1)));


        //$param['limit'] = 6;
        //$param['order'] = 'product_id DESC';

        if(isset($_GET['category'])){

        $slug = $_GET['category'];
        $param1['where']['category_slug'] = $slug;
        $categories = $this->model_category->find_one($param1);
        //debug($categories,1);
        $catId = $categories['category_id'];
        //debug($catId ,1);
        $param['where']['product_category_id'] = $catId;
        $data['products'] = $this->model_product->find_all_active($param);
        //debug($data['products'],1);
        }else{
        
        $data['products'] = $this->model_product->find_all_active();

        }
        $data['categories'] = $this->model_category->find_all_active();



        // $data['cms_page2'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 2,'cms_page_status'=>1)));

        // //debug($data['cms_page2'],1);
        // $data['cms_page3'] = $this->model_cms_page->find_one(
        //       array('where'=>array('cms_page_id' => 3,'cms_page_status'=>1)));

       

		$this->load_view("index", $data);
	}

  


}
