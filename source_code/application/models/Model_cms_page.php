<?
class Model_cms_page extends MY_Model
{


    protected $_table = 'cms_page';
    protected $_field_prefix = 'cms_page_';
    protected $_pk = 'cms_page_id';
    protected $_status_field = 'cms_page_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        $this->type = (intval($this->uri->segment(4)) == 2 ? 'editor' : 'hidden');
        $this->file = (intval($this->uri->segment(4)) == 2 ? 'fileupload' : 'hidden');
        $slug = $this->uri->segment(4);
       // debug($slug,1);
        // Call the Model constructor
        $this->pagination_params['fields'] = "cms_page_id,cms_page_name,cms_page_title,CONCAT(cms_page_image_path,cms_page_image) AS cms_page_image,cms_page_status";


        parent::__construct();
    }

    public function get_page($id = 0)
    {
        $param['where']['cms_page_status'] = '1';

        if (intval($id) > 0)
            $param['where']['cms_page_id'] = intval($id);

        /*$param['fields'] = "cms_page_id,cms_page_name,cms_page_status,cms_page_content,cms_page_image,cms_page_image_path,cms_page_video_url";
        $param['order'] = 'cms_page_id DESC';*/

        return $this->model_cms_page->find_one_active($param);
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
    public function get_fields($specific_field = "")
    {

        
            $fields['cms_page_id'] = array(
                'table' => $this->_table,
                'name' => 'cms_page_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            );



            $fields['cms_page_name'] = array(
                'table' => $this->_table,
                'name' => 'cms_page_name',
                'label' => 'Page Name',
                'type' => 'dropdown',
                'attributes' => array(),
                'list_data' => array(
                                    "home"=>"Home",
                                    "about_us"=>"About-us",
                                    "contact_us"=>"Contact-us",
                                    "footer"=>"Footer"
                                    // "home"=>"Home",
                                ),
                'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
            );


if ($this->uri->segment(4) != 2 && $this->uri->segment(4) != 10 && $this->uri->segment(4) != 11){
             $fields['cms_page_title'] = array(
                'table' => $this->_table,
                'name' => 'cms_page_title',
                'label' => 'Title',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'htmlentities'
            );

         }


 if ($this->uri->segment(4) != 2 && $this->uri->segment(4) != 10 && $this->uri->segment(4) != 3 && $this->uri->segment(4) != 4 && $this->uri->segment(4) != 5 && $this->uri->segment(4) != 6 && $this->uri->segment(4) != 9 && $this->uri->segment(4) != 11 && $this->uri->segment(4) != 12) {

             $fields['cms_page_title2'] = array(
                'table' => $this->_table,
                'name' => 'cms_page_title2',
                'label' => 'Title2',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'htmlentities'
            );

    }


            // 'cms_page_title' => array(
            //     'table' => $this->_table,
            //     'name' => 'cms_page_title',
            //     'label' => 'Title',
            //     'type' => 'text',
            //     'attributes' => array(),
            //     'js_rules' => 'required',
            //     'rules' => 'required|trim|htmlentities'
            // ),

if ($this->uri->segment(4) != 2 && $this->uri->segment(4) != 6 ){
            $fields['cms_page_content'] = array(
                'table' => $this->_table,
                'name' => 'cms_page_content',
                'label' => 'Content',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'htmlentities'
            );

}
if ($this->uri->segment(4) != 2 && $this->uri->segment(4) != 10 && $this->uri->segment(4) != 3 && $this->uri->segment(4) != 4 && $this->uri->segment(4) != 5 && $this->uri->segment(4) != 6 && $this->uri->segment(4) != 9 && $this->uri->segment(4) != 11 && $this->uri->segment(4) != 12){
            
            $fields['cms_page_other_content'] = array(
                'table' => $this->_table,
                'name' => 'cms_page_other_content',
                'label' => 'Other Content',
                'type' => 'editor',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'htmlentities'
            );
}            

// if ($this->uri->segment(4) == 6 ||
//     $this->uri->segment(4) == 7
//     ) {

if($this->uri->segment(4) != 9 && $this->uri->segment(4) != 11 && $this->uri->segment(4) != 12){
            $fields['cms_page_image'] = array(
                'table' => $this->_table,
                'name' => 'cms_page_image',
                'label' => 'Image',
                'name_path' => 'cms_page_image_path',
                'upload_config' => 'site_upload_cms_image',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'attributes'   => array(
                    'allow_ext'=>'png|jpeg|jpg',
                    'Image Size'=>'350x481',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                'js_rules'=>''
            );
}
//}
            
            $fields['cms_page_status'] = array(
                'table' => $this->_table,
                'name' => 'cms_page_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "cms_page_status",
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