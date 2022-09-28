<? global $config;
$menu_links = array(
    array("title" => "Home", "icon" => "home", "action" => "home",
        "additionals" => array(
            array("link" => "", "title" => "Dashboard", "icon" => "bar-chart"),
        ),
    ),

    array("title" => "Layout Design", "icon" => "docs", "action" => array("logo","banner","inner_banner","cms_page","testimonial","faq","config"),
        "additionals" => array(
            array("link" => "logo/add/1", "title" => "Manage Logo", "icon" => "folder"),
            array("link" => "banner", "title" => "Manage Banners", "icon" => " fa fa-picture-o"),
            array("link"=>"inner_banner","title"=>"Manage Inner Banner", "icon"=>" fa fa-picture-o"),
            array("link" => "cms_page", "title" => "Manage Page", "icon" => "docs"),
            // array("link"=>"testimonial","title"=>"Manage Testimonials", "icon"=>"speech"),
            // array("link"=>"faq","title"=>"Manage FAQ's", "icon"=>"bulb"),
            array("link" => "config/update", "title" => "Additional Options", "icon" => "pencil"),
        ),
    ),

    array("title"=>"Product Management", "icon"=>"basket" ,"action" => array("product","category","product_size","product_color","product_sided","product_cover_stock","product_folding","product_material","product_binding","product_drilling","product_hole_position","product_sheets_pad","product_paper_stock") ,
        "additionals"=>array(
            array("link"=>"category","title"=>"Manage Category", "icon"=>" fa fa-tags"),
            array("link"=>"product","title"=>"Manage Product", "icon"=>" fa fa-cart-plus"),
            array("link"=>"product_size","title"=>"Add Product size", "icon"=>" fa fa-cart-plus"),
            array("link"=>"product_color","title"=>"Add Product color", "icon"=>" fa fa-cart-plus"),
            array("link"=>"product_sided","title"=>"Add Product sided", "icon"=>" fa fa-cart-plus"),
            array("link"=>"product_cover_stock","title"=>"Add Product cover stock", "icon"=>" fa fa-cart-plus"),
            array("link"=>"product_paper_stock","title"=>"Add Product paper stock", "icon"=>" fa fa-cart-plus"),
            array("link"=>"product_folding","title"=>"Add Product Folding", "icon"=>" fa fa-cart-plus"),

             array("link"=>"product_material","title"=>"Add Product Material", "icon"=>" fa fa-cart-plus"),

             array("link"=>"product_binding","title"=>"Add Product Binding", "icon"=>" fa fa-cart-plus"),


             array("link"=>"product_drilling","title"=>"Add Product Drilling", "icon"=>" fa fa-cart-plus"),

             array("link"=>"product_hole_position","title"=>"Add Product Hole position", "icon"=>" fa fa-cart-plus"),

             array("link"=>"product_sheets_pad","title"=>"Add Product Sheets Pad", "icon"=>" fa fa-cart-plus"),
        ),
    ),

    // array("title"=>"Brochure Management", "icon"=>"basket" ,"action" => array("brochure") ,
    //     "additionals"=>array(
    //         //array("link"=>"category","title"=>"Manage Category", "icon"=>" fa fa-tags"),
    //         array("link"=>"brochure","title"=>"Manage Brochure", "icon"=>" fa fa-cart-plus"),
    //     ),
    // ),

    // array("title"=>"Category Management", "icon"=>"basket" ,"action" => array("product","category") ,
    //     "additionals"=>array(
    //           array("link"=>"category","title"=>"Manage Category", "icon"=>" fa fa-tags"),
    //        // array("link"=>"product","title"=>"Manage Product", "icon"=>" fa fa-cart-plus"),
    //     ),
    // ),


   


    //  array("title"=>"Service category Management", "icon"=>" fa fa-tags" ,"action" => array("service_category") ,
    //     "additionals"=>array(
    //         array("link"=>"service_category","title"=>"Manage Service category", "icon"=>" fa fa-tags"),
    //         array("link"=>"service","title"=>"Manage Services", "icon"=>" fa fa-tags"),
    //     ),
    // ),


    //  array("title" => "Coupon Management", "icon" => " fa fa-folder-open", "action" => array("coupon"),
    //     "additionals" => array(
    //         array("link" => "coupon", "title" => "Add Coupon", "icon" => " fa fa-picture-o"),
            
    //     ),
    // ),



    // array("title"=>"Order Management", "icon"=>" fa fa-tags" ,"action" => array("order") ,
    //     "additionals"=>array(
    //           array("link"=>"order","title"=>"Manage Orders", "icon"=>" fa fa-tags"),
    //     ),
    // ),

    array("title"=>"Product Inquiry", "icon"=>" fa fa-tags" ,"action" => array("product_inquiry") ,
        "additionals"=>array(
              array("link"=>"product_inquiry","title"=>"Manage Product Inquiries", "icon"=>" fa fa-tags"),
        ),
    ),


    array("title"=>"Reviews", "icon"=>" fa fa-tags" ,"action" => array("review") ,
        "additionals"=>array(
              array("link"=>"review","title"=>"Manage Reviews", "icon"=>" fa fa-tags"),
        ),
    ),

    array("title"=>"Manage Payment", "icon"=>" fa fa-tags" ,"action" => array("payment") ,
        "additionals"=>array(
              array("link"=>"payment","title"=>"Add Payment", "icon"=>" fa fa-tags"),
        ),
    ),

        
    array("title" => "Inquiries Management", "icon" => "envelope", "action" => array("inquiry", "inform_restock", "newsletter"),
        "additionals" => array(
            array("link" => "inquiry", "title" => "View Inquiries", "icon" => " fa fa-comments"),
            array("link" => "newsletter", "title" => "View Newletter", "icon" => " fa fa-comments"),

        ),
    ),

    array("title" => "Administrators", "icon" => "user", "action" => "admins",
        "additionals" => array(
            array("link" => "admins", "title" => "Manage Admin", "icon" => " fa fa-user"),
        ),
    ),




);
?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu page-sidebar-menu-fixed" data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                &nbsp;
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <? foreach ($menu_links as $menu) {

            if (has_value($config['ci_class'], $menu['action']) || has_value($config['ci_index_page'], $menu['action'])) {
                $active = "active";
                $open = "open";
                $selected = '<span class="selected"></span>';
            } else {
                $open = "";
                $active = "";
                $selected = "";
            }
            ?>
            <li class="start <?= $active ?> <?= $open ?>">
                <a href="javascript:;">
                    <i class="icon-<?= $menu['icon'] ?>"></i>
                    <span class="title"><?= $menu['title'] ?></span>
                    <?= $selected ?>
                    <span class="arrow <?= $open ?>"></span>
                </a>
                <ul class="sub-menu">
                    <? foreach ($menu['additionals'] as $add) { ?>
                        <li class="active">
                            <a href="<?= $config['base_url'] . "admin/" . $add['link'] ?>">
                                <i class="icon-<?= $add['icon'] ?>"></i>
                                <?= $add['title'] ?></a>
                        </li>
                    <? } ?>
                </ul>
                <? } ?>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>