<?
class Model_signup extends MY_Model
{

    protected $_table = 'signup';
    protected $_field_prefix = 'signup_';
    protected $_pk = 'signup_id';
    protected $_status_field = 'signup_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "signup_id,signup_firstname,signup_lastname,signup_email,signup_status,signup_createdon";

        // Call the Model constructor
        parent::__construct();
    }


    public function login($data)
    {
         $CI = & get_instance();
        $params['where']['signup_email'] = $_POST['signup']['signup_email'];
        $params['where']['signup_password'] = md5($_POST['signup']['signup_password']) ;
        $params['where']['signup_status'] = 1;
        //debug($params); exit;
        $signup = $this->find_one($params , true);
        if (!$signup) {
            $CI->form_validation->set_message('signup_check', 'Incorrect signupname or ID');
            return FALSE;
        } else {
            $this->set_signup_session($signup);
            return true;
        }

    }

    public function set_signup_session($signup)
    {
        $CI = & get_instance();
        $sess_array = array(
                        'signup_id' => $signup->signup_id, 
                        'signupname' => $signup->signup_username, 
                        'signup_fname' => $signup->signup_fname, 
                        'signup_lname' => $signup->signup_lname, 
                        'nameprefix' => $signup->signup_nameprefix, 
                        'email' => $signup->signup_email, 
                        'country' => $signup->signup_country,
                        'dob' => $signup->signup_dob,
                        'signup_title'  => $signup->signup_title,
                        'profile_image' => $signup->signup_profile_image_path . $signup->signup_profile_image,
                        'is_admin'  => $signup->signup_is_admin,
                    );

        
        $CI->session->set_userdata('logged_in', $sess_array);// exit;

    }

    public function auto_login($user_id)
    {
        // Set params
        $params['where']['signup_id'] = $user_id;
        // Query
        $user = $this->model_signup->find_all_active($params);
        // Get CodeIgnier Instance

        $this->set_user_session($user[0]);
    }

    // Set Session for login user
    public function set_user_session($signup)
    {
        // Set data
        $array = array(
            'signup_id' => $signup['signup_id'],
            'signup_firstname' => ucfirst($signup['signup_firstname']),
            'signup_lastname' => ucfirst($signup['signup_lastname']),
            'signup_email' => $signup['signup_email'],
            'signup_image' => $signup['signup_profile_image_path'] . $signup['signup_profile_image'],
            'signup_createdon'=>$signup['signup_createdon']
        );
        // Set session
        $this->session->set_userdata('userdata', $array);

    }

    // Update user session
    public function update_user_session($signup)
    {
        // Get user session
        $user_session = $this->session->userdata('userdata');
        // Loop each session
        foreach($signup as $key=>$value):
            $user_session[$key] = $value;
            $this->session->set_userdata('userdata',$user_session);
        endforeach;
    }

    // Get total members
    public function get_total_members()
    {
        // Set params
        $params['where_string'] = " signup_status!=2";
        $result = $this->find_count($params);
        return $result;
    }

    public function get_fields()
    {
        // Use when add new image
        $is_required_image = (($this->uri->segment(4)!=null) && intval($this->uri->segment(4)))?'':'required';

        return array(

            'signup_id' => array(
                'table' => $this->_table,
                'name' => 'signup_id',
                'label' => 'ID',
                'primary' => 'primary',
                'type' => 'hidden',
                'attributes' => array(),
                'js_rules' => '',
                'rules' => 'trim'
            ),

            'signup_fname' => array(
                'table' => $this->_table,
                'name' => 'signup_fname',
                'label' => 'First Name',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|strtolower|trim|htmlentities|min_length[3]'
            ),

            'signup_lname' => array(
                'table' => $this->_table,
                'name' => 'signup_lname',
                'label' => 'Last Name',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'rules' => 'required|strtolower|trim|htmlentities|min_length[3]'
            ),

            'signup_email' => array(
                'table' => $this->_table,
                'name' => 'signup_email',
                'label' => 'Email',
                'type' => (!empty($is_required_image)?'text':'readonly'),
                'attributes'   => array('class'=>'readonlytxt'),
                'js_rules' => 'required',
                'rules' => 'required|valid_email|strtolower|trim|htmlentities|is_unique[' . $this->_table . '.' . $this->_field_prefix . 'email]'
            ),

            // 'signup_phone' => array(
            //     'table' => $this->_table,
            //     'name' => 'signup_phone',
            //     'label' => 'Phone',
            //     'type' => 'text',
            //     'attributes' => array(),
            //     'js_rules' => 'required',
            //     'rules' => 'required|strtolower|trim|htmlentities|integer'
            // ),

            'signup_password' => array(
                'table' => $this->_table,
                'name' => 'signup_password',
                'label' => 'Password',
                'type' => (!empty($is_required_image)?'password':'hidden'),
                'default' => '',
                'attributes' => array(),
                'rules' => 'required|trim|min_length[6]'
            ),

            'signup_profile_image' => array(
                'table' => $this->_table,
                'name' => 'signup_profile_image',
                'label' => 'Image',
                'name_path' => 'signup_image_path',
                'upload_config' => 'site_upload_signup',
                'type' => 'fileupload',
                'type_dt' => 'image',
                'randomize' => true,
                'preview' => 'true',
                'attributes'   => array(
                    'image_size_recommended'=>'1600px × 403px',
                    'allow_ext'=>'png|jpeg|jpg',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
               
            ),



            // 'signup_profile_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'signup_profile_image',
            //     'label' => 'Image',
            //     'name_path' => 'signup_profile_image_path',
            //     'upload_config' => 'site_upload_signup',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     'attributes'   => array(
            //         'image_size_recommended'=>'1024px × 640px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'thumb'   => array(array('name'=>'signup_profile_image_thumb','max_width'=>150, 'max_height'=>150),),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     'js_rules'=>''
            // ),

            'signup_status' => array(
                'table' => $this->_table,
                'name' => 'signup_status',
                'label' => 'Status?',
                'type' => 'switch',
                'default' => '1',
                'attributes' => array(),
                'rules' => 'trim'
            ),


            'signup_createdon' => array(
                'table' => $this->_table,
                'name' => 'signup_createdon',
                'label' => 'Createdon',
                'type' => 'none',
                'attributes' => array(),
                'rules' => 'trim'
            ),


        );
    }
}

?>