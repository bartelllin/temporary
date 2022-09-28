<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	/**
	 * Home Controller. - The deafult controller
	 *
	 * @package		Main - Default
	 * @author		Babar Hussaini (babar.hussaini@tradekey.com)
	 * @version		2.0
	 * @since		01 Jun, 2015
	 */

	private $page_name = 'home_index';
	private $about_lady = 'aboutus_index';

	// public $coupon_discount;
 //    public $total_amount;
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();

        // $this->coupon_discount = $this->get_coupon_discount();
        // $this->total_amount = $this->get_total();
    }

    // public function get_coupon_discount(){
    // $data = 0;
    // if (isset($this->session->userdata()['coupon']['coupon_discount'])) {
    //     $dis = $this->session->userdata()['coupon']['coupon_discount'];
    //     $data = $this->cart->total()*$dis/100; 
    // }
    // return $data;
    // }
    // public function get_total(){
    //     $data = $this->cart->total() - $this->coupon_discount;
    //     return $data;
    // }

	public function index()
	{ 
		if($this->userid <= 0){
			redirect(g('base_url').'register');
		}
		global $config;

        $param2['where']['inner_banner_id'] = 10;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);

		$data['userEmail'] = $this->session->userdata['logged_in']['email'];

		$data['title'] = 'My Account Page';

		$this->load_view("index" , $data);
	}


	public function ForgotPasswordEmail(){

	$email = $_POST['signup']['signup_email'];
	//debug($email,1);

	$signupData = $this->model_signup->find_one(
     			      array('where'=>array('signup_email' => $email,'signup_status'=>1)));

	//debug($signupData,1);

	if(count($signupData) > 0){

		$title = "Forgot Password";
		$signupData['id'] = "yrt15".$signupData['signup_id']."xyurt8576412";

		//debug($signupdata['id'],1);
		$template = $this->load->view("_layout/email_template/forgotpassword",$signupData,true);
		$to = $signupData['signup_email'];

		//debug($to,1);

		//debug($template,1);
		parent::fp_email($to,$template,$title);
		// echo json_encode(array('status'=>1));
		$param['status'] = 1;
					$param['txt'] = 'Check your email';
					echo json_encode($param);
		//debug($to,1);
	}else{

		// echo json_encode(array('status'=>0));

		$param['status'] = 0;
					$param['txt'] = 'Enter your email';
					echo json_encode($param);
	}

}

	public function info(){
		if($this->userid <= 0){
			redirect(g('base_url').'register');
		}
		global $config;
	
        $param1['where']['inner_banner_id'] = 11;
        $param1['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param1);

		$data['userEmail'] = $this->session->userdata['logged_in']['email'];
		$data['userdata'] = $this->model_signup->find_by_pk($this->userid);
		$data['country'] = $this->model_country->find_all();

		$data['title'] = 'My Account Info';

		$this->load_view("info" , $data);
	}

	public function profile(){
		if($this->userid <= 0){
			redirect(g('base_url').'register');
		}
		global $config;

		$param2['where']['inner_banner_id'] = 15;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);


		$data['userEmail'] = $this->session->userdata['logged_in']['email'];
		// $data['userdata'] = $this->model_signup->find_by_pk($this->userid);
		// //debug($data['userdata'],1);
		// $data['country'] = $this->model_country->find_all();

		$data['title'] = 'My Profile';

		$this->load_view("profile" , $data);
	}

	public function orderhistory(){
		if($this->userid <= 0){
			redirect(g('base_url').'register');
		}
		global $config;


        $param1['where']['inner_banner_id'] = 13;
        $param1['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param1);


		$data['userEmail'] = $this->session->userdata['logged_in']['email'];
		
		$params['joins'][] = array(
            "table"=>"order_item" , 
            "joint"=>"order_item.order_item_order_id = order.order_id"
            );
		$params['where']['order_user_id'] = $this->userid;
		$data['orders'] = $this->model_order->find_all($params);

		//$data['country'] = $this->model_country->find_all();

		$data['title'] = 'Order History';

		$this->load_view("orderhistory" , $data);
	}

	public function mywishlist(){
		if($this->userid <= 0){
			redirect(g('base_url').'register');
		}
		global $config;
		
        $param1['where']['inner_banner_id'] = 12;
        $param1['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param1);		

		$data['userEmail'] = $this->session->userdata['logged_in']['email'];
		$data['wishlist'] = $this->model_wishlist->find_all(
			array('where'=>array('wishlist_user_id'=>$this->userid)));
		
		//$data['country'] = $this->model_country->find_all();

		$data['title'] = 'My Wishlist';

		$this->load_view("wishlist" , $data);
	}

	public function addwishlist(){
		if($this->userid <= 0){
			echo json_encode(array('status'=>0,'message'=>'You are not logged in'));
		}
		else{
			$data['wishlist_user_id'] = $this->userid;
			$data['wishlist_product_id'] = intval($_POST['product_id']);
			$status = $this->model_wishlist->insert_record($data);
			if($status > 0){
				echo json_encode(array('status'=>1,'message'=>'Your item has been added into your wishlist.'));		
			}
			else{
				echo json_encode(array('status'=>0,'message'=>'Please try again'));
			}
		}
	}


	public function change_password(){
		if($this->userid <= 0){
			redirect(g('base_url').'register');
		}
		global $config;

        $param1['where']['inner_banner_id'] = 12;
        $param1['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param1);

		$data['userEmail'] = $this->session->userdata['logged_in']['email'];
		$data['userdata'] = $this->model_signup->find_by_pk($this->userid);
		$data['country'] = $this->model_country->find_all();

		$data['title'] = 'Change Password';

		$this->load_view("changepassword" , $data);
	}

	public function login(){


        // check user is coming from "Checkout page" or not start
        $visited_url = $this->agent->referrer();
        if(strstr($visited_url,'checkout')=="checkout"){
            $this->session->set_userdata('checkout_referrer',g('base_url').'checkout/step2');
        }
        else{
            $this->session->unset_userdata('checkout_referrer');
        }
        // check user is coming from "Checkout page" or not end
		
		if($this->userid > 0){
			redirect(g('base_url'));
		}

		$data['breadcrumb'] = array('child_one'=>"Login",'child_two'=>'');
		$this->load_view("login" , $data);
	}

	public function update_password(){
		if($this->userid <= 0){
			$param['status'] = 0;
			$param['txt'] = "you are not registered";
			echo json_encode($param);
		}
		else{
			if(count($_POST) > 0) {
				$param['signup_password'] = md5($_POST['password']);
				$status = $this->model_signup->update_by_pk($this->userid,$param);
				if($status){
					$param['status'] = 1;
					$param['txt'] = 'Password has been changed';
					echo json_encode($param);
				}
			}
		}
	}

	public function update_info(){

		if($this->userid <= 0){
			$param['status'] = 0;
			$param['txt'] = "you are not registered";
			echo json_encode($param);
		}
		else{
			if(count($_POST) > 0) 
			{
				if($this->validate("model_signup"))
				{
					$form_name = 'signup';
					$signup_data = $_POST['signup'];
					//unset($signup_data['signup_password']);
					//debug($signup_data);exit;
					//$contact_us_data['inquiry_type'] = 'contactus';
					//$signup_data['signup_status'] = 1;
					//$this->model_signup->set_attributes($signup_data);
					//$inserted_id = $this->model_signup->save();
					$status = $this->model_signup->update_by_pk($this->userid,$signup_data);

						$param['status'] = 1;
						$param['txt'] = 'Thank you! your account details have been updated.';
						echo json_encode($param);

					// if($status > 0)
					// {
					// 	//$this->model_signup->login();
					// 	//$subject = $contact_us_data['inquiry_heading'];
					// 	//parent::email_structure($form_name,$subject);
					// 	$param['status'] = 1;
					// 	$param['txt'] = 'Thank you! your account details have been updated.';
					// 	echo json_encode($param);
					// }
					// else
					// {
					// 	$param['status'] = 0;
					// 	$param['txt'] = 'Due to some error, email not send';
					// 	echo json_encode($param);
					// }				
				}
				else
				{
					$param['status'] = 0;
					$param['txt'] = validation_errors();
					echo json_encode($param);
				}
			}
			else{
				$param['status'] = 0;
				$param['txt'] = "Please provide the required fields";
				echo json_encode($param);
			}			
		}
	}
	/**
	* register page
	**/



			

			public function register(){  


		  if($this->userid > 0){
		   redirect(g('base_url'));
		  }

       $param2['where']['inner_banner_id'] = 7;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);


		  
		//   //debug($this->session->userdata);exit;
		//   $data['breadcrumb'] = array('child_one'=>"Register",'child_two'=>'');
		//   $data['country'] = $this->model_country->find_all();
		  $this->load_view("register" , $data);
		 }

		 public function logout(){  
		  $this->session->unset_userdata('logged_in');
		  $this->session->sess_destroy();
		  $this->cart->destroy();
		  redirect($this->config->base_url());
		 }

		 public function do_login(){
		  if(count($_POST) > 0){

		   $login_data = $_POST['signup'];
		   $login_data['signup_email'] = $login_data['signup_email'];
		   $login_data['signup_password'] = md5($login_data['signup_password']);
		   $status = $this->model_signup->login($login_data);
// debug($status,1);
		   if($status){
		    $param['status'] = 1;
		    $param['txt'] = 'Successfully Login';    
		   }
		   else{
		    $param['status'] = 0;
		    $param['txt'] = 'Invalid Email or Password';
		   }
		  }
		  echo json_encode($param);
		 }


	public function save_signup(){

		
			if(count($_POST) > 0) 
			{
				if($this->validate("model_signup"))
				{
					$form_name = 'signup';
					$signup_data = $_POST['signup'];


					$signup_data['signup_status'] = 1;
					$signup_data['signup_password'] = md5($signup_data['signup_password']);
					//debug($signup_data); exit;
					$this->model_signup->set_attributes($signup_data);
					$inserted_id = $this->model_signup->save();
					if($inserted_id > 0)
					{
						$this->model_signup->login($signup_data);
						$subject = "New Signup Alert";
						//parent::email_structure($form_name,$subject);

						// $signup_data['signup_id'] = "00546".$inserted_id."79";
						$title = 'Registration Confirmation Email';
						$template = $this->load->view("_layout/email_template/signup_confirmation",$signup_data,true);
						$to = $signup_data['signup_email'];						
						//parent::client_email($to,$template,$title);
						$param['status'] = 1;
						$param['txt'] = 'Thank you! you have successfully registered.';
						echo json_encode($param);
						//redirect(g('base_url').'login');
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

	

	public function confirm(){
		$id = $this->uri->segment(3);
		$getID = substr($id, 5,-2);
		$signup_data['signup_status'] = 1;
		$status = $this->model_signup->update_by_pk($getID,$signup_data);
		if($status){
			redirect(g('base_url')."login?confirm=1");
		}
		else{
			redirect(g('base_url')."login?confirm=0");	
		}
	}


	public function getinvoice(){

		$order_id = intval($_POST['order_id']);
		$data['order_detail'] = $this->model_order->find_by_pk($order_id);
		$data['order_items'] = $this->model_order_item->find_all(
			array('where'=>array('order_item_order_id'=>$order_id))
		);

		$message = $this->load->view("account/invoiceTemplate",
			$data,
			true
		);
		echo $message;
	}



	// 	public function forgotpasswordemail(){
	// 	$signupdata = $this->model_signup->find_one_active(
	// 		array('where'=>array('signup_email'=>$_POST['email']))
	// 	);
	// 	if(count($signupdata) > 0){
	// 		$title = 'Forgot Password';
	// 		$signupdata['id'] = "yrt15".$signupdata['signup_id']."xyurt8576412";
	// 		$template = $this->load->view("_layout/email_template/reset_password",$signupdata,true);
	// 		echo $template;exit;
			
	// 		$to = $signupdata['signup_email'];
	// 		parent::client_email($to,$template,$title);
	// 		echo json_encode(array('status'=>1, 'txt'=>'Successfull Please Check Your E-Mail '));
	// 	}
	// 	else{
	// 		echo json_encode(array('status'=>0,'txt'=>'Please enter your correct email address.'));
	// 	}
	// }

	// public function resetpassword(){

	// 	//$this->layout = "tkd_login";
	// 	$data['title'] = "The Ancient Wisdom Salvage Yard Podcast";
	// 	$data['detail'] = " OCCULT AND ESOTERICA FROM THE FRINGE";

	// 	$data['breadcrumb'] = array('child_one'=>"Change Password",'child_two'=>'');
	// 	$data['newsletter'] = $this->model_cms_page->find_by_pk(6);
	// 	$this->load_view("changepasswordclient" , $data);
	// }

	public function resetpassword()
{

	$param2['where']['inner_banner_id'] = 17;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);

        
	$data['user_id']=$_GET['id'];
	$this->load_view("user_set_password",$data);
}

public function resetpasswordclient(){

	$id = $_POST['user_id'];
	$id = str_replace("yrt15","", $id);
	$id = str_replace("xyurt8576412", "", $id);

//debug($_POST['newPassword'],1);
	if(isset($_POST['newPassword']) && empty($_POST['newPassword'])){
		echo json_encode(array('status'=>0,'txt'=>'Please provide The Password'));

	}else{
		$password = md5($_POST['newPassword']);
		$status = $this->model_signup->update_by_pk($id,array('signup_password'=>$password));
		if($status){
			echo json_encode(array('status'=>1,'txt'=>'Your password has been changed'));

		}else{
			echo json_encode(array('status'=>0,'txt'=>'Please try again or use different password'));
		}
	}
}

	// public function resetpasswordclient(){

	// 	$id = $_POST['id'];
	// 	$code = $_POST['code'];

 //  		//$encodedID = "yrt15".$result['id']."xyurt8576412";
 //  		$id = str_replace("yrt15", "", $id);
 //  		$id = str_replace("xyurt8576412", "", $id);
 //  		if (md5($id) == $code) {
  			
  		
 //  		//echo $id;exit;

 //  		if(isset($_POST['password']) && empty($_POST['password'])){
 //  			echo json_encode(array('status'=>0,'txt'=>'Please provide the password'));
 //  		}
 //  		else{
 //  			$password = md5($_POST['password']);
 //  			$status = $this->model_signup->update_by_pk($id,array('signup_password'=>$password));
 //  			if($status){
 //  				echo json_encode(array('status'=>1,'txt'=>'Your password has been changed.'));		
 //  			}
 //  			else{
 //  				echo json_encode(array('status'=>0,'txt'=>'Please try again or use different password'));		
 //  			}
 //  		}

 //  		}else{
 //  			redirect('404');
 //  		}

	// }
	
	
	public function error(){
		echo "error";exit;
	}

	public function notfound()
	{
		$data['title'] = '404 Error';
		$this->load_view("404",$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */