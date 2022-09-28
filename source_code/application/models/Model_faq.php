<?
class Model_faq extends MY_Model {
  
    /**
     * TKD FAQ MODEL
     *
     * @package     FAQ Model
     * @author      Abdul Ovais Khan (abdul.ovais@tradekey.com)
     * @version     2.0
     * @since       2015 
     */

    protected $_table    = 'faq';
    protected $_field_prefix    = 'faq_';
    protected $_pk    = 'faq_id';
    protected $_status_field    = 'faq_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "faq_id,faq_question,faq_status";
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


              'faq_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'faq_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


              'faq_question' => array(
                     'table'   => $this->_table,
                     'name'   => 'faq_question',
                     'label'   => 'Question',
                     'type'   => 'textarea',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),


              'faq_answer' => array(
                     'table'   => $this->_table,
                     'name'   => 'faq_answer',
                     'label'   => 'Question',
                     'type'   => 'textarea',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),



                'faq_status' => array(
                    'table' => $this->_table,
                    'name' => 'faq_status',
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

        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;

    }

}
?>