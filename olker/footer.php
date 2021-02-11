    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5997.42971550631!2d69.28131300000001!3d41.271544!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDHCsDE2JzE3LjYiTiA2OcKwMTYnNTIuNyJF!5e0!3m2!1sen!2s!4v1589920826212!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>  
    <div class="pt--50 pb--50 partners-bg" >
        <div class="container">

            <div class="petmark-slick-slider brand-slider  border normal-slider grid-border-none" data-slick-setting='{
                                "autoplay": true,
                                "autoplaySpeed": 3000,
                                "slidesToShow": 5,
                                "arrows": true
                            }' data-slick-responsive='[
                                {"breakpoint":991, "settings": {"slidesToShow": 4} },
                                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                                {"breakpoint":320, "settings": {"slidesToShow": 1} }
                            ]'>
                <? 
                    $partners = get_posts(['post_type'=>'partner','numberposts' => 999, 'order' => 'asc']); 
                    
                    foreach ($partners as $post): setup_postdata($post);
                     ++$count;
                ?>             
                <div class="single-slide single-brand">
                    <a href="#" class="overflow-image brand-image partners-logo">
                        <img src="<?=get_the_post_thumbnail_url();?>" alt="">
                    </a>
                </div>
                <?
                  endforeach;
                ?>
            </div>

        </div>
    </div>

    <footer id="contacts" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer contact-block">
                        <h3 class="footer-title"><?pll_e('Contact')?></h3>
                        <div class="single-footer-content">
                            <p class="text-italic"><?pll_e('We are a team of designers and developers that create high quality Wordpress, Magento, Prestashop, Opencart.')?></p>
                            <p class="font-weight-500 text-white"><span class="d-block"><?pll_e('Telephone numbers')?>:</span>
                            <?pll_e('+998997273044<br>+380673882909 Telegram, WhatsApp')?></p>
                            <p class="font-weight-500 text-white"><span class="d-block"><?pll_e('Почта')?>:</span>
                            <?pll_e('yuriiwork2018@gmail.com')?></p>
                            <p class="font-weight-500 text-white"><span class="d-block"><?pll_e('Contact info')?>:</span>
                            <?pll_e('169-C, Technohub, Dubai Silicon Oasis.')?></p>

                            <p class="social-icons">
                                <? $menu_tree = get_menu('social');
                                    foreach($menu_tree[0] as $item): ?>
                                <a href="<?=$item->url?>"><i class="<?=implode(" ",$item->classes);?>"></i></a>
                                <? endforeach; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="single-footer contact-block">
                        <h3 class="footer-title"><?pll_e('Information')?></h3>
                        <div class="single-footer-content">
                        <ul class="footer-list">
                            <?
                                $parent_terms = get_terms( 'farm-animals', array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) );
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
                <div class="col-lg-2 col-sm-6">
                    <div class="single-footer contact-block">
                        <h3 class="footer-title"><?pll_e('CUSTOMER CARE')?></h3>
                        <div class="single-footer-content">
                        <ul class="footer-category">

                            <?
                                $parent_terms = get_terms( 'product-category', array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) );
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
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer contact-block">
                        <h3 class="footer-title"><?pll_e('SUBSCRIBE TO OUR NEWSLETTER')?></h3>
                        <div class="single-footer-content">
                            <p>
                                <?pll_e('Subscribe to the Petmark mailing list to receive updates on new arrivals, special offers and other discount information.')?>
                            </p>
                            <div class="pt-2">
                                <div class="input-box-with-icon">
                                    <input type="text" placeholder="Введите ваше имя">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="input-box-with-icon">
                                    <input type="text" placeholder="Введите ваш номер">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <div class="pt-2">
                                <select name="region" class="input_reuqest input-box-with-icon region">
                                    <option value="" selected="" disabled="">Регион</option>
                                    <option value="Андижанская обл.">Андижанская обл.</option>
                                    <option value="Бухарская обл.">Бухарская обл.</option>
                                    <option value="Джизакская обл.">Джизакская обл.</option>
                                    <option value="Каракалпакия">Каракалпакия</option>
                                    <option value="Кашкадарьинская обл.">Кашкадарьинская обл.</option>
                                    <option value="Навоийская обл.">Навоийская обл.</option>
                                    <option value="Наманганская обл.">Наманганская обл.</option>
                                    <option value="Самаркандская обл.">Самаркандская обл.</option>
                                    <option value="Сурхандарьинская обл.">Сурхандарьинская обл.</option>
                                    <option value="Сырдарьинская обл.">Сырдарьинская обл.</option>
                                    <option value="Ташкент">Ташкент</option>
                                    <option value="Ташкентская обл.">Ташкентская обл.</option>
                                    <option value="Ферганская обл.">Ферганская обл.</option>
                                    <option value="Хорезмская обл.">Хорезмская обл.</option> 
                                </select>
                            </div>
                            <div class="pt-2">
                                <div class="submit-button">
                                    <input type="submit" value="Отправить">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--         <div class="footer-copyright">
            
        </div> -->
    </footer>
</div>
<script src="<? bloginfo('template_directory') ?>/js/plugins.js"></script>
<script src="<? bloginfo('template_directory') ?>/js/ajax-mail.js"></script>
<script src="<? bloginfo('template_directory') ?>/js/custom.js"></script>
</body>

</html>