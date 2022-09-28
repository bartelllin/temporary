<?

class Model_coupon extends MY_Model
{
    /**
     * TKD coupon MODEL
     *
     * @package     coupon Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'coupon';
    protected $_field_prefix = 'coupon_';
    protected $_pk = 'coupon_id';
    protected $_status_field = 'coupon_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "coupon_id,coupon_code,coupon_discount,coupon_status";

        parent::__construct();
    }

    // public function get_page_coupon($page='')
    // {
    //     // Set params
    //     $params['fields'] = 'coupon_page,coupon_title,coupon_image_path,coupon_image,coupon_status';
    //     $params['where']['coupon_page'] = $page;
    //     return $this->model_coupon->find_one_active($params);

    // }

    /*
    * table       Table Name
    * Name        FIeld Name
    * label       Field Label / Textual Representation in form and DT headings
    * type        Field type : hidden, text, textarea, editor, etc etc. 
    *                           Implementation in form_generator.php
    * type_dt     Type used by prepare_datatables method in controller to prepare DT value
    *                           If left blank, prepare_datatable Will opt to use 'type'
    * attributes  HTML Field Attributes
    * js_rules    Rules to be aplied in JS (form validation)
    * rules       Server side Validation. Supports CI Native rules
    */
    public function get_fields($specific_field = "")
    {
        // Use when add new image
        // $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(

            'coupon_id' => array(
                'table' => $this->_table,
                'name' => 'coupon_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

            'coupon_code' => array(
                'table' => $this->_table,
                'name' => 'coupon_code',
                'label' => 'Code',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            'coupon_discount' => array(
                'table' => $this->_table,
                'name' => 'coupon_discount',
                'label' => 'Discount',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            ),

            

            /*'coupon_url' => array(
                'table'   => $this->_table,
                'name'   => 'coupon_url',
                'label'   => 'Link',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => 'required',
                'rules'   => 'required|trim|htmlentities'
            ),*/

            'coupon_status' => array(
                'table' => $this->_table,
                'name' => 'coupon_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),

        );

        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;

    }

}

?>