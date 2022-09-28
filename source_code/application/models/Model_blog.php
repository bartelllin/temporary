<?
class Model_blog extends MY_Model {
    /**
     * Blog MODEL
     *
     * @package     blog Model
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'blog';
    protected $_field_prefix    = 'blog_';
    protected $_pk    = 'blog_id';
    protected $_status_field    = 'blog_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "blog_id,blog_name,blog_status";
        
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

    // Get blog post for home page (3 post)
    public function get_post($limit=1)
    {
        // Set params
        $params['fields'] = "blog_id,blog_name,blog_slug,blog_description,blog_image,blog_image_thumb,blog_image_path,blog_createdon";

        $params['order'] = 'blog_id DESC';
        $params['limit'] = $limit;
        // Query
        $result = $this->model_blog->find_all_active($params);

        // Return result
        return $result;
    }

    // Get recommended post
   /* public function get_recommended_posts()
    {
        // Set params
        $params['fields'] = "comment_id,comment_post_id,SUM(`comment_rating`) as total_rating,blog_id,blog_name,blog_slug,
        blog_image,blog_image_path,(SELECT COUNT(comment_post_id) FROM 480_comment WHERE comment_post_id = blog_id and comment_status=1) AS total_comments";
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"blog.blog_id = 480_comment.comment_post_id and 480_comment.comment_status=1",
        );
        $params['group'] = 'comment_post_id';
        $params['order'] = 'total_rating DESC';
        $params['limit'] = 3;

        return $this->model_blog->find_all_active($params);
    }*/

    // Check slug exists or not
    public function find_by_slug($slug)
    {
        // Set params
        $param['fields'] = "blog_id,blog_name,blog_slug,blog_description,blog_image,blog_image_thumb,blog_image_path,blog_createdon,
        (SELECT COUNT(comment_post_id) FROM s2s_comment WHERE comment_post_id = blog_id and comment_status=1) AS total_comments";

        $param['where']['blog_slug'] = $slug;
        // Query
        $result = $this->find_one_active($param);

        // Return result;
        return $result;
    }

    // Get total post active
    public function get_total_count()
    {
        // Set params
        $params['order'] = 'blog_id DESC';

        return $this->model_blog->find_count_active($params);
    }

    // Get blog comments
    public function get_comments($slug)
    {
        // Set params
        $params['fields'] = "blog_id,blog_name,comment_post_id,comment_name,comment_description,comment_created_on";
        $params['where']['blog_slug'] = $slug;
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"blog.blog_id = comment_post_id and comment_status=1",
        );
        $params['order'] = 'comment_id DESC';

        return $this->model_blog->find_all_active($params);
    }

    // Get pagination data
    public function get_pagination_data($limit = '', $offset = '')
    {
        // Set params
        $param['fields'] = "blog_id,blog_name,blog_slug,blog_description,blog_image,blog_image_thumb,blog_image_path,blog_createdon,
        (SELECT COUNT(comment_post_id) FROM s2s_comment WHERE comment_post_id = blog_id and comment_status=1) AS total_comments";
        $param['order'] = 'blog_id DESC';
        $param['limit'] = $limit;
        $param['offset'] = $offset;
        // Query data
        $data = $this->find_all_active($param);

        // Return result
        return $data;
    }

    public function get_fields( $specific_field = "" )
    {

        // Use when add new image
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(

              'blog_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'blog_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'blog_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'blog_name',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array("additional"=>'slugify="#'.$this->_table.'-'.$this->_field_prefix.'slug"'),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'blog_slug'  => array(
                  'table'   => $this->_table,
                  'name'   => 'blog_slug',
                  'label'   => 'Title',
                  'type'   => 'hidden',
                  'attributes'   => array(),
                  'js_rules'   => array("is_slug" => array() ),
                  'rules'   => 'required|htmlentities|is_unique['.$this->_table.'.'.$this->_field_prefix.'slug]|callback_is_slug|strtolower'
              ),


              
            'blog_description' => array(
                'table'   => $this->_table,
                'name'   => 'blog_description',
                'label'   => 'Description',
                'type'   => 'editor',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'required|trim'
            ),


            'blog_image' => array(
                'table' => $this->_table,
                'name' => 'blog_image',
                'label' => 'Image',
                'name_path' => 'blog_image_path',
                'upload_config' => 'site_upload_blog',
                'thumb'   => array(array('name'=>'blog_image_thumb','max_width'=>320, 'max_height'=>200),),
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'attributes' => array('allow_ext'=>'png|jpeg|jpg',),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>$is_required_image
            ),
            'blog_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'blog_status',
                     'label'   => 'Status',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt' => 'dropdown',
                     'list_data_key' => "blog_status" ,
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