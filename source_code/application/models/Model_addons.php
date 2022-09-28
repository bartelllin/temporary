<?
class Model_addons extends MY_Model {
  
    /**
     * TKD addons MODEL
     *
     * @package     addons Model
     * @author      Waqas Ahmed (waqasahmed.it@gmail.com)
     * @version     2.0
     * @since       2016 
     */

    protected $_table    = 'addons';
    protected $_field_prefix    = 'addons_';
    protected $_pk    = 'addons_id';
    protected $_status_field    = 'addons_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "addons_id,addons_name,addons_status";

        parent::__construct();
    }


    public function get_data($plans_id)
    {
        $param = array();
        $param['joins'][] = array('table'=>'plans_addons' , 'joint'=>'tc_plans_addons.pa_addons_id = tc_addons.addons_id');
        $param['where']['plans_addons.pa_plans_id'] = $plans_id;

        $data = $this->model_addons->find_all_active($param);

        $var = array();
        if(isset($data) && array_filled($data)) {
            $i=1;
            foreach($data as $value) {
                $var[$value['addons_id']] = $value['addons_name'];
               
                $i++;
            }
        }

        //debug($var , 1);
        return $var;
    }


    /*
    * table       Table Name
    * Name        FIeld Name
    * label       Field Label / Textual Representation in form and DT headings
    * type        Field type : hidden, text, textarea, editor, etc etc. 
    *                           Implementation in form_generator.php
    * type_dt     Type used by prepare_datatables method in controller to prepare DT value
    *                           If left blank, prepare_datatable Will opt to use 'type'
    * addonss  HTML Field addonss
    * js_rules    Rules to be aplied in JS (form validation)
    * rules       Server side Validation. Supports CI Native rules
    */
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'addons_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'addons_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'addonss'   => array(),
                     'dt_addonss'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),




              'addons_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'addons_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'addonss'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'name]'
                  ),

              
              'addons_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'addons_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                     'list_data' => array( ) ,
                     'default'   => '1',
                     'addonss'   => array(),
                     'dt_addonss'   => array("width"=>"7%"),
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