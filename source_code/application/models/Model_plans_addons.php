<?
class Model_plans_addons extends MY_Model {
  
    /**
     * TKD service_attribute MODEL
     *
     * @package     service_attribute Model
     * @author      Waqas Ahmed (waqasahmed.it@gmail.com)
     * @version     2.0
     * @since       2016 
     */

    protected $_table    = 'plans_addons';
    protected $_field_prefix    = 'pa_';
    protected $_pk    = '';
    protected $_status_field    = '';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "pa_plans_id,pa_addons_id";

        parent::__construct();
    }



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
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'pa_plans_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'pa_plans_id',
                     'label'   => 'Plans id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


              'pa_addons_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'pa_addons_id',
                     'label'   => 'Add-ons id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


              
            );

        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;

    }

}
?>