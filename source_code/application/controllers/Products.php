<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

	/**
	 * Contact US Controller
	 */
	
	public function __construct()
    {
    	// Call the Model constructor latest_product
        parent::__construct();
    }

    // Default Page
    public function index()
    {
        global $config;

        $param2['where']['inner_banner_id'] = 2;
        $param2['where']['inner_banner_status'] = 1;
        $data['inner_banner'] = $this->model_inner_banner->find_one($param2);


        $data['cms_page3'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 3,'cms_page_status'=>1)));

         $data['cms_page10'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 10,'cms_page_status'=>1)));
              
        $data['cms_page13'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 13,'cms_page_status'=>1)));

        //debug($data['cms_page3'],1);

        $data['cms_page4'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 4,'cms_page_status'=>1)));

        $data['cms_page5'] = $this->model_cms_page->find_one(
              array('where'=>array('cms_page_id' => 5,'cms_page_status'=>1)));

      
        if(isset($_GET['category'])){

        $slug = $_GET['category'];
        $param1['where']['category_slug'] = $slug;
        $categories = $this->model_category->find_one($param1);
        //debug($categories,1);
        $catId = $categories['category_id'];
        //debug($catId ,1);
        $param['where']['product_category_id'] = $catId;
        $data['products'] = $this->model_product->find_all_active($param);

        //debug($data['products'],1);
        }else if(isset($_GET['search'])){
        
        $search = $_GET['search'];
        $sql = "SELECT * FROM sb_product WHERE product_status = 1 AND product_name LIKE '%$search%' ";
        $que12 = $this->db->query($sql);
        $data['products']  = $que12->result_array($que12);

        }else{

        $data['products'] = $this->model_product->find_all_active();

        }
        //debug($data['products'],1);
        $cat_param['order'] = "category_name ASC";
        $data['categories'] = $this->model_category->find_all_active($cat_param);
    
        $this->load_view("index", $data);
    }


      public function detail($id = '')
    {
        global $config;

         $param2['where']['inner_banner_id'] = 4;
         $param2['where']['inner_banner_status'] = 1;
         $data['inner_banner'] = $this->model_inner_banner->find_one($param2);

         $slug = $this->uri->segment(2);

         $param3['where']['product_slug'] = $slug;
         $data['product'] = $this->model_product->find_one($param3);

         //debug($data['product'],1);
         $cid = $data['product']['product_category_id'];
         //debug($cid,1);
         $data['cat_id'] = $cid;
         $param4['where']['product_size_category_id'] = $cid;
         $data['productSize'] = $this->model_product_size->find_all_active($param4);

         //debug($data['productSize'],1);

         $param5['where']['product_color_category_id'] = $cid;
         $data['productColor'] = $this->model_product_color->find_all_active($param5);
         // debug($data['productColor'],1);

         $param6['where']['product_sided_category_id'] = $cid;
         $data['productSided'] = $this->model_product_sided->find_all_active($param6);

         $param7['where']['product_cover_stock_category_id'] = $cid;
         $data['productCoverStock'] = $this->model_product_cover_stock->find_all_active($param7);

         $param8['where']['product_paper_stock_category_id'] = $cid;
         $data['productPaperStock'] = $this->model_product_paper_stock->find_all_active($param8);

         // debug($data['productSided'],1);

         // Load View
         $this->load_view("detail", $data);
    }


    public function fetchProducts(){
    
    $id = $_POST['id'];
    $param['where']['product_category_id'] = $id;
    $products = $this->model_product->find_all_active($param);
?>
<div class="second-slider">
<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<?php 
$i = 1;
foreach(array_chunk($products, 9) as $product){ ?> 
<div class="item <?php if($i==1){ ?> active <?php } ?>">
<div class="maiN-shoP">

<?php foreach($product as $key => $prdct){ 
if($key%3==0){ ?> 
<div class="clearfix"></div>
<br>
<?php } ?>

<div class="col-md-4 col-xs-12 col-sm-4">
<a href="<?=g('base_url')?>product-detail">
<div class="main-produc">
<div class="pro-img">
<img style="width: 248px; height: 258px; object-fit: contain" src="<?=get_image($prdct['product_image_path'],$prdct['product_image'])?>" class="img-responsive" alt="">
</div>
<div class="main-set-cat">
<div class="produc-text pull-left">
<a href="<?=g('base_url')?>product-detail/<?=$prdct['product_slug']?>">
<h1><?=$prdct['product_name']?></h1>
</a>
<h2><?=price($prdct['product_price'])?></h2>
</div>
<!-- <div class="star-rat pull-right">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
</div> -->
</div>     
</div>
</a>
</div>
<?php } ?>
<?php $i = 0; ?>
</div>
</div>
<?php } ?>


</div>
<a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
<?php   
    }
}
?>