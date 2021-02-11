<?

get_header();

?>

<!-- Modal -->
<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="pm-product-details">
        <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
          <!-- Blog Details Image Block -->
          <div class="col-md-6">
            <div class="image-block">
              <!-- Zoomable IMage -->
              <img id="zoom_03" src="<? bloginfo('template_directory') ?>/image\product\product-details\product-details-1.jpg" data-zoom-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-1.jpg" alt="">
              
              <!-- Product Gallery with Slick Slider -->
              <div id="product-view-gallery" class="elevate-gallery">
                <!-- Slick Single -->
                <a href="#" class="gallary-item" data-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-1.jpg" data-zoom-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-1.jpg">
                  <img src="<? bloginfo('template_directory') ?>/image\product\product-details\product-details-1.jpg" alt="">
                </a>
                <!-- Slick Single -->
                <a href="#" class="gallary-item" data-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-2.jpg" data-zoom-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-2.jpg">
                  <img src="<? bloginfo('template_directory') ?>/image\product\product-details\product-details-2.jpg" alt="">
                </a>
                <!-- Slick Single -->
                <a href="#" class="gallary-item" data-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-3.jpg" data-zoom-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-3.jpg">
                  <img src="<? bloginfo('template_directory') ?>/image\product\product-details\product-details-3.jpg" alt="">
                </a>
                <!-- Slick Single -->
                <a href="#" class="gallary-item" data-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-4.jpg" data-zoom-image="<? bloginfo('template_directory') ?>/image\product/product-details/product-details-4.jpg">
                  <img src="<? bloginfo('template_directory') ?>/image\product\product-details\product-details-4.jpg" alt="">
                </a>

              </div>
            </div>
          </div>

          <div class="col-md-6 mt-4 mt-lg-0">
            <div class="description-block">
              <div class="header-block">
                <h3>Diam vel neque</h3>
              </div>
              <!-- Price -->
              <p class="price"><span class="old-price">250$</span>300$</p>
              <!-- Rating Block -->
              <div class="rating-block d-flex  mt--10 mb--15">  
                <p class="rating-text"><a href="#comment-form">See all features</a></p>
              </div>
              <!-- Blog Short Description -->
              <div class="product-short-para">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                  tristique auctor. Donec non est at libero vulputate rutrum.
                </p>
              </div>
              <div class="status">
                <i class="fas fa-check-circle"></i>300 IN STOCK
              </div>
              <!-- Amount and Add to cart -->
              <form action="./" class="add-to-cart">
                <div class="count-input-block">
                  <input type="number" class="form-control text-center" value="1">
                </div>
                <div class="btn-block">
                  <a href="#" class="btn btn-rounded btn-outlined--primary">Add to cart</a>
                </div>
              </form>
              <!-- Sharing Block 2 -->
              <div class="share-block-2 mt--30">
                <h4>SHARE THIS PRODUCT</h4>
                <ul class="social-btns social-btns-3">
                  <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
                  <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                  <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=pll_home_url($slug);?>"><?pll_e('Home')?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=get_queried_object()->name;?></li>
    </ol>
  </div>
</nav>

<main class="section-padding shop-page-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-xl-9 order-lg-2 mb--40">
        <div class="shop-toolbar mb--30">
  <div class="row align-items-center">
    <div class="col-5 col-md-3 col-xl-4">
      <!-- Product View Mode -->
      <div class="product-view-mode">
        <a href="#" class="sortting-btn" data-target="list "><i class="fas fa-list"></i></a>
        <a href="#" class="sortting-btn  active" data-target="grid"><i class="fas fa-th"></i></a>
      </div>
    </div>
    <div class="col-12 col-md-9 col-xl-8 mt-3 mt-md-0  pr-md-0">
      <div class="sorting-selection">
        <div class="row align-items-center pl-md-0 pr-md-0 no-gutters">
          <div class="col-sm-6 col-md-7 col-xl-8 d-flex align-items-center justify-content-md-end">

            
          </div>
          <div class="col-md-5 col-xl-4 col-sm-6 text-sm-right mt-sm-0 mt-3">
            
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="shop-product-wrap grid with-pagination row border grid-four-column  mr-0 ml-0 no-gutters">
  <? 
          

          $queried_object = get_queried_object();
          $term_id = $queried_object->term_id;
          $term = get_term($term_id);
          $posts_array = get_posts(array(
          'post_type' => 'products',
          'numberposts' => 999,
          'tax_query' => array(
            array(
              'taxonomy' => 'product-category',
              'field' => 'term_id',
              'terms' => $term_id,
              'include_children' => true
            )
          )
        ));
      foreach ($posts_array as $post): setup_postdata($post); 
  ?>
  <div class="col-lg-4 col-sm-6">
    <div class="pm-product  ">
      <a href="<?the_permalink();?>" class="image">
        <img src="<?=get_the_post_thumbnail_url();?>" alt="">
      </a>
      <div class="content">
        <h3 class="font-weight-500"><a href="<?the_permalink();?>"><?the_title();?></a></h3>
        <div class="card-list-content ">
          <article>
            <h2 class="sr-only d-none"><?the_title();?></h2>
            <?the_excerpt();?>
          </article>
        </div>
      </div>
    </div>
  </div>
  <?
    endforeach;
  ?> 
</div>

    </div>
    <div class="col-lg-4 col-xl-3 order-lg-1">
        <div class="sidebar-widget">
            <div class="single-sidebar">
                <h2 class="sidebar-title"><?pll_e('PRODUCT CATEGORIES')?></h2>
                <ul class="sidebar-filter-list">
                  <?
                    $term123 = get_queried_object();
                    $slug=$term123->slug;
                    $parent_id  =$term123->parent;
                    $child_id=$term123->term_id;
                    if($parent_id == 0){
                      $parent_terms = get_terms( 'product-category', array( 'parent' => get_queried_object()->term_id, 'orderby' => 'slug', 'hide_empty' => false));
                    }
                    else{
                      $parent_terms = get_terms( 'product-category', array( 'parent' => $parent_id, 'orderby' => 'slug', 'hide_empty' => false));
                    }
                    
                     foreach ($parent_terms as $parent_term):
                  ?>
                    <li><a href="<?=get_term_link($parent_term)?>" data-count="(<?=$parent_term->count;?>)"><?=$parent_term->name;?></a></li>
                  <?
                    endforeach;
                  ?>

                </ul>
            </div>
        
            <div class="single-sidebar">
                <h2 class="sidebar-title"><?pll_e('TAGS')?></h2>
                <ul class="sidebar-tag-list">
                    <?
                      $parent_terms = get_terms( 'farm-animals', array( 'orderby' => 'slug', 'hide_empty' => false));
                      foreach ($parent_terms as $parent_term):
                    ?>
                    <li><a href="<?=get_term_link($parent_term)?>"><?=$parent_term->name;?></a></li>
                    <?
                    endforeach;
                  ?>
                </ul>
            </div>
        </div>
    </div>
  </div>
  </div>
</main>
  <?get_footer()?>