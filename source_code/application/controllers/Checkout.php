<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// define('PublishableKey', 'pk_test_O5T0HxoOHOSh2WJkPGHHv121');  //CHANGE THIS
// define('SecretKey', 'sk_test_bFbAf7b3eMcj5k7ukcciepQR');
// define('AccountCurrency', 'usd'); //usd, eur, gbp, aud, cad
// define('TEST_MODE', 'TRUE');
// require APPPATH.'third_party/stripe/Stripe.php';



// require APPPATH.'third_party/square_v2/autoload.php';


class checkout extends MY_Controller {

	public $coupon_discount;
    public $total_amount;

	function __construct() 
	{
		parent::__construct();

		$this->coupon_discount = $this->get_coupon_discount();
        $this->total_amount = $this->get_total();
	} 
	

	public function get_coupon_discount(){
    $data = 0;
    if (isset($this->session->userdata()['coupon']['coupon_discount'])) {
        $dis = $this->session->userdata()['coupon']['coupon_discount'];
        $data = $this->cart->total()*$dis/100; 
    }
    return $data;
    }
    public function get_total(){
        $data = $this->cart->total() - $this->coupon_discount;
        return $data;
    }


	public function index()
	{
		global $config;

		//debug($this->coupon_discount);
		
        $param2['where']['inner_banner_id'] = 5;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);

		$data['cart_data'] = $this->cart->contents();


		$data['breadcrumb'] = array('child_one'=>'Checkout','child_two'=>'');	
		

		$this->load_view("checkout" , $data);
	}


	public function step2()
	{
		//if($this->userid <= 0)
			//redirect(g('base_url')."login");

        $param2['where']['inner_banner_id'] = 6;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);


		// $data['sub_title'] = "Contact Information";
		// $data['breadcrumb'] = array('child_one'=>$data['title'],'child_two'=>'');		
		$data['country'] = $this->model_country->find_all();
		$data['userInfo'] = $this->model_signup->find_by_pk($this->userid);
		$data['cart_data'] = $this->cart->contents();

		$this->load_view("step2" , $data);
	}


	public function shippingStep(){
		$order_id = intval($_GET['oid']);

		$data['title'] = "Shipping";
		$data['sub_title'] = "Shopping Cart - Shipping";
		$data['breadcrumb'] = array('child_one'=>$data['title'],'child_two'=>'');		
		$data['country'] = $this->model_country->find_all();

		$orderDetail = $this->model_order->find_by_pk($order_id);		
		if(count($orderDetail) > 0){
			$data['order_id'] = $orderDetail['order_id'];
			$order_id = intval($orderDetail['order_id']);
		}
		else{
			redirect(g('base_url'));
		}
		$data['cart_data'] = $this->cart->contents();
		$data['orderDetail'] = $orderDetail;
		//$data = $this->get_data_authorize($order_id);
		//debug($data);exit;

		//$total_amount = $this->get_total_amount($order_id);

		//$items = $this->model_order_item->find_all(array('where'=>array('order_item_order_id'=>$order_id)));

		//foreach ($items as $key => $value) {
		//	$this->model_order_item->update_by_pk($value['order_item_id'],
		//		array('order_final_grand_total'=>$total_amount));
		//}

		$this->load_view("shippingStep" , $data);
	}



    public function charge_stripe_payment()
	{
		$error = '';
		$success = '';
		if (count($_POST) > 0) {
			$order_amount = $this->cart->total();
			$discount_amount = 0;
			$tax_amount = 0;
			$shipping_amount = 0;
			$total_invoice_amount = ($order_amount+$tax_amount+$shipping_amount)-$discount_amount;
			$order_id = $_POST['orderid'];
    //debug($_POST);exit;
			Stripe::setApiKey(SecretKey);
			try {
				if (!isset($_POST['stripeToken'])){
					throw new Exception("The Stripe Token was not generated correctly");
				}

				$response = Stripe_Charge::create(
					array("amount" => strip_payment($total_invoice_amount),
							"currency" => "usd",
							"card" => $_POST['stripeToken'],
							"description" => "Cart Payment",
						)
					);

				if($response['status'] == 'succeeded'){
					// Payment Received
					$this->model_order->update_by_pk($order_id,array('order_payment_status'=>1));

					// Invoice Email CLIENT
					//$this->email_invoice($order_id);

					$data['order_id'] = intval($order_id);
			        // Get Cart
	        		$data['cart'] = $this->cart->contents();
	        // Set data
	        		$data['userdata'] = $this->model_signup->find_by_pk($this->userid);

			        $to = $data['userdata']['signup_email'];

			        // Set email invoice
			        $template = $this->load->view('_layout/email_template/invoice',$data,true);

			       // echo $template;exit;
	        		parent::client_email($to,$template,'Order Confirmation');
					// Invoice Email Admin
					//$this->email_invoice($order_id,'admin');
			        $this->cart->destroy();

					// Inventory Section
					//$this->model_product->calculate_inventory($order_id);


					$url = g('base_url')."checkout/success?oid=".$order_id."&code=".md5($order_id);
					$success = 'Your payment was successful.';
				}
				else
				{
					$error = "Error found please try again";	
					$url = g('base_url')."checkout/step3?error=1&oid=".$order_id."&code=".md5($order_id)."&msg=".$error;
				}
			}
			catch (Exception $e) {
				$error = $e->getMessage();
				$url = g('base_url')."checkout/step3?error=1&oid=".$order_id."&code=".md5($order_id)."&msg=".$error;
				//debug($error);
			}

			redirect($url,true);
			exit();
		}
	}


	public function chargeSquareUp()
    {

# The access token to use in all Connect API requests. Use your sandbox access
# token if you're just testing things out.
$access_token = 'sq0atp-M_b97xKE0m6O3Zn1rpoCfg'; //sandbox-sq0atb-n_tYasqOhkCiQWmOtyh5Zg
//debug($access_token , 1);

        $location_api = new \SquareConnect\Api\LocationApi();
        //debug($location_api);exit;

        $location = $location_api->listLocations($access_token);
//  debug($location,1);

        $jsonEncoded = json_decode($location,TRUE); 
    //debug($jsonEncoded,1);

        $location_id = $jsonEncoded['locations'][2]['id'];
 // string | The ID of the business location to associate the checkout with.
//debug($location_id , 1);
# Helps ensure this code has been reached via form submission
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  error_log("Received a non-POST request");
  echo "Request not allowed";
  http_response_code(405);
  return;
}
$ratescharge =  str_replace(',', "", $_POST['amount']);
# Fail if the card form didn't send a value for `nonce` to the server
$nonce = $_POST['nonce'];
    $invoice_no = $_POST['order_id'];
        $amount = floor($ratescharge);

if (is_null($nonce)) {
  echo "Invalid card data";
  http_response_code(422);
  return;
}

$transaction_api = new \SquareConnect\Api\TransactionApi();
$request_body = array (
  "card_nonce" => $nonce,
  # Monetary amounts are specified in the smallest unit of the applicable currency.
  # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
  "amount_money" => array (
    "amount" => $amount,
    "currency" => "USD"
  ),
  
  # Every payment you process with the SDK must have a unique idempotency key.
  # If you're unsure whether a particular payment succeeded, you can reattempt
  # it with the same idempotency key without worrying about double charging
  # the buyer.
  "idempotency_key" => uniqid()
);
//debug($amount, 1);
try {
  $response = $transaction_api->charge($access_token, $location_id, $request_body);

  $jsonEncoded = json_decode($response,TRUE);    
          
          
        
        
        $vars['order_payment_status'] = ($jsonEncoded['transaction']['tenders'][0]['card_details']['status'] == 'CAPTURED' ? 1 : 0);
        $vars['order_payment_post'] = json_encode($jsonEncoded['transaction']);
        $this->model_order->update_by_pk($invoice_no,$vars);
        if($jsonEncoded['transaction']['tenders'][0]['card_details']['status'] == 'CAPTURED'){
            redirect(g('base_url')."checkout/success?oid=".$invoice_no);
        }

} catch (\SquareConnect\ApiException $e) {
     echo "Caught exception " . $e->getMessage();exit;
    
    redirect(g('base_url')."checkout/step3?oid=".$invoice_no."&msg=Your payment process has been declined, please try again.");
}

}

	public function step3()
	{
		$this->layout_data['js_files_init'] = array();
		//if($this->userid <= 0)
			//redirect(g('base_url')."login");

        $param2['where']['inner_banner_id'] = 9;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);

		$order_id = intval($_GET['oid']);

		//$data['sub_title'] = "Shopping Cart - Payment";
		$data['breadcrumb'] = array('child_one'=>$data['title'],'child_two'=>'');		
		$data['country'] = $this->model_country->find_all();

		$orderDetail = $this->model_order->find_by_pk($order_id);		
		if(count($orderDetail) > 0){
			$data['order_id'] = $orderDetail['order_id'];
			$order_id = intval($orderDetail['order_id']);
		}
		else{
			redirect(g('base_url'));
		}
		$data['cart_data'] = $this->cart->contents();
		$data['orderDetail'] = $orderDetail;
		//$data = $this->get_data_authorize($order_id);
		// debug($data);exit;

		//$total_amount = $this->get_total_amount($order_id);

		//$items = $this->model_order_item->find_all(array('where'=>array('order_item_order_id'=>$order_id)));

		//foreach ($items as $key => $value) {
		//	$this->model_order_item->update_by_pk($value['order_item_id'],
		//		array('order_final_grand_total'=>$total_amount));
		//}

		$data['custom'] = $order_id;
		$data['success_url'] = g('base_url')."checkout/success?oid=".$order_id."&code=".md5($order_id);
		$data['notify_url'] = g('base_url')."checkout/notify?oid=".$order_id."&code=".md5($order_id);
		$data['cancel_url'] = g('base_url')."checkout/error?oid=".$order_id."&code=".md5($order_id);

		$this->load_view("step3" , $data);
	}

	public function step4()
	{
		//if($this->userid <= 0)
			//redirect(g('base_url')."login");

		$data['title'] = "Shopping Cart - Payment";
		$data['sub_title'] = "Shopping Cart - Payment";
		$data['breadcrumb'] = array('child_one'=>$data['title'],'child_two'=>'');		
		$data['country'] = $this->model_country->find_all();

		$order_id = intval($_GET['oid']);
				
		//$data = $this->get_data_authorize($order_id);
		//debug($data);exit;

		//$total_amount = $this->get_total_amount($order_id);

		//$items = $this->model_order_item->find_all(array('where'=>array('order_item_order_id'=>$order_id)));

		//foreach ($items as $key => $value) {
		//	$this->model_order_item->update_by_pk($value['order_item_id'],
		//		array('order_final_grand_total'=>$total_amount));
		//}

		//$data['custom'] = $order_id;
		//$data['success_url'] = g('base_url')."checkout/success?oid=".$order_id."&code=".md5($order_id);
		//$data['notify_url'] = g('base_url')."checkout/notify?oid=".$order_id."&code=".md5($order_id);
		//$data['cancel_url'] = g('base_url')."checkout/error?oid=".$order_id."&code=".md5($order_id);

		$this->load_view("step4" , $data);
	}


	
	public function payline_payment(){
		$gw = new gwapi;

		if(count($_POST) > 0){

			$order_id = intval($_POST['order_id']);
			$cardno = $_POST['card_no'];
			$cardexp = $_POST['card_expiry'];

			// get order detail
			$getorderDetail = $this->model_order->find_by_pk($order_id);
			$orderItem = $this->model_order_item->find_all(
				array('where'=>array('order_item_order_id'=>$order_id))
			);

			// get all items
			$allproducts = array();
			$total = 0;
			foreach ($orderItem as $key => $value) {
				$allproducts[] = $value['order_item_product_id'];
				$total += $value['order_item_price'];
			}

			// get all products
			$getAllProducts = $this->model_product->find_all(
				array('where_in'=>array('product_id'=>implode(',',$allproducts)))
			);	

			// get product name
			$productName = array();
			foreach ($getAllProducts as $key => $value) {
				$productName[] = $value['product_name'];
			}

			// get username password from config
			$user = $this->layout_data['config_info']['admin']['payline_user'];
			$password = $this->layout_data['config_info']['admin']['payline_password'];
			
			$gw->setLogin($user, $password);

			$gw->setBilling(
					$getorderDetail['order_firstname'],
					$getorderDetail['order_lastname'],
					(empty($getorderDetail['order_company']) ? $getorderDetail['order_firstname'] : $getorderDetail['order_company']),
					$getorderDetail['order_address1'],
					$getorderDetail['order_address1'],
					$getorderDetail['order_city'],
					(empty($getorderDetail['order_state']) ? $getorderDetail['order_city'] : $getorderDetail['order_state']),
					$getorderDetail['order_zip'],
					$getorderDetail['order_country'],
					$getorderDetail['order_phone'],
					(empty($getorderDetail['order_fax']) ? $getorderDetail['order_phone'] : $getorderDetail['order_fax']),
					$getorderDetail['order_email'],
					'cocosorisi.com'
					);

			$gw->setShipping(
				$getorderDetail['order_firstname'],
					$getorderDetail['order_lastname'],
					$getorderDetail['order_address1'],
					$getorderDetail['order_address2'],
					$getorderDetail['order_city'],
					$getorderDetail['order_state'],
					$getorderDetail['order_zip'],
					$getorderDetail['order_country'],
					$getorderDetail['order_phone'],
					$getorderDetail['order_fax'],
					$getorderDetail['order_email'],
					$getorderDetail['order_email']
					);

			$ip = $_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);

			$gw->setOrder($order_id,implode(",",$productName),0, 0, $order_id, $ip);

			$r = $gw->doSale($total,$cardno,$cardexp);

			if($gw->responses['responsetext'] == 'SUCCESS'){

				$updateParam['order_payment_status'] = 1;
				$updateParam['order_order_remarks'] = $gw->responses['responsetext'];
				$updateParam['order_response'] = serialize($gw->responses);
				$this->model_order->update_by_pk($order_id,$updateParam);

				//$this->invoice_email($getorderDetail);

				$success_url = g('base_url')."checkout/success?oid=".$order_id."&code=".md5($order_id);
				echo json_encode(array('status'=>1,'message'=>'Thank you! your card has been charged.','url'=>$success_url));   
			}
			else{
				echo json_encode(array('status'=>0,'message'=>$gw->responses['responsetext']));   				
			}
		}
		else{
			echo json_encode(array('status'=>0,'message'=>'Please enter the card detail'));
		}
		
	}

	public function invoice_preview(){
		$this->layout = "tkd_invoice";
		$order_id = intval($_GET['oid']);
		$getorderDetail = $this->model_order->find_by_pk($order_id);
		$param['joins'][] = array(
                "table"=>"product" , 
                "joint"=>"product.product_id = product.product_category_id"
                );

		$param['where']['order_item_order_id'] = $getorderDetail['order_id'];
		$data['order_item'] = $this->model_order_item->find_all($param);
		$data['order_detail'] = $getorderDetail;


		$content['template'] = $this->load->view("_layout/email_template/invoice",$data,true);

		$this->load_view("invoice_print" , $content);
		
		
	}

	public function invoice_email($getorderDetail){
		
		$title = 'Order Confirmation - Invoice #'.$getorderDetail['order_id'];

		$param['joins'][] = array(
                "table"=>"product" , 
                "joint"=>"product.product_id = product.product_category_id"
                );

		$param['where']['order_item_order_id'] = $getorderDetail['order_id'];
		$data['order_item'] = $this->model_order_item->find_all($param);
		$data['order_detail'] = $getorderDetail;
		
		$template = $this->load->view("_layout/email_template/invoice",$data,true);
		
		$to = $getorderDetail['order_email'];
		parent::client_email($to,$template,$title);		
	}


	public function success()
	{
		
  //       $param2['where']['inner_banner_id'] = 14;
  //       $param2['where']['inner_banner_status'] = 1;
  //       $data['inner_banner'] = $this->model_inner_banner->find_one($param2);
		
  //       // Get Order ID
		// $data['order_id'] = intval($_GET['oid']);

		// $data['orderdata'] = $this->model_order->find_by_pk($data['order_id']);
		// $email = $data['orderdata']['order_email'];
		// $orderid = $data['orderdata']['order_id'];

		
        // Get Cart
    //    $data['cart'] = $this->cart->contents();
        // Set data
    //    $data['userdata'] = $this->model_signup->find_by_pk($this->userid);

        // Delete cart values
     //   $this->cart->destroy();

     //   parent::invoice($orderid,$email);

        // Set email invoice

     //   $to = $data['userdata']['signup_email'];
     //   $template = $this->load->view('_layout/email_template/invoice',$data,true);
        
        //echo $template;
       // parent::client_email($to,$template,'Order Confirmation');
      

       // $this->load_view("final_step" , $data);
        //$this->load->view('_layout/email_template/invoice',$data);

         $this->load_view("final_step",$data);
	}


	public function error()
	{
		//if(count($this->cart->contents())<1)
			//redirect(g('base_url')."login");

		$data['title'] = "Shopping Cart - Success";
		$data['banner'] = 'shop.jpg';
		$data['sub_title'] = "Shopping Cart - Success";
		//$data['country'] = $this->model_country->find_all();

        // Get Order ID
		$data['order_id'] = intval($_GET['oid']);
        // Get Cart
        $data['cart'] = $this->cart->contents();
        // Set data
        $data['userdata'] = $this->model_signup->find_by_pk($this->userid);

        // Delete cart values
        $this->cart->destroy();

        $to = $data['userdata']['signup_email'];

        // Set email invoice
        $template = $this->load->view('_layout/email_template/invoice',$data,true);
        //echo $template;exit;
        //parent::client_email($to,$template,'Order Confirmation');
       // echo $template;exit;

        $this->load_view("error" , $data);
        //$this->load->view('_layout/email_template/invoice',$data);
	}



	public function notify(){


	$data = serialize($_POST);
	//mail('johnsu6361@gmail.com','response',$data);

	// echo 2; exit;
	// $dd['response_data'] = $data;
	// $this->model_response->insert_record($dd);
	/*
	$data = unserialize('a:53:{s:8:"mc_gross";s:5:"22.00";s:22:"protection_eligibility";s:8:"Eligible";s:14:"address_status";s:9:"confirmed";s:12:"item_number1";s:0:"";s:3:"tax";s:4:"0.00";s:12:"item_number2";s:0:"";s:8:"payer_id";s:13:"QNLY63LVJVU9Y";s:14:"address_street";s:34:"228 Park Ave S  New York, NY 10003";s:12:"payment_date";s:25:"04:17:40 Nov 15, 2016 PST";s:14:"payment_status";s:9:"Completed";s:7:"charset";s:12:"windows-1252";s:11:"address_zip";s:5:"10163";s:11:"mc_shipping";s:4:"0.00";s:11:"mc_handling";s:4:"0.00";s:10:"first_name";s:5:"Waqas";s:6:"mc_fee";s:4:"0.94";s:20:"address_country_code";s:2:"US";s:12:"address_name";s:11:"Waqas Ahmed";s:14:"notify_version";s:3:"3.8";s:6:"custom";s:0:"";s:12:"payer_status";s:10:"unverified";s:8:"business";s:24:"waqas.ahmed@tradekey.com";s:15:"address_country";s:13:"United States";s:14:"num_cart_items";s:1:"2";s:12:"mc_handling1";s:4:"0.00";s:12:"mc_handling2";s:4:"0.00";s:12:"address_city";s:8:"New York";s:11:"verify_sign";s:56:"ACUe-E7Hjxmeel8FjYAtjnx-yjHAAHAEhK550VBebjD5xWcxYDgNKihM";s:11:"payer_email";s:23:"waqasahmed.it@gmail.com";s:12:"mc_shipping1";s:4:"0.00";s:12:"mc_shipping2";s:4:"0.00";s:4:"tax1";s:4:"0.00";s:4:"tax2";s:4:"0.00";s:6:"txn_id";s:17:"3S898887GM483031M";s:12:"payment_type";s:7:"instant";s:9:"last_name";s:5:"Ahmed";s:13:"address_state";s:2:"NY";s:10:"item_name1";s:21:"Jerk Wings (10 Count)";s:14:"receiver_email";s:24:"waqas.ahmed@tradekey.com";s:10:"item_name2";s:12:"Jerk Chicken";s:11:"payment_fee";s:4:"0.94";s:9:"quantity1";s:1:"1";s:9:"quantity2";s:1:"1";s:11:"receiver_id";s:13:"C42T7TUR6PWBE";s:8:"txn_type";s:4:"cart";s:10:"mc_gross_1";s:5:"10.00";s:11:"mc_currency";s:3:"USD";s:10:"mc_gross_2";s:5:"12.00";s:17:"residence_country";s:2:"US";s:8:"test_ipn";s:1:"1";s:19:"transaction_subject";s:0:"";s:13:"payment_gross";s:5:"22.00";s:12:"ipn_track_id";s:13:"8e8653025ec2b";}');
	*/
	
	// $data = $_POST;
	// $serilize = serialize($data);
// debug($mail,1);

	$oid = $_GET['oid'];
	$code = $_GET['code'];
	
	//debug($oid);
	//debug($code,1);
	

	// $mail =  mail('johndavid78663@gmail.com','test',$status_codes);


	if($code == md5($oid)){


		$data = $_POST;
		$order_id = $data['custom'];
		$status_codes = array("Default"=>0,"Completed"=>1,"Pending"=>2,"Denied"=>3,"Failed"=>4,"Reversed"=>5);
		$payment_status = $data['payment_status'];

		/*
		mail('johndavid78663@gmail.com','payment_status '.rand(),$payment_status);
		mail('johndavid78663@gmail.com','payment_data '.rand(),$data);
		mail('johndavid78663@gmail.com','status_codes '.rand(),$status_codes);
		*/
		$getOrder = $this->model_payment->find_by_pk($order_id);

	
		/*
		$param['where']['coupon_name'] = (isset($this->session->userdata['couponcode']) ? $this->session->userdata['couponcode'] : '');

		$promocode = $this->model_coupon->find_all($param);

	
		$remaining = $promocode[0]['coupon_limit'] - 1;

		$values = array(
					'coupon_limit' => $remaining, 
					);

		$coupon_id = $this->model_coupon->update_by_pk($promocode[0]['coupon_id'], $values);
		*/

		if(count($data) > 0){
			$updateParam['payment_paid_status'] = $status_codes[$payment_status];
			$updateParam['payment_paid_status'] =$payment_status;
		//	$updateParam['order_response'] = $serilize;
			$this->model_payment->update_by_pk($order_id,$updateParam);

// 			$updateCoupon['coupon_status'] = 2;
// 			$couponId = $this->session->userdata()['coupon']['coupon_id'];
// 			$this->model_coupon->update_by_pk($couponId,$updateCoupon);

// 		unset($this->session->userdata()['coupon']);
		}


	}
	
}


	/**
		FUNCTION USE FOR AUTHORIZE PAYMENT METHOD START
	*/
	public function get_data_authorize($orderid)
	{
		$order_id = intval($orderid);
		$data = array();
		$config_value = $this->layout_data['config_info'];

		//$shipping_amount = $this->session->userdata['shipping_content']['shipping_amount'];

		if(intval($this->userid) > 0)
			$data = $this->model_signup->find_by_pk($this->userid);
				
		$vars['invoice']['invoice_no'] = $order_id;

		// CUSTOMER DATA START
		//$name = explode(' ', $_POST['order_shipping_name']);
		$firstname = $data['signup_firstname'];
		$lastname = (empty($data['signup_lastname']) ? $data['signup_firstname'] : $data['signup_lastname']);

		
		if(isset($data) && array_filled($data))
		{
			$country_name = $this->model_country->find_by_pk($data['signup_country']);
						
			// CUSTOMER DATA START
			$vars['user']['firstname'] = $data['signup_firstname'];
			$vars['user']['lastname'] = $data['signup_lastname'];
			$vars['user']['address'] = $data['signup_address'];
			$vars['user']['city'] = $data['signup_city'];
			$vars['user']['country'] = $country_name['country'];
			$vars['user']['phone'] = $data['signup_phone'];
			$vars['user']['email'] = $data['signup_email'];

			$orderData = $this->model_order->find_by_pk($order_id);
			//debug($orderData);exit;
			// CUSTOMER DATA END
			// SHIPPING DATA START

			$orderCountry = $this->model_country->find_by_pk($orderData['order_country']);

			$vars['shipping']['firstname'] = $orderData['order_firstname'];
			$vars['shipping']['lastname'] = $orderData['order_lastname'];
			$vars['shipping']['address'] = $orderData['order_address1'];
			$vars['shipping']['city'] = $orderData['order_city'];
			$vars['shipping']['state'] = $orderData['order_city'];
			$vars['shipping']['country'] = $orderCountry['country'];
			$vars['shipping']['zip_code'] = $orderData['order_zip'];
			$vars['shipping']['phone'] = $orderData['order_phone'];
			$vars['shipping']['email'] = $orderData['order_email'];
			// SHIPPING DATA END
		}
		
		$authorize_url = $config_value['authorize_net_api'][0]['config_value'];
		$api_login_id = $config_value['api_login_id'][0]['config_value'];
		$transaction_key = $config_value['transaction_key'][0]['config_value'];
		$test_request = $config_value['test_request'][0]['config_value'];

		//debug($this->session->userdata['shipping_content']['shipping_amount'] , 1);
		//debug(total_invoice_amount(23 , 2 , 20) , 1);

		$total_amount = $this->get_total_amount($order_id);
		//debug($total_amount);exit;
		$shipment_price = (isset($this->session->userdata['shippment_price']) ? $this->session->userdata['shippment_price'] : 0);
		$total_amount = ($total_amount+$shipment_price);
		
		$fp_timestamp = time();
		$fp_sequence = "123" . time(); // Can be changed to an invoice or other unique number.

		$fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id, $transaction_key, 
												$total_amount, $fp_sequence, $fp_timestamp);

		
		$vars['payment_method_data']['authorize_url'] = $authorize_url;
		$vars['payment_method_data']['api_login_id'] = $api_login_id;
		$vars['payment_method_data']['transaction_key'] = $transaction_key;
		$vars['payment_method_data']['total_amount'] = $total_amount;
		$vars['payment_method_data']['fp_timestamp'] = $fp_timestamp;
		$vars['payment_method_data']['fp_sequence'] = $fp_sequence;
		$vars['payment_method_data']['fingerprint'] = $fingerprint;

		//$vars['payment_method_data']['tax'] = $this->session->userdata['tax_content']['tax_amount'];

		if($test_request == 1)
			$vars['payment_method_data']['test_request'] = true;
		else
			$vars['payment_method_data']['test_request'] = false;

		$vars['url']['return'] = g('base_url')."checkout/stepfinal" . "?oid=".$order_id;
		$vars['url']['cancel'] = g('base_url')."checkout/step2?oid=".$order_id;
		//$vars['url']['response'] = 'http://demo-logomajestic.com/ch/cart/authorize_payment_response';//l('cart/authorize_payment_response');

		// CHECKOUT DATA END

		//$data['payment_form'] = $this->load->view('checkout/authorize_payment_form' , $vars , true);

		//$data['status'] =  true; // Ok

		//echo json_encode($data);

		//debug($vars , 1);
		return $vars;
		
	}


	public function get_total_amount($order_id)
	{
		$total_amount = 0;
		$item_data = $this->model_order_item->get_order_items($order_id);

		foreach ($item_data as $key => $value) {
			
			$options = unserialize($value['order_item_option']);

			$amount = $value['order_item_subtotal'];
			if(isset($options['subscription_tenure'])){
				$tenure = ($options['subscription_tenure'] == 2 ? '3' : '1');
				$amount = ($value['order_item_subtotal']*$tenure);
			}
			$total_amount += $amount;
		}
		
		return $total_amount;
	}


	/**
		PAYMENT RESPONSE FUNCTION START
	*/
	public function authorize_payment_response()
	{
		//$_POST = unserialize('a:44:{s:15:"x_response_code";s:1:"1";s:22:"x_response_reason_code";s:1:"1";s:22:"x_response_reason_text";s:46:"(TESTMODE) This transaction has been approved.";s:10:"x_avs_code";s:1:"P";s:11:"x_auth_code";s:6:"000000";s:10:"x_trans_id";s:1:"0";s:8:"x_method";s:2:"CC";s:11:"x_card_type";s:16:"American Express";s:16:"x_account_number";s:8:"XXXX0002";s:12:"x_first_name";s:5:"Waqas";s:11:"x_last_name";s:5:"Ahmed";s:9:"x_company";s:0:"";s:9:"x_address";s:0:"";s:6:"x_city";s:6:"asdsad";s:7:"x_state";s:0:"";s:5:"x_zip";s:0:"";s:9:"x_country";s:5:"Egypt";s:7:"x_phone";s:0:"";s:5:"x_fax";s:0:"";s:7:"x_email";s:24:"waqas.ahmed@tradekey.com";s:13:"x_invoice_num";s:10:"INV-000104";s:13:"x_description";s:0:"";s:6:"x_type";s:12:"auth_capture";s:9:"x_cust_id";s:0:"";s:20:"x_ship_to_first_name";s:11:"Waqas Ahmed";s:19:"x_ship_to_last_name";s:0:"";s:17:"x_ship_to_company";s:0:"";s:17:"x_ship_to_address";s:27:"dasdasdsadasdasda asd sadsa";s:14:"x_ship_to_city";s:6:"asdsad";s:15:"x_ship_to_state";s:0:"";s:13:"x_ship_to_zip";s:4:"6565";s:17:"x_ship_to_country";s:5:"Egypt";s:8:"x_amount";s:6:"100.00";s:5:"x_tax";s:4:"0.00";s:6:"x_duty";s:4:"0.00";s:9:"x_freight";s:4:"0.00";s:12:"x_tax_exempt";s:5:"FALSE";s:8:"x_po_num";s:0:"";s:10:"x_MD5_Hash";s:32:"C81961A6C312678CB7D02C4D4421EFA4";s:16:"x_cvv2_resp_code";s:0:"";s:15:"x_cavv_response";s:0:"";s:14:"x_test_request";s:4:"true";s:15:"x_ship_to_phone";s:5:"54646";s:20:"x_cancel_link_method";s:6:"button";}');
		if(isset($_POST) && array_filled($_POST))
		{
			$data = $_POST;
			$invoice_no = $_POST['x_invoice_num'];
			//$invoice_no = intval($no[1]);
			mail('babar.hussaini@digitonics.com','test',print_r($_POST,true));
			//$vars['id'] = $invoice_no;
			$vars['order_order_remarks'] = $_POST['x_response_reason_text'];
			$vars['order_payment_status'] = $_POST['x_response_code'];
			$vars['order_authorize_response_code'] = $_POST['x_response_code'];
			$vars['order_authorize_response_reason_code'] = $_POST['x_response_reason_code'];
			$vars['order_authorize_response_reason_text'] = $_POST['x_response_reason_text'];
			$vars['order_authorize_avs_code'] = $_POST['x_avs_code'];
			$vars['order_authorize_auth_code'] = $_POST['x_auth_code'];
			$vars['order_authorize_trans_id'] = $_POST['x_trans_id'];
			$vars['order_authorize_card_type'] = $_POST['x_card_type'];
			$vars['order_authorize_account_number'] = $_POST['x_account_number'];
			$vars['order_authorize_cvv2_resp_code'] = $_POST['x_cvv2_resp_code'];
			$vars['order_authorize_cavv_response'] = $_POST['x_cavv_response'];
			$vars['order_authorize_test_request'] = $_POST['x_test_request'];
			$vars['order_authorize_ship_to_phone'] = $_POST['x_ship_to_phone'];
			$vars['order_payment_post'] = serialize($_POST);
			$vars['order_status_message'] = $this->model_order->get_payment_status($_POST['x_response_code']);

			$this->model_order->update_by_pk($invoice_no,$vars);

			$invoice_num = trim($_POST['x_invoice_num']);
			
			//$this->myemail->payment_response_email('USER' , $invoice_num);

			//$this->myemail->payment_response_email('ADMIN', $invoice_num);
		}
	}

	public function add_cart()
	{

		if(count($_POST) > 0)
		{

			//debug($_POST,1);

			/*if($_POST['wishlist'] == 1){
				$this->model_wishlist->remove_to_wishlist(intval($_POST['product_id']));
			}*/
			
			$param['where']['product_id'] = intval($_POST['productid']);
			/*
			$param['joins'][] = array( 
                "table"=>"product_image" ,
                "joint"=>"product_id = pi_product_id AND pi_is_featured = 1" , 
                "type"=>"left" ,
                                );*/
		
			$product_data = $this->model_product->find_one($param);

			//debug($product_data ,1);
			$product_id = $product_data['product_id'];

			//$price = $this->model_product->get_all_prices($product_data[0]);
			$price = $product_data['product_price'];
			//$product_weight = explode('.',$product_data[0]['product_weight']);	
			//$pounds = $product_weight[0];
			//$ounce = $product_weight[1];

			// debug($_POST,1);
			$data = array(

					'id'      => $product_id,
					'qty'     => (isset($_POST['product_qty']) && !empty($_POST['product_qty']) ? $_POST['product_qty'] : 0),
					'price'   => $price,
					'name'    => htmlentities($product_data['product_name']),
					//'sku'    => htmlentities($product_data['product_sku']),
					'options' => array(
					'product_slug' => g('base_url')."product-detail/".$product_data['product_slug'],
					'product_img' => Links::img($product_data['product_image_path'],$product_data['product_image']),
						// 'product_sku' => $product_data['product_sku']
					));
			
			$insert = $this->cart->insert($data);


			$cart_data = $this->cart->contents();
		// debug($cart_data,1);
			
			if($price == 0 || $_POST['product_qty'] == 0){
				$results['status'] = false;
			}
			else{
						
				$results['status'] = true;
				$results['cart_data'] = $cart_data;

				$results['total'] = $this->cart->total();
			// debug($results['total'],1);
				$results['total_items'] = $this->cart->total_items();
				//$results['img'] = g('base_url').$product_data[0]['pi_image_path'].$product_data[0]['pi_image'] ;
				//$results['name'] = $product_data[0]['product_name'] ;
				//$results['slug'] = g('base_url')."product-detail/".$product_data[0]['product_slug'] ;
				//$results['qty'] = $data['qty'];
				//$results['price'] = $product_data[0]['product_price'];
				//$results['delete_url'] = g('base_url').'checkout/delete/'.$end_index['rowid'];
				
				//$results['item_div'] = $this->item_div();	
				//debug($results);			
			}
		}
		else
		{
			redirect('404');
		}

		echo json_encode($results);
	}


	public function add_cart_package()
	{

		if(count($_POST) > 0)
		{



			
			if($_POST['wishlist'] == 1){
				$this->model_wishlist->remove_to_wishlist(intval($_POST['plans_id']));
			}
			
			$param['where']['plans_id'] = intval($_POST['plans_id']);
			$plans_data = $this->model_plans->find_one($param);
		
			/*
			$param['joins'][] = array( 
                "table"=>"plans_image" ,
                "joint"=>"plans_id = pi_plans_id AND pi_is_featured = 1" , 
                "type"=>"left" ,
                                );*/
		
			$plans_id = $plans_data['plans_id'];
			$price = $plans_data['plans_price'];
			$discount = $plans_data['plans_discount'];

			//$price = $this->model_plans->get_all_prices($plans_data[0]);
			//$plans_weight = explode('.',$plans_data[0]['plans_weight']);	
			//$pounds = $plans_weight[0];
			//$ounce = $plans_weight[1];

			$data = array(

					'id'      => $plans_id,
					// 'qty'     => (isset($_POST['plans_qty']) && !empty($_POST['plans_qty']) ? $_POST['plans_qty'] : 0),
					'qty'     => 1,
					'price'   => $price,
					'type'    => $_POST['pckg'],
					'discount'   => $discount,
					'name'    => substr(htmlentities($plans_data['plans_name']),0,20) ,
					'options' => array(
						'plans_slug' => g('base_url')."ebook-detail/".$plans_data['plans_slug'],
						'plans_img' => g('images_root').'package.png',
						// 'plans_sku' => $plans_data['plans_sku']
					));

			// debug($data,1);
			$cart_data = $this->cart->contents();

			$found = 0;
			foreach ($cart_data as $key => $content_value) {
				if($content_value['id'] == $data['id'])
				{
					$found =  1;
				}
			}

			if($found == 0)
				$insert = $this->cart->insert($data);
			

			$cart_data = $this->cart->contents();



			// debug($data['id']);
			// debug('founct ='.$found);
			// debug($cart_data,1);
			/*echo 'Found';
			debug($price);
			*/


			if($found == 1)
			{
				$results['status'] = false;
				$results['txt'] = 'Your package is already addedd into cart.';
			}
			else if($price == 0){
				$results['status'] = false;
				
				$results['txt'] = 'You can not add this product because price is not set yet.';
				


			}
			else{
						
				$results['status'] = true;
				$results['cart_data'] = $cart_data;


				$results['total'] = $this->cart->total();
				$results['total_items'] = $this->cart->total_items() ;
				//$results['img'] = g('base_url').$plans_data[0]['pi_image_path'].$plans_data[0]['pi_image'] ;
				//$results['name'] = $plans_data[0]['plans_name'] ;
				//$results['slug'] = g('base_url')."plans-detail/".$plans_data[0]['plans_slug'] ;
				//$results['qty'] = $data['qty'];
				//$results['price'] = $plans_data[0]['plans_price'];
				//$results['delete_url'] = g('base_url').'checkout/delete/'.$end_index['rowid'];
				
				//$results['item_div'] = $this->item_div();	
				//debug($results);			
			}
		}
		else
		{
			redirect('404');
		}

		echo json_encode($results);
	}






	// public function add_cart_package()
	// {
	// 	if(count($_POST) > 0)
	// 	{
	// 		$product_id = intval($_POST['product_id']);
	// 		$price = $_POST['product_price'];
	// 		if($product_id == 1){
	// 			$productName = "Lifetime Service $10.99 / month";
	// 		}
	// 		else{
	// 			$productName = "Lifetime Service $79.99 / year";
	// 		}

	// 		$data = array(
	// 				   'id'      => $product_id,
	// 				   'qty'     => (isset($_POST['product_qty']) && !empty($_POST['product_qty']) ? $_POST['product_qty'] : 0),
	// 				   'price'   => $price,
	// 				   'name'    => htmlentities($productName),
	// 				   'options' => array(
	// 				   					'product_slug' => g('base_url')."services-plan",
	// 				   					'product_img' => Links::img($this->layout_data['logo']['logo_image_path'],$this->layout_data['logo']['logo_image']),
	// 				   					'product_sku' => "Package",
	// 				   					));

	// 		$insert = $this->cart->insert($data);
	// 		$cart_data = $this->cart->contents();
			
	// 		if($price == 0 || $_POST['product_qty'] == 0){
	// 			$results['status'] = false;
	// 		}
	// 		else{
						
	// 			$results['status'] = true;
	// 			$results['cart_data'] = $cart_data;

	// 			$results['total'] = $this->cart->total();
	// 			$results['total_items'] = $this->cart->total_items() ;					
	// 		}
	// 	}
	// 	else
	// 	{
	// 		redirect('404');
	// 	}

	// 	echo json_encode($results);
	// }


	public function check_checkoutpage(){
		if($this->userid > 0)
		{
			echo json_encode(array('status'=>1));
		}
		else{
			echo json_encode(array('status'=>0));	
		}
	}

	public function updateShippment()
	{
		$rate = explode("~",$_POST['ShipRate']);
		$this->model_user->set_extended_session(
			array('shippment_price'=>$rate[0]),
			array('shippment_value'=>$rate[1]));

		$totalprice = price($rate[0]+$_POST['grandTotal']);
		echo json_encode(array('totalShipGrand'=>$totalprice,'shipPrice'=>$rate[0]));
	}

	public function check_shipment_set(){
		if(isset($this->session->userdata['shippment_price']) && $this->session->userdata['shippment_price'] > 0){
			$order_id = intval($_POST['oid']);
			$shipprice = $this->session->userdata['shippment_price'];

			$dd['order_shipment_price'] = $shipprice;
			$this->model_order->update_by_pk($order_id,$dd);

			$url = g('base_url')."checkout/step3?oid=".$order_id."&code=".md5($order_id);
			echo json_encode(array('status'=>1,'txt'=>$url));	
		}
		else{
			echo json_encode(array('status'=>0));	
		}
	}

	public function add_cart_subscription()
	{

		$this->cart->destroy();
		$bottle_id = intval($_POST['flavor_bottle_id']);
		$bottles = $this->model_bottle->find_all_active($param);
		$bottle_id = $bottles[0]['bottle_id'];

		if(intval($_POST['random_flavor']) == 1){
			$random_flavors = $this->get_random_flavors();	
			$likes = implode(',',$random_flavors['like']);
			$dislike = implode(',',$random_flavors['dislike']);
			$random_select = true;
		}
		else
		{
			$likes = (isset($_POST['flavor_like_id']) && !empty($_POST['flavor_like_id']) ? $_POST['flavor_like_id'] : '');
			$dislike = (isset($_POST['flavor_dislike_id']) && !empty($_POST['flavor_dislike_id']) ? $_POST['flavor_dislike_id'] : '');	
			$random_select = false;
		}

		if(!empty($_POST['enhancement_id'])){
			$enhancement_price = $this->model_enhancement_price->find_all_active(
				array('where_in'=>array('enhancement_price_id'=>explode(',',$_POST['enhancement_id'])))
				);
			foreach ($enhancement_price as $key => $value) {
				$get_enhancement_price += $value['enhancement_price_price'];
			}
		}

		if(!empty($_POST['enhancement_tenure'])){
			$tenure = json_decode($_POST['enhancement_tenure'],true);
			foreach ($tenure as $key => $value) {
				$enhancement_tenure_data = $this->model_flavor_enhancement->find_all_active(array('where'=>
					array('flavor_enhancement_id'=>$key)));
				$tenureArr[] = $enhancement_tenure_data[0]['flavor_enhancement_name']."~".$value;
			}

		}


		$data = array(
					   'id'      => $bottle_id,
					   'qty'     => 1,
					   'price'   => ($_POST['flavor_bottle_price']),
					   'name'    => 'E-Juice Script',
					   'options' => array(
					   					'product_img' => $bottles[0]['bottle_image_path'].$bottles[0]['bottle_image'],
					   					'flavor_id' => $likes,
					   					'flavor_dislike_id' => $dislike,
					   					'flavor_bottle_id' => (intval($_POST['flavor_bottle_id']) > 0 ? $_POST['flavor_bottle_id'] : '0'),
					   					'enhancement_id' => (intval($_POST['enhancement_id']) > 0 ? $_POST['enhancement_id'] : '0'),
					   					'additional_level' => (intval($_POST['additional_level']) > 0 ? $_POST['additional_level'] : '0'),
					   					'flavor_notes' => (isset($_POST['flavor_notes']) && !empty($_POST['flavor_notes']) ? $_POST['flavor_notes'] : '') ,
					   					'enhancement_bottle_price' => (isset($_POST['enhancement_bottle_price']) && !empty($_POST['enhancement_bottle_price']) ? $_POST['enhancement_bottle_price'] : '') ,
					   					'enhancement_bottle_price_id' => (isset($_POST['enhancement_bottle_price_id']) && !empty($_POST['enhancement_bottle_price_id']) ? $_POST['enhancement_bottle_price_id'] : '') ,
					   					'is_addon' => false,
					   					'random_select' => $random_select,
					   					'tenure' => $tenureArr,
					   					'subscription_tenure' => (intval($_POST['subscription_tenure']) > 0 ? $_POST['subscription_tenure'] : 1),
					   					'just_bottle_price' => $_POST['flavor_bottle_price'],
					   					));
		
		
		$insert = $this->cart->insert($data);
		$cart_data = $this->cart->contents();
		if(count($cart_data) > 0){

			if(!empty($_POST['addon_id']))
			{
				$this->add_addon_cart($_POST['addon_id']);				
			}
			$results['status'] = true;
		}
		else
			$results['status'] = false;	

		echo json_encode($results);
	}

	public function get_random_flavors()
	{
		$data = array();
		$params['order'] = 'RAND()';
		$params['limit'] = 6;
		$flavors = $this->model_flavor->find_all_active($params);

		$i = 1;
		foreach ($flavors as $key => $value) {
			if($i < 4)
				$data['like'][$value['flavor_id']] = $value['flavor_id'];
			else
				$data['dislike'][$value['flavor_id']] = $value['flavor_id'];
			$i++;
		}

		return $data;
	}


	public function add_addon_cart($addon_id)
	{
		$addons = explode(',',$addon_id);
		$params['where_in'] = array('product_id'=>$addons);
		$get_addons = $this->model_product->find_all($params);
		foreach ($get_addons as $key => $value) {
			
			$data = array(
					   'id'      => $value['product_id'],
					   'qty'     => 1,
					   'price'   => $value['product_addon_price'],
					   'name'    => $value['product_name'],
					   'options' => array(
					   					'product_slug'=>$value['product_slug'],
					   					'product_img' => g('base_url').$value['product_image_path'].$value['product_image'],
					   					'is_addon' => true,
					   					));
			$this->cart->insert($data);
		}

	}


	public function add_wishlist()
	{
		if($this->userid <= 0)
		{
			$result['status'] = false;
			$result['txt'] = 'You are not not login or not a registered member.';
		}
		else
		{
			$product_id = intval($_POST['product_id']);
			$id = $this->model_wishlist->add_to_wishlist($product_id);
			if($id > 0)
			{
				$result['status'] = true;
				$result['txt'] = 'Thank you! item has been added in your wishlist.';
			}
			else
			{
				$result['status'] = false;
				$result['txt'] = 'Sorry we are unable to save this item in your wishlist because you have already added this product.';	
			}				
		}
		
		echo json_encode($result);
			
	}

	/**
		Delete Product in cart list
	*/
	public function deletepro($id)
	{
		$data['rowid'] = $id;
		$data['qty'] = 0;

		$this->cart->update($data);
		//echo json_encode(array('status'=>1));
		redirect('checkout');
	}


	public function update_qty()
	{

		// debug($_POST,1);
		$data['rowid'] = $_POST['id'];
		$data['qty'] = $_POST['qty'];
		$this->cart->update($data);


		// debug($this->cart->contents(),1);

		echo json_encode(array('status'=>1));
		//redirect('checkout');
	}
	

	public function get_basket() 
	{
		$result['total'] = $this->cart->total();
		$result['total_items'] = $this->cart->total_items();
		echo json_encode($result);		
	}


	public function clear_cart()
	{
		$this->cart->destroy();
		//echo 1;
		redirect(g('base_url'),true);
	}

	public function update_enhancement_price()
	{
		$enhancement_price = 0;
		$original_price = floatval($_POST['bottle_original_price']);
		
		if(!empty($_POST['enhancementsArr']) && is_array($_POST['enhancementsArr'])){
		$enhancements = $this->model_enhancement_price->find_all_active(array('where_in'=>
			array('enhancement_price_id'=>$_POST['enhancementsArr'])));

			foreach ($enhancements as $key => $value) {
				$enhancement_price += $value['enhancement_price_price'];
			}
		}

		$just_count = ($original_price+$enhancement_price);
		$count = price($original_price+$enhancement_price);
		echo json_encode(array('total'=>$count,'just_count'=>$just_count));
	}

	public function update_enhancement_price_edit()
	{
		$enhancement_price = 0;
		$original_price = floatval($_POST['just_bottle_price']);
		
		if(!empty($_POST['enhancementsArr']) && is_array($_POST['enhancementsArr'])){
		$enhancements = $this->model_enhancement_price->find_all_active(array('where_in'=>
			array('enhancement_price_id'=>$_POST['enhancementsArr'])));

			foreach ($enhancements as $key => $value) {
				$enhancement_price += $value['enhancement_price_price'];
			}
		}

		$just_count = ($original_price+$enhancement_price);
		$count = price($original_price+$enhancement_price);
		echo json_encode(array('total'=>$count,'just_count'=>$just_count));
	}

	/**
		Update Cart Qty Function
	*/
	public function update_qty_cart()
	{
		if(count($_POST) > 0){
			$data['rowid'] = $_POST['id'];
			$data['qty'] = $_POST['qty'];		
			$this->cart->update($data);
			echo json_encode(array('status'=>1));
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}

	
	public function update_addon_price()
	{

		$addons = explode(',',$_POST['addons']);
		$params['where_in'] = array('product_id'=>$addons);
		$get_addons = $this->model_product->find_all($params);
		foreach ($get_addons as $key => $value) {
			$price_list += $value['product_addon_price'];
		}

		$just_count = ($price_list+$_POST['enhancement_bottle_price']);
		$count = price($price_list+$_POST['enhancement_bottle_price']);
		echo json_encode(array('total'=>$count,'just_count'=>$just_count));
	}

	public function remove_addon_price()
	{
		$addon_total = $_POST['price'];
		$total = $_POST['total_price'];
		$count = price($total - $addon_total);
		$just_count = ($total - $addon_total);
		echo json_encode(array('total'=>$count,'just_count'=>$just_count));
	}

	public function discount()
	{
		if(count($_POST) > 0){
			$coupon_code = $_POST['coupon_code'];
			$coupon_data = $this->model_coupon->find_all_active(array('where'=>array('coupon_name'=>$coupon_code)));
			$coupon_value = $coupon_data[0]['coupon_value'];

			if(count($coupon_data) > 0){

				$this->model_user->set_extended_session(
					array('is_coupon'=>true,
							'coupon_value'=>$coupon_value,
							'coupon_name'=>$coupon_code));

				$result['status'] = 1;
				$result['txt'] = 'Coupon disocunt has been implemented in your grand total.';
			}
			else
			{
				$result['status'] = 0;
				$result['txt'] = 'Please provide the valid coupon code.';
			}

		}
		else
		{
			$result['status'] = 0;
			$result['txt'] = 'Please provide coupon code.';
		}
		echo json_encode($result);

	}


	public function coupon()
    {
        //debug($_POST,1);
        if(count($_POST) > 0) 
        {

            $code = $_POST['coupon_code'];
            //$discount = $_POST['coupon_discount'];

           // debug($_POST,1);

          // var dec = (discount/100).toFixed(2); //its convert 10 into 0.10
          // var mult = totalVal*dec; // gives the value for subtract from main value
          // var discont = totalVal-mult;
          // $('.discountTotal').text(discont.toFixed(2));
          
          // $dec = ($discount/100);  
          $updated_cart = array();

   
            $coupon_code = $this->model_coupon->find_one(
            array('where'=>array('coupon_code'=>$code,'coupon_status'=>1)));

           // debug($coupon_code,1);



                if(!empty($coupon_code))
                {

        			$data['coupon'] = array(
        				'coupon_id' => $coupon_code['coupon_id'],
        				'coupon_discount' => $coupon_code['coupon_discount'],
        				);

        			//debug($data['coupon'],1);

        			$couponDiscount = $data['coupon']['coupon_discount'];

        			//debug($couponDiscount,1);
        			$this->session->set_userdata($data);
        // debug($this->session->userdata(),1);

                   // $updated_cart = array();
                   //  $cart = $this->cart->contents();


                    // debug($cart,1);

                    // foreach ($cart as $key => $cart_record){}


                   // var_dump($updated_cart["total"]);
                    // $updated_cart[$cart_id]["total"] = $discont;
                    // $updated_cart[$cart_id]["subtotal"] = $discont;
                    // $this->cart->update($updated_cart);
                    // $updated_cart = $this->cart->contents();
                    //debug($updated_cart,1);
                    //parent::email_structure($form,$subject);
                    $param['status'] = 1;
                    $param['txt'] = 'Coupon appllied';
                    echo json_encode($param);
                }
                else
                {
                    $param['status'] = 0;
                    $param['txt'] = 'Coupon is incorrect';
                    echo json_encode($param);
                }

        }
    }


	public function save_order()
	{
		if($this->validate("model_order"))
		{
			$signupID = 0;
			$form_name = 'order';
			$contact_us_data = $_POST['order'];

			$contact_us_data['order_status'] = 0;
			$contact_us_data['order_user_id'] = $this->userid;
			$contact_us_data['order_status_message'] = 'Order Placed';
			$contact_us_data['order_discounted_price'] = $this->coupon_discount;

			$inserted_id = $this->model_order->insert_record($contact_us_data);

			if($inserted_id > 0)
			{	
				$cart_data = $this->cart->contents();
				//debug($cart_data);
				/** Add items **/
				
				foreach ($cart_data as $key => $value) {
					
					//$oitem['order_currency_type'] = $this->currency;
					$oitem['order_item_status'] = 1;
					$oitem['order_item_order_id'] = $inserted_id;
					$oitem['order_item_product_id'] = $value['id'];
					$oitem['order_item_price'] = $value['price'];
					$oitem['order_item_subtotal'] = $value['subtotal'];
					$oitem['order_item_qty'] = $value['qty'];
					$oitem['order_item_option'] = serialize($value['options']);
					//$oitem['order_item_type'] = ($value['name'] == 'E-Juice Script' ? 1 : ($value['name'] == 'Membership Package' ? 3 : 2));
					//$this->model_order_item->set_attributes($oitem);
					//$this->model_order_item->save();
					$this->model_order_item->insert_record($oitem);
					
				}
				$url = g('base_url')."checkout/step3?oid=".$inserted_id;
				$param['status'] = 1;
				$param['txt'] = $url;
				echo json_encode($param);
			}
			else
			{
				$param['status'] = 0;
				$param['txt'] = 'Due to some error, email not send';	
				echo json_encode($param);
				// parent::invoice_email($inserted_id,$email);		
			}				
		}
		else
		{
			$param['status'] = 0;
			$param['txt'] = validation_errors();				
			echo json_encode($param);
		}

	}


	function USPSParcelRate($weight = "3",$dest_zip = "90210") {

// This script was written by Mark Sanborn at http://www.marksanborn.net  
// If this script benefits you are your business please consider a donation  
// You can donate at http://www.marksanborn.net/donate.  

// ========== CHANGE THESE VALUES TO MATCH YOUR OWN ===========

$userName = '228TRADE3778'; // Your USPS Username
$orig_zip = '90210'; // Zipcode you are shipping FROM

// =============== DON'T CHANGE BELOW THIS LINE ===============

//$url = "http://Production.ShippingAPIs.com/ShippingAPI.dll";
$url = "http://production.shippingapis.com/ShippingAPI.dll";
//$url = "https://secure.shippingapis.com/ShippingAPI.dll";
$ch = curl_init();

// set the target url
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

// parameters to post
curl_setopt($ch, CURLOPT_POST, 1);

$data = "API=RateV3&XML=<RateV3Request USERID=\"$userName\"><Package ID=\"1ST\"><Service>PRIORITY</Service><ZipOrigination>$orig_zip</ZipOrigination><ZipDestination>$dest_zip</ZipDestination><Pounds>$weight</Pounds><Ounces>0</Ounces><Size>REGULAR</Size><Machinable>TRUE</Machinable></Package></RateV3Request>";

// send the POST values to USPS
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

$result=curl_exec ($ch);
debug($result);exit;
$data = strstr($result, '<?');
// echo '<!-- '. $data. ' -->'; // Uncomment to show XML in comments
$xml_parser = xml_parser_create();
xml_parse_into_struct($xml_parser, $data, $vals, $index);
xml_parser_free($xml_parser);
$params = array();
$level = array();
foreach ($vals as $xml_elem) {
    if ($xml_elem['type'] == 'open') {
        if (array_key_exists('attributes',$xml_elem)) {
            list($level[$xml_elem['level']],$extra) = array_values($xml_elem['attributes']);
        } else {
        $level[$xml_elem['level']] = $xml_elem['tag'];
        }
    }
    if ($xml_elem['type'] == 'complete') {
    $start_level = 1;
    $php_stmt = '$params';
    while($start_level < $xml_elem['level']) {
        $php_stmt .= '[$level['.$start_level.']]';
        $start_level++;
    }
    $php_stmt .= '[$xml_elem[\'tag\']] = $xml_elem[\'value\'];';
    eval($php_stmt);
    }
}
curl_close($ch);

// echo '<pre>'; print_r($params); echo'</pre>'; // Uncomment to see xml tags
 debug($params['RATEV3RESPONSE']['1ST']['1']['RATE']);
}


public function get_usps(){


	$ounces = $_POST['ounces'];
	$pounds = $_POST['pound'];
	$originZip = $_POST['originZip'];
	$destZip = $_POST['destination'];


	// This script was written by Mark Sanborn at http://www.marksanborn.net  
    // If this script benefits you are your business please consider a donation  
    // You can donate at http://www.marksanborn.net/donate.    

    // ========== CHANGE THESE VALUES TO MATCH YOUR OWN ===========
    $username = '910VIPER5770'; 
    // ========== CHANGE THESE VALUES TO MATCH YOUR OWN ===========

    $url = "http://Production.ShippingAPIs.com/ShippingAPI.dll";  
    $ch = curl_init();  

    // set the target url  
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_HEADER, 1);  
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);  

    // parameters to post  
    curl_setopt($ch, CURLOPT_POST, 1);  

    // You would want to actually build this xml using dimensions
    // and other attributes but this is a bare minimum request as
    // an example.
    $data = "API=RateV4&XML=<RateV4Request USERID=\"{$username}\">
       <Revision>2</Revision>
       <Package ID=\"1ST\">
          <Service>ALL</Service>
          <ZipOrigination>{$originZip}</ZipOrigination>
          <ZipDestination>{$destZip}</ZipDestination>
          <Pounds>{$pounds}</Pounds>
          <Ounces>{$ounces}</Ounces>
          <Container />
          <Size>REGULAR</Size>
          <Width>2</Width>
          <Length>1</Length>
          <Height>3</Height>
          <Girth>10</Girth>
          <Machinable>false</Machinable>
       </Package>
    </RateV4Request>";

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  

    $result = curl_exec($ch);  
    //$data = html_entity_decode($result);
    //$movies = new SimpleXMLElement($result);
   /* $test = '<?xml version="1.0" encoding="UTF-8"?>
<RateV4Response><Package ID="1ST"><ZipOrigination>59759</ZipOrigination><ZipDestination>90210</ZipDestination><Pounds>5</Pounds><Ounces>1</Ounces><Size>REGULAR</Size><Machinable>FALSE</Machinable><Zone>5</Zone><Postage CLASSID="3"><MailService>Priority Mail Express 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt;</MailService><Rate>55.70</Rate></Postage><Postage CLASSID="2"><MailService>Priority Mail Express 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Hold For Pickup</MailService><Rate>55.70</Rate></Postage><Postage CLASSID="13"><MailService>Priority Mail Express 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Flat Rate Envelope</MailService><Rate>22.95</Rate></Postage><Postage CLASSID="27"><MailService>Priority Mail Express 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Flat Rate Envelope Hold For Pickup</MailService><Rate>22.95</Rate></Postage><Postage CLASSID="30"><MailService>Priority Mail Express 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Legal Flat Rate Envelope</MailService><Rate>22.95</Rate></Postage><Postage CLASSID="31"><MailService>Priority Mail Express 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Legal Flat Rate Envelope Hold For Pickup</MailService><Rate>22.95</Rate></Postage><Postage CLASSID="62"><MailService>Priority Mail Express 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Padded Flat Rate Envelope</MailService><Rate>22.95</Rate></Postage><Postage CLASSID="63"><MailService>Priority Mail Express 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Padded Flat Rate Envelope Hold For Pickup</MailService><Rate>22.95</Rate></Postage><Postage CLASSID="1"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt;</MailService><Rate>18.70</Rate></Postage><Postage CLASSID="22"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Large Flat Rate Box</MailService><Rate>18.75</Rate></Postage><Postage CLASSID="17"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Medium Flat Rate Box</MailService><Rate>13.45</Rate></Postage><Postage CLASSID="28"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Small Flat Rate Box</MailService><Rate>6.80</Rate></Postage><Postage CLASSID="16"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Flat Rate Envelope</MailService><Rate>6.45</Rate></Postage><Postage CLASSID="44"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Legal Flat Rate Envelope</MailService><Rate>6.45</Rate></Postage><Postage CLASSID="29"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Padded Flat Rate Envelope</MailService><Rate>6.80</Rate></Postage><Postage CLASSID="38"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Gift Card Flat Rate Envelope</MailService><Rate>6.45</Rate></Postage><Postage CLASSID="42"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Small Flat Rate Envelope</MailService><Rate>6.45</Rate></Postage><Postage CLASSID="40"><MailService>Priority Mail 2-Day&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt; Window Flat Rate Envelope</MailService><Rate>6.45</Rate></Postage><Postage CLASSID="4"><MailService>USPS Retail Ground&amp;lt;sup&amp;gt;&amp;#8482;&amp;lt;/sup&amp;gt;</MailService><Rate>15.91</Rate></Postage><Postage CLASSID="6"><MailService>Media Mail Parcel</MailService><Rate>5.22</Rate></Postage><Postage CLASSID="7"><MailService>Library Mail Parcel</MailService><Rate>4.99</Rate></Postage></Package></RateV4Response>';
    */
	
	$pos = strpos($result, '<?xml');
	$substr = substr($result, $pos);

	$movies = new SimpleXMLElement($substr);
	//debug($movies);

	$newArr = array();
	$i = 1;
    foreach ($movies as $value) {
    	foreach ($value->Postage as $key => $last) {
    		$val1 = (array) $last->MailService;
    		$val2 = (array) $last->Rate;
    		//debug($val1);
    		//debug($val2);
    		$newArr[$i]['Service'] = $val1;
    		$newArr[$i]['Rate'] = $val2;
    		//$newArr[$val1] = $val2;    		
    		$i++;
    	}
    }
    

    //if(isset($newArr)){
    
    	$datat['newArr'] = $newArr;
    	
    	return $this->load->view("checkout/shipvalue",$datat);
    //}
    //else{
    //	return array();	
    //}   
    
}

	
}
