<?php get_header(); 
/* Template Name: 404*/
?>
<main>
    <div class="body-margin">
        <section class="error-wrapper">
            <div class="container">
                <div class="error-content">
                    <h1>404</h1>
                    <h2>
                        Page not found
                    </h2>
                    <div class="error-img">
                        <img src="<?php echo esc_url( get_template_directory_uri()); ?>/src/assets/images/plug-in.png" alt="">
                        <img src="<?php echo esc_url( get_template_directory_uri()); ?>/src/assets/images/plug-out.png" alt="">
                    </div>
                    <p>
                        The page is missing or you assembled the link incorrectly
                    </p>
                </div>
                <div class="btn-wrap">
                    <a href="https://krispcall.com/" class="btn btn-md btn-primary">Back to Home</a>
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>