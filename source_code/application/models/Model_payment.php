<?
class Model_payment extends MY_Model {
    /**
     * payment MODEL
     *
     * @package     payment Model
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'payment';
    protected $_field_prefix    = 'payment_';
    protected $_pk    = 'payment_id';
    protected $_status_field    = 'payment_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "payment_id,payment_email,payment_link,payment_paid_status,payment_status";
        
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

        // Use when add new image
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(

              'payment_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'payment_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'payment_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'payment_email',
                     'label'   => 'Email',
                     'type'   => 'text',
                     //'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


            'payment_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'payment_price',
                     'label'   => 'Price',
                     'type'   => 'text',
                     //'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


            'payment_link' => array(
                     'table'   => $this->_table,
                     'name'   => 'payment_link',
                     'label'   => 'Generated Link',
                     'type'   => 'text',
                     //'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),
                  
                  'payment_ert' => array(
                     'table'   => $this->_table,
                     'name'   => 'payment_ert',
                     'label'   => 'Copy Link',
                     'type'   => 'textto',
                     //'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),


              'payment_paid_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'payment_paid_status',
                     'label'   => 'Payment Status',
                     'type'   => 'text',
                     //'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),
              // 'payment_slug'  => array(
              //     'table'   => $this->_table,
              //     'name'   => 'payment_slug',
              //     'label'   => 'Title',
              //     'type'   => 'hidden',
              //     'attributes'   => array(),
              //     'js_rules'   => array("is_slug" => array() ),
              //     'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug|strtolower'
              // ),


              
            // 'payment_description' => array(
            //     'table'   => $this->_table,
            //     'name'   => 'payment_description',
            //     'label'   => 'Description',
            //     'type'   => 'editor',
            //     'attributes'   => array(),
            //     'js_rules'   => '',
            //     'rules'   => 'required|trim'
            // ),


            // 'payment_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'payment_image',
            //     'label' => 'Image',
            //     'name_path' => 'payment_image_path',
            //     'upload_config' => 'site_upload_payment',
            //     'thumb'   => array(array('name'=>'payment_image_thumb','max_width'=>320, 'max_height'=>200),),
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     'attributes' => array('allow_ext'=>'png|jpeg|jpg',),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     'js_rules'=>$is_required_image
            // ),


            'payment_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'payment_status',
                     'label'   => 'Status',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "payment_status" ,
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