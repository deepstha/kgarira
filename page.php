<?php get_header();?>
<main>
    <div class="body-margin">
        <section class="blog-inner">
            <div class="container">
                <div class="inner-wrapper">
             
                    <h1 class="text-4 text-md text-900"><?php the_title(); ?></h1>
                    <figure class="featured-image">
                        <?php the_post_thumbnail('banner-image'); ?>
                    </figure>
                    <div class="row justify-content-between">
                        <div class="col-7 col-offset-2">
                            <div class="blog-inner__text">
                            <?php the_content(); ?>
                            </div>
                            <div class="divider mx-n4"></div>
                        <div class="blog-inner__switcher">
                            <?php
                                if ( is_singular( 'post' ) ) {
                                    // Previous/next post navigation.
                                    the_post_navigation(
                                        array(
                                            'next_text' => '<div class="text-right">'.'<span class="next-post text-small">' . __( 'Next', 'krispcall-themes' ) . '</span> ' .'</div>'.
                                                '<h6 class="text-10 text-md post-title text-right">%title</h6>',
                                            'prev_text' => '<div class="text-left">'.'<span class="previous-post text-small text-left">' . __( 'Previous', 'krispcall-themes' ) . '</span> ' .'</div>'.
                                                '<h6 class="text-10 text-md post-title text-left">%title</h6>',
                                        )
                                    );
                                }
                            ?>
                        </div>
                        </div>
                        <div class="col-2">
                            <div class="blog-inner__socials sticky">
                                <div class="d-flex flex-column align-items-end">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($share_url); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296'); return false;" target="_blank">
                                    <img src="<?php echo esc_url( get_template_directory_uri());?>/src/assets/images/svg/icons/icon-facebook.svg">

                                    </a>
                                    </a>
                                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo $share_url; ?>&amp;media=<?php echo $media;   ?>&amp;description=<?php echo $share_title; ?>" target="_blank">
                                        <img src="<?php echo esc_url( get_template_directory_uri());?>/src/assets/images/svg/icons/icon-pinterest.svg">
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&amp;url=<?php echo $share_url; ?>&amp;via=WPCrumbs" target="_blank">
                                        <img src="<?php echo esc_url( get_template_directory_uri());?>/src/assets/images/svg/icons/icon-twitter.svg">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>
