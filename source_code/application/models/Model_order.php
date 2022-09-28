<?
class model_order extends MY_Model {
  
    /**
     * TKD order MODEL
     *
     * @package     order Model
     * @author      Muhammad Uzair Khan (Muhammad.Uzair@tradekey.com)
     * @version     2.0
     * @since       2014 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'order';
    protected $_field_prefix    = 'order_';
    protected $_pk    = 'order_id';
    protected $_status_field    = 'order_status';
    public $pagination_params = array();
    public $relations = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "order_id,order_email,order_firstname,order_lastname,
        order_phone,order_payment_status";

         // $this->pagination_params['joins'][] = array(
         //                    "table"=>"user" , 
         //                    "joint"=>"user_id = order_user_id", 
         //                );

        parent::__construct();
    }


    public function get_order_detail($order_id , $params = array() )
    {
        $params[ 'fields' ] = "order.* " ;
        return $this->find_by_pk($order_id , false, $params) ;
    }
    
    public function get_fundraiser_goal_amount($fundraiser_id)
    {
        $params['joins'][] = array(
                "table"=>"order_item" , 
                "joint"=>"order_item.order_item_order_id = order.order_id"
                );
        
        $params['where']['order_fundraising_id'] = $fundraiser_id;
        return $this->model_order->find_all_active($params);
    }

    public function get_all_orders($params = array())
    {

        $params['joins'][] = array(
                "table"=>"order_item" , 
                "joint"=>"order_item.order_item_order_id = order.order_id"
                );  
        $params['joins'][] = array(
                "table"=>"product" , 
                "joint"=>"product.product_id = order_item.order_item_product_id"
                );                 
        $params['joins'][] = array(
                "table"=>"product_image" , 
                "joint"=>"product_image.pi_product_id = product.product_id"
                ); 

        $params['where']['pi_is_featured'] = 1;
                
        return $this->find_all($params);
    }

    public function get_payment_status($status)
    {
        switch ($status) {
            case 1:
                $message = 'Payment Accepted';
                break;
            case 2:
                $message = 'Payment Declined';
                break;
            case 3:
                $message = 'Transaction Failed';
                break;  
            case 4:
                $message = 'Held for Review';
                break;  
            default:
                $message = 'Order Placed';
                break;
        }
        return $message;
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
        
              'order_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),
              
              'order_user_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_user_id',
                     'label'   => 'Type',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'order_firstname' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_firstname',
                     'label'   => 'First Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'order_lastname' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_lastname',
                     'label'   => 'Last Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

            

              'order_phone' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_phone',
                     'label'   => 'Phone No',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

              'order_email' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_email',
                     'label'   => 'Email',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),


              'order_couponname' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_couponname',
                     'label'   => 'Coupon Name',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => '|trim|htmlentities'
                  ),


              'order_couponpercent' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_couponpercent',
                     'label'   => 'Coupon Percent',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => '|trim|htmlentities'
                  ),


               'order_address1' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_address1',
                     'label'   => 'Address',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

               'order_address2' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_address2',
                     'label'   => 'Address 2',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),
              
               'order_city' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_city',
                     'label'   => 'City',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

               'order_country' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_country',
                     'label'   => 'Country',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_zip' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_zip',
                     'label'   => 'Zip Code',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => 'required',
                     'rules'   => 'required|trim|htmlentities'
                  ),

                'order_discounted_price' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_discounted_price',
                     'label'   => 'Discounted Price',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_status_message' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_status_message',
                     'label'   => 'message status',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => ''
                  ),
                

                'order_type' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_type',
                     'label'   => 'Type',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_fundraising_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_fundraising_id',
                     'label'   => 'Type',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                'order_ministore_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_ministore_id',
                     'label'   => 'Type',
                     'type'   => 'hidden',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                
                 'order_transaction_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_transaction_id',
                     'label'   => 'Transaction Id',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                 'order_transaction_message' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_transaction_message',
                     'label'   => 'Transaction Message',
                     'type'   => 'text',
                     'attributes'   => array(),
                     'js_rules'   => '',
                     'rules'   => 'trim|htmlentities'
                  ),

                 'order_payment_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_payment_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'dropdown',
                     'type_filter_dt'   => 'dropdown',
                     'list_data' => array( 
                                        1 => "<span class=\"label label-success\">Payment Accepted</span>" ,  
                                        2 => "<span class=\"label label-warning\">Payment Declined</span>"  ,
                                        3 => "<span class=\"label label-danger\">Transaction Failed</span>" ,  
                                        4 => "<span class=\"label label-info\">Held for Review</span>" ,  
                                        0 => "<span class=\"label label-default\">Order Placed</span>" ,                                          
                                    ) ,
                     'default'   => '1',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"7%"),
                     'rules'   => 'trim'
                  ),
              
            
                         'order_status' => array(
                     'table'   => $this->_table,
                     'name'   => 'order_status',
                     'label'   => 'Status?',
                     'type'   => 'switch',
                     'type_dt'   => 'switch',
                     'type_filter_dt'   => 'dropdown',
                     'list_data' => array( 
                                      
                                    ) ,
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