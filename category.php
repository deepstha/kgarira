<?php 
    get_header(); 
    ?>
    <main>
        <div class="body-margin category">
            <!--ALL LATEST BLOGS-->
            <section class="category-post">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="category-content theme-light">
                            <ol class="breadcrumb p-0 mb-5">
                                <li class="breadcrumb-item text-bold">
                                <a href="/knowledge-base">Knowledge Base</a></li>
                                <?php  
                                    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                                        $url = "https://";   
                                    else  
                                        $url = "http://";   
                                    // Append the host(domain name, ip) to the URL.   
                                    $url.= $_SERVER['HTTP_HOST'];   
                                    // Append the requested resource location to the URL   
                                    $url.= $_SERVER['REQUEST_URI'];  
                                    $scheme=parse_url($url, PHP_URL_SCHEME);
                                    $path=parse_url($url, PHP_URL_PATH);
                                    $path2 = explode("/",  $path);
                                    array_pop($path2);
                                    // $path3 = explode("/",  $path2);
                                    // $host=parse_url($url, PHP_URL_HOST);
                                    $parent = $path2[count($path2)-2];
                                    $child = $path2[count($path2)-1];
                                    // echo end($path2);
                                    // echo $path2[count($path2)-2];  
                                    // echo end($path2);
                                    // print_r($fruit);
                                    if($parent !== 'category'){
                                        echo '<li class="breadcrumb-item text-bold text-primary"><a href="/knowledge-base/category/'.$parent.'">'.$parent.'</a></li>';
                                        echo '<li class="breadcrumb-item text-bold text-primary">'.$child.'</li>';
                                    }
                                    else {
                                        echo '<li class="breadcrumb-item text-bold text-primary esle-child">'.$child.'</li>';
                                    }
                                    
                                ?>
                            </ol>
                                <!-- <h6 class="text-6 text-bold text-800">
                                    <?php single_cat_title();?>
                                </h6> -->
                                <?php if( have_posts() ) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="blog-list__item">
                                        <div class="row">
                                            <div class="col-12 blog-list__item__content">
                                                <div class="d-flex">
                                                    <div class="d-flex icon">
                                                        <img src="<?php echo esc_url( get_template_directory_uri());?>/src/assets/images/svg/icons/icon-calendar.svg" width="14" height="15">
                                                        <span class="text-11 text-regular text-500 ml-1"><?php echo get_the_date('');?></span>
                                                    </div>
                                                    <div class="text-11 text-500 dot"><?php your_function_name_reading_time( get_the_ID() ); ?></div>
                                                </div>
                                                <h5 class="text-8 text-smbold text-900">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                                                </h5>
                                                <p class="text-10 text-700">
                                                <?php echo get_the_excerpt(); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                endwhile;
                                the_posts_pagination(array( 'screen_reader_text'=> '&nbsp;'));
                                wp_reset_postdata();
                                endif; ?>
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

                                <?php get_sidebar('categories');?>
                            </div>
                        </div>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>