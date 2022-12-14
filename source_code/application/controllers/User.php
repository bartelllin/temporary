<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{

    /**
     * User Controller
     *
     * @package        User Controller
     * @version        1.0
     * @since        15-Nov-2017
     */

    private $json_param = array();


    public function __construct()
    {
        // Call the Model constructor latest_product
        parent::__construct();
    }

    // Login View
    public function login()
    {
        global $config;

        // Redirect user if session set
        if($this->userid){
            redirect(l(''));
        }
        // Set banner heading
        $data['banner_heading'] = "Login";
        // Sign up / Login main page
        $this->load_view('login', $data);
    }

    // Sign up View
    public function register()
    {
        global $config;

        // Redirect user if session set
        if($this->userid){
            redirect(l(''));
        }
        // Set banner heading
        $data['banner_heading'] = "Register";
        // Sign up / Login main page
        $this->load_view('register', $data);
    }

    // Register Arise
    public function register_arise()
    {
        global $config;

        // Set banner heading
        $data['banner_heading'] = "Register Arise";
        // Sign up / Login main page
        $this->load_view('register_arise', $data);
    }

    // Insert Record
    public function save()
    {
        global $config;

        // Get post data
        $signup = $this->input->post('signup');

        if (array_filled($signup) > 0) {

            $custom_rule = array(
                'signup_password_confirm'=>array(
                    'field'=>'signup_password_confirm',
                    'label'=>'Confirm Password',
                    'rules'=>'required|md5|trim|matches[signup[signup_password]]'
                )
            );

            // Validation success
            if ($this->validate("model_signup", $custom_rule)) {
                // Add token for email validation
                $signup['signup_token'] = md5(time());
                $signup['signup_password'] = md5($signup['signup_password']);

                $this->model_signup->set_attributes($signup);
                $inserted_id = $this->model_signup->save($signup);
                // Record insert successfully
                if($inserted_id > 0)
                {
                    // Send confirmation email
                    $this->model_email->_verification_email($signup,$inserted_id);

                    $this->json_param['status'] = true;
                    $this->json_param['txt'] = 'Thanks for registration. Please confirm your email to proceed further.';
                }
                // Record not insert
                else
                {
                    $this->json_param['status'] = false;
                    $this->json_param['txt'] = 'Something went wrong.Please try later.';
                }


            }
            // Validation failed
            else {
                $this->json_param['status'] = false;
                $this->json_param['txt'] = validation_errors();
            }
        }

        echo json_encode($this->json_param);

    }

    // Email Verification
    public function confirmation()
    {
        // Get data
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        if((!empty($email)) && (!empty($token))){
            // Where condition
            $params['where']['signup_email'] = $email;
            $params['where']['signup_token'] = $token;

            // Run query
            $query = $this->model_signup->find_one($params);

            //Check record found or not
            if(count($query)>0){
                // Change user status active
                $upd_data = array(
                    'signup_token'=>'',
                    'signup_status'=>1
                );

                $upd_query = $this->model_signup->update_by_pk($query['signup_id'],$upd_data);
                $msg = 'Thank you! Your Email has been verified successfully.';
                redirect(l('user/login?msgtype=success&msg=' . urlencode($msg)));
            }
            else{
                $msg = 'Something went wrong.Please try later.';
                redirect(l('user/login?msgtype=error&msg=' . urlencode($msg)));
            }
        }
        else{
            $msg = 'Invalid credentials.';
            redirect(l('user/login?msgtype=error&msg=' . urlencode($msg)));
        }
    }

    // Login action
    public function login_process()
    {
        // Get post data
            $login = $this->input->post('signup');
        $refer_url = $this->input->post('refer');

        if(array_filled($login) > 0)
        {
            // Set params
            $params['where']['signup_email'] = $login['signup_email'];
            // Query
            $data = $this->model_signup->find_all_active($params);

            // Login success
            if($login['signup_email'] == $data[0]['signup_email'] && (md5($login['signup_password'])) ==
                $data[0]['signup_password'])
            {
                // Set user session (session will be set on layout data
                $this->model_signup->set_user_session($data[0]);
                $this->json_param['status'] = true;
                $this->json_param['txt'] = 'Login successfully.';
                $this->json_param['refer'] = (isset($refer_url))?$refer_url:g('base_url');
            }
            // Login fail
            else
            {
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Invalid email / password';
                $this->json_param['refer'] = g('base_url');
            }

        }
        echo json_encode($this->json_param);

    }

    // Load edit user view
    public function edit()
    {
        // Redirect user if session not set
        if($this->session->userdata('userdata')==null){
            redirect(l('login'));
        }

        // Define layout
        $this->layout = 's8_main';

        // Set body class
        $this->layout_data['body_class'] = "responsive timelineBody";

       // Define page
        $this->load_view('edit_profile');
    }

    // Check user password
    public function password_check($str)
    {
        $user_id = $this->session->userdata('userdata')['signup_id'];
        $params['where']['signup_id'] = $user_id;
        $params['where']['signup_password'] = md5($str);
        if($this->model_signup->find_one($params, true)){
            return TRUE;
        }
        else{
            $this->form_validation->set_message('password_check', lang('invalid_pass'));
            return FALSE;
        }
    }

    // Delete Record
    public function delete()
    {

    }

    // Forgot Password
    public function forgot()
    {
        // Get Post Data
        $email = $this->input->post('signup');

        // check Input data empty or not
        $this->form_validation->set_rules('signup[signup_email]', 'Email', 'required|valid_email');
        // Set validation rules for google captcha
        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required');
        $this->form_validation->set_error_delimiters("<span style=\"color:white;\" for=\"%s\" class=\"has-error help-block\">", '</span>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->json_param['status'] = false;
            $this->json_param['txt'] = validation_errors();
        }
        else
        {
            // Send email
            // Query to check email exists or not
            $params['where']['signup_email'] = $email['signup_email'];
            $query = $this->model_signup->find_one($params);
            if(count($query)>0){
                // Remove old token if exist
                $where_params['where']['token_user_id'] = $query['signup_id'];
                $data = array(
                    'token_status'=>STATUS_INACTIVE
                );
                $this->model_token->update_model($where_params,$data);

                // Generate token
                $token = md5(time());
                $data = array(
                    'token_user'=>$token,
                    'token_user_id'=>$query['signup_id'],
                    'token_status'=>1
                );
                // Save token
                $this->model_token->set_attributes($data);
                $this->model_token->save();

                // Send email
                $this->model_email->_notification_forgot_password($query,$token);
                $this->json_param['status'] = true;
                $this->json_param['txt'] = 'If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.';
            }
            else{
                $this->json_param['status'] = true;
                $this->json_param['txt'] = 'If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes.';
            }
        }
        echo json_encode($this->json_param);

    }

    // Forgot Password View
    public function forgot_password()
    {
        // Get data
        $user_id = $this->input->get('id');
        $token   = $this->input->get('token');

        if((!empty($user_id)) && (!empty($token)) && (!$this->session->userdata('userdata')['signup_id'])){
            // Where condition for token expire
            $params['where']['token_user_id'] = $user_id;
            $params['where']['token_user']    = $token;

            // Token found
            if($this->model_token->find_one_active($params)){
                // Run query
                $params_user['where']['signup_id'] = $user_id;
                $query = $this->model_signup->find_one($params_user);

                // Set banner heading
                $data['banner_heading'] = "Reset Password";

                //Check record found
                if(count($query)>0){
                    $data['token_user'] = $token;
                    $data['user_id'] = $user_id;
                    $this->load_view('forgot_password',$data);
                }
                // User ID not found
                else{
                    redirect(l('404'));
                }
            }
            // Token not found
            else{
                redirect(l('404'));
            }
        }
        // Invalid credentials
        else{
            redirect(l('404'));
        }
    }

    public function reset_password()
    {
        // Get Post data
        $user_id  = $this->input->post('user_id');
        $token    = $this->input->post('token');
        $password = $this->input->post('password');

        // check Input data empty or not
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        $this->form_validation->set_rules('token', 'Token', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_error_delimiters("<span style=\"color:white;\" for=\"%s\" class=\"has-error help-block\">", '</span>');

        // Validation error
        if ($this->form_validation->run() == FALSE)
        {
            $this->json_param['status'] = false;
            $this->json_param['txt'] = validation_errors();
        }
        // No validation
        else{
            // Where condition for token expire
            $params['where']['token_user_id'] = $user_id;
            $params['where']['token_user']    = $token;

            // Token found
            if($this->model_token->find_one_active($params)){
                // Set token status to 0
                $this->model_token->update_model($params,array('token_status'=>STATUS_INACTIVE));

                // Change password
                $this->model_signup->update_by_pk($user_id,array('signup_password'=>md5($password)));

                $this->json_param['status'] = true;
                $this->json_param['txt'] = 'Reset password successfully.';

            }
            // Token not found
            else{
                $this->json_param['status'] = false;
                $this->json_param['txt'] = 'Authentication fail.';
            }
        }

        echo json_encode($this->json_param);
    }

    // Logout
    public function logout()
    {
        $user_id = $this->session->userdata('userdata')['signup_id'];

        // Clear user session
        $this->session->unset_userdata('userdata');
        redirect(l(''));
    }
}