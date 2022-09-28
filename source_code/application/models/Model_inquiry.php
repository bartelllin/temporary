<?
class Model_inquiry extends MY_Model {
  
    /**
     * Inquiry MODEL
     *
     * @package     inquiry Model
     * 
     * @version     1.0
     * @since       2017 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'inquiry';
    protected $_field_prefix    = 'inquiry_';
    protected $_pk    = 'inquiry_id';
    protected $_status_field    = 'inquiry_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "
        inquiry_id,
        inquiry_name,
        inquiry_email,
        inquiry_status";
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
        
              'inquiry_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'inquiry_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'inquiry_name' => array(
                 'table'   => $this->_table,
                 'name'   => 'inquiry_name',
                 'label'   => 'Name',
                 'type'   => 'text',
                 'attributes'   => array(),
                 'js_rules'   => '',
                 'rules'   => 'required|strtolower|trim|htmlentities'
              ),


              'inquiry_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'inquiry_email',
                     'label'   => 'Email',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|valid_email|strtolower|trim|htmlentities'
                  ),


              'inquiry_subject' => array(
                 'table'   => $this->_table,
                 'name'   => 'inquiry_subject',
                 'label'   => 'Subject',
                 'type'   => 'text',
                 'attributes'   => array(),
                 'js_rules'   => '',
                 'rules'   => 'strtolower|trim|htmlentities'
              ),




                'inquiry_website' => array(
                 'table'   => $this->_table,
                 'name'   => 'inquiry_website',
                 'label'   => 'Website',
                 'type'   => 'text',
                 'attributes'   => array(),
                 'js_rules'   => '',
                 'rules'   => 'strtolower|trim|htmlentities'
              ),


              // 'inquiry_phone' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'inquiry_phone',
              //        'label'   => 'Phone',
              //        'type'   => 'text',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'required|trim|integer'
              //     ),




              'inquiry_detail' => array(
                 'table'   => $this->_table,
                 'name'   => 'inquiry_detail',
                 'label'   => 'Message',
                 'type'   => 'text',
                 'attributes'   => array(),
                 'js_rules'   => '',
                 'rules'   => 'required|strtolower|trim|htmlentities'
              ),



/*              'inquiry_image' => array(
                     'table'   => $this->_table,
                     'name'   => 'inquiry_image',
                     'label'   => 'File',
                     'name_path'   => 'inquiry_image_path',
                     'upload_config'   => 'site_upload_inquiry',
                     'type'   => 'fileupload',
                     'type_dt'   => 'image',
                     // 'thumb'   => array(array('name'=>'logo_image_thumb','max_width'=>150, 'max_height'=>150),),
                      'attributes'   => array(
                          'image_size_recommended'=>'237px × 45px',
                          'allow_ext'=>'png|jpeg|jpg|pdf|docx',
                      ),
                     'randomize' => true,
                     'preview'   => 'true',
                     //'attributes'   => array('label'=>'width = 260, Height = 43'),
                     'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities'
                  ),
*/

            'inquiry_status' => array(
                'table' => $this->_table,
                'name' => 'inquiry_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "inquiry_status",
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            ),

            'inquiry_createdon' => array(
                'table'   => $this->_table,
                'name'   => 'inquiry_createdon',
                'label'   => 'inquiry Createdon',
                'type'   => 'hidden',
                'rules'   => ''
            ),
              
            );

        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;

    }

}
?>