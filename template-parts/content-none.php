<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KrispCall
 */

?>

<section class="no-results not-found">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Sorry, No Result Found', 'krispcall-themes' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) :

                printf(
                    '<p>' . wp_kses(
                        /* translators: 1: link to WP admin new post page. */
                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'krispcall-themes' ),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ) . '</p>',
                    esc_url( admin_url( 'post-new.php' ) )
                );

            elseif ( is_search() ) :
                ?>
                <div class="container">
                    <p class="no-results__content"><?php esc_html_e( 'We could not see anything as', 'krispcall-themes' ); ?>
                        "<?php echo get_search_query();?>."
                    </p>
                    <?php get_search_form(); ?>
                    <p class="mb-0">Please check spelling or try searching for something else.</p>
                </div>
            <?php else :
                ?>

                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'krispcall-themes' ); ?></p>
                <?php
                get_search_form();

            endif;
            ?>
        </div><!-- .page-content -->
    </div>
</section><!-- .no-results -->

