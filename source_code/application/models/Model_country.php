<?
class Model_country extends MY_Model {
	/**
     * TKD inquiry MODEL
     *
     * @package     Country Model
     * 
     * @version     2.0
     * @since       2014 
     */
	 
    protected $_table    = 'country';
    protected $_pk    = 'id';

    public $pagination_params = array();
    public $_per_page    = 20;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_country($id)
    {    
        $id = intval($id);
        if(!$id)
            return false;
            
        return $this->find_by_pk($id);
    }
    
    public function get_country_name($id)
    {    
        $country =  $this->get_country($id);
        return $country['country'] ;
    }
    
    public function get_country_list()
    {    
        return $this->find_all_list(array() , "country");
    }
}
?>