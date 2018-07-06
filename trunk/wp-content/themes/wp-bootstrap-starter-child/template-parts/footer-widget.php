<?php

if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) {?>
        <div id="footer-widget" class="row m-0 p-5 border border-white <?php if(!is_theme_preset_active()){ echo 'bg-light'; } ?>">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                        <div class="col-12 col-md-3  border border-white"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                        <div class="col-12 col-md-3 border border-white"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-3' )) : ?>
                        <div class="col-12 col-md-3 border border-white">
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                            <?php 
                                if(have_rows('contact_items', 'option')){ ?>
                                <ul class="footer-contact">
                            <?php
                                while(have_rows('contact_items', 'option')){
                                        the_row();
                                        ?>
                                        <li>
                                            <i class="<?php the_sub_field('contact_icon', 'option'); ?>"></i>
                                            <a target="_blank" href="<?php the_sub_field('contact_link', 'option') ?>"><?php the_sub_field('contact_info', 'option') ?></a>
                                        </li>
                                <?php
                                    }
                                }
                            ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php }