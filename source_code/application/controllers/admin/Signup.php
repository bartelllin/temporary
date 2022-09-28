<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Signup extends MY_Controller {


    public $_list_data = array();

	public function __construct() {

		global $config;
		

		parent::__construct();
        $this->dt_params['dt_headings'] = "signup_id, signup_firstname, signup_lastname, signup_email, signup_status, signup_createdon";
        $this->dt_params['searchable'] = array("signup_id","signup_firstname","signup_status");
        $this->dt_params['action'] = array(
                                        "hide_add_button" => false ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );


        $this->_list_data['signup_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>",  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

        $config['js_config']['paginate'] = $this->dt_params['paginate'];

		$_POST = $this->input->post(NULL, true);
	}

	public function add($id='', $data=array())
	{
		parent::add($id, $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
