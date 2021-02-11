<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<? bloginfo('template_directory') ?>/css\plugins.css">
  <link rel="stylesheet" href="<? bloginfo('template_directory') ?>/css/main.css">
  <link rel="shortcut icon" type="image/x-icon" href="<? bloginfo('template_directory') ?>/image/cropped-fav-32x32.jpg">
  <title><?the_title();?></title>
</head>

<body class=" petmark-theme-2">
  <div class="site-wrapper">
    <header class="header petmark-header-2">
      <div class="header-bg">
          <!-- Site Wrapper Starts -->
        <div class="header-top text-white">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 text-center text-md-left">
                <p class="font-weight-300"><?pll_e('Welcome to Acacia Pet Food') ?></p>
              </div>
              <!-- <div class="col-md-8">
                <div class="header-top-nav white-color right-nav ">
                  <div class="nav-item slide-down-wrapper">
                    <span><?pll_e('Language') ?>:</span>
                    <a class="slide-down--btn" href="#" role="button">
                      English <i class="ion-ios-arrow-down"></i>
                    </a>
                    <ul class="dropdown-list slide-down--item">
                      <li><a href="#">En</a></li>
                      <li><a href="#">En</a></li>
                    </ul>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <div class="header-middle">
          <div class="header-nav-wrapper">
            <div class="container">
              <div class="row align-items-center">
                <!-- Template Logo -->
                <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                  <div class="site-brand  text-center text-lg-left">
                    <a href="<?=site_url();?>" class="brand-image">
                      <img width="265" src="<? bloginfo('template_directory') ?>/image/logo.png" alt="">
                    </a>
                  </div>
                </div>
                <!-- Main Menu -->
                <div class="col-lg-7 d-none d-lg-block">
                  <nav class="main-navigation white-color">
                    <!-- Mainmenu Start -->

                    <ul class="mainmenu">
                      <? $menu_tree = get_menu('top-menu');
                       foreach($menu_tree[0] as $item): ?>
                        <? $is_sub = isset($menu_tree[$item->ID]) ? true : false; ?>
                        <li class="mainmenu__item <? if($is_sub): ?>menu-item-has-children<? endif; ?>">
                          <a href="<?=$item->url?>" class="mainmenu__link"><?=$item->title?></a>
                          <? if($is_sub): ?>
                          <ul class="sub-menu">
                            <? foreach($menu_tree[$item->ID] as $sub_item): ?>
                            <li>
                              <a href="<?=$sub_item->url?>"><?=$sub_item->title?></a>
                            </li>
                            <? endforeach; ?>
                          </ul>
                          <? endif; ?>
                        </li>
                        <? endforeach; ?>
                      </ul>
                    <!-- Mainmenu End -->
                  </nav>
                </div>
      

                <!--  Mobile Menu -->
                <div class="col-12 d-flex d-lg-none order-2 mobile-absolute-menu">
                  <!-- Main Mobile Menu Start -->
                  <div class="mobile-menu"></div>
                  <!-- Main Mobile Menu End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="header-bottom">
        <div class="container">
          <div class="row align-items-center">
            <!-- Category Nav Start -->
            <div class="col-lg-3 col-md-6 col-sm-5 order-md-1 order-sm-1 order-2">
              
              <!-- Category Nav End -->
            </div>
            <!-- Category Widget -->
            <div class="col-lg-5 col-md-6 order-md-2 order-sm-3 order-1">
              <form action="/search" method="get" class="category-widget">
                <input type="text" name="search" placeholder="<?pll_e('Search products')?>">
                <button class="search-submit"><i class="fas fa-search"></i></button>
              </form>
            </div>
            <!-- Call Widget -->
            <div class="col-lg-4 col-md-12 col-sm-7 order-md-3 order-sm-2 order-3">
              <div class="call-widget">
                <p><?pll_e('CALL US NOW:')?> <i class="icon ion-ios-telephone"></i><span class="font-weight-mid"><?pll_e('+91-012
                    345 678')?></span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="fixed-header sticky-init sticky-color">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <!-- Sticky Logo Start -->
                <a class="sticky-logo" href="<?=site_url();?>">
                    <img width="265" src="<? bloginfo('template_directory') ?>/image/logo.png" alt="logo">
                </a>
                <!-- Sticky Logo End -->
            </div>
            <div class="col-lg-9">
                <!-- Sticky Mainmenu Start -->
                <nav class="sticky-navigation white-color">
                    <ul class="mainmenu sticky-menu">
                      <? $menu_tree = get_menu('top-menu');
                     foreach($menu_tree[0] as $item): ?>
                      <? $is_sub = isset($menu_tree[$item->ID]) ? true : false; ?>
                      <li class="mainmenu__item <? if($is_sub): ?>menu-item-has-children<? endif; ?>">
                        <a href="<?=$item->url?>" class="mainmenu__link"><?=$item->title?></a>
                        <? if($is_sub): ?>
                        <ul class="sub-menu">
                          <? foreach($menu_tree[$item->ID] as $sub_item): ?>
                          <li>
                            <a href="<?=$sub_item->url?>"><?=$sub_item->title?></a>
                          </li>
                          <? endforeach; ?>
                        </ul>
                        <? endif; ?>
                      </li>
                      <? endforeach; ?>
                    </ul>
                    <div class="sticky-mobile-menu  d-lg-none">
                        <span class="sticky-menu-btn"></span>
                    </div>
                </nav>
                <!-- Sticky Mainmenu End -->
            </div>
        </div>
    </div>
</div>
    </header>