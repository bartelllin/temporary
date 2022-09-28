<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends MY_Controller {

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

        $param2['where']['inner_banner_id'] = 3;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);

        $data['cms_page'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 9,'cms_page_status'=>1)));
        // Get banner
       // $data['banner'] = $this->model_banner->get_banners(9);
        // Set banner heading
        //$data['banner_heading'] = "Contact Us";
        // Load View
        
        $this->load_view("index", $data);
    }

    public function review(){

        // if($this->userid <= 0){
        //     $this->json_param['status'] = 0;
        //     $this->json_param['txt'] = 'Login required';
        // }else{

        // Get post data
        $post = $this->input->post();
        
        // Success
        if(count($post) > 0)
        {            
            // Validation success
            if($this->validate("model_review", $custom_rule))
            {               
                $contact_us_data = $post['review'];
                // Set status 1
                $contact_us_data['review_status'] = 1;
                // Set attributes                
                $this->model_review->set_attributes($contact_us_data);
                // Save record
                $inserted_id = $this->model_review->save();

                // Insert successfully
                if($inserted_id > 0)
                {
                    //send email notification
                    $title = 'Product Review Notification';
                    $template = $this->load->view("_layout/email_template/product_review",$contact_us_data,true);
                    $to = "calprint@pacbell.net";                                       
                    parent::email_product_review($to,$template,$title);
                    
                    $this->json_param['status'] = 1;
                    $this->json_param['txt'] = 'Thank you for your Review.';
                }
                else
                {
                    $this->json_param['status'] = 0;
                    $this->json_param['txt'] = 'Something went wrong.Please try later.';
                }
                // }
                // else {
                //     // Something goes wrong
                //     $this->json_param['status'] = 0;
                //     $this->json_param['txt'] = 'Captcha not verified';
                // }
            }
            // Validation error
            else
            {
                $this->json_param['status'] = 0;
                $this->json_param['txt'] = validation_errors();
            }
        }
        else{
            $this->json_param['status'] = 0;
            $this->json_param['txt'] = 'No parameters found';
        }
    //} // this is login if 
        echo json_encode($this->json_param);
   }


   public function Addprofile()
    {

        //debug($_FILES,1);

        $memberId = $_POST['signupId'];
        $dir = "assets/uploads/signup/";
        $imgName =  $_FILES['signupImg']['name'];
        $imgName =  mt_rand().'_'.$imgName;

        $tmp_name = $_FILES['signupImg']['tmp_name'];


        // debug($imgName);
        // debug($tmp_name,1);
        

        //move_uploaded_file($tmp_name, "$dir/$imgName");
        move_uploaded_file($tmp_name, $dir.$imgName);

        $data = array(
               'signup_image_path' => $dir,
               'signup_profile_image' => $imgName,
               //'date' => $date
            );

        $this->db->where('signup_id', $memberId);
        $updated_id = $this->db->update('signup', $data); 

        //debug($updated_id,1);
        if($updated_id > 0)
                {
                   // $subject = 'Contact Us Alert';
                   // parent::email_structure($form_name,$subject);
                     $param['status'] = 1;
                    $param['txt'] = 'Successfully uploaded';
                    echo json_encode($param);
                }
                else
                {
                    $param['status'] = 0;
                    $param['txt'] = 'Due to some error, email not send';
                    echo json_encode($param);
                }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // Get post data
        $post = $this->input->post();
        // Success
        if(count($post) > 0)
        {


            // Get Captcha
            // $captcha_answer = $this->input->post('g-recaptcha-response');

            // // Define Custom rules for captcha
            // $custom_rule = array(
            //     'g-recaptcha-response'=>array(
            //         'field'=>'g-recaptcha-response',
            //         'label'=>'Captcha',
            //         'rules'=>'required'
            //     )
            // );

            // Validation success
            if($this->validate("model_inquiry"))
            {
                // Verify user's answer
                //$response = $this->recaptcha->verifyResponse($captcha_answer);

                // Processing ...
               // if ($response['success']) {
                    // Get data
                    $contact_us_data = $post['inquiry'];
                    //debug($contact_us_data['inquiry_email'],1);
                    // Set status 1
                    $contact_us_data['inquiry_status'] = 1;
                    // Set attributes
                    $this->model_inquiry->set_attributes($contact_us_data);
                    // Save record
                    $inserted_id = $this->model_inquiry->save();

                    // Insert successfully
                    if($inserted_id > 0)
                    {
                        $title = 'Inquiry Notification';
                        $template = $this->load->view("_layout/email_template/inquiry",$contact_us_data,true);
                        $to = $contact_us_data['inquiry_email'];
                        parent::inquiry_email($to,$template,$title);

                        $this->json_param['status'] = 1;
                        $this->json_param['txt'] = 'We have received your inquiry. We will get back to you shortly.';
                        echo json_encode($this->json_param);
                    }
                    else
                    {
                        $this->json_param['status'] = 0;
                        $this->json_param['txt'] = 'Something went wrong.Please try later.';
                        echo json_encode($this->json_param);
                    }
                // }
                // else {
                //     // Something goes wrong
                //     $this->json_param['status'] = 0;
                //     $this->json_param['txt'] = 'Captcha not verified';
                // }
            }
            // Validation error
            else
            {
                $this->json_param['status'] = 0;
                $this->json_param['txt'] = validation_errors();
                echo json_encode($this->json_param);
            }
        }
        else{
            $this->json_param['status'] = 0;
            $this->json_param['txt'] = 'No parameters found';
            echo json_encode($this->json_param);
        }

        
    }


    public function product_inquiry()
    {
        // Get post data
        //debug($_POST,1);
        $post = $this->input->post();
        //debug($post,1);
        // Success
        if(count($post) > 0)
        {
            
            if($this->validate("model_product_inquiry"))
            {
                    $contact_us_data = $post['product_inquiry'];
                    $contact_us_data['product_inquiry_status'] = 1;
                    $this->model_product_inquiry->set_attributes($contact_us_data);

                    $dir = "assets/uploads/product_inquiry_image/";
                    $imgName =  $_FILES['inquiryImg']['name'];
                    $imgName =  mt_rand().'_'.$imgName;
                    $tmp_name = $_FILES['inquiryImg']['tmp_name'];
                    
                    $Nname = explode(".", $imgName);
                    
                    $allowEd = array('jpg','png','.JPG','jpeg','pdf','ai','indd');
                    if(in_array($Nname[1],$allowEd)){
                    
                        $contact_us_data['product_inquiry_image_path'] = $dir;
                        $contact_us_data['product_inquiry_image'] = $imgName;
                        move_uploaded_file($tmp_name, $dir.$imgName);
                        $signupTable = $this->model_product_inquiry->table_name();
                        $inserted_id = $this->db->insert($signupTable, $contact_us_data);
                       // $inserted_id = $this->model_product_inquiry->save($contact_us_data);
                       // debug($inserted_id,1);
                        if($inserted_id > 0)
                        {
                            $title = 'Product Inquiry Notification';
                            $template = $this->load->view("_layout/email_template/query_ticket2",$contact_us_data,true);
                            $to = $contact_us_data['product_inquiry_email'];
                           
                            parent::email_product_inquiry2($to,$template,$title);
                            parent::email_product_inquiry($to,$template,$title);
    
                            $this->json_param['status'] = 1;
                            $this->json_param['txt'] = 'Thank you for your inquiry.';
                             echo json_encode($this->json_param);
                        }
                        else
                        {
                            $this->json_param['status'] = 0;
                            $this->json_param['txt'] = 'Something went wrong.Please try later.';
                            echo json_encode($this->json_param);
                        }
                    }
                    else{
                        $this->json_param['status'] = 0;
                            $this->json_param['txt'] = 'File extension not allowed.';
                            echo json_encode($this->json_param);
                    }
            }
            // Validation error
            else
            {
                $this->json_param['status'] = 0;
                $this->json_param['txt'] = validation_errors();
                echo json_encode($this->json_param);
            }
        }
        else{
            $this->json_param['status'] = 0;
            $this->json_param['txt'] = 'No parameters found';
            echo json_encode($this->json_param);
        }

        
    }

    public function newsletter()
    {
        if(count($_POST) > 0) 
        {
            if($this->validate("model_newsletter"))
            {
                $form_name = 'newsletter';
                $data = $_POST['newsletter'];
                //$contact_us_data['inquiry_type'] = 'contactus';
                $data['newsletter_status'] = 1;
                                
                $inserted_id = $this->model_newsletter->insert_record($data);

                if($inserted_id > 0)
                {
                    $title = 'Newsletter Subscription Notification';
                    $template = $this->load->view("_layout/email_template/newsletter",$data,true);
                    $to = $data['newsletter_email'];
                    parent::client_email($to,$template,$title);
                    $param['status'] = 1;
                    $param['txt'] = 'Thank you! Your email has been subscribed.';
                    echo json_encode($param);
                }
                else
                {
                    $param['status'] = 0;
                    $param['txt'] = 'Due to some error, email not send';
                    echo json_encode($param);
                }               
            }
            else
            {
                $param['status'] = 0;
                $param['txt'] = validation_errors();
                echo json_encode($param);
            }
        }
    }



}
