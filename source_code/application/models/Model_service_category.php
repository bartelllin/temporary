<?
class Model_service_category extends MY_Model {
  
    /**
     * service_category MODEL
     *
     * @package     service_category Model
     * @author      Mike
     * @version     2.0
     * @since       2015 
     */

    protected $_table    = 'service_category';
    protected $_field_prefix    = 'service_category_';
    protected $_pk    = 'service_category_id';
    protected $_status_field    = 'service_category_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "service_category_id,service_category_title,CONCAT(service_category_image_path,service_category_image) AS service_category_image ,service_category_status";
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

            'service_category_id'  => array(
                'table'   => $this->_table,
                'name'   => 'service_category_id',
                'label'   => 'ID',
                'primary'   => 'primary',
                'type'   => 'hidden',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),
 


              'service_category_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'service_category_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              'service_category_image' => array(
                'table' => $this->_table,
                'name' => 'service_category_image',
                'label' => 'Main Image',
                'name_path' => 'service_category_image_path',
                'upload_config' => 'site_upload_service_category',
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

              
              'service_category_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'service_category_status',
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