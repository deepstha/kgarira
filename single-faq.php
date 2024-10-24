<?php
get_header();
?>
<main>
<div class="body-margin">
    <section class="blog-inner">
        <div class="container">
            <div class="inner-wrapper">
                <h1 class="text-4 text-md text-900"><?php the_title(); ?></h1>
                <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <div class="blog-inner__text">
                        <?php 
                            global $wpdb;
                            $l=0;
                            $postid=get_the_id();
                            $clientip=get_client_ip();
                            $row1 = $wpdb->get_results( "SELECT id FROM $wpdb->post_like_table WHERE postid = '$postid' AND clientip = '$clientip'");
                            if(!empty($row1)){
                            $l=1;
                            }
                            $totalrow1 = $wpdb->get_results( "SELECT id FROM $wpdb->post_like_table WHERE postid = '$postid'");
                            $total_like1 = $wpdb->num_rows;
                            
                        ?>
                        <div class="post_like">
                        <a class="pp_like <?php if($l==1) {echo "liked"; } ?>" href="#" data-id="<?php echo get_the_id(); ?>"><i class="fas fa-thumbs-up"></i> <span><?php echo $total_like1; ?> like</span></a>
                        <div class="lds-facebook"><div></div><div></div><div></div></div>
                        </div>
                        <?php the_content(); ?>
                        </div>
                    <div class="blog-inner__switcher">
                        <?php
                            if ( is_singular( 'faq' ) ) {
                                // Previous/next post navigation.
                                the_post_navigation(
                                    array(
                                        'next_text' => '<div class="text-right">'.'<span class="next-post text-small">' . __( 'Next', 'nd_dosth' ) . '</span> ' .'</div>'.
                                            '<h6 class="text-10 text-md post-title text-right">%title</h6>',
                                        'prev_text' => '<div class="text-left">'.'<span class="previous-post text-small text-left">' . __( 'Previous', 'nd_dosth' ) . '</span> ' .'</div>'.
                                            '<h6 class="text-10 text-md post-title text-left">%title</h6>',
                                    )
                                );
                            }
                        ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</main>
<?php get_footer(); ?>