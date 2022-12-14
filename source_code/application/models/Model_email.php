<?
class Model_email extends MY_Model {
  
    /**
     * Email MODEL
     *
     */

    private $from = 'mikejason014@gmail.com';
    private $to = 'mikejason014@gmail.com';

    private $customerSportEmail = 'customersupport@lms.com';
    private $salesEmail = 'sales@lms.com';
    private $technicalEmail = 'technical@lms.com';
    private $developerEmail = 'mikejason014@gmail.com';


    private $_template = 'query';

    function __construct()
    {
        parent::__construct();

        self::_set();
    }


    function _set()
    {
        // set from email
        $this->from = $this->_set_email();


        // set template
        //$this->_template = '_template';
    }

    private function _set_email()
    {
        $this->load->model('model_config');
        
        $config_info = $this->model_config->find_by_pk(6);
        
        if(isset($config_info) && array_filled($config_info))
            return $config_info['config_value'];
        else
            return 'dalton.developer@gmail.com';
    }


    public function notification_delete_user($userID)
    {
        $param['fields'] = 'signup_id,signup_fname,signup_lname,signup_email';
        $user_data = $this->model_signup->find_by_pk($userID ,false ,$param);
        
        $this->_notification_delete_user('user' , $user_data);

        $this->_notification_delete_user('admin' , $user_data);
        
    }


    public function _notification_delete_user($type = 'user' , $user_data)
    {
        $message = '';
        
        if($type == 'user')
        {
            $message .= 'Dear ' . ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']) . "<br />";
            $message .= "Your account has been deleted in our website.<br />";
            $to = $this->to;
            $from = $this->from ;
        }
        else
        {
            $message .= "Dear Admin<br />";
            $message .= "One account has been deleted in website.<br />";
            $to = $this->from;
            $from = $this->from ;
        }

        
        $param['form_input']['id'] = $user_data['signup_id'];
        $param['form_input']['first_name'] = ucfirst($user_data['signup_fname']);
        $param['form_input']['last_name'] = ucfirst($user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['status'] = 'Account Delete';

        $subject = "User account Deleted";
      

        $message .= "Thanks & Regards <br />";
        
        $param['form_input']['comments'] = $message;

                
        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        parent::email_structure($to , $from ,$subject, $msg);
    }

    public function notification_delete_story($id)
    {
        $story_data = $this->model_story->find_by_pk($id);

        $user_data = $this->model_signup->find_by_pk($story_data['story_userid']);


        $subject = "Story Deleted";

        $param['form_input']['customer_name'] = ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['subject'] = $subject;


        /**
            CLIENT PARAM
        */

        $message = 'Dear ' . ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']) . "<br />";
        $message .= "Your Story # ".$story_data['story_id']."(".$story_data['story_title'].") has been deleted in our website.<br />";
        $message .= "Thanks & Regards <br />";
        
        $param['form_input']['comments'] = $message;

                
        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        // client
        parent::email_structure($this->to , $this->from ,$subject, $msg);


        /**
            ADMIN PARAM
        */

        $message = "Dear Admin<br />";
        $message .= "One Story # ".$story_data['story_id']."(".$story_data['story_title'].") has been deleted in website.<br />";
        $message .= "Thanks & Regards <br />";
        
        $param['form_input']['comments'] = $message;

                
        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        
        // client
        parent::email_structure($this->from , $this->from ,$subject, $msg);

        return true;
    }


    public function email_new_story($id)
    {
    	$story_data = $this->model_story->find_by_pk($id);

    	$user_data = $this->model_signup->find_by_pk($story_data['story_userid']);

		
        $this->to = $user_data['signup_email'];

        $subject = "New story pending for approval";

        $param['form_input']['customer_name'] = ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['subject'] = $subject;


     	$message = 'Dear ' . ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']) . "<br />";
     	$message .= "Your Story has been uploaded, pending for approval from administrator<br />";
     	$message .= "Thanks & Regards <br />";
     	
        $param['form_input']['comments'] = $message;

                
        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        // client
        parent::email_structure($this->to , $this->from ,$subject, $msg);
        
        /*
         admin Param
        */



        $subject = "New story has been uploaded pending for approval";

        $url = la('story/add/') . $id;

        $param['form_input']['customer_name'] = ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['subject'] = $subject;


     	$message = 'Dear Admin <br />';
     	$message .= "New Story has been uploaded, pending for approval please <a href='".$url."'>Click Here</a> <br />";
     	$message .= "Thanks & Regards <br />";
     	
        $param['form_input']['comments'] = $message;
        $param['form_input']['link'] = $url;

                
        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        
        parent::email_structure($this->from , $this->from ,$subject, $msg);

        return true;
    }



    public function email_story_approve($id)
    {
    	$story_data = $this->model_story->find_by_pk($id);

    	$user_data = $this->model_signup->find_by_pk($story_data['story_userid']);

		
        $this->to = $user_data['signup_email'];

        $subject = "story Status changed Approve";

        $param['form_input']['customer_name'] = ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['subject'] = $subject;


     	$message = 'Dear ' . ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']) . "<br />";
     	$message .= "Your Story status has been changed, new status of Approve please see your story in our website<br />";
     	$message .= 'Please click here . ' . l('');
     	$message .= "Thanks & Regards <br />";
     	
        $param['form_input']['comments'] = $message;

                
        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        // client
        parent::email_structure($this->to , $this->from ,$subject, $msg);
        
        /*
         admin Param
        */



        $subject = "Story has been Changed";

        $url = la('story/add/') . $id;

        $param['form_input']['customer_name'] = ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['subject'] = $subject;


     	$message = 'Dear Admin <br />';
     	$message .= "Your Story status has been changed, new status of Approve please see your story in our website<br />";
     	$message .= 'Please click here . ' . l('');
     	$message .= "Thanks & Regards <br />";
     	
        $param['form_input']['comments'] = $message;
        $param['form_input']['link'] = $url;

                
        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        
        
        parent::email_structure($this->from , $this->from ,$subject, $msg);

        return true;
    }

    // Disapproved story by admin start
    public function email_story_disapprove($id)
    {
        $story_data = $this->model_story->find_by_pk($id);

        $user_data = $this->model_signup->find_by_pk($story_data['story_userid']);


        $this->to = $user_data['signup_email'];

        $subject = "Story Status changed Disapproved";

        $param['form_input']['customer_name'] = ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['subject'] = $subject;


        $message = 'Dear ' . ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']) . "<br />";
        $message .= "Your Story status has been Disapproved by Admin.<br />";
        $message .= "Thanks & Regards <br />";

        $param['form_input']['comments'] = $message;


        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);

        // client
        parent::email_structure($user_data['signup_email'] , $this->from ,$subject, $msg);

        return true;
    }
    // Disapproved story by admin end

    // Create user email
    public function _notification_create_user($user_data,$inserted_id)
    {
        $message = '';

        $message .= 'Dear ' . ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']) . "<br />";
        $message.= "Registration has been successfully.Now you can Login to proceed further. <br/>";
        $message .= "Thanks for Registration <br />";
        $to = $user_data['signup_email'];
        $from = $this->from ;

        $param['form_input']['id'] = $inserted_id;
        $param['form_input']['first_name'] = ucfirst($user_data['signup_fname']);
        $param['form_input']['last_name'] = ucfirst($user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['status'] = 'Account Create';

        $subject = "User Registration";


        $message .= "<br /> Thanks & Regards <br />";

        $param['form_input']['comments'] = $message;


        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);

        parent::email_structure($to , $from ,$subject, $msg);
    }

    // Send confirmation email to user (confirmation) (template "query.php)
    public function _verification_email($user_data,$inserted_id)
    {
        $message = '';

        $message .= 'Dear ' . ucfirst($user_data['signup_firstname'] . ' ' . $user_data['signup_lastname']) . ",<br />";
        $message .= "Your account has been created in our website.Please verify the below link : <br />";
        $message .= "<a href='". g('base_url') ."user/confirmation?email=".$user_data['signup_email']. "&token=" .$user_data['signup_token'] . "'>CLICK HERE</a>" . "  <br />";
        $to = $user_data['signup_email'];
        //$from = $this->from ;
        $from = g("db.admin.email_conatct_us") ;

        /*$param['form_input']['id'] = $inserted_id;
        $param['form_input']['first_name'] = ucfirst($user_data['signup_firstname']);
        $param['form_input']['last_name'] = ucfirst($user_data['signup_lastname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['status'] = 'Account Create';*/

        $subject = "User Registration";


        $message .= "<br /> Thanks & Regards <br />";

        $param['comments']   = $message;


        //$msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        $msg = $this->load->view('_layout/email_template/confirmation_email', $param , true);

        parent::email_structure($to , $from ,$subject, $msg);
    }

    // Recover username / password (template "reset_password.php)
    public function _notification_forgot_password($user_data,$token)
    {
        $message = '';

        $message .= 'Dear ' . ucfirst($user_data['signup_firstname'] . ' ' . $user_data['signup_lastname']) . ",<br />";
        //$message .= "Your Password info<br />";
        $to = $user_data['signup_email'];
        //$from = $this->from ;
        $from = g("db.admin.email_conatct_us") ;

        $subject = "Password Reset";

        $message .= "Please visit the below link for Password change: <br />";
        $message .= "<a href='". g('base_url') ."user/forgot-password?id=".$user_data['signup_id']. "&token=" .$token . "'>CLICK HERE</a>" . "  <br />";


        $message .= "<br /> Thanks & Regards <br />";

        //$param['form_input']['comments'] = $message;
        $param['comments'] = $message;

        $msg = $this->load->view('_layout/email_template/reset_password' , $param , true);

        parent::email_structure($to , $from ,$subject, $msg);
    }

    // Recover username / password (not using)
    public function _notification_recover_username_password($user_data)
    {
        $message = '';

        $message .= 'Dear ' . ucfirst($user_data['signup_fname'] . ' ' . $user_data['signup_lname']) . "<br />";
        $message .= "Your Password info has been provide: <br />";
        $to = $user_data['signup_email'];
        $from = $this->from ;

        $param['form_input']['first_name'] = ucfirst($user_data['signup_fname']);
        $param['form_input']['last_name'] = ucfirst($user_data['signup_lname']);
        $param['form_input']['email'] = $user_data['signup_email'];
        $param['form_input']['password'] = pass_decrypt($user_data['signup_password']);
        $param['form_input']['status'] = 'Recover Username / Password';

        $subject = "Password Recovery";


        $message .= "<br /> Thanks & Regards <br />";

        $param['form_input']['comments'] = $message;


        $msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);

        parent::email_structure($to , $from ,$subject, $msg);
    }

    public function client_email($to, $template, $title)
    {


        $this->load->library('email');
        //$this->email->initialize($config); // Add

        $db_to = g("db.admin.sales_email");
        $send_from = $this->from;
        $name = g('site_name');

        $send_to = $this->to;
        $title = 'Sydney Maurice Business Services';

        $message = $template;


        $this->email->from($send_from);
        $this->email->to($send_to);
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        //$this->email->protocol('smtp');
        $this->email->send();
    }

    // Send email to all subscriber
    public function _new_job_email($subscribe_emails, $job_data, $insert_id, $company_name)
    {
        $message = '';

        $message .= 'Dear ' .",<br />";
        $to = $subscribe_emails;
        //$from = $this->from ;
        $from = g("db.admin.subscriber_email") ;

        $subject = g('site_name') . ' - Job Opportunity';


        $message .= "<br /> Thanks & Regards <br />";

        $param['comments']   = $message;
        $param['job_data']   = $job_data;
        $param['insert_id']   = $insert_id;
        $param['company_name']   = $company_name;


        //$msg = $this->load->view('_layout/email_template/'.$this->_template , $param , true);
        $msg = $this->load->view('_layout/email_template/new_job', $param , true);

        parent::email_structure($to , $from ,$subject, $msg);
    }

    // Send confirmation email to user (confirmation) (template "query.php)
    public function _subscribe_email($email)
    {
        $message = '';


        $message .= "$email has been successfully subscribed.<br />";
        $to = g("db.admin.subscriber_email");
        $from = g("db.admin.email_conatct_us") ;

        $subject = "User Subscribtion";


        $message .= "<br /> Thanks & Regards <br />";

        $param['comments']   = $message;

        $param['email']   = $email;

        $msg = $this->load->view('_layout/email_template/subscribe', $param , true);
        // Send to admin
        parent::email_structure($to , $from ,$subject, $msg);
        $msg1 = $this->load->view('_layout/email_template/subscribe_user', $param , true);
        // Send to subscribe user
        parent::email_structure($email , $from ,$subject, $msg1);
    }

    // Send email from admin (to all subscribers)
    public function _send_all_subscribers($email, $subject, $message)
    {
        $to = $email;
        $from = g("db.admin.subscriber_email") ;

        $param['message'] = $message;
        $param['email'] = $email;

        $msg = $this->load->view('_layout/email_template/bulk_subscribe_email', $param , true);


        parent::email_structure($to , $from ,$subject, $msg);
    }
}



?>