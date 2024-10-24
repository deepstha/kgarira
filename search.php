<?php get_header(); ?>
    <main>
        <div class="body-margin">
		<?php if ( have_posts() ) : ?>
        <section class="search-post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="search-info">
                            <h6 class="text-6">Searched items for <span>"<?php echo get_search_query();?>"</span></h6>
                            <span class="text-9 post-count"><strong><?php $allsearch = new WP_Query("s=$s&showposts=0"); echo $allsearch ->found_posts.'';wp_reset_query(); ?></strong>results found.</span>
                        </div>
                        <div class="search-content">
                            <?php
                                if ( have_posts() ) : 
                                    while ( have_posts() ) : the_post(); 
                                    get_template_part( 'template-parts/content', 'search' );
                                    endwhile;
                                        the_posts_pagination(array( 'screen_reader_text'=> '&nbsp;'));
                                endif;
                            ?>	
                        </div>
                    </div>
                    <div class="col-lg-4 pl-3 pl-lg-2">
                        <div class="sticky">
                            <?php get_search_form(); ?>
                            <div class="form-newsletter">
                                <div class="text-center">
                                    <h5 class="text-9 text-md">
                                        Newletter
                                    </h5>
                                    <span class="text-10 text-md">
                                        Join 80,000 subscribers!
                                    </span>
                                    <div class="form-block">
                                        <form id="form-newsletter" autocomplete="off">
                                            <div class="form-group mb-0">
                                                <input type="email" class="form-control w-100" id="news-mail" placeholder="Email address...">
                                            </div>
                                            <div class="form-action">
                                                <button type="submit" class="btn btn-primary btn-block" id="news-submit">Sign Up<span class="preloader preloader-sm"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                    <small class="text-regular text-11">
                                        By signing up, you agree to our
                                        <a class="text-md" href="/privacy-policy.html">Privacy Policy</a>
                                    </small>
                                </div>
                            </div>
                            <div class="blog-post list-style-text">
                                <h5 class="text-8 text-bold text-800 heading__title heading__title--sideborder">
                                    Top Posts
                                </h5>
                                <?php
                                query_posts('meta_key=wpb_post_views_count&posts_per_page=6&orderby=meta_value_num&
                                order=DESC');
                                if (have_posts()) : while (have_posts()) : the_post();
                                ?>
                                <div class="blog-post__item d-flex">
                                    <h6 class="text-10 text-smbold">
                                        <a href="<?php the_permalink()?>"><?php the_title(); ?></a>
                                    </h6>
                                </div>
                                <?php 
                                endwhile; endif;
                                wp_reset_query(); 
                            ?>
                        </div>
                    </div>	
                </div>
            </div>
            <?php else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>
        </section>
    </main><!-- #main -->
<?php get_footer(); ?>
