<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Comment extends MY_Controller {

	/**
	 * Comment
	 *
	 * @package		Comment
	 */

    public $_list_data = array();

	public function __construct() {

		global $config;
		
		parent::__construct();
        
        $this->dt_params['dt_headings'] = "comment_id,comment_name,,comment_email,comment_status, comment_created_on";
        $this->dt_params['searchable'] = explode(",", $this->dt_params['dt_headings']);

        $this->dt_params['action'] = array(
                                        "hide_add_button" => true ,
                                        "hide" => false ,
                                        "show_delete" => true ,
                                        "show_edit" => false ,
                                        "order_field" => false ,
                                        "show_view" => true ,
                                        "extra" => array() ,
                                      );
        
        $this->_list_data['comments_status'] = array( 
                                        STATUS_INACTIVE => "<span class=\"label label-default\">Not-Approved</span>" ,  
                                        STATUS_ACTIVE =>  "<span class=\"label label-primary\">Approved</span>"  
                                    );
        // Following are common so, defined in MY_Controller_Admin
		// $this->dt_params['paginate']['class'] = $config['js_config']['ci_class'];
		// $this->dt_params['paginate']['uri'] = "paginate";
		// $this->dt_params['paginate']['update_status_uri'] = "update_status";

		// For use IN JS Files
		$config['js_config']['paginate'] = $this->dt_params['paginate'];
		
		// Populating LISTDATA
		$_POST = $this->input->post(NULL, true);
	}

    public function add($id='', $data=array())
    {
        parent::add($id, $data);
    }

    public function ajax_view($id='')
    {
        if($id)
        {
            //$this->model_comment->update_by_pk($id, array("comment_status" => 0));
        }
        parent::ajax_view($id);
    }
	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
