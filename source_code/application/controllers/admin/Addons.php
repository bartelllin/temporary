<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Addons extends MY_Controller {

	/**
	 * ZIP page
	 *
	 * @package		ZIP
	 * @author      Waqas Ahmed (waqasahmed.it@gmail.com)
	 * @version		2.0 -- Robust , Advanced And More Frustating...
	 * @since		Version 2.0 2016
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        
        $this->dt_params['dt_headings'] = "addons_id,addons_name,addons_price,addons_status";
        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);

        $this->dt_params['action'] = array(
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        
        $this->_list_data['addons_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );


		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];
		
		$_POST = $this->input->post(NULL, true);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
