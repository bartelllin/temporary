<?
class Model_review extends MY_Model {
    /**
     * review MODEL
     *
     * @package     review Model
     * @version     1.0
     * @since       2017
     */

    protected $_table    = 'review';
    protected $_field_prefix    = 'review_';
    protected $_pk    = 'review_id';
    protected $_status_field    = 'review_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "review_id,review_name,review_subject,review_status";
        
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

    // Get review post for home page (3 post)
    // public function get_post($limit=1)
    // {
    //     // Set params
    //     $params['fields'] = "review_id,review_name,review_slug,review_description,review_image,review_image_thumb,review_image_path,review_createdon";

    //     $params['order'] = 'review_id DESC';
    //     $params['limit'] = $limit;
    //     // Query
    //     $result = $this->model_review->find_all_active($params);

    //     // Return result
    //     return $result;
    // }

    // Get recommended post
   /* public function get_recommended_posts()
    {
        // Set params
        $params['fields'] = "comment_id,comment_post_id,SUM(`comment_rating`) as total_rating,review_id,review_name,review_slug,
        review_image,review_image_path,(SELECT COUNT(comment_post_id) FROM 480_comment WHERE comment_post_id = review_id and comment_status=1) AS total_comments";
        // Join
        $params['joins'][] = array(
            "table"=>"comment" ,
            "joint"=>"review.review_id = 480_comment.comment_post_id and 480_comment.comment_status=1",
        );
        $params['group'] = 'comment_post_id';
        $params['order'] = 'total_rating DESC';
        $params['limit'] = 3;

        return $this->model_review->find_all_active($params);
    }*/

    
    // Get pagination data
    // public function get_pagination_data($limit = '', $offset = '')
    // {
    //     // Set params
    //     $param['fields'] = "review_id,review_name,review_slug,review_description,review_image,review_image_thumb,review_image_path,review_createdon,
    //     (SELECT COUNT(comment_post_id) FROM s2s_comment WHERE comment_post_id = review_id and comment_status=1) AS total_comments";
    //     $param['order'] = 'review_id DESC';
    //     $param['limit'] = $limit;
    //     $param['offset'] = $offset;
    //     // Query data
    //     $data = $this->find_all_active($param);

    //     // Return result
    //     return $data;
    // }

    public function get_fields( $specific_field = "" )
    {

        // Use when add new image
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        $fields = array(

              'review_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'review_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'review_product_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'review_product_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'review_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'review_user_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),
                
                'review_product_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'review_product_name',
                     'label'   => 'Product Name',
                     'type'   => 'text',
                     'attributes'   => array(""),
                     'js_rules'   => 'required',
                     'rules'   => 'trim|htmlentities'
                  ),

              'review_name' => array(
                     'table'   => $this->_table,
                     'name'   => 'review_name',
                     'label'   => 'Title',
                     'type'   => 'text',
                     'attributes'   => array(""),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'review_subject' => array(
                'table'   => $this->_table,
                'name'   => 'review_subject',
                'label'   => 'Subject',
                'type'   => 'text',
                'attributes'   => array(),
                'js_rules'   => '',
                'rules'   => 'required|trim'
            ),


              
                'review_description' => array(
                    'table'   => $this->_table,
                    'name'   => 'review_description',
                    'label'   => 'Description',
                    'type'   => 'editor',
                    'attributes'   => array(),
                    'js_rules'   => '',
                    'rules'   => 'required|trim'
                ),

                'review_rating' => array(
                    'table'   => $this->_table,
                    'name'   => 'review_rating',
                    'label'   => 'Ratings',
                    'type'   => 'text',
                    'attributes'   => array(),
                    'js_rules'   => '',
                    'rules'   => 'trim'
                ),


                'review_status' => array(
                         'table'   => $this->_table,
                         'name'   => 'review_status',
                         'label'   => 'Status',
                         'type'   => 'switch',
                         'type_dt'   => 'dropdown',
                         'type_filter_dt' => 'dropdown',
                         'list_data_key' => "review_status" ,
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