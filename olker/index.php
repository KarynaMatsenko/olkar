<?get_header()?>


  
<section class="hero-area-two">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class=" petmark-slick-slider  home-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 1,
                            "dots": true
                        }'>
                    <? 
                        $slider = get_posts(['post_type'=>'slider','numberposts' => 999, 'order' => 'asc']); 
                        
                        foreach ($slider as $post): setup_postdata($post);
                         ++$count;
                    ?> 
                    <a href="<?=types_render_field("slider-link", array("raw"=>"true"));?>"  class="single-slider home-content bg-image" data-bg="<?=get_the_post_thumbnail_url();?>">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                        </div>
                        <span class="herobanner-progress"></span>
                    </a>
                    <?
                      endforeach;
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>
<div class="container pt--50">
    <div class="policy-block border-four-column">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block-single">
                    <div class="icon">
                        <span class="ti-truck"></span>
                    </div>
                    <div class="text">
                        <h3><?pll_e('Free Delivery')?></h3>
                        <p><?pll_e('On orders of $200+')?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block-single">
                    <div class="icon">
                        <span class="ti-credit-card"></span>
                    </div>
                    <div class="text">
                        <h3><?pll_e('Cod')?></h3>
                        <p><?pll_e('Cash on Delivery')?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block-single">
                    <div class="icon">
                        <span class="ti-gift"></span>
                    </div>
                    <div class="text">
                        <h3><?pll_e('Free Gift Box')?></h3>
                        <p><?pll_e('Buy a Gift')?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block-single">
                    <div class="icon">
                        <span class="ti-headphone-alt"></span>
                    </div>
                    <div class="text">
                        <h3><?pll_e('Free Support 24/7')?></h3>
                        <p><?pll_e('Online 24hrs a Day')?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="discount" class="pt--50">
   <div class="container">
      <div class="block-title-2">
         <h2>Акции</h2>
      </div>
      <div class="petmark-slick-slider petmark-slick-slider--wrapper-2 border normal-slider" data-slick-setting='{
         "autoplay": true,
         "autoplaySpeed": 3000,
         "slidesToShow": 3,
         "arrows": true
         }' data-slick-responsive='[{"breakpoint":991, "settings": {"slidesToShow": 2} },
         {"breakpoint":768, "settings": {"slidesToShow": 1} 
         }]'>
         <? 
                  
                  $posts_array = get_posts(array(
                  'post_type' => 'products',
                  'numberposts' => 999,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'product-category',
                      'field' => 'term_id',
                      'terms' => 118,
                      'include_children' => true
                    )
                  )
                ));


              foreach ($posts_array as $post): setup_postdata($post); 
        ?>
         <div class="single-slide">
            <div class="pm-product  product-type-list">
               <div class="image">
                  <a href="<?the_permalink();?>"><img src="<?=get_the_post_thumbnail_url();?>" alt=""></a>
               </div>
               <div class="content">
                  <h3> <a href="<?the_permalink();?>"><?the_title();?></a></h3>
               </div>
            </div>
         </div>
         <?
            endforeach;
        ?>
      </div>
   </div>
</div>
<div id="about" class="about-area" style="margin-top: 25px;">
    <div class="container-fluid p-0">
      <div class="row no-gutters align-items-center">
        <div class="row farm-iconstext">
            <h2 class="">Разделы продукции по животным</h2>
        </div>
        <div class="col-lg-12">
          <div class="farm-icons">
            <?
                  $terms = get_terms( 'farm-animals', array('orderby' => 'slug', 'hide_empty' => false ) );
                  foreach ( $terms as $term ):
            ?>
            <div>
                <a href="<?=get_term_link($term);?>">
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="about">
                </a>
                
                <h2><?=$term->name;?></h2>
            </div>
            <?
                endforeach;
            ?> 
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Home-2 => Promotion Block 1 -->
<section class="pt--50 space-db--30">
    <h2 class="d-none">Promotion Block
    </h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="https://olkar.uz/farm-animals/%d0%bf%d1%82%d0%b8%d1%86%d1%8b/" class="promo-image overflow-image">
                    <img src="<? bloginfo('template_directory') ?>/image/qwerty123.jpg" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <a href="https://olkar.uz/farm-animals/%d0%ba%d1%80%d1%83%d0%bf%d0%bd%d1%8b%d0%b9-%d1%80%d0%be%d0%b3%d0%b0%d1%82%d1%8b%d0%b9-%d1%81%d0%ba%d0%be%d1%82/" class="promo-image overflow-image">
                    <img src="<? bloginfo('template_directory') ?>/image/12761.jpg" alt="">
                </a>

            </div>
        </div>
    </div>
</section>
<!-- Home 2 => Slider bLock 2 -->
<div  class="pt--50">
    <div class="container">

        <div class="block-title-2">
            <h2><?pll_e('NEW PRODUCTS')?></h2>
        </div>
        <div class="petmark-slick-slider petmark-slick-slider--wrapper-2 border grid-column-slider " data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 3000,
                "slidesToShow": 5,
                "rows" :2,
                "arrows": true
            }' data-slick-responsive='[
                {"breakpoint":991, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
            ]'>
            <? 
                $news = get_posts(['post_type'=>'products','numberposts' => 30, 'order' => 'ASC']); 
                
                foreach ($news as $post): setup_postdata($post);
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
            <?
                endforeach;
            ?>
        </div>
    </div>

</div>
<!-- Home =>  Promotion Block 2 -->
<section class="pt--50 space-db--30" style="margin-bottom: 25px;">
    <h2 class="d-none">Promotion Block
    </h2>
    <div class="container">
        <a href="https://olkar.uz/product-category/%d0%b7%d0%be%d0%be%d1%82%d0%be%d0%b2%d0%b0%d1%80%d1%8b/" class="promo-image overflow-image">
            <img src="<? bloginfo('template_directory') ?>/image/zoo.jpg" alt="">
        </a>
    </div>
</section>



<!-- slide Block 3 / Normal Slider -->


  <?get_footer()?>