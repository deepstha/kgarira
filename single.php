<?php get_header(); ?>
    <main>
        <div class="body-margin theme-light">
            <!--BLOG SINGLE INNER-->
            <div class="container container-shrink">
            <section class="hero-blogs-single hero-sm d-block pb-3">
                <div class="hero-blogs-single__content hero-sm__content w-mx">
                    <ol class="breadcrumb p-0 ">
                        <li class="breadcrumb-item text-bold">
                        <a href="/knowledge-base">Knowledge Base</a></li>
                        <li class="breadcrumb-item text-bold"><?php the_category()?></li>
                    </ol>
                    <!-- <?php
                        if ( function_exists('get_breadcrumb') ) {
                            get_breadcrumb();
                        }
                    ?> -->
                    <h1 class="text-3 text-bold">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="hero-blogs-single__img">
                    <figure class="mb-0 border-r-8 overflow">
                        <?php the_post_thumbnail('single-featured-thumbnail'); ?>
                    </figure>
                    <ul class="hero-blogs-single__info mt-4 text-secondary justify-content-start">
                        <li>
                            <span class="icon">
                                <img src="<?php echo esc_url( get_template_directory_uri()); ?>/src/assets/images/svg/icons/icon-author.svg" width="18" height="18">
                            </span>
                            <?php $id = get_current_user_id(); echo get_the_author_meta( 'display_name', $id); ?>
                        </li>
                        <li>
                            <span class="icon">
                                <img src="<?php echo esc_url( get_template_directory_uri()); ?>/src/assets/images/svg/icons/icon-calender.svg" width="18" height="18">
                            </span>
                            <span class="xs-hidden pr-1">Last Updated:</span>
                            <?php echo get_the_modified_date();?>
                        </li>
                        <li>
                            <span class="icon">
                                <img src="<?php echo esc_url( get_template_directory_uri()); ?>/src/assets/images/svg/icons/icon-reading.svg" width="18" height="18">
                            </span>
                            <?php your_function_name_reading_time( get_the_ID() ); ?>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="blog-inner single-inner">
                <div class="inner-wrapper">
                    <div class="row justify-content-between">
                        <div class="offcanvas__toggler sticky-btm d-lg-none">
                        <button class="navbar-toggler" type="button">
                            <div class="hb-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>
                            <button class="btn btn-primary btn-sm btn-icon blog-toggler-btn" type="button">
                                <img src="<?php echo esc_url( get_template_directory_uri());?>/src/assets/images/svg/icons/icon-list-check.svg" class="mr-2">
                                Table of Content
                            </button>
                        </div>
                        <div class="offcanvas blog-off-canvas pr-1" id="blog-off-canvas">
                                <button type="button" class="close close--top mb-2">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="vh-100 pr-3" data-simplebar> <?php echo do_shortcode("[lwptoc]"); ?></div>
                                
                            </div>
                        <div class="col-md-8 pr-md-5">
                            <div class="single-inner__text">
                                <?php the_content(); ?>
                            </div>
                            <div class="single-inner__box d-xl-flex">
                                <div class="author-box">
                                    <figure class="author-box__img">
                                        <?php $id = get_current_user_id(); echo get_avatar(get_the_author_meta('ID'), 48); ?>
                                    </figure>
                                    <div class="author-box__info">
                                        <h6><?php echo get_the_author_meta( 'display_name', $id); ?></h6>
                                        <?php echo wpautop(get_the_author_meta('description', $id)); ?>
                                    </div>
                                </div>
                                <div class="social">
                                    <span class="text-12">Share:</span>
                                    <div class="social__wrap">
                                        <?php echo do_shortcode(' [social]'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-newsletter bg-primary-50 props">
                                    <h5 class="text-5 text-md">
                                        Follow our newsletter !
                                    </h5>
                                    <span class="text-10 text-md text-default">
                                        Subscribe to our newsletter & stay updated for the latest news.
                                    </span>
                                    <div class="form-block mt-3 text-default">
                                        <form id="form-newsletter" autocomplete="off" class="d-flex">
                                            <div class="form-group mb-0 col-l">
                                                <input type="email" class="form-control w-100 m-0" id="news-mail" placeholder="Email address...">
                                            </div>
                                            <div class="form-action col-r ml-3">
                                                <button type="submit" class="btn btn-primary btn-block m-0" id="news-submit">Submit<span class="preloader preloader-sm"></span></button>
                                            </div>
                                        </form>
                                    </div>
                        
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sticky hide-scroll" data-simplebar>
                                <?php get_search_form(); ?>
                                <div class="cta-gradient">
                                    <h6 class="cta-gradient__title">
                                    Getting started takes less than 5 minutes
                                    </h6>
                                    <p class="text-13 cta-gradient__text">Start making and receiving calls in more than 100 countries.</p>
                                    <a href="https://app.krispcall.com/register" rel="noreferrer noopener" target="_blank" class="btn btn-white btn-md">Get Started
                                        <span class="icon icon-right">
                                            <svg width="14" height="11" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.333374 5.77148C0.333374 5.45507 0.568502 5.19357 0.873565 5.15219L0.958374 5.14648L13.4584 5.14648C13.8036 5.14648 14.0834 5.42631 14.0834 5.77148C14.0834 6.0879 13.8482 6.34939 13.5432 6.39078L13.4584 6.39648L0.958374 6.39648C0.613196 6.39648 0.333374 6.11666 0.333374 5.77148Z" fill="white"/>
                                                <path d="M7.97588 1.19405C7.73128 0.9505 7.73043 0.554773 7.97398 0.31017C8.19539 0.0878039 8.54256 0.0668849 8.78763 0.247903L8.85786 0.308267L13.8995 5.32827C14.1226 5.55034 14.1428 5.89877 13.9604 6.14383L13.8996 6.21401L8.8579 11.2348C8.61331 11.4784 8.21759 11.4776 7.97401 11.233C7.75259 11.0107 7.73313 10.6634 7.91518 10.4191L7.97584 10.3491L12.5725 5.77091L7.97588 1.19405Z" fill="white"/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="blog-post list-style-text">
                                    <h5 class="text-8 text-bold text-800 heading__title heading__title--sideborder">
                                        Related Articles
                                    </h5>
                                        <!-- Calling the function to count the views when the post is visited -->
                                        <?php wp_get_post_views(get_the_ID()); ?>
                                        <?php $categories = get_the_category($post->ID); ?>
                                        <?php if ($categories): ?>
                                        <?php $category_ids = array(); ?>
                                        <?php foreach($categories as $individual_category) : ?>
                                        <?php $category_ids[] = $individual_category->term_id; ?>
                                        <?php endforeach; ?>
                                        <?php $args=array(
                                        'category__in' => $category_ids,
                                        'post__not_in' => array($post->ID),
                                        'posts_per_page'=> 6,
                                        'ignore_sticky_posts'=>1,
                                        'orderby' => 'rand',
                                        );?>
                                        <?php $my_query = new WP_Query($args); ?>
                                        <?php if( $my_query->have_posts() ) : ?>
                                            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                                            <div class="blog-post__item d-flex">

                                                <h6 class="text-10 text-smbold">
                                                    <a href="<?php the_permalink()?>"><?php the_title(); ?></a>
                                                </h6>
                                            </div>
                                        <?php endwhile;?>
                                        <?php endif; ?>
                                        <?php wp_reset_query();?>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>