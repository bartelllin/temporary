<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_payment extends MY_Controller {

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

        $id = $this->uri->segment(2);
        //debug($id,1);
        $param2['where']['payment_id'] = $id;
        $param2['where']['payment_status'] = 1;
        $data['paymentInfo'] = $this->model_payment->find_one($param2);
        
        $id2 = $data['paymentInfo']['payment_id'];
        
        if($id != $id2){
            
            //$this->load_view("get_payment/error", $data);
            redirect('get_payment/error');
            
        }else{


        $data['custom'] = $id;
        $data['success_url'] = g('base_url')."checkout/success?oid=".$id."&code=".md5($id);
        $data['notify_url'] = g('base_url')."checkout/notify?oid=".$id."&code=".md5($id);
        $data['cancel_url'] = g('base_url')."checkout/error?oid=".$id."&code=".md5($id);

       // debug($data['paymentInfo']);

        // $param1['where']['cms_page_status'] = 1;
        // $data['about_cms'] = $this->model_cms_page->find_by_pk(1,false,$param1);
        // $data['whatwedo_cms'] = $this->model_cms_page->find_by_pk(6,false,$param1);
        // $data['howit1_cms'] = $this->model_cms_page->find_by_pk(2,false,$param1);
        // $data['howit2_cms'] = $this->model_cms_page->find_by_pk(3,false,$param1);
        // $data['howit3_cms'] = $this->model_cms_page->find_by_pk(4,false,$param1);

                
        $this->load_view("index", $data);
        }
    }
    
    public function error(){
        
        $this->load_view("error", $data);
    }
        
    



}
