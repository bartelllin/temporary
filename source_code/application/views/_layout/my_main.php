<? global $config;
// Define plugins for page
$my_tools = array(
    "datatables" => array(
        "css" => array("media/css/jquery.dataTables.css"),
        "js" => array("media/js/jquery.dataTables.min.js","plugins/bootstrap/dataTables.bootstrap.js"),
    )
);

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>

    <!-- fb meta -->
    <?
    if($this->router->fetch_class() . '/' . $this->router->fetch_method()=='blog/detail'){ ?>
        <meta property="og:title" content="<?=$detail['blog_name']?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo current_url();?>" />
        <meta property="og:image" content="<?=Links::img($detail['blog_image_path'],$detail['blog_image'])?>" />
        <!-- <meta property="og:image" content="" /> -->
        <!--<meta property="og:description" content="<?php /*echo html_entity_decode($stories[0]['story_yourstory']);*/?>"/>-->
        <meta property="og:description" content="<?=$title?>"/>
    <? }
    elseif($this->router->fetch_class() . '/' . $this->router->fetch_method()=='job/show'){ ?>
        <meta property="og:title" content="<?=$detail['job_name']?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo current_url();?>" />
        <meta property="og:image" content="<?=Links::img($detail['company_image_path'],$detail['company_image'])?>" />
        <!-- <meta property="og:image" content="" /> -->
        <!--<meta property="og:description" content="<?php /*echo html_entity_decode($stories[0]['story_yourstory']);*/?>"/>-->
        <meta property="og:description" content="<?=$title?>"/>
    <? } ?>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?=Links::img($logo['logo_image_path'],$logo['logo_favicon'])?>">
    <!-- <link rel="shortcut icon" type="image/png" href="<?=Links::img($layout_data['logo']['logo_image_path'],$layout_data['logo']['logo_favicon'])?>"> -->

    <?
    foreach ($meta_data AS $meta_name => $meta_val) {
        ?>
        <meta name="<?= $meta_name ?>" content="<?= $meta_val ?>">
    <? } ?>

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="<?php echo g('css_root')?>jquery.fancybox.min.css" rel="stylesheet">

    <!-- Loading css file -->
    <? foreach ($css_files AS $css) { ?>
        <link href="<?= g('css_root') . $css ?>" rel="stylesheet" type="text/css"/>
    <?
    }
    // Load js file
    if (is_array($js_files_init)) {
        foreach ($js_files_init as $js) { ?>
            <script src="<?= g('js_root') . $js ?>"></script>
        <?
        }
    }
    // Load additional files css
    if (is_array($additional_tools) && count($additional_tools)) {
        foreach ($additional_tools AS $tool) {
            if (is_array($my_tools[$tool]['css']))
                foreach ($my_tools[$tool]['css'] AS $script) {
                    if ($script) {
                        ?>
                        <link rel="stylesheet" href="<?= g('plugins_root') . $tool . "/" . $script; ?>"/><?
                    }

                }
        }
    }
    // Load additional files js
    if (array_filled($additional_tools)) {
        foreach ($additional_tools AS $tool) {
            if (is_array($my_tools[$tool]['js']))
                foreach ($my_tools[$tool]['js'] AS $script) {
                    $tool_activators .= "toolset.tool_" . str_replace("-", "_", $tool) . " = true;";
                    ?>
                    <script src="<?= g('plugins_root') . $tool . "/" . $script; ?>"></script>
                <?
                }
        }
    }
    ?>
    <script type="text/javascript"> var base_url = "<?php  echo base_url(); ?>";</script>

    
<style>
figure h3{ margin-top:0; }
</style>


</head>
<body class="effects" id="effects">

<!-- PRE LOADER start-->
<div class="loader">
<div class="spinner">
<div class="double-bounce1"></div>
<div class="double-bounce2"></div>
</div>
</div>
<!-- PRE LOADER end-->



<!-- Wrapper Start -->
<div class="wrapper">

    <?php
    if($this->uri->segment(2) != "error"){
    $this->load->view("_layout/header");
    }
    ?>

    <!-- Page content Start -->
    <?=$content_block ?>
    <!-- Page content End -->

    <?php
        if($this->uri->segment(2) != "error"){
    $this->load->view("_layout/footer"); 
        }
    ?>
    

</div>
<!-- Wrapper End -->

<?
// Load js files
foreach ($js_files as $js) { ?>
    <script src="<?= g('js_root') . $js ?>"></script>
<?
}
?>


<script src="<?php echo g('js_root'); ?>jquery.fancybox.min.js"></script>
    <script src="<?php echo g('js_root'); ?>jquery.elevatezoom.js"></script>
    <script src="<?php echo g('js_root'); ?>jquery.lightroom.js"></script>

<script>
//$(document).ready(function () {$('.fb').fancybox();});
</script>

<script>
        $('.carousel').carousel({
            interval: 5000000
        })
    </script>

    <script>
jQuery(document).ready(function(){
    jQuery('.scrollbar-inner').scrollbar();
});
</script>
 
 <script>
     //initiate the plugin and pass the id of the div containing gallery images
    //   $("#zoom_10").elevateZoom({});
      $("#zoom_05").elevateZoom({constrainType:"height", constrainSize:274, containLensZoom: true, gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: "active" , easing : true}); 

//pass the images to Fancybox
$("#zoom_05").bind("click", function(e) {  
  var ez =   $('#zoom_05').data('elevateZoom');	
// 	$.fancybox(ez.getGalleryList());
  return false;
});
    </script>
    
 <script>
 
//     $("#zoom_05").elevateZoom({
//         // cursor: "crosshair"
// });
</script>


</body>
</html>