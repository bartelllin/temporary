<?php
class Model_brochure extends MY_Model {
    /**
     * TKD brochure MODEL
     *
     * @package     brochure Model
     * 
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'brochure';
    protected $_field_prefix    = 'brochure_';
    protected $_pk    = 'brochure_id';
    protected $_status_field    = 'brochure_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "brochure_id,brochure_name,brochure_price,CONCAT(brochure_image_path,brochure_image) AS brochure_image,brochure_status";
        //$this->pagination_params['joins'][] = $this->join_catalog("left");
        
        // $this->pagination_params['joins'][] = array(
        //                                             "table"=>"category" , 
        //                                             "joint"=>"category.category_id = brochure.brochure_category_id"
        //                                             );
        parent::__construct();

    }  

    public function join_catalog($type="right" , $append_joint ="" , $prepend_joint = "")
    {
        $joint = $prepend_joint . "brochure_catalog_id = catalog_id" . $append_joint ; 
        return $this->prep_join("catalog" , $joint, $type );
    }
    
    public function join_brochure_image($type="right" , $append_joint ="" , $prepend_joint = "")
    {
        $joint = $prepend_joint . "brochure_id = pi_brochure_id " . $append_joint ; 
        return $this->prep_join("brochure_image" , $joint, $type );
    }

    public function apply_choices_joins( $choices = array() , &$params )
    {
        // Catalog Joins
        $cat_where = "" ;
        $pis_type = "left" ; 
        
        if( array_filled($choices['season']) )
            $params['joins']['catalog']['joint'] .= " AND catalog_season_id IN (" . implode( "," , $choices['season'] ) . ")" ;
        
        if( array_filled($choices['size']) )
        {
            $where_pis = " AND pis_size_id IN (" . implode( "," , $choices['size'] ) . ")" ;
            $pis_type = "right" ; 
        }    
        
        if( array_filled($choices['color']) )
        {
            $pis_type = "right" ; 
            $where_pis .= " AND pis_color_id IN (" . implode( "," , $choices['color'] ) . ")" ;
        }    
        
        $params['joins']['brochure_item_set'] = array(
            "table" => "brochure_item_set" ,
            "joint" => "brochure_id = pis_brochure_id " . $where_pis ,
            "type" => $pis_type,
        );

        if( $choices['price']['min'] || $choices['price']['min'] )
            $params['where_string'] = "brochure_price BETWEEN ". intval($choices['price']['min']) . 
                                            " AND " . intval($choices['price']['max']) ;

    }

    public function apply_mandatory_joins( $mandatory , &$params )
    {
        // Catalog Joins
        $cat_where = "" ;
        
        // Short Circuit Joins In case filter is applied
        if(array_filled($mandatory['catalog']))
            $cat_where = " AND catalog_id IN (".implode(",",$mandatory['catalog']).")";

        $params['joins'] ['catalog'] = $this->join_catalog("" , $cat_where);

        // brand Joins
        $brand_where = "" ;
        if(array_filled($mandatory['brand']))
            $brand_where = " AND brand_id IN (".implode(",",$mandatory['brand']).")";

        $params['joins']['brand'] = array(
            "table" => "brand" ,
            "joint" => "brand_id = catalog_brand_id ". $brand_where ,
        );

        // category Joins
        $category_where = "" ;
        if($mandatory['category'])
            $category_where = " AND bc_category_id IN (".implode(",",$mandatory['category']) . ")";

        $params['joins']['brand_category'] = array(
            "table" => "brand_category" ,
            "joint" => "brand_id = bc_brand_id " . $category_where ,
        );

        $params['joins']['category'] = array(
            "table" => "category" ,
            "joint" => "category_id = bc_category_id " ,
        );

    }

    public function get_brochure_by_id($id = 0 , $params = array())
    {
        // Return brochure by ID
        $id = intval($id);
        if(!$id)
            return false;

        $params['joins'][] = array( 
                                    "table"=>"brochure_image" ,
                                    "joint"=>"brochure_id = pi_brochure_id AND pi_is_featured = 1" , 
                                    "type"=>"left" ,
                                );
        $params['where']['brochure_id'] = $id;
        return $this->find_one($params);

    }

    public function get_available_brochure_by_id($id = 0 , $params = array())
    {
        // Return Available brochure...
        $params['where']['brochure_qty - brochure_qty_sold >'] = 0;
        return $this->get_brochure_by_id($id, $params);
    }

    // Get brochure BY Catalog ID
    public function get_catalog( $catalog_id , $params = array() )
    {
        if(!$catalog_id)
            return false;
        $params['where']['brochure_catalog_id'] = intval($catalog_id);
        return $this->get_brochures($params);
    }

    public function get_price_range_by_catalog( $catalog_list , $params=array())
    {
        if(!array_filled($catalog_list))
            return false;

        $params['fields'] = "MIN(brochure_price) AS min , MAX(brochure_price) AS max " ;
        $params['where_in']['brochure_catalog_id'] = $catalog_list ;
        $params['where']['brochure_status'] = STATUS_ACTIVE ;
        return $this->find_one($params);
    }

    public function get_details_by_slug($slug = '')
    {
        // Return brochure by slug
        $slug = trim($slug);
        if(!$slug)
            return false;
        $params['where']['brochure_slug'] = $slug;

        return $this->get_details($params);

    }

    public function get_available_brochures($params=array() , $list = false)
    {
        $params['where']['brochure_qty - brochure_qty_sold >'] = 0;
        $data = $this->get_brochures($params , $list);
        return $data; 
    }

    public function get_brochures($params=array() , $list = false)
    {
        $params['joins'][] = $this->join_brochure_image("left" , " AND pi_is_featured = 1");
        //$params['group'] = "brochure_id";  // To avoid brochure duplications - Just in case
        if($list)
            $data = $this->find_all_list_active($params , "brochure_name");
        else
            $data = $this->find_all_active($params);
        return $data; 
    }

    public function get_featured_brochures($params=array())
    {
        $params['where']['brochure_is_featured'] = 1 ;
        $params['limit'] = "12";
        $data = $this->get_brochures($params);
        return $data;
    }

    public function get_latest($params=array())
    {
        $params['limit'] = $params['limit'] ? $params['limit'] : "12";
        $params['order'] = "brochure_id DESC";
        $data = $this->get_brochures($params);
        return $data;
    }

    public function get_most_sold($params=array())
    {
        $params['limit'] = isset( $params['limit'] ) && $params['limit'] ? $params['limit'] : "12";
        $params['order'] = "brochure_qty_sold DESC";
        $data = $this->get_brochures($params);
        return $data;
    }

    public function get_details($params = array())
    {
        // Return brochure by slug
        $params['joins'][] = array(
                                    "table" => "catalog",
                                    "joint" => "catalog.catalog_id = brochure.brochure_catalog_id",
                                );
        $params['joins'][] = array(
                                    "table" => "brand",
                                    "joint" => "brand_id = catalog_brand_id",
                                    "type" => "left",
                                );
        $params['joins'][] = array(
                                    "table" => "brand_size_chart",
                                    "joint" => "bsc_id = brochure_size_chart_id",
                                    "type" => "left",
                                );
        $brochure = $this->find_one($params);

        if($brochure)
        {
            $prdimg_params = array();
            $prdimg_params['where']['pi_brochure_id'] = $brochure['brochure_id'] ;
            $brochure['pi_images'] = $this->model_brochure_image->find_all($prdimg_params);

            // Get Addons
            $brochure['addons'] = $this->model_brochure_addon->get_brochure_addons($brochure['brochure_id']);

            // Get Attributes
            $brochure['attributes'] = $this->model_brochure_attribute->get_brochure_attributes($brochure['brochure_id']);

            // Get Category
            $brochure['category'] = $this->model_brochure_category->get_brochure_categorys($brochure['brochure_id']);
            
            // Get Attributes
            if( $brochure[ 'brochure_stitched' ] )
                $pis_params['where']['pis_qty - pis_qty_sold >'] = 0 ;
            $brochure['item_sets'] = $this->model_brochure_item_set->get_brochure_set( $brochure['brochure_id'] , $pis_params );
        }
        return $brochure;
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
        
              'brochure_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'brochure_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'brochure_category_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'brochure_category_id',
                     'label'   => 'Category',
                     'type'   => 'dropdown',
                     'type_dt'   => 'text',
                     'type_filter_dt'   => 'dropdown',
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim'
                ),
              
              'brochure_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'brochure_name',
                     'label'   => 'brochure Name',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


              'brochure_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'brochure_slug',
                  'label'   => 'Slug',
                  'type'   => 'text',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug'
              ),


              'brochure_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'brochure_price',
                     'label'   => 'Price',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


              // 'brochure_discount' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'brochure_discount',
              //        'label'   => 'Discount',
              //        'type'   => 'text',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'trim|htmlentities'
              //     ),


              'brochure_sku' => array(
                     'table'   => $this->_table,
                     'name'   => 'brochure_sku',
                     'label'   => 'SKU',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),



              // 'brochure_detail' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'brochure_detail',
              //        'label'   => 'Detail',
              //        'type'   => 'editor',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'trim|htmlentities'
              //     ),

              'brochure_type' => array(
                     'table'   => $this->_table,
                     'name'   => 'brochure_type',
                     'label'   => 'Select Type',
                     'type'   => 'dropdown',
                     'attributes'   => array(),
                     'list_data' => array('featured' => 'Featured','offer'=>'Special offer'),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

              // 'brochure_short_desc' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'brochure_short_desc',
              //        'label'   => 'Short Description',
              //        'type'   => 'editor',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'trim|htmlentities'
              //     ),

              // 'brochure_long_desc' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'brochure_long_desc',
              //        'label'   => 'Long Description',
              //        'type'   => 'editor',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'trim|htmlentities'
              //     ),

              // 'brochure_additional_info' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'brochure_additional_info',
              //        'label'   => 'Additional Info',
              //        'type'   => 'editor',
              //        'attributes'   => array(),
              //        'js_rules'   => '',
              //        'rules'   => 'trim|htmlentities'
              //     ),



            'brochure_image' => array(
                'table' => $this->_table,
                'name' => 'brochure_image',
                'label' => 'Main Image',
                'name_path' => 'brochure_image_path',
                'upload_config' => 'site_upload_brochure_image',
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


            // 'brochure_cover_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'brochure_cover_image',
            //     'label' => 'Cover Image',
            //     'name_path' => 'brochure_image_path',
            //     'upload_config' => 'site_upload_brochure_image',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     'attributes'   => array(
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     'js_rules'=>''
            // ),



              // 'brochure_issale' => array(
              //        'table'   => $this->_table,
              //        'name'   => 'brochure_issale',
              //        'label'   => 'Is Sale?',
              //        'type'   => 'switch',
              //        'type_dt'   => 'dropdown',
              //        'type_filter_dt' => 'dropdown',
              //        'list_data_key' => "brochure_issale" ,
              //        'list_data' => array(),
              //        'default'   => '1',
              //        'attributes'   => array(),
              //        'dt_attributes'   => array("width"=>"7%"),
              //        'rules'   => 'trim'
              //     ),


              'brochure_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'brochure_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "brochure_status" ,
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