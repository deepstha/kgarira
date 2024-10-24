<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Krispcall
 */

?>

    <div class="blog-list__item search__items">
        <div class="row">
            <div class="col-12 blog-list__item__content">
                <h5 class="text-8 text-md text-900">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                </h5>
                <p class="text-10 text-700">
                <?php echo get_the_excerpt(); ?>
                </p>
                <a class="post-link" href="<?php the_permalink()?>">Read more...</a>
                <div class="d-flex">
                    <div class="d-flex icon">
                        <img src="<?php echo esc_url( get_template_directory_uri());?>/src/assets/images/svg/icons/icon-calendar.svg" width="14" height="15">
                        <span class="text-11 text-regular text-500 ml-1"><?php echo get_the_date('');?></span>
                    </div>
                    <div class="text-11 text-500 dot"><?php your_function_name_reading_time( get_the_ID() ); ?></div>
                </div>
            </div>
        </div>
    </div>
