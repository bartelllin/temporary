<?
class Model_service extends MY_Model {

    /**
     * model_service
     *
     * @package     model_service Model
     *
     * @version     1.0
     * @since       2017 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'service';
    protected $_field_prefix    = 'service_';
    protected $_pk    = 'service_id';
    protected $_status_field    = 'service_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "service_id,service_name,CONCAT(service_image_path,service_image) AS service_image,service_status";
        /*$this->pagination_params['joins'][] = array(
                                                    "table"=>"category" , 
                                                    "joint"=>"category.category_id = service.service_category_id"
                                                    );*/
        parent::__construct();
    }

    // Get services
    public function get_services($limit="")
    {
        // Set params
        $params['limit'] = $limit;
        $result = $this->model_service->find_all_active($params);
        //return result
        return $result;
    }

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        // Set params
        $param['where']['service_slug'] = $slug;
        // Query
        $result = $this->find_one_active($param);

        // Return result;
        return $result;
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

        // Use when add new image
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(

            'service_id' => array(
                'table'   => $this->_table,
                'name'   => 'service_id',
                'label'   => 'ID',
                'type'   => 'hidden',
                'type_dt'   => 'text',
                'attributes'   => array(),
                'dt_attributes'   => array("width"=>"5%"),
                'js_rules'   => '',
                'rules'   => 'trim'
            ),
            /*'service_category_id' => array(
                   'table'   => $this->_table,
                   'name'   => 'service_category_id',
                   'label'   => 'Category',
                   'type'   => 'dropdown',
                   'type_dt'   => 'text',
                   'type_filter_dt'   => 'dropdown',
                   'js_rules'   => 'required',
                   'rules'   => 'required|trim'
              ),*/





            'service_name' => array(
                'table'   => $this->_table,
                'name'   => 'service_name',
                'label'   => 'Name',
                'type'   => 'text',
                'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                //'attributes'   => array(),
                'default'   => '',
                'rules'   => 'trim|htmlentities|required',
                'js_rules'   => 'required'
            ),

            'service_slug'  => array(
                'table'   => $this->_table,
                'name'   => 'service_slug',
                'label'   => 'Slug',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => array("is_slug" => array() ),
                'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug|strtolower'
            ),




            // 'service_top_detail' => array(
            //     'table'   => $this->_table,
            //     'name'   => 'service_top_detail',
            //     'label'   => 'Top Description',
            //     'type'   => 'textarea',
            //     'attributes'   => array(),
            //     'default'   => '',
            //     'rules'   => 'trim|htmlentities',
            //     'js_rules'   => ''
            // ),

            
            'service_detail' => array(
                'table'   => $this->_table,
                'name'   => 'service_detail',
                'label'   => 'Description',
                'type'   => 'editor',
                //'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                'attributes'   => array(),
                'default'   => '',
                'rules'   => 'trim|htmlentities|required',
                'js_rules'   => 'required'
            ),


            'service_image' => array(
                'table' => $this->_table,
                'name' => 'service_image',
                'label' => 'Image',
                'name_path' => 'service_image_path',
                'upload_config' => 'site_upload_service',
                'type' => 'fileupload',
                'attributes'   => array(
                    'image_size_recommended'=>'380px × 400px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'   => $is_required_image,
            ),


            'service_status' => array(
                'table'   => $this->_table,
                'name'   => 'service_status',
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