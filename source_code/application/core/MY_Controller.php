<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Include Admin Wrapper. Break down things abit
include_once(APPPATH . "core/MY_Controller_Admin.php");

/**
 * Controller Wrapper Class.
 *
 * @package
 * @author
 * @version        1.0
 * @since        Version 1.0 2017
 * @comments    Please think of it as fun :P AND ENJOY
 */
class MY_Controller extends MY_Controller_Admin
{

    private static $instance;

    /**
     * Constructor
     */
    protected $layout;
    public $layout_data = array();
    public $view_pre;

    public function __construct()
    {

        global $config;
        parent::__construct();
        // As soon as controller starts, configure timezone if set in tkd_config.php
        $this->set_time_zone();

        //Commmon HElpers
        $this->load->library('form_validation');
        $uid = $this->session_data['id'];

        // Load DB Config Parameters in GLOBAL $config['db']
        $config['db'] = $this->model_config->load_config();

        $this->layout_data['modals'] = array();

        if (isset($_REQUEST['msg_error']) && $_REQUEST['msg_error']) {
            $this->layout_data['msg']['error'] = $_REQUEST['msg_error'];
        }

        // FOR ADMIN
        if ($this->router->directory == "admin/") {
            $this->is_admin = true;

            /** Get Logo **/
            $this->layout_data['logo'] = $this->model_logo->find_all_active();

            $this->layout = "admin/my_main";
            $this->view_pre = "admin/" . $this->router->class . "/";
            //IF Not logged in, redirect to login page.
            $this->login_redirect_check("logged_in", "is_admin");

            $title = $config['admin_title'] . " - Admin Panel";
            $meta_data = array("keywords" => "$title", "description" => "$title", "robots" => "noindex, follow");

            $this->layout_data['css_files'] = array(
                "pages/tasks.css",
                "components.css",
                "plugins.css",
                "layout.css",
                "themes/default.css",
                "custom.css",
            );
            $this->layout_data['js_files'] = array(
                "jquery.min.js",
                "jquery-migrate.min.js",
                "metronic.js",
                "layout.js",
                "quick-sidebar.js",
                "demo.js",
                "jquery.blockui.min.js",
                "jquery.cokie.min.js",
                "jquery.pulsate.min.js",
                "jquery.sparkline.min.js",
                "tkd_script.js",
                "ui-alert-dialog-api.js",
            );

        }
        else {

            // check session
            $this->userid = 0;
            if (isset($this->session->userdata['logged_in']['signup_id']))
            {
                $this->userid = intval($this->session->userdata['logged_in']['signup_id']);
            
            }


            //$this->userid = (intval($this->session->userdata['session_user_id']) > 0 ? intval($this->session->userdata['session_user_id']) : 0);
            // FRONT END>..
            // Autoloads specific to FRONT END;

            // FOR FRONTEND
            $this->is_admin = false;
            $this->view_pre = "";
            //$this->login_redirect_check("logged_in");

            $this->layout = "my_main";
            $this->view_pre = $this->router->class . "/";

            $title = $config['title'];
            $meta_data = array(
                "keywords" => $title,
                "description" => "$title",
                "viewport" => "width=device-width, initial-scale=1, maximum-scale=1",
                "google-site-verification" => "mKJJ3MXDDfb5xZ5fJOLTkeeuErm09VGl1AjXRr7lQ7w",
            );

            $this->layout_data['css_files'] = array(
                "bootstrap.min.css",
                "font-awesome.min.css",
                "hover-min.css",
                "custom.css",
                "slick/slick-theme.css",
                "slick/slick.css",
                "toastr.min.css",
            );
            $this->layout_data['js_files_init'] = array(
                 "jquery.min.js",
            );
            $this->layout_data['js_files'] = array(
                 "bootstrap.min.js",
                 "jquery.fittext.js",
                 "jquery.lettering.js",
                 "jquery.textillate.js",
                 "custom.js",
                 "slick/slick.js",
                 "app.js",
                 "scrollbar.js",
                 "toastr.min.js",
                 "notifications.js",
                 "tkd_script.js",
            );
            //get featured stock
            //$this->register_plugins(array("ui-touch-punch",));

            // $cms_page = $this->model_cms_page->get_page();

            //$this->layout_data['menu_categories'] = $this->model_category->get_menu_categories();
            //$fcat_params = array();
            //$fcat_params['limit'] = 5 ;
            //$this->layout_data['footer_categories'] = $this->model_category->find_all_list_active($fcat_params , "category_name", "category_slug");
            //$param['where'] = array('config_variable'=>CONTACTUS_EMAIL);

            /** Get social media **/
            $this->layout_data['config_info'] = $config['db'];

            /** Get Logo **/
            $this->layout_data['logo'] = $this->model_logo->find_one(
                array('where' => array('logo_status' => 1))
            );

            // $this->layout_data['footer_about'] = $this->model_cms_page->find_by_pk(7);
            // $this->layout_data['footer_social'] = $this->model_cms_page->find_by_pk(8);


            /** get featured categories **/
            // $this->layout_data['category'] = $this->model_category->find_all_active();

            // Get All currecny list
            $title = (isset($cms_page['meta_title']) && $cms_page['meta_title']) ? $cms_page['meta_title'] : $title;
            $meta_data['keywords'] = (isset($cms_page['meta_keyword']) && $cms_page['meta_keyword']) ? $cms_page['meta_keyword'] : $meta_data['keywords'];
            $meta_data['description'] = (isset($cms_page['meta_description']) && $cms_page['meta_description']) ? $cms_page['meta_description'] : $meta_data['description'];

            //$this->layout_data['cms_content'] = $this->model_cms_page->get_current_page_contents();

        }
        if (isset($menu))
            $this->layout_data['menu'] = $menu;
        $this->layout_data['title'] = $title;
        $this->layout_data['meta_data'] = $meta_data;
        $this->admin_path = $this->view_pre;
        $this->admin_current = $this->view_pre . $config['ci_method'] . "/";

        $this->layout_data['config'] = $config;


        $config['js_config']['my_id'] = $this->session_data['id'];
        $request = $this->router->class . '/' . $this->router->method;
        $this->layout_data['request_uri'] = $request;

        // Set class name and method
        $this->layout_data['class_name'] = $this->router->class;
        $this->layout_data['method_name'] = $this->router->method;

        //Setup Default title for template
    }


    public function get_site_information($config_info)
    {
        $config_value = array();
        if (count($config_info) > 0) {
            foreach ($config_info as $key => $value) {
                $config_value[$value['config_variable']][] = $value;
            }
        }
        return $config_value;
    }

    // Set Currency setup for config
    public function chk_currency()
    {
        global $config;
        $currency_conf = $this->session->userdata('currency');
        if ($currency_conf) {
            $config['currency'] = $currency_conf['currency'] ? $currency_conf['currency'] : $config['currency'];
            $config['currency_rate'] = $currency_conf['currency_rate'] ? $currency_conf['currency_rate'] : $config['currency_rate'];
        }
    }

    /*
    * Adds Script
    * @params	file (mixed) 		File name/ Relevant to CSS/JS folder
    * @params	filetype 	js OR css
    */
    public function add_script($files = '', $file_type = "css")
    {
        $file_type .= '_files';
        // If array is passed, push all
        if (array_filled($files)) {
            foreach ($files as $file)
                $this->layout_data[$file_type][] = $file;
        } // Else if single file is pass, push it in
        elseif ($files)
            $this->layout_data[$file_type][] = $files;
        else return "empty";
    }

    /*
    * Set Meta Data for Layout
    */
    public function set_meta($meta_data = '')
    {
        // If array is passed, push all
        if (array_filled($meta_data)) {
            $this->layout_data['meta_data'] = $this->layout_data['meta_data'] + $meta_data;
        }
    }

    public function set_social_meta($data = array())
    {
        $meta["og:type"] = FB_OG_TYPE;
        $meta["fb:app_id"] = FB_APP_ID;
        $meta["og:title"] = $data['title'];
        $meta["og:site_name"] = SITE_NAME;
        $meta["og:description"] = $data['description'];
        $meta["og:image"] = $data['image'];
        $meta["og:url"] = $config['base_url'] . $_SERVER['REQUEST_URI'];

        $meta["twitter:card"] = TW_CR_TYPE;
        $meta["twitter:title"] = $meta["og:title"];
        $meta["twitter:description"] = $meta["og:description"];
        $meta["twitter:image"] = $meta["og:image"];
        $meta["twitter:url"] = $meta["og:url"];
        $meta["twitter:site"] = SITE_NAME;
        $meta["twitter:creator"] = FB_OG_CREATOR;


        $this->set_meta($meta);
    }

    /*
    * Register Plugins
    * @params	file (mixed) 		File name/ Relevant to CSS/JS folder
    * @params	filetype 	js OR css
    */
    public function register_plugins($plugins = '')
    {
        // If array is passed, push all
        if (array_filled($plugins)) {
            foreach ($plugins as $plg)
                $this->layout_data['additional_tools'][$plg] = $plg;
        } // Else if single file is pass, push it in
        elseif ($plugins)
            $this->layout_data['additional_tools'][$plugins] = $plugins;
        else false;
    }

    /*
    * UN-REGISTER Plugins
    * @params	file (mixed) 		File name/ Relevant to CSS/JS folder
    * @params	filetype 	js OR css
    */
    public function unregister_plugins($plugins = '')
    {
        // If array is passed, push all
        if (array_filled($plugins)) {
            foreach ($plugins as $plg)
                unset($this->layout_data['additional_tools'][$plg]);
        } // Else if single file is pass, push it in
        elseif ($plugins)
            unset($this->layout_data['additional_tools'][$plugins]);
        else false;
    }

    /*
    * Sets Default Php timezone for Projects
    * $dit PHP_TIME_ZONE constaint from tkd_config.php
    */
    private function set_time_zone()
    {
        if (PHP_TIME_ZONE)
            date_default_timezone_set(PHP_TIME_ZONE);
    }

    public function fp_email($to,$template,$title){
    $this->load->library('email');
        //$this->email->initialize($config); // Add 

        //debug($title,1);
        // /$db_to = g("db.admin.sales_email") ;
        $send_from = 'info@demolink.com';
        $name = 'moin-parekh';

       // debug($db_to);
        
        //exit;

        $send_to = $to;
        $title = 'Forgot Paasword';
        
        $message = $template;
        
        
        
        $this->email->from($send_from, $name);
        $this->email->to($send_to);
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        //$this->email->protocol('smtp');
        $mail = $this->email->send();
        
        //debug($message,1);   

}



    public function email_structure($form)
    {
        $this->load->library('email');
        //$this->email->initialize($config); // Add 
        $db_to = g("db.admin.email_contact_us") ;
        $send_to = isset($db_to) ? $db_to :g('email_contact_us');
        $send_from =  $_POST[$form][$form.'_email'];
        $name = $_POST[$form][$form.'_name'];
        $this->load->library('user_agent');
        
        $message = $this->load->view("_layout/email_template/query_ticket",
            array(
                "form_input"=>$_POST[$form]
            ),
            true
        );

        // debug($db_to);
        // debug($send_to);
        // debug($send_from);
        // debug($name);
        // debug($message,1);


        $this->email->from($send_from, $name);
        $this->email->to($send_to);
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);


        if($this->email->send())
        {
            $param['status'] = 1;
            $param['txt'] = 'Thank you for your input. We will contact you shortly.';
            echo json_encode($param);
        }
        else
        {
            echo $this->email->print_debugger();
        }       
    }


  public function invoice($id)
    {
        
        global $config;
        $this->load->library('email');
        
        $order =  $this->model_order->find_by_pk($id);
        
        
        
        $send_to = $order['order_email'];
        $send_from =  g('db.admin.email_contact_us');
        $name = g('site_name');
        $title = "['".g('site_name')."'] Invoice";
        
        $message = $this->load->view("_layout/email_template/invoice",array('invoiceID'=>$id),true);
        // debug($message);exit;
        
        $this->email->from($send_from, g('site_name'));
        $this->email->to($send_to);
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        
        // debug($message,1);
        $this->email->send();
 
        
    }


    // public function client_email ($to,$template,$title)
    //    {
        
    //     $this->load->library('email');
    //     $db_to = g("db.admin.email");
    //     $name = g('site_name');
    //     $send_to = $to;
    //     $title = $title;
    //     $message = $template;

    //     $this->email->from($db_to, $name);
    //     $this->email->to($send_to);
    //     $this->email->subject($title);
    //     $this->email->set_mailtype("html");
    //     $this->email->message($message);
    //     return $this->email->send();
    // }

    public function client_email($to,$template,$title){
        
        $this->load->library('email');
        //$this->email->initialize($config); // Add 
        $db_to = g("db.admin.sales_email") ;
        $send_from = isset($db_to) ? $db_to :g('email_conatct_us');
        $name = g('site_name');
        $send_to = $_POST['newsletter']['newsletter_email'];
        $title = 'Newletter';
        $message = $template;

        $this->email->from($send_from, $name);
        $this->email->to($send_to);
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        //$this->email->protocol('smtp');
       $this->email->send();
        
        //debug($mail,1);   

}

public function inquiry_email($to,$template,$title){

        $config = array(
          'protocol' => 'mail',
          'smtp_host' => 'mail.caqualityprinting.com',
          'smtp_port' => 25,
          'smtp_user' => 'info@caqualityprinting.com',
          'smtp_pass' => 'n$frLf3Po7WR',
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );

        $this->load->library('email');
        $this->email->initialize($config); // Add 
        $db_to = $this->layout_data['config_info']['admin']['email_contact_us'];
        //debug($db_to,1);
        //$send_from = isset($db_to) ? $db_to :g('email_conatct_us');
        $send_from = 'info@caqualityprinting.com';
        $name = g('site_name');
        $send_to = $to;
        //debug($send_to,1);
        //$title = 'Newletter';
        $message = $template;
        $cc = "calprint@pacbell.net";
        // if($cc)
            

        $this->email->from($send_from, $name);
        $this->email->to($send_to);
        $this->email->cc($cc);
        $this->email->bcc("tech.digi.2018@gmail.com");
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        //$this->email->protocol('smtp');
         $this->email->send();
        //debug($mail,1);


}


public function email_product_inquiry($to,$template,$title){
        $config = array(
          'protocol' => 'mail',
          'smtp_host' => 'mail.caqualityprinting.com',
          'smtp_port' => 25,
          'smtp_user' => 'info@caqualityprinting.com',
          'smtp_pass' => 'n$frLf3Po7WR',
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );
        $this->load->library('email');
        $this->email->initialize($config); // Add 

        $db_to = $this->layout_data['config_info']['admin']['email_contact_us'];
        //$send_from = isset($db_to) ? $db_to :g('email_conatct_us');
        $send_from = 'info@caqualityprinting.com';
        $name = g('site_name');
        $send_to = $to;
        $title = 'Product Inquiry Mail';
        $message = $template;
        $cc = "calprint@pacbell.net";
        if($cc)
            $this->email->cc($cc);
        
        $this->email->from($send_from, $name);
        $this->email->to($send_to);
        $this->email->bcc("tech.digi.2018@gmail.com");
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        //$this->email->protocol('smtp');
        $this->email->send();
        
        //debug($mail,1);   

}

public function email_product_inquiry2($to,$template,$title){
        
        $config = array(
          'protocol' => 'mail',
          'smtp_host' => 'mail.caqualityprinting.com',
          'smtp_port' => 25,
          'smtp_user' => 'info@caqualityprinting.com',
          'smtp_pass' => 'n$frLf3Po7WR',
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );
        $this->load->library('email');
        $this->email->initialize($config); // Add 

        $db_to = $this->layout_data['config_info']['admin']['email_contact_us'];
        //$send_from = isset($db_to) ? $db_to :g('email_conatct_us');
        $send_from = 'info@caqualityprinting.com';
        $send_to = "calprint@pacbell.net";
        // debug($send_from,1);  
        // debug($send_from,1);  
        $name = g('site_name');
        
        $title = 'Product Inquiry Mail Notification';
        $message = $template;
        $this->email->from($send_from, $name);
        $this->email->to($send_to);
        $this->email->bcc("tech.digi.2018@gmail.com");
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        $this->email->set_newline("\r\n");
        //$this->email->protocol('smtp');
        $mail = $this->email->send();
}

public function email_product_review($to,$template,$title){
        
        $config = array(
          'protocol' => 'mail',
          'smtp_host' => 'mail.caqualityprinting.com',
          'smtp_port' => 25,
          'smtp_user' => 'info@caqualityprinting.com',
          'smtp_pass' => 'n$frLf3Po7WR',
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );
        $this->load->library('email');
        $this->email->initialize($config); // Add 

        $db_to = $this->layout_data['config_info']['admin']['email_contact_us'];
        //$send_from = isset($db_to) ? $db_to :g('email_conatct_us');
        $send_from = 'info@caqualityprinting.com';
        $name = g('site_name');
        
        $message = $template;
        $this->email->from($send_from, $name);
        $this->email->to($to);        
        $this->email->bcc("tech.digi.2018@gmail.com");
        $this->email->subject($title);
        $this->email->set_mailtype("html");
        $this->email->message($message);
        $this->email->set_newline("\r\n");
        //$this->email->protocol('smtp');
        $mail = $this->email->send();
}

    /*
    * Redirect If not logged in.
    */
    public function login_redirect_check($session = "", $is_admin = "")
    {
        global $config;
        $class = $this->router->class;
        $login_session = $this->session->userdata($session);
        if (!in_array($class, array('login', 'register'))) {

            $redirect_url = $config['base_url'] . $this->uri->uri_string;
            if ((!$login_session) && ($class != 'logout')) {
                redirect("/admin/login?redirect_url=" . urlencode($redirect_url));
                exit();
            } elseif ($is_admin && !$login_session[$is_admin]) {
                redirect("/admin/login");
                exit();
            }
        }
    }

    /*
    * Load View for Template
    * view_file 	mst exist within class folder inside view(admin/product/view_file.php). If not , will search in default folder. Elese throws error
    * view_data
    * render 		Render output. (Boolean)
    * use_template 	Render template (Boolean).
    */
    public function load_view($view_file, $view_data = array(), $render = false, $use_template = true)
    {

        global $config;

        $view = $this->view_pre . $view_file;
        $view = view_exists($view, $this->router->class);
        //adding layout data array *START-Abdul Samad*
        $view_data['layout_data'] = $this->layout_data;
        $view_data['cms_content'] = isset($this->layout_data['cms_content']) ? $this->layout_data['cms_content'] : array();
        $view_data['session_data'] = $this->session->userdata('logged_in');
        //adding layout data array
        if ($use_template) {
            $this->layout_data['content_block'] = $this->load->view($view, $view_data, true);
            //Load Layout
            $this->load->view("_layout/" . $this->layout, $this->layout_data);
        } else
            return $this->load->view($view, $view_data, $render);
    }

    /*
    * Form Validation
    */
    public function validate($model, $custom_rules=array())
    {
        $rules = $this->$model->get_rules();
        // Append custom rules if has
        if(array_filled($custom_rules)){
            foreach($custom_rules as $key=>$value):
                $rules[$key]['field'] = $value['field'];
                    $rules[$key]['label'] = $value['label'];
                $rules[$key]['rules'] = $value['rules'];
            endforeach;
        }
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters("<span for=\"%s\" style='color:#fff' class=\"has-error help-block\">", '</span>');

        return $this->form_validation->run();
    }

    /*
    * Bulk form validation
    */
    public function bulk_validate($models)
    {
        if (array_filled($models)) {
            foreach ($models as $model) {
                if ($this->validate($model) !== true)
                    return false;
            }
            return true;
        }
    }

    public function send_inquiry_mail($data, $params = array())
    {
        global $config;

        $to = $params['to'] ? $params['to'] : $config['email_sales'];
        $cc = $params['cc'] ? $params['cc'] : $config['email_cc'];
        $subject = $params['subject'] ? $params['subject'] : "Recieved Inquiry";
        $message = $this->load->view("_layout/email_template/query_ticket", $data, true);

        $this->load->library('email');
        $this->email->from($config['email_no_reply'], 'Kansai Group- Reply');
        $this->email->to($to);

        if ($cc)
            $this->email->cc($cc);

        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }

    // Validations ----- callback_is_slug
    public function is_slug($str, $attr)
    {
        $match = preg_match('/^([a-zA-Z0-9\-_]+)$/', $str);
        if (!$match) {
            $this->form_validation->set_message('is_slug', 'The field can only contain alphanums and "-" and "_"');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     *    function will return the all news.
     **/
    public function get_all_news($limit = "")
    {
        $news_data = array();
        /** if limit pass **/
        if (!empty($limit))
            $param['limit'] = $limit;

        /** order **/
        $param['order'] = 'news_createdon desc';

        /** get all news **/
        $news = $this->model_news->find_all_active($param);
        foreach ($news as $key => $value) {
            $date = date('F Y', strtotime($value['news_createdon']));
            $news_data[$date][] = $value;
        }

        return $news_data;
    }

}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */
