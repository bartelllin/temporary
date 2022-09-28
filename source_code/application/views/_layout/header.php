<header id="header">
      <!-- Begin: Top Row -->
      <div class="top-row">
        
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="online">
                <!-- <p><a href="#">ONLINE STORE</a></p>
                <p><a href="#">PAYMENT</a></p>
                <p><a href="#">SHIPPING</a></p>
                <p class="last-one"><a href="#">RETURn</a></p> -->
              </div>
            </div>
            <div class="col-md-8">
              <!-- <div class="main-top">
              <div class="basKet">
                <a href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span>3</span></a>
              </div>
              <div class="whislist">
                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>wishlist</a>
                <span>|</span>
                <a href="#" class="iterm"> 0 items</a>
              </div>
              <div class="whislist">
                <a href="#"><i class="fa fa-user" aria-hidden="true"></i>login</a>
                <span>|</span>
                <a href="#" class="iterm"> register</a>
              </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>

<div class="logo-site">
<div class="container">
<div class="row">

<div class="col-md-12">
<div class="main-search-sec">
<div class="call-us">
<h1>Call us <span><a style="color: #b7936d;" href="tel:<?=$this->layout_data['config_info']['admin']['company_phone']?>"><?=$this->layout_data['config_info']['admin']['company_phone']?></a></span></h1>
<a href="mailto:<?=$this->layout_data['config_info']['admin']['email_contact_us']?>"><img src="<?=g('base_url')?>assets/front_assets/images/icon-1.png" class="img-responsive" alt=""></a>
</div>
<div class="search">
<div class="input-group">
<form action="<?=g('base_url')?>product" method="get">
<!-- <input type="hidden" name="search_param" value="all" id="search_param"> -->         
<input type="text" class="form-control" name="search" placeholder="Search term...">
<span class="input-group-btn">
<button class="btn btn-default one-search" type="submit">
  <span class="glyphicon glyphicon-search"></span></button>
</span>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
          <div class="main-navigate">
            <div class="container">
          <div class="row">
            <div class="sidenav" id="mySidenav">
            <a class="closebtn" href="javascript:void(0)" onclick="closeNav()">&times;</a>
          </div>
          <div class="mobilecontainer hidden-lg hidden-md">
            <a href="#"><!--  <img src="<?=g('base_url')?>assets/front_assets/images/logo.png" alt="" class="img-responsive pull-left"> --></a> <span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer">&#9776;</span>

          </div>
              <div class="col-md-3">
              <div class="logo">
                <a href="<?=g('base_url')?>"><img src="<?=get_image($logo['logo_image_path'],$logo['logo_image'])?>" class="img-responsive" alt=""></a>
              </div>
            </div>
              <div class="col-md-7">
                <div class="navigation">
                  <ul class="navbar-set hidden-xs">
                    <li <?php if($this->uri->segment(1) == ""){ ?> class="active" <?php } ?>>
                      <a href="<?=g('base_url')?>">HOME</a></li>
                    <li <?php if($this->uri->segment(1) == "about-us"){ ?> class="active" <?php } ?>><a href="<?=g('base_url')?>about-us">ABOUT US</a></li>
                    <li <?php if($this->uri->segment(1) == "product"){ ?> class="active" <?php } ?>><a href="<?=g('base_url')?>product">PRODUCTS </a></li>
                    <li <?php if($this->uri->segment(1) == "contact-us"){ ?> class="active" <?php } ?>><a href="<?=g('base_url')?>contact-us">CONTACT US</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-2">
                <div class="menu-social">
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['twitter']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['facebook']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['instagram']?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a target="_blank" href="<?=$this->layout_data['config_info']['admin']['pinterest']?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            </div>
            </div>
      <!-- END: Top Row -->
    </header>