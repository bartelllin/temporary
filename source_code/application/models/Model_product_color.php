<?
class Model_product_color extends MY_Model {
  
    /**
     * product_color MODEL
     *
     * @package     product_color Model
     * @author      Mike
     * @version     2.0
     * @since       2015 
     */

    protected $_table    = 'product_color';
    protected $_field_prefix    = 'product_color_';
    protected $_pk    = 'product_color_id';
    protected $_status_field    = 'product_color_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "product_color_id,product_color_name,product_color_status";
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

            'product_color_id'  => array(
                'table'   => $this->_table,
                'name'   => 'product_color_id',
                'label'   => 'ID',
                'primary'   => 'primary',
                'type'   => 'hidden',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),


            'product_color_category_id'  => array(
                'table'   => $this->_table,
                'name'   => 'product_color_category_id',
                'label'   => 'Select product Category',
                'primary'   => 'primary',
                'type'   => 'dropdown',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),


            // 'product_color_product_id'  => array(
            //     'table'   => $this->_table,
            //     'name'   => 'product_color_product_id',
            //     'label'   => 'Select product',
            //     'primary'   => 'primary',
            //     'type'   => 'dropdown',
            //     'attributes'   => array(),
            //     'js_rules'   => '',
            //     'rules'   => 'trim'
            // ),
 


              'product_color_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_color_name',
                     'label'   => 'Color',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              
              
              'product_color_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_color_status',
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