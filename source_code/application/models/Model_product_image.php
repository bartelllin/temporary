<?
class Model_product_image extends MY_Model {
    /**
     * TKD product_image MODEL
     *
     * @package     product_image Model
     * @author      Bilal farooqui (bilal_farooqui786@yahoo.com)
     * @version     2.0
     * @since       2017 / Amazingly corrupt models Corporation Inc.
     */

    protected $_table    = 'product_image';
    protected $_field_prefix    = 'pi_';
    protected $_pk    = 'pi_id';
    protected $_status_field    = 'pi_status';
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page    = 20;
    
    function __construct()
    {
        // Call the Model constructor
        $this->pagination_params['fields'] = "*";
        $this->pagination_params['joins'][] = array(
                                                    "table"=>"product" , 
                                                    "joint"=>"product_id = pi_product_id", 
                                                );
        parent::__construct();

    }

    /********* IMAGE CONFIG*************/
    public function get_images($ret_params)
    {
        global $config; 

        $result = array();
        if($ret_params)
        {   
            $images = $this->find_all($ret_params);
            foreach ($images as $index => $img) {
                $token = $this->img_salt($img) ;
                $result[$index]['name'] = $img['pi_image'];
                $result[$index]['url'] = $config['base_url'].$img['pi_image_path'].$img['pi_image'];
                $result[$index]['thumbnailUrl'] = $config['base_url'].$img['pi_image_path']."thumb/".$img['pi_image_thumb'];
                $result[$index]['deleteUrl'] = $config['base_url']."admin/".$config['ci_class']."/delete_image/".$img['pi_id']."/".$token;
                
                if(!$img['pi_is_featured'])
                    $result[$index]['featuredUrl'] = $config['base_url']."admin/".$config['ci_class']."/featured_image/".$img['pi_product_id']."/".$img['pi_id'];
                
                $result[$index]['deleteType'] = 'DELETE';
                $result[$index]['featuredType'] = 'FEATURED';
            }
        }
        return $result;
    }

    // Mark one Product image As Featured(COVER IMAGE)
    public function autonomous_featured($pi_product_id='')
    {
        $pi_product_id = intval($pi_product_id);

        if($pi_product_id)
        {
            $params = array();
            $params['where']['pi_is_featured'] = STATUS_ACTIVE;
            $params['where']['pi_product_id'] = $pi_product_id ;
            $already_featured = $this->find_one($params);
            if(!$already_featured)
            {
                $query = "UPDATE  ".$this->table_name()." SET pi_is_featured = 1  WHERE pi_product_id = {$pi_product_id} LIMIT 1";
                return $this->db->query($query);
            }
        }
    }

    public function img_salt($img)
    {
        return array_filled($img) ? md5( $img['pi_id'] . $img['pi_image'] . "IAmAWesome" ) : "" ;
    }


    public function delete_this($id)
    {
        $this->db->where('pi_id', $id);
        $this->db->delete('product_image');
        return true;
    }
    /********* IMAGE CONFIG END *************/

    //GET_FIELDS alternative for BULK FIle uploads
    public function bulk_image_fields( $specific_field = "" )
    {

        $fields = array(
            'primary_key' => array( 'name' => 'pi_id' ),
            'foreign_key' => array( 'name' => 'pi_product_id' , 'table' => 'product' ),
            'image' => array( 'name' => 'pi_image' ),
            'image_path' => array( 'name' => 'pi_image_path' ),
            'image_thumb' => array( 'name' => 'pi_image_thumb' ),
        );

        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
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
        
              'pi_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'pi_id',
                     'label'   => 'id #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),

              'pi_product_id' => array(
                     'table'   => $this->_table,
                     'name'   => 'pi_product_id',
                     'label'   => 'Product #',
                     'type'   => 'hidden',
                     'type_dt'   => 'text',
                     'attributes'   => array(),
                     'dt_attributes'   => array("width"=>"5%"),
                     'js_rules'   => '',
                     'rules'   => 'trim'
                ),
              'pi_image' => array(
                     'table'   => $this->_table,
                     'name'   => 'pi_image',
                     'label'   => 'Image',
                     'name_path'   => 'pi_image_path',
                     'upload_config'   => 'site_upload_product',
                     'thumb'   => array(
                                        array('name'=>'pi_image_thumb','max_width'=>272, 'max_height'=>334),
                                    ),
                     'type'   => 'fileupload',
                      'attributes'   => array(
                          'allow_ext'=>'png|jpeg|jpg',
                      ),
                     'type_dt'   => 'image',
                     'randomize' => true,
                     'preview'   => 'true',
                     'dt_attributes'   => array("width"=>"10%"),
                     'rules'   => 'trim|htmlentities'
                  ),
              

              
              
            );
        
        if($specific_field)
            return $fields[ $specific_field ];
        else
            return $fields;
    }


}
?>