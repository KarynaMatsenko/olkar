<?

get_header();

?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=pll_home_url($slug);?>"><?pll_e('Home')?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?the_title();?></li>
    </ol>
  </div>
</nav>
<!-- Product Details Block -->
<main class="product-details-section">
    <div class="container">
        <div class="pm-product-details">
            <div class="row">
                <!-- Blog Details Image Block -->
                <div class="col-md-6">
                    <div class="image-block left-thumbnail">

                        <div class="main-image">
                            <!-- Zoomable IMage -->
                            <img id="zoom_03" src="<?=get_the_post_thumbnail_url();?>" data-zoom-image="<?=get_the_post_thumbnail_url();?>" alt="">
                        </div>

                        <!-- Product Gallery with Slick Slider -->
                        <div id="product-view-gallery" class="elevate-gallery">
                            <?                   
                                $img_list = get_field('images_products');
                                $i = 1;
                                foreach($img_list as $key => $arr): 
                            ?> 
                            <!-- Slick Single -->
                            <a href="#" class="gallary-item" data-image="<?=$arr['images_product'];?>" data-zoom-image="<?=$arr['images_product'];?>">
                                <img src="<?=$arr['images_product'];?>" alt="">
                            </a>
                            <?endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="description-block">
                        <div class="header-block">
                            <h3><?the_title();?></h3>
                            <div class="navigation">
                                <a href="#"><i class="ion-ios-arrow-back"></i></a>
                                <a href="#"><i class="ion-ios-arrow-forward"></i></a>
                            </div>
                        </div>
                        <!-- Blog Short Description -->
                        <div class="product-short-para">
                            <ul>
                                  <li><strong>Форма выпуска:</strong><?=get_field('form_vipuska');?></li>
                                  <li><strong>Применение:</strong><?=get_field('primeneniya');?></li>
                            </ul>
                        </div>
                        <!-- Products Tag & Category Meta -->
                        <div class="product-meta mt--30">
                            <p><?pll_e('Ctagories')?>: 
                                <?php 
                                    $terms = wp_get_post_terms(get_the_ID(), 'product-category');
                                    
                                    foreach ($terms as $term):
                                       
                                ?>
                                <a href="<?=get_term_link($term)?>" class="single-meta"><?=$term->name;?></a>,
                                <?endforeach;?>
                            </p>
                            <p>
                                <?pll_e('Tags')?>:
                                <?php 
                                    $terms = wp_get_post_terms(get_the_ID(), 'farm-animals');
                                    
                                    foreach ($terms as $term):
                                       
                                ?>
                                <a href="<?=get_term_link($term)?>" class="single-meta"><?=$term->name;?></a>,
                                <?endforeach;?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="review-section pt--60">
        <h2 class="sr-only d-none">Product Review</h2>
        <div class="container">

            <div class="product-details-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?pll_e('DESCRIPTION')?></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <article>
                            <?the_content();?>
                        </article>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section>
        <!-- Slider bLock 4 -->
        <div class="pt--50">
            <div class="container">

                <div class="block-title">
                    <h2><?pll_e('YOU MAY ALSO LIKE…')?></h2>
                </div>
                <div class="petmark-slick-slider border normal-slider" data-slick-setting='{
                              "autoplay": true,
                              "autoplaySpeed": 3000,
                              "slidesToShow": 5,
                              "arrows": true
                          }' data-slick-responsive='[
                              {"breakpoint":991, "settings": {"slidesToShow": 3} },
                              {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                          ]'>
                    <?
                        $farm = wp_get_post_terms(get_the_ID(), 'farm-animals');
                        $ids = array_column($farm, 'term_id');
                        

          

                              $queried_object = get_queried_object();
                              $term_id = $queried_object->term_id;
                              $term = get_term($term_id);
                              $posts_array = get_posts(array(
                              'post_type' => 'products',
                              'numberposts' => 999,
                              'tax_query' => array(
                                array(
                                  'taxonomy' => 'farm-animals',
                                  'field' => 'term_id',
                                  'terms' => $ids,
                                  'include_children' => true
                                )
                              )
                            ));
                          foreach ($posts_array as $post): setup_postdata($post); 
                    ?>
                    
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="<?the_permalink();?>"><img src="<?=get_the_post_thumbnail_url();?>" alt=""></a>
                                
                            </div>
                            <div class="content">
                                <h3><?the_title();?></h3>
                            </div>
                        </div>
                    </div>
                    <?endforeach;?>
                </div>
            </div>

        </div>
        <div class="pt--50">
            <div class="container">

                <div class="block-title">
                    <h2><?pll_e('RELATED PRODUCTS')?></h2>
                </div>
                <div class="petmark-slick-slider border normal-slider" data-slick-setting='{
                              "autoplay": true,
                              "autoplaySpeed": 3000,
                              "slidesToShow": 5,
                              "arrows": true
                          }' data-slick-responsive='[
                              {"breakpoint":991, "settings": {"slidesToShow": 3} },
                              {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                          ]'>

                    <?
                        $farm = wp_get_post_terms(get_the_ID(), 'product-category');
                        $ids = array_column($farm, 'term_id');
                        

          

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
                                  'terms' => $ids,
                                  'include_children' => true
                                )
                              )
                            ));
                          foreach ($posts_array as $post): setup_postdata($post); 
                    ?>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="<?the_permalink();?>"><img src="<?=get_the_post_thumbnail_url();?>" alt=""></a>
                                
                            </div>
                            <div class="content">
                                <h3><?the_title();?></h3>
                            </div>
                        </div>
                    </div>
                    <?endforeach;?>
                </div>
            </div>

        </div>
    </section>
</main>
<?php 
     
endwhile; endif;?>
  <?get_footer()?>