<?
class Model_product_size extends MY_Model {
  
    /**
     * product_size MODEL
     *
     * @package     product_size Model
     * @author      Mike
     * @version     2.0
     * @since       2015 
     */

    protected $_table    = 'product_size';
    protected $_field_prefix    = 'product_size_';
    protected $_pk    = 'product_size_id';
    protected $_status_field    = 'product_size_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "product_size_id,product_size_title,product_size_category_id, product_size_status";


        $this->pagination_params['joins'][] = array(
                                                    "table"=>"category" , 
                                                    "joint"=>"category.category_id = product_size_category_id"
                                                    );

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

            'product_size_id'  => array(
                'table'   => $this->_table,
                'name'   => 'product_size_id',
                'label'   => 'ID',
                'primary'   => 'primary',
                'type'   => 'hidden',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),


            'product_size_category_id'  => array(
                'table'   => $this->_table,
                'name'   => 'product_size_category_id',
                'label'   => 'Category',
                'primary'   => 'primary',
                'type'   => 'dropdown',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),

            // 'product_size_product_id'  => array(
            //     'table'   => $this->_table,
            //     'name'   => 'product_size_product_id',
            //     'label'   => 'Select product',
            //     'primary'   => 'primary',
            //     'type'   => 'dropdown',
            //     'attributes'   => array(),
            //     'js_rules'   => '',
            //     'rules'   => 'trim'
            // ),

 


              'product_size_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_size_title',
                     'label'   => 'Size',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              
              
              'product_size_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_size_status',
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