<?
class Model_category extends MY_Model {
    /**
     * TKD category MODEL
     *
     * @package     category Model
     * 
     * @version     2.0
     * @since       2015 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'category';
    protected $_field_prefix    = 'category_';
    protected $_pk    = 'category_id';
    protected $_status_field    = 'category_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "category_id,category_name,category_status";
                                                
        // $this->pagination_params['joins'][] = array(
        //                                             "table"=>"category AS parent_cat" , 
        //                                             "joint"=>"category.category_parent_id = parent_cat.category_id", 
        //                                             "type"=>"left" 
        //                                         );

        
        //$this->pagination_params['where']['category.category_parent_id >'] = 0 ;
        parent::__construct();

    }

    public function get_menu_categories($id=0)
    {
        $params['fields'] = 'category_id,category_parent_id,category_name,category_image,category_image_thumb,category_image_path,category_slug';
        $params['order'] = 'category_parent_id';
        $data = $this->find_all_active($params);
        
        $result = array();
        foreach ($data as $key => $value) 
        {
            $result[ $value['category_id'] ] = $value;
        }
        foreach ($result as $key => $value) 
        {
            $children[ $value['category_parent_id'] ][$key] = $value;
        }
        $menu_categories = (recursive_array($result , $children));
        return $menu_categories[1] ;
    }

    // Get Parent hirarechy for Categories
    public function get_ancestory($value , $key = "category_id" , $fields = "t.*" )
    {
        $result = array();
        $value = urldecode($value);
        if($key && $value && $this->get_fields($key) )
        {
            $query = "SELECT @pv:=t.category_parent_id as category_parent_id, $fields
                        from  (SELECT * FROM pg_category ORDER BY category_id DESC) t 
                        JOIN
                        (SELECT @pv:= (SELECT category_id FROM pg_category WHERE $key = '$value' ))tmp
                        WHERE t.category_id=@pv AND t.category_id > 1 AND t.category_status = ".STATUS_ACTIVE;
            $result = $this->db->query($query)->result_array();
            return $result;
        }
    }

    // Get All Children Under A Cateogry
    public function get_children_by_parent_id($parent_id )
    {
        $result = array();
        $params['where']['category_parent_id'] = intval($parent_id);
        return $this->find_all_active($params);
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
    * 
    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields( $specific_field = "" )
    {

        $fields = array(
        
              'category_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

            //   'category_parent_id' => array(
            //          'table'   => $this->_table,
            //          'name'   => 'category_parent_id',
            //          'label'   => 'Parent',
            //          'type'   => 'dropdown',
            //          'type_dt'   => 'text',
            //          'type_filter_dt'   => 'dropdown',
            //          'attributes'   => array(),
            //          'dt_attributes'   => array("width"=>"10%"),
            //          'js_rules'   => 'required',
            //          'rules'   => 'trim'
            // ),
			
			// 'category_position' => array(
   //                 'table'   => $this->_table,
   //                 'name'   => 'category_position',
   //                 'label'   => 'Position',
   //                 'type'   => 'dropdown',
   //                 'list_data'    => array(
			// 	   "1"=>"1",
			// 	   "2"=>"2",
			// 	   "3"=>"3",
			// 	   "4"=>"4",
			// 	   "5"=>"5",
			// 	   "6"=>"6",
			// 	   "7"=>"7",
			// 	   "8"=>"8",
			// 	   "9"=>"9",
			// 	   "10"=>"10",
			// 	   ) ,
   //                 'attributes'   => array(),
   //                 'js_rules'   => 'trim',
   //                 'rules'   => 'trim',
   //              ),
			
			
			 
              /*
              'category_parent_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_parent_id',
                     'label'   => 'Parent',
                     'type'   => 'dropdown',
                     'type_dt'   => 'text',
                     'type_filter_dt'   => 'dropdown',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                ),
    */

              'category_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_name',
                     'label'   => 'Name',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


              'category_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'category_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),

			  	  
				  
				  
				 
              


              /*
    
              'category_desc' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_desc',
                     'label'   => 'Description',
                     'type'   => 'editor',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),
*//*
              'category_image' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_image',
                     'label'   => 'Image',
                     'name_path'   => 'category_image_path',
                     'upload_config'   => 'site_upload_category',
                     'thumb'   => array(
                                        array('name'=>'category_image_thumb','max_width'=>150, 'max_height'=>150),
                                    ),
                     'type'   => 'fileupload',
                     'type_dt'   => 'image',
                     'randomize' => true,
                     'preview'   => 'true',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities'
                  ),
              */
              /*
              'category_meta_title' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_meta_title',
                     'label'   => 'Meta Title',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),
              'category_meta_description' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_meta_description',
                     'label'   => 'Meta Description',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'category_meta_keywords' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_meta_keywords',
                     'label'   => 'Meta Keywords',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"10%"),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),
    */
/*
                'category_createdon' => array(
                'table'   => $this->_table,
                'name'   => 'category_createdon',
                'label'   => 'Create Date',
                'type'   => 'hidden',
                'attributes'   => array(),
                'dt_attributes'   => array("width"=>"5%"),
                ),
*/              
              
              'category_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'category_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "category_status" ,
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