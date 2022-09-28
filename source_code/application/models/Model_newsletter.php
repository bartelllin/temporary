<?
class Model_newsletter extends MY_Model {
  
    /**
     * newsletter MODEL
     *
     * @package     newsletter Model
     * @author      Mike
     * @version     2.0
     * @since       2015 
     */

    protected $_table    = 'newsletter';
    protected $_field_prefix    = 'newsletter_';
    protected $_pk    = 'newsletter_id';
    protected $_status_field    = 'newsletter_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "newsletter_id,newsletter_email,newsletter_status";
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

            'newsletter_id'  => array(
                'table'   => $this->_table,
                'name'   => 'newsletter_id',
                'label'   => 'ID',
                'primary'   => 'primary',
                'type'   => 'hidden',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),
 

              'newsletter_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'newsletter_email',
                     'label'   => 'Email',
                     'type'   => 'text',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'required|valid_email|trim|is_unique['.$this->_table.'.'.$this->_field_prefix.'email]'
                ),



              'newsletter_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'newsletter_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                     'list_data' => array( 
                                   
                                    ) ,
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
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