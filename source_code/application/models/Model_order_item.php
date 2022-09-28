<?
class Model_order_item extends MY_Model {
	/**
	 * TKD order_item MODEL
	 *
	 * @package	 order_item Model
	 * 
	 * @version	 2.0
	 * @since	   2014 / Amazingly corrupt models Corporation Inc.
	 */

	protected $_table	= 'order_item';
	protected $_field_prefix	= 'oitem_';
	protected $_pk	= 'oitem_id';
	protected $_status_field	= '';
	public $pagination_params = array();
	public $relations = array();
	public $dt_params = array();
	public $_per_page	= 20;
	
	function __construct()
	{
		// Call the Model constructor
		$this->pagination_params['fields'] = "oitem_id,oitem_user_id,oitem_payment_method_id,oitem_gift_wrapped,oitem_total_items,oitem_total,oitem_currency,oitem_ostatus_id";
		parent::__construct();
	}

	

	public function save_order_items( $order_id )
	{
		global $config;
		$CI = & get_instance();

		$order_id = intval( $order_id ) ;
		
		if(!$order_id)
			return false;
		
        $cart_items = $CI->cart->contents();

        foreach ($cart_items as $rowid => $item) {
        	$record = $this->map_record( $order_id , $item ) ;
			$oitem_id = $this->insert_record( $record ) ;
        }

	}

	public function map_record( $order_id , $item=array() , $parent_id = 0 )
	{
		global $config;
    	$record = array() ;
		if( $order_id && array_filled( $item ) )
		{
        	$options = $item[ 'options' ] ;

        	$record[ 'oitem_order_id' ] = intval( $order_id ) ;
        	$record[ 'oitem_product_id' ] = intval( $item[ 'id' ] ) ;
        	$record[ 'oitem_qty' ] = $item[ 'qty' ] ;
        	$record[ 'oitem_price' ] = $item[ 'price' ] ;
        	$record[ 'oitem_total' ] = $item[ 'subtotal' ] ;
		}
		return $record ; 
	}

	public function get_order_items($order_id='' , $with_addons = false , $params = array() )
	{
		$params[ 'where' ] = array(
			'order_item_order_id' =>  $order_id ,
		);
		$params[ 'fields' ] = "*" ;
		$params[ 'joins' ] = array(
			array(
				"table" => $this->_table,
				"joint" => "order_item_product_id = product_id",
			),
			 array( 
                "table"=>"product_image" ,
                "joint"=>"product_id = pi_product_id AND pi_is_featured = 1" , 
                "type"=>"left" ,
            ),
		);

		$product_list = $this->model_product->find_all($params);

		return ($product_list);	
	}

	/*
	* table	     Table Name
	* Name		 FIeld Name
	* label	     Field Label / Textual Representation in form and DT headings
	* type		 Field type : hidden, text, textarea, editor, etc etc. 
	*						   Implementation in form_generator.php
	* type_dt	 Type used by prepare_datatables method in controller to prepare DT value
	*						   If left blank, prepare_datatable Will opt to use 'type'
	* attributes HTML Field Attributes
	* js_rules	 Rules to be aplied in JS (form validation)
	* rules	     Server side Validation. Supports CI Native rules
	*/
	public function get_fields( $specific_field = "" )
	{

		$fields = array(
		
			  'oitem_id' => array(
					 'table'   => $this->_table,
					 'name'   => 'oitem_id',
					 'label'   => 'id #',
					 'type'   => 'hidden',
					 'type_dt'   => 'text',
					 'attributes'   => array(),
					 'dt_attributes'   => array("width"=>"5%"),
					 'js_rules'   => '',
					 'rules'   => 'trim'
				),


			  'oitem_order_id' => array(
					 'table'   => $this->_table,
					 'name'   => 'oitem_order_id',
					 'label'   => 'oitem_order_id',
					 'type'   => 'dropdown',
					 'type_dt'   => 'text',
					 'type_filter_dt'   => 'dropdown',
					 'rules'   => 'intval|required'
				),

			  'oitem_product_id' => array(
					 'table'   => $this->_table,
					 'name'   => 'oitem_product_id',
					 'label'   => 'oitem_product_id',
					 'type'   => 'dropdown',
					 'type_dt'   => 'text',
					 'type_filter_dt'   => 'dropdown',
					 'rules'   => 'intval|required'
				),
			  
			  'oitem_qty' => array(
					 'table'   => $this->_table,
					 'name'   => 'oitem_qty',
					 'label'   => 'oitem_qty',
					 'type'   => 'text',
					 'rules'   => 'intval'
				),
			  
			  'oitem_total' => array(
					 'table'   => $this->_table,
					 'name'   => 'oitem_total',
					 'label'   => 'oitem_total',
					 'type'   => 'text',
					 'rules'   => 'floatval'
				),
			  
			  'oitem_price' => array(
					 'table'   => $this->_table,
					 'name'   => 'oitem_price',
					 'label'   => 'oitem_price',
					 'type'   => 'text',
					 'rules'   => 'floatval'
				),


			  'order_item_discount_price' => array(
					 'table'   => $this->_table,
					 'name'   => 'order_item_discount_price',
					 'label'   => 'oitem_discounted_price',
					 'type'   => 'text',
					 'rules'   => 'floatval'
				),
			  
			);

		if($specific_field)
			return $fields[ $specific_field ];
		else
			return $fields;

	}

}
?>