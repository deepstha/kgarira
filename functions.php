<?php
//load scripts
function krispcall_load_assets(){
    wp_enqueue_style('styles', get_template_directory_uri() . '/src/assets/css/style.min.css', array(), rand(111,9999), 'all');
    wp_enqueue_script('krispcall-custom',get_template_directory_uri() . '/src/assets/js/lazyLoad.js', array(), false, false);  
}
add_action("wp_enqueue_scripts", "krispcall_load_assets" );

//for setting up the thumbnail sizes
if ( ! function_exists( 'krispcall_setup' ) ) :
function krispcall_setup(){
    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    // Set up the WordPress core custom background feature.
		$defaults = array(
      'default-color'          => '',
      'default-image'          => '',
      'default-repeat'         => 'repeat',
      'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'           => 'auto',
      'default-attachment'     => 'scroll',
      'wp-head-callback'       => '_custom_background_cb',
      'admin-head-callback'    => '',
      'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $defaults );
    /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    // Add features image support
    add_theme_support( "title-tag" );
    add_theme_support( "wp-block-styles" );
    add_theme_support( "align-wide" );
    add_theme_support( "responsive-embeds" );
    add_theme_support('post-thumbnails');
    add_theme_support( 'custom-header' );
    add_image_size('banner-image', 801, 424, true);
    add_image_size('search-thumbnail', 355, 341, true);   
    add_image_size('featured-thumbnail', 680, 360,true);
    add_image_size('large-thumbnail', 780, 350, true);
    add_image_size('medium-thumbnail', 317, 165, true);
    add_image_size('single-featured-thumbnail', 600, 325,true);
    add_image_size('small-thumbnail', 80, 48,true);
    add_image_size('related--thumbnail', 396, 230,true);
    add_theme_support('cat-thumbnail',24,24 ,true);
}
endif;
add_action('after_setup_theme', 'krispcall_setup');

function blog_scripts() {
  // Register the script
  wp_register_script( 'custom-script', get_stylesheet_directory_uri(). '/src/assets/js/custom.js', array('jquery'), false, true );

  // Localize the script with new data
  $script_data_array = array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'security' => wp_create_nonce( 'load_more_posts' ),
  );
  wp_localize_script( 'custom-script', 'blog', $script_data_array );
  // Localize the script with new data
  // Enqueued script with localized data.
  wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'blog_scripts' );
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');


function load_posts_by_ajax_callback() {
  check_ajax_referer('load_more_posts', 'security');
  $paged = $_POST['page'];
  $offset = $_POST['offset'];
  $args = array(
      'offset'  =>  $offset * 3,
      'post_type' => 'post',
      'post_status' => 'publish',
      'paged' => $paged,
      'posts_per_page' => '1',
  );
  $blog_post2 = new WP_Query( $args );  
  ?>

  <?php if ( $blog_post2->have_posts() ) : ?>
      <?php while ( $blog_post2->have_posts() ) : $blog_post2->the_post(); ?>

      <div class="blog-list__item">
          <div class="row align-items-center">
              <div class="col-sm-6">
                  <figure class="mb-0">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('featured-thumbnail'); ?>
                      </a>
                  </figure>
              </div>
              <div class="col-sm-6 blog-list__item__content">
                  <div class="d-flex">
                      <div class="d-flex">
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
      <?php endwhile; ?>
      <?php
  endif;

  wp_die();

}


// for breadcrumb
function get_breadcrumb() { ?>
    <?php echo '<ol class="breadcrumb p-0 "><li class="breadcrumb-item text-bold"><a href="'.home_url().'">';
    if(is_single() && get_post_type()=='post'){
      echo 'Blog</a></li>';
    }else{
      echo 'Home</a></li>';
    }
    echo '<li class="breadcrumb-item text-bold">';
    if( is_single()) {
      if(get_post_type() == 'casestudies'){
        echo '<a href="'.home_url().'/casestudies">Case Studies</a></li>';
        echo '<li class="breadcrumb-item text-bold active">';
      }
      echo the_title().'</li>';
    }elseif(is_page()) {
      echo the_title();
    }elseif(is_search()) {
      the_search_query();
    }
    echo '</li></ol>'; ?>
<?php } 

//customize exceprt wor count length
function custom_excerpt_length(){
    return 30;
}
add_filter('excerpt_length','custom_excerpt_length');

function change_excerpt_more( $more ) {
  return '..';
}
add_filter('excerpt_more', 'change_excerpt_more');

// function post_read_time() {
/* Word read count */
if (!function_exists('your_function_name_reading_time')) :
    function your_function_name_reading_time($post_id) {
      $content = apply_filters('the_content', get_post_field('post_content', $post_id));            
      $read_words = esc_attr(get_theme_mod('global_show_min_read_number','200'));            
      $decode_content = html_entity_decode($content);            
      $filter_shortcode = do_shortcode($decode_content);            
      $strip_tags = wp_strip_all_tags($filter_shortcode, true);            
      $count = str_word_count($strip_tags);            
      $word_per_min = (absint($count) / $read_words);            
      $word_per_min = ceil($word_per_min);
      if ( absint($word_per_min) > 0) {
        $word_count_strings = sprintf(_n('%s min read  ', '%s min  read ', 
        number_format_i18n($word_per_min), 'krispcall-themes'), number_format_i18n($word_per_min));                
        if ('post' == get_post_type($post_id)):                    
          echo '<span class="min-read">';                    
          echo esc_html($word_count_strings);                    
          echo '</span>';                
        endif;            
      }            
      if ( absint($word_per_min) == Null) {                
        echo '<span class="min-read">';                
        echo '0 min read';                
        echo '</span>';            
      }            
    }
    endif;


// for displaying widjet in appearance
function ourWidgetsInit(){

    register_sidebar(array(
        'name'=> 'sidebar1',
        'id'=>'sidebar1',
    ));
}
add_action('widgets_init','ourWidgetsInit');

// Set post views count using post meta
if ( !function_exists( 'wp_get_post_views' ) ) :    
  /*** get the value of view. */ 
  function wp_get_post_views($postID) {   
    $count_key = 'wpb_post_views_count';    
    $count = get_post_meta($postID, $count_key, true);    
    if($count ==''){        
      $count = 1;        
      delete_post_meta($postID, $count_key);        
      add_post_meta($postID, $count_key, '1');    
    } else {        
      $count++;        
      update_post_meta($postID, $count_key, $count);    
    }
  }
endif;

function pp_getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
  }
  return $count.' Views';
}
function pp_setPostViews($postID) {
 $count_key = 'post_views_count';
 $count = get_post_meta($postID, $count_key, true);
 if($count==''){
    $count = 0;
  delete_post_meta($postID, $count_key);
  add_post_meta($postID, $count_key, '0');
 }
else{
  $count++;
update_post_meta($postID, $count_key, $count);
}
}
// Function to handle the Social share
function krispCall_social_buttons($content) {
    global $post;
    if(is_singular() || is_home()){
    
        // Get current page URL 
        $sb_url = urlencode(get_permalink());
  
        // Get current page title
        $sb_title = str_replace( ' ', '%20', get_the_title( $post->ID ));
        
        // Get Post Thumbnail for pinterest
        $sb_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID) ); 
  
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&amp;via=krispCall';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;

        if(!empty($sb_thumb)) {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;media='.$sb_thumb[0].'&amp;description='.$sb_title;
        }
        else {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;description='.$sb_title;
        }
  
        // Based on popular demand added Pinterest too
        //$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;media='.$sb_thumb[0].'&amp;description='.$sb_title;
        $path = get_template_directory_uri();
        // Add sharing button at the end of page/page content
        $content .= '<div class="icon"><a href="'.$facebookURL.'" target="_blank" rel="nofollow"><img src="'.$path.'/src/assets/images/svg/icons/icon-facebook.svg"></a></div>';
        $content .= '<div class="icon"><a href="'. $twitterURL .'" target="_blank" rel="nofollow"><img src="'.$path.'/src/assets/images/svg/icons/icon-twitter.svg"></a></div>';
        $content .= '<div class="icon"><a href="'.$linkedInURL.'" target="_blank" rel="nofollow"><img src="'.$path.'/src/assets/images/svg/icons/icon-linkedin.svg"></a></div>';
        $content .= '<div class="icon"><a href="'.$pinterestURL.'" data-pin-custom="true" target="_blank" rel="nofollow"><img src="'.$path.'/src/assets/images/svg/icons/icon-pinterest.svg"></a></div>';

        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
add_shortcode('social','krispCall_social_buttons');

function aj_modify_posts_per_page( $query ) {
  if ( $query->is_search() ) {
  $query->set( 'posts_per_page', '4' );
  }
  }
  add_action( 'pre_get_posts', 'aj_modify_posts_per_page' );


  //restrict the count of categories in related post 
  function krispcall_the_category_list( $categories, $post_id ) {
    return array_slice( $categories, 0, 1, true );
  }
  add_filter( 'the_category_list', 'krispcall_the_category_list', 10, 2 ); 


