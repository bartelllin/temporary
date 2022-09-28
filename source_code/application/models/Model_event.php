<?
class Model_event extends MY_Model
{
    /**
     * TKD event MODEL
     *
     * @package     event Model
     * @version     1.0
     * @since       2017
     */

    protected $_table = 'event';
    protected $_field_prefix = 'event_';
    protected $_pk = 'event_id';
    protected $_status_field = 'event_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "event_id,event_title,CONCAT(event_image_path,event_image) AS event_image,event_status";

        parent::__construct();
    }

    public function get_events()
    {
        // Set params
        $params['order'] = 'event_position ASC';
        return $this->model_event->find_all_active($params);

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
    public function get_fields($specific_field = "")
    {
        // Use when add new image
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

   

            $fields['event_id'] = array(
                'table' => $this->_table,
                'name' => 'event_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            );


              $fields['event_title'] = array(
                     'table'   => $this->_table,
                     'name'   => 'event_title',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  );

              $fields['event_slug']  = array(
                  'table'   => $this->_table,
                  'name'   => 'event_slug',
                  'label'   => 'slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug|strtolower'
              );

            // 'event_position' => array(
            //     'table'   => $this->_table,
            //     'name'   => 'event_position',
            //     'label'   => 'Position',
            //     'type'   => 'dropdown',
            //     'list_data'    => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5") ,
            //     'attributes'   => array(),
            //     'js_rules'   => '',
            //     'rules'   => 'required',
            // ),


            $fields['event_detail'] = array(
                'table' => $this->_table,
                'name' => 'event_detail',
                'label' => 'Detail',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim|htmlentities'
            );
         



            $fields['event_image'] = array(
                'table' => $this->_table,
                'name' => 'event_image',
                'label' => 'Image',
                'name_path' => 'event_image_path',
                'upload_config' => 'site_upload_event',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'attributes'   => array(
                    'image_size_recommended'=>'1344px × 381px',
                    'allow_ext'=>'png|jpeg|jpg|mp4',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            );



            $fields['event_status'] = array(
                'table' => $this->_table,
                'name' => 'event_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'switch',
                'type_filter_dt' => 'dropdown',
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            );



        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;

    }

}

?>