<?php
    
    /**
     * Template Name: About
     *
     * @package WordPress
     * @subpackage Portfolio
     * @since 2018
     */
?>

<? get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
            <div class="container">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?=site_url();?>">Главная</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?the_title();?></li>
               </ol>
            </div>
         </nav>
         <!-- Main Wrapper Start -->
         <main id="content" class="main-content-wrapper overflow-hidden">
            <div class="about-area bg--white about-two-sp sec-1">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-md-10">
                        <div class="about-text about-text-2 text-center pb--40 pb-sm--30">
                           <!-- <h2 class="heading-secondary mb--40 mb-sm--30">
                              <strong>WE CREATE HTML THEMES</strong>
                           </h2> -->
                           <p>Компания «О.L.KAR.-АгроЗооВет-Сервис» – производитель ветеринарных препаратов и кормовых добавок № 1 в Украине. Компания основана в 2003 году, во время кризисного периода в сельском хозяйстве страны и хронической нехватки средств для лечения животных. Сегодня «О.L.KAR.-АгроЗооВет-Сервис» является признанным лидером ветеринарного рынка Украины. В Узбекистане открылся официальный дилер компании OLKAR TASHKENT. Это даёт возможность получить большой ассортимент ветеринарных препаратов и кормовых добавок для животных с первых рук. 
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="img-box about-img-2 text-center">
                           <img src="<? bloginfo('template_directory') ?>/image/about1.jpg" alt="about image">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="img-box about-img-2 text-center">
                           <img src="<? bloginfo('template_directory') ?>/image/about2.jpg" alt="about image">
                        </div>
                     </div>
                  </div>
                  <div class="row justify-content-center">
                     <div class="col-md-10">
                        <div class="about-text about-text-2 text-center pb--40 pb-sm--30">
                           <!-- <h2 class="heading-secondary mb--40 mb-sm--30">
                              <strong>WE CREATE HTML THEMES</strong>
                           </h2> -->
                           <p>Вся продукция получила сертификат GMP, что говорит о высоком качестве продукта.Залогом качества продукции «О.L.KAR.-АгроЗооВет-Сервис» является высокая квалификация ведущих специалистов и постоянный технический контроль на всех этапах производства. 
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="img-box about-img-2 text-center">
                           <img src="<? bloginfo('template_directory') ?>/image/about3.jpg" alt="about image">
                        </div>
                     </div>
                  </div>
                  <div class="row justify-content-center">
                     <div class="col-md-10">
                        <div class="about-text about-text-2 text-center pb--40 pb-sm--30">
                           <!-- <h2 class="heading-secondary mb--40 mb-sm--30">
                              <strong>WE CREATE HTML THEMES</strong>
                           </h2> -->
                           <p>Наша продукция экспортируется в более чем 30 европейских, азиатских и арабских стран: Азербайджан, Беларусь, Эстония, Грузия, Казахстан, Катар, Кыргызстан, Латвия, Литва, Молдова, Монголия, Румыния, Таджикистан, Туркменистан, ОАЭ, Узбекистан.¬¬
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="img-box about-img-2 text-center">
                           <img src="<? bloginfo('template_directory') ?>/image/about4.jpg" alt="about image">
                        </div>
                     </div>
                  </div>
                  <div style="margin-top: 60px;" class="row">
                     <div class="col-12">
                        <div class="img-box about-img-2 text-center">
                           <iframe width="100%" height="416" src="https://www.youtube.com/embed/EofPxjyCBP8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>

<?php 
     
endwhile; endif;?>
<!-- // Doctor Detail Section
================================= -->
<?php get_footer(); ?>