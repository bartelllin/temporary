<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Faq extends MY_Controller {

	/**
	 * faq page
	 *
	 * @package		faq
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        $this->dt_params['dt_headings'] = "faq_id,faq_question,faq_status";
        $this->dt_params['searchable'] = array("faq_id","faq_status");
        $this->dt_params['action'] = array(
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );
        
        $this->_list_data['faq_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Inactive</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Active</span>"  
                                    );

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];
		
		$_POST = $this->input->post(NULL, true);
	}



	public function index()
	{
		// Popluated LISTDATA in constructor
		parent::index();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
