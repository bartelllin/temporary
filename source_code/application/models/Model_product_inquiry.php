<?php
class Model_product_inquiry extends MY_Model {
    /**
     * TKD product_inquiry MODEL
     *
     * @package     product_inquiry Model
     * 
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'product_inquiry';
    protected $_field_prefix    = 'product_inquiry_';
    protected $_pk    = 'product_inquiry_id';
    protected $_status_field    = 'product_inquiry_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "product_inquiry_id,product_inquiry_name,product_inquiry_email,product_inquiry_status";
        //$this->pagination_params['joins'][] = $this->join_catalog("left");
        
        // $this->pagination_params['joins'][] = array(
        //                                             "table"=>"category" , 
        //                                             "joint"=>"category.category_id = product_inquiry.product_inquiry_category_id"
        //                                             );
        parent::__construct();

    }  

 
   
    /*
    * table             Table Name
    * Name              FIeld Name
    * label             Field Label / Textual Representation in form and DT headings
    * type              Field type : hidden, text, textarea, editor, etc etc. 
    *                                 Implementation in form_generator.php
    * type_dt           Type used by prepare_datatables method in controller to prepare DT value
    *                                 If left blank, prepare_datatable Will opt to use 'type'
    * type_filter_dt    Used by DT FILTER PREPRATION IN datatables.php
    * attributes        HTML Field Attributes
    * js_rules          Rules to be aplied in JS (form validation)
    * rules             Server side Validation. Supports CI Native rules

    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'product_inquiry_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'product_inquiry_productid' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_productid',
                     'label'   => 'Product id',
                     'type'   => 'dropdown',
                     'type_dt'   => 'hidden',
                     'type_filter_dt'   => 'dropdown',
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                ),
              
              'product_inquiry_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'product_inquiry_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_email',
                     'label'   => 'Email',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'product_inquiry_phone' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_phone',
                     'label'   => 'Phone',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'product_inquiry_msg' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_msg',
                     'label'   => 'Message',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'product_inquiry_size' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_size',
                     'label'   => 'Size',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'product_inquiry_color' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_color',
                     'label'   => 'Color',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'product_inquiry_sided' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_sided',
                     'label'   => 'Sided',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'product_inquiry_coverstock' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_coverstock',
                     'label'   => 'Cover Stock',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              

              'product_inquiry_paperstock' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_paperstock',
                     'label'   => 'Paper Stock',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              

              'product_inquiry_folding' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_folding',
                     'label'   => 'Folding',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
              

              'product_inquiry_material' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_material',
                     'label'   => 'Material',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              

              'product_inquiry_binding' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_binding',
                     'label'   => 'Binding',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              

              'product_inquiry_drilling' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_drilling',
                     'label'   => 'Drilling',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'product_inquiry_hole' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_hole',
                     'label'   => 'Hole',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              

              'product_inquiry_sheets_pad' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_sheets_pad',
                     'label'   => 'Sheets/Pad',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              

              'product_inquiry_cutomsize' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_cutomsize',
                     'label'   => 'Custom size',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),


              'product_inquiry_totalpages' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_totalpages',
                     'label'   => 'Total Pages',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'product_inquiry_email_reminder' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_email_reminder',
                     'label'   => 'Email Reminder',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'product_inquiry_instructions' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_instructions',
                     'label'   => 'Instructions',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'product_inquiry_quantity' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_quantity',
                     'label'   => 'Quantity',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),
                  
                  
                  
              'product_inquiry_mailing' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_mailing',
                     'label'   => 'Mailing',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
                  

              'product_inquiry_image' => array(
                'table' => $this->_table,
                'name' => 'product_inquiry_image',
                'label' => 'File',
                'name_path' => 'product_inquiry_image_path',
                'upload_config' => 'site_upload_product_inquiry_image',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'attributes'   => array(
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>''
            ),

              'product_inquiry_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'product_inquiry_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "product_inquiry_status" ,
                     'list_data' => array(),
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