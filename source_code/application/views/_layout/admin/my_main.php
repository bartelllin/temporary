<?global $config;
//Prepare tools array
	$my_tools = array(
						"jquery-ui" => array(
							"js" => array("jquery-ui-1.10.3.custom.min.js"),
						),
						"bootstrap" => array(
							"css" => array("css/bootstrap.min.css"),
							"js" => array("js/bootstrap.min.js"),
						),
						"select2" => array(
							"css" => array("select2.css"),
							"js" => array("select2.min.js"),
						),
						"bootstrap-hover-dropdown" => array(
							"js" => array("bootstrap-hover-dropdown.min.js"),

						),
						"jquery-slimscroll" => array(
							"js" => array("jquery.slimscroll.min.js"),

						),
						"uniform" => array(
							"css" => array("css/uniform.default.css"),
							"js" => array("jquery.uniform.min.js"),
						),
						"bootstrap-switch" => array(
							"css" => array("css/bootstrap-switch.min.css"),
							"js" => array("js/bootstrap-switch.min.js"),
						),
						"bootstrap-colorpicker" => array(
							"css" => array("css/colorpicker.css"),
							"js" => array("js/bootstrap-colorpicker.js"),
						),
						"bootstrap-daterangepicker" => array(
							"css" => array("daterangepicker-bs3.css"),
							"js" => array("moment.min.js","daterangepicker.js"),
						),
						"fullcalendar" => array(
							"css" => array("fullcalendar.min.css"),
							"js" => array("fullcalendar.min.js"),
						),
						"jquery-easypiechart" => array(
							"js" => array("jquery.easypiechart.min.js"),
						),
						"font-awesome" => array(
							"css" => array("css/font-awesome.min.css"),
						),
						"simple-line-icons" => array(
							"css" => array("simple-line-icons.min.css"),
						),
						/*"bootstrap-datepicker" => array(
							"css" => array("css/datepicker.css"),
							"js" => array("js/bootstrap-datepicker.js"),
						),*/
						"bootstrap-datetimepicker" => array(
							"css" => array("css/datetimepicker.css"),
							"js" => array("js/bootstrap-datetimepicker.js"),
						),
						"datatables" => array(
							"css" => array("plugins/bootstrap/dataTables.bootstrap.css"),
							"js" => array("media/js/jquery.dataTables.min.js","plugins/bootstrap/dataTables.bootstrap.js"),
						),
						"bootbox"=> array(
							"js" => array("bootbox.min.js"),
						),
						"ckeditor"=> array(
							"js" => array("ckeditor.js","config.js"),
						),
						"bootstrap-toastr"=> array(
							"css" => array("toastr.min.css"),
							"js" => array("toastr.min.js"),
						),
						"bootstrap-fileupload" => array(
							"js" => array("bootstrap-fileupload.js"), 
							"css" => array("bootstrap-fileupload.css")
						),
						"pace" => array(
							"js" => array("pace.min.js"), 
							"css" => array("themes/pace-theme-barber-shop.css")
						),
						"jstree" => array(
							"js" => array("dist/jstree.min.js"), 
							"css" => array("dist/themes/default/style.min.css")
						),
						"jquery-multi-select" => array(
							"js" => array("js/jquery.multi-select.js"), 
							"css" => array("css/multi-select.css")
						),
						"jquery-file-upload"=> array(
							"js" => array(
									"js/vendor/jquery.ui.widget.js",
									"js/vendor/tmpl.min.js",
									"js/vendor/load-image.min.js",
									"js/vendor/canvas-to-blob.min.js",
									//"blueimp-gallery/jquery.blueimp-gallery.min.js",
									"js/jquery.iframe-transport.js",
									"js/jquery.fileupload.js",
									"js/jquery.fileupload-process.js",
									"js/jquery.fileupload-image.js",
									"js/jquery.fileupload-audio.js",
									"js/jquery.fileupload-video.js",
									"js/jquery.fileupload-validate.js",
									"js/jquery.fileupload-ui.js",
								), 
							"css" => array(
									"blueimp-gallery/blueimp-gallery.min.css",
									"css/jquery.fileupload.css",
									//"css/jquery.fileupload-ui.css",
								),
						),
						"fancybox" => array(
							"js" => array("source/jquery.fancybox.pack.js"),
						),

						"datetimepicker" => array(
							"css" => array("css/jquery.datetimepicker.css"),
							"js" => array("js/jquery.datetimepicker.min.js"),
						),						


					);
?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?=$title?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="Perks Global" name="author"/>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?=Links::img($logo[0]['logo_image_path'],$logo[0]['logo_favicon'])?>">
    <!-- <link rel="shortcut icon" type="image/png" href="<?=Links::img($logo[0]['logo_image_path'],$logo[0]['logo_favicon'])?>"> -->

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?	
foreach ($meta_data AS $meta_name => $meta_val)
	echo '<meta name="' . $meta_name . '" content="' . $meta_val . '">';
?>
<script type="text/javascript">
  //For all JS Global Variable Initializtion
  var $js_config = <?=json_encode($config['js_config'])?>;
</script>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<?
//Additional files
if(is_array($additional_tools) && count($additional_tools))
{
	foreach($additional_tools AS $tool){
		//if(is_array($my_tools[$tool]['css']))
        if(isset($my_tools[$tool]['css']))
		foreach($my_tools[$tool]['css'] AS $script)
		{
			if($script){
				?><link rel="stylesheet" href="<?=$config['plugins_root'] .$tool ."/". $script; ?>"/><?
			}
			
		}
	}
}
?>
<?foreach($css_files AS $file){?>
	<link rel="stylesheet" href="<?=$config['admin_css_root'] . $file; ?>" type="text/css" />
<?}?>
<!-- END THEME STYLES -->

<? // Atleast load JQUERY in the header. ?>
<script src="<?=$config['admin_js_root'];?>jquery.min.js"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content page-style-square page-sidebar-fixed">
<div id="preloader" style="display:none;"><div id="load"><div>G</div><div>N</div><div>I</div><div>D</div><div>A</div><div>O</div><div>L</div></div></div>
<!-- BEGIN HEADER -->
<?=implode("", $modals );?>
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
            <?
            if(array_filled($logo)){?>
                <a href="<?=$config['base_url']?>admin">
                    <img src="<?=Links::img($logo[0]['logo_image_path'],$logo[0]['logo_image'])?>" alt="logo" class="main-tem-logo"/>
                </a>
            <?}
            ?>

			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?=Links::img($logo[0]['logo_image_path'],$logo[0]['logo_favicon'])?>"/>
					<span class="username username-hide-on-mobile">
					<?=$session_data['username']?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="<?=$config['base_url']?>admin/logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!--li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="#" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li-->
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<!--header start-->
	<?//if(!$hide_top_nav){?>
	<header class="header white-bg">
	  <?$this->load->view("_layout/admin/left_menu")?>
	</header>
	<?//} ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN PAGE HEADER-->
			<!-- PAGE TITLE START-->
			<h3 class="page-title">
                <?
                $page_title = (isset($page_title))?$page_title:'';
                $page_title_min = (isset($page_title_min))?$page_title_min:'';
                ?>
			<?=humanize($page_title)?> <small><?=$page_title_min?></small>
			</h3>
			<div class="page-bar">
				<?if((isset($bread_crumbs) && (array_filled($bread_crumbs)))){?>
				<ul class="page-breadcrumb">
					<?
						foreach($bread_crumbs AS $bdcm){?>
					<?foreach($bdcm AS $brdlk => $brdcrm){?>
					<li>
						<i class="fa fa-home"></i>
						<a href="<?=$config['base_url'].'admin/'.$brdlk?>"><?=$brdcrm?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<?}?>
					<?}?>
				<?}?>
				</ul>
				<?if($template_config['show_toolbar']){?>
				<div class="page-toolbar">
					<div id="" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<?=date("l, dS M, Y")?>
						<i class="fa fa-angle-down"></i>
					</div>
				</div>
				<?}?>
			</div>
			<!-- PAGE TITLE ENDs-->
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<?=$content_block?>
			<div class="clearfix">
			</div>
			<div class="clearfix">
			</div>
			<div class="clearfix">
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">

	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=$config['plugins_root']?>respond.min.js"></script>
<script src="<?=$config['plugins_root']?>excanvas.min.js"></script> 
<![endif]-->

<!-- END PAGE LEVEL SCRIPTS -->
    <?
    foreach($js_files AS $file){
	  ?><script src="<?=$config['admin_js_root'] . $file; ?>"></script><?
	}
	if(array_filled($additional_tools))
	{
        $tool_activators = "";
		foreach($additional_tools AS $tool){
			//if(is_array($my_tools[$tool]['js']))
            if(isset($my_tools[$tool]['js']))
			foreach($my_tools[$tool]['js'] AS $script)
			{
				$tool_activators .= "var tool_".str_replace("-","_",$tool)." = true;";
				?>
				<script src="<?=$config['plugins_root'] .$tool."/". $script; ?>"></script>
				<?
			}
		}
	}

	?>
	<script>
		<?=$tool_activators?>
		$(document).ready(function(){
			
			<?if((isset($_GET['msgtype'])) && ($_GET['msgtype']) && ($_GET['msg'])){?>
				AdminToastr.<?=$_GET['msgtype']?>("<?=$_GET['msg']?>", "<?=$_GET['msgtype']?>" , {positionClass:"toast-top-full-width"} );
			<?}?>

		});
	</script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>