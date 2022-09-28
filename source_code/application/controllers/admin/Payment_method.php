<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Payment_method extends MY_Controller {

	/**
	 * payment_method page
	 *
	 * @package		TKD
	 *
     * @version		1.0 --
     * @since		Version 1.0 2017
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		// Call construct
		parent::__construct();
        $this->dt_params['searchable'] = array("brand_id","brand_name","brand_desc_short","brand_meta_title","brand_status");
        $this->dt_params['action'] = array(
        								"hide_add_button" => true,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => true ,
                                        "order_field" => false ,
                                        "show_view" => false ,
                                        "extra" => array() ,
                                      );

	}
	
	public function before_add_render()
	{
		// $this->unregister_plugins("bootstrap-fileupload");
	}

	public function index()
	{
		global $config;

		parent::index();

	}

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
