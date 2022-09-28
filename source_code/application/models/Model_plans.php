<?
class Model_plans extends MY_Model {
  
    /**
     * TKD plans MODEL
     *
     * @package     plans Model
     * @author      Waqas Ahmed (waqasahmed.it@gmail.com)
     * @version     2.0
     * @since       2016 
     */

    protected $_table    = 'plans';
    protected $_field_prefix    = 'plans_';
    protected $_pk    = 'plans_id';
    protected $_status_field    = 'plans_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        
        $this->pagination_params['fields'] = "plans_id,plans_name,plans_status";

        parent::__construct();
    }

    public function get_plans_price($price_type)
    {
        $param = array();

        $param['fields'] = 'plans_id,plans_name,plans_status';
        $param['joins'][] = $this->join_price();

        $param['where']['price_type_id'] = $price_type;

        //debug($param , 1);

        return $this->model_plans->find_all_active($param);
    }


    public function get_packages_where_zipcode($zip)
    {
        $zip = $this->model_zip->find_one(array('where'=>array('zip_code'=>$zip)));
        $region = $zip['zip_type'];

        return $this->get_plans_price($region);
        //debug($data , 1);
    }


    public function join_price($type="" , $append_joint ="AND price_relational_type = 3" , $prepend_joint = "")
    {
        $joint = $prepend_joint . "plans_id = price_relational_id " . $append_joint ; 
        return $this->prep_join("price" , $joint, $type );
    }

    public function is_plan_subscribe_user($profile)
    {
        $param = array();
        $param['where']['up_user_id'] = $profile['user_id'];
        $data = $this->model_user_plan->find_one_active($param);

        if(isset($data) && array_filled($data))
            return true;
        else
            return false;
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
        
              'plans_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'plans_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),


              

              'plans_type' => array(
                     'table'   => $this->_table,
                     'name'   => 'plans_type',
                     'label'   => 'Plans Page',
                     'type'   => 'dropdown',
                     'list_data'    => array(
                      "1"=>"Home",
                      "2"=>"Tobacco") ,
                     'attributes'   => array(),
                     'js_rules'   => 'required|trim',
                     'rules'   => 'required|trim',
                  ),


              'plans_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'plans_name',
                     'label'   => 'Item Name',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


              'plans_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'plans_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),



              // 'plans_sub_title' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'plans_sub_title',
              //        'label'   => 'Sub Title',
              //        'type'   => 'text',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'trim|htmlentities'
              //     ),




              'plans_discount' => array(
                     'table'   => $this->_table,
                     'name'   => 'plans_discount',
                     'label'   => 'Discount',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),


              'plans_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'plans_price',
                     'label'   => 'Price',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'required|trim|htmlentities'
                  ),



              'plans_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'plans_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                     'list_data' => array( ) ,
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