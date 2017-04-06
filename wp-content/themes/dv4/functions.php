<?php
/**
 * Neat functions and definitions
 *
 * @package Neat
 */

/**
 * Paths
 *
 * @since  1.0
 */
if ( !defined( 'AA_THEME_DIR' ) ){
    define('AA_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'neat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function neat_setup() {


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'neat' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'neat_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // neat_setup
add_action( 'after_setup_theme', 'neat_setup' );



/**
 * Styles and scripts
 *
 * @since 1.0.0
 */

/**
 *
 * Scripts: Frontend with no conditions, Add Custom Scripts to wp_head
 *
 * @since  1.0.0
 *
 */
add_action('wp_enqueue_scripts', 'aa_scripts');
function aa_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {


    	wp_enqueue_script('jquery');
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//code.jquery.com/jquery-3.1.1.min.js', array(), '3.1.1', true);

        wp_register_script('aa_validate', '//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js', array(), '1.16.0', true);
        wp_enqueue_script('aa_validate');

        wp_register_script('aa_mainJs', get_template_directory_uri() . '/assets/js/main.min.js', array(), '1.0.0', true);
        wp_enqueue_script('aa_mainJs');

    }

}


/**
 *
 * Styles: Frontend with no conditions, Add Custom styles to wp_head
 *
 * @since  1.0
 *
 */
add_action('wp_enqueue_scripts', 'aa_styles'); // Add Theme Stylesheet
function aa_styles()
{

    /**
     *
     * Minified and Concatenated styles
     *
     */
    // wp_register_style('aa_style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_register_style('aa_style', get_template_directory_uri() . '/style.min.css', array(), '1.0', 'all');
    wp_enqueue_style('aa_style'); // Enqueue it!

}

/**
 *
 * Comment Reply js to load only when thread_comments is active
 *
 * @since  1.0.0
 *
 */
add_action( 'wp_enqueue_scripts', 'aa_enqueue_comments_reply' );
function aa_enqueue_comments_reply() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Home - Header Cards', 'home-cards' ),
        'id' => 'home-cards',
        'description' => __( 'Home - Header Cards', 'home-cards' ),
        'before_widget' => '',
        'after_widget'  => '',
    ) );
    register_sidebar( array(
        'name' => __( 'Products', 'product-cards' ),
        'id' => 'product-cards',
        'description' => __( 'Products', 'product-cards' ),
        'before_widget' => '',
        'after_widget'  => '',
    ) );
    register_sidebar( array(
        'name' => __( 'Home - Testimonials', 'testimonials' ),
        'id' => 'testimonials',
        'description' => __( 'Testimonials', 'testimonials' ),
        'before_widget' => '',
        'after_widget'  => '',
    ) );
    register_sidebar( array(
        'name' => __( 'Request', 'request' ),
        'id' => 'request',
        'description' => __( 'Request', 'request' ),
        'before_widget' => '',
        'after_widget'  => '',
    ) );
    register_sidebar( array(
        'name' => __( 'Brochure', 'brochure' ),
        'id' => 'brochure',
        'description' => __( 'brochure', 'brochure' ),
        'before_widget' => '',
        'after_widget'  => '',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer', 'footer' ),
        'id' => 'footer',
        'description' => __( 'footer', 'footer' ),
        'before_widget' => '<div class="footer-item margin0">',
        'after_widget'  => '</div>',
    ) );
    register_sidebar( array(
        'name' => __( 'News Sidebar', 'sidebar__news' ),
        'id' => 'sidebar__news',
        'description' => __( 'News Sidebar', 'sidebar__news' ),
        'before_widget' => '<div class="sidebar__news-item">',
        'after_widget'  => '</div>',
    ) );
}

/**

PRODUCTS WIDGET 

**/

// Creating the widget 
class damsons_products_plugin extends WP_Widget {
// constructor
	function damsons_products_plugin() {
		parent::WP_Widget(false, $name = __('Damsons Products', 'damsons_products_plugin') );

		add_action('admin_enqueue_scripts', array($this, 'photo_upload_option'));
	}

	function photo_upload_option($hook) {
	    if( $hook != 'widgets.php' ) 
	        return;
	    //enque Javasript Media API
	    wp_enqueue_media();
	    wp_enqueue_script( 'uploadphoto', get_template_directory_uri() . '/assets/js/upload_image.js', array('jquery'), '1.0', 'true' );
	}

	// widget form creation
	function form($instance) {	
		// Check values
	if( $instance) {
	     $title = esc_attr($instance['title']);
	     $product_link = esc_attr($instance['product_link']);
	     $image_alt = esc_attr($instance['image_alt']);
	} else {
	     $title = '';
	     $product_link = '';
	     $image_alt = '';
	}

	$image = '';
        if(isset($instance['image'])) {
            $image = $instance['image'];
        }

	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Product:', 'damsons_products_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<p>
    <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Product Image:' ); ?></label>
    <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat image1" type="text" size="36"  value="<?php echo $instance['image']; ?>" />
    <input class="upload_card_image" type="button" value="Upload Image" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_name( 'image_alt' ); ?>"><?php _e( 'Product Image Alt Text:' ); ?></label>
    <input name="<?php echo $this->get_field_name( 'image_alt' ); ?>" id="<?php echo $this->get_field_id( 'image_alt' ); ?>" class="widefat image1_alt" type="text" size="36"  value="<?php echo $instance['image_alt']; ?>" />
    </p>

	<p>
	<label for="<?php echo $this->get_field_id('product_link'); ?>"><?php _e('Product Page:', 'damsons_products_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('product_link'); ?>" name="<?php echo $this->get_field_name('product_link'); ?>" type="text" value="<?php echo $product_link; ?>" />
	</p>

	<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
	$instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['image'] = strip_tags($new_instance['image']);
      $instance['product_link'] = strip_tags($new_instance['product_link']);
      $instance['image_alt'] = strip_tags($new_instance['image_alt']);

     return $instance;
	}

	// widget display
	function widget($args, $instance) {
	extract( $args );

   $title = apply_filters('widget_title', $instance['title']);
   $image = $instance['image'];
   $product_link = $instance['product_link'];
   $image_alt = $instance['image_alt'];

   echo $before_widget;
   // Display the widget
   echo '<div class="col4 product margin0">';

   if ( $product_link ) {
   		echo '<a class="product__link" href="' . $product_link . '"></a>';
   }

   if ( $image ) {
      echo  '<div class="product__image" style="background-image:url(' . $image . ');"></div>';
   }

   if ( $title ) {
      echo '<header class="product__header"><h3>' . $title . '</h3></header>';
   }

   echo '</div>';
   echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("damsons_products_plugin");'));

/**

CARD WIDGET 

**/

// Creating the widget 
class damsons_cards_plugin extends WP_Widget {
// constructor
	function damsons_cards_plugin() {
		parent::WP_Widget(false, $name = __('Damsons Card', 'damsons_cards_plugin') );

		add_action('admin_enqueue_scripts', array($this, 'photo_upload_option'));
	}

	function photo_upload_option($hook) {
	    if( $hook != 'widgets.php' ) 
	        return;
	    //enque Javasript Media API
	    wp_enqueue_media();
	    wp_enqueue_script( 'uploadphoto', get_template_directory_uri() . '/assets/js/upload_image.js', array('jquery'), '1.0', 'true' );
	}

	// widget form creation
	function form($instance) {	
		// Check values
	if( $instance) {
	     $title = esc_attr($instance['title']);
	     $subtitle = esc_attr($instance['subtitle']);
	     $card_link = esc_attr($instance['card_link']);
	     $button_text = esc_attr($instance['button_text']);
	     $image_alt = esc_attr($instance['image_alt']);
	} else {
	     $title = '';
	     $subtitle = '';
	     $card_link = '';
	     $button_text = '';
	     $image_alt = '';
	}

	$image = '';
        if(isset($instance['image'])) {
            $image = $instance['image'];
        }

	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Card Title', 'damsons_cards_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<p>
    <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Card Image:' ); ?></label>
    <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat image1" type="text" size="36"  value="<?php echo $instance['image']; ?>" />
    <input class="upload_card_image" type="button" value="Upload Image" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_name( 'image_alt' ); ?>"><?php _e( 'Card Image Alt Text:' ); ?></label>
    <input name="<?php echo $this->get_field_name( 'image_alt' ); ?>" id="<?php echo $this->get_field_id( 'image_alt' ); ?>" class="widefat image1_alt" type="text" size="36"  value="<?php echo $instance['image_alt']; ?>" />
    </p>

	<p>
	<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Subtitle:', 'damsons_cards_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" />
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e('Button Text:', 'damsons_cards_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('card_link'); ?>"><?php _e('Card URL:', 'damsons_cards_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('card_link'); ?>" name="<?php echo $this->get_field_name('card_link'); ?>" type="text" value="<?php echo $card_link; ?>" />
	</p>

	<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
	$instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['subtitle'] = strip_tags($new_instance['subtitle']);
      $instance['image'] = strip_tags($new_instance['image']);
      $instance['button_text'] = strip_tags($new_instance['button_text']);
      $instance['card_link'] = strip_tags($new_instance['card_link']);
      $instance['image_alt'] = strip_tags($new_instance['image_alt']);

     return $instance;
	}

	// widget display
	function widget($args, $instance) {
	extract( $args );

   $title = apply_filters('widget_title', $instance['title']);
   $subtitle = $instance['subtitle'];
   $image = $instance['image'];
   $button_text = $instance['button_text'];
   $card_link = $instance['card_link'];
   $image_alt = $instance['image_alt'];

   echo $before_widget;
   // Display the widget
   echo '<div class="promo">';

   if ( $card_link ) {
   		echo '<a class="promo__link" href="' . $card_link . '"></a>';
   }

   if ( $title ) {
      echo '<header class="promo__header"><h3>' . $title . '</h3></header>';
   }

   if ( $image ) {
      echo  '<img alt="'. $image_alt .'" class="promo__image" src="' . $image . '">';
   }

   if( $subtitle ) {
      echo '<div class="promo__content"><p>'.$subtitle.'</p>';
   }

   if( $button_text ) {
     echo '<button class="button button--yellow button--promo">'.$button_text.'<i class="fa fa-chevron-right" aria-hidden="true"></i></button></div>';
   }

   echo '</div>';
   echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("damsons_cards_plugin");'));


/**

TESTIMONIALS WIDGET 

**/

// Creating the widget 
class damsons_test_plugin extends WP_Widget {
// constructor
	function damsons_test_plugin() {
		parent::WP_Widget(false, $name = __('Damsons Testimonials', 'damsons_test_plugin') );

		add_action('admin_enqueue_scripts', array($this, 'photo_upload_option'));
	}

	function photo_upload_option($hook) {
	    if( $hook != 'widgets.php' ) 
	        return;
	    //enque Javasript Media API
	    wp_enqueue_media();
	    wp_enqueue_script( 'uploadphoto', get_template_directory_uri() . '/assets/js/upload_image.js', array('jquery'), '1.0', 'true' );
	}

	// widget form creation
	function form($instance) {	
		// Check values
	if( $instance) {
	     $name = esc_attr($instance['name']);
	     $age = esc_attr($instance['age']);
	     $place = esc_attr($instance['place']);
	     $testimonial = esc_textarea($instance['testimonial']);
	} else {
	     $name = '';
	     $age = '';
	     $place = '';
	     $testimonial = '';
	}

	$icon = '';
        if(isset($instance['icon'])) {
            $image = $instance['icon'];
        }

	?>

	<p>
    <label for="<?php echo $this->get_field_name( 'icon' ); ?>"><?php _e( 'Testimonial Icon:' ); ?></label>
    <input name="<?php echo $this->get_field_name( 'icon' ); ?>" id="<?php echo $this->get_field_id( 'icon' ); ?>" class="widefat image1" type="text" size="36"  value="<?php echo $instance['icon']; ?>" />
    <input class="upload_card_image" type="button" value="Upload Icon" />
    </p>

	<p>
	<label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name:', 'damsons_test_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" />
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('age'); ?>"><?php _e('Age:', 'damsons_test_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('age'); ?>" name="<?php echo $this->get_field_name('age'); ?>" type="text" value="<?php echo $age; ?>" />
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('place'); ?>"><?php _e('Place:', 'damsons_test_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('place'); ?>" name="<?php echo $this->get_field_name('place'); ?>" type="text" value="<?php echo $place; ?>" />
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('testimonial'); ?>"><?php _e('Testimonial:', 'damsons_test_plugin'); ?></label>
	<textarea class="widefat" style="display:block;" id="<?php echo $this->get_field_id('testimonial'); ?>" name="<?php echo $this->get_field_name('testimonial'); ?>"><?php echo $testimonial; ?></textarea>
	</p>

	<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
	$instance = $old_instance;
      // Fields
      $instance['name'] = strip_tags($new_instance['name']);
      $instance['icon'] = strip_tags($new_instance['icon']);
      $instance['age'] = strip_tags($new_instance['age']);
      $instance['place'] = strip_tags($new_instance['place']);
      $instance['testimonial'] = strip_tags($new_instance['testimonial']);

     return $instance;
	}

	// widget display
	function widget($args, $instance) {
	extract( $args );

   $name = $instance['name'];
   $icon = $instance['icon'];
   $age = $instance['age'];
   $place = $instance['place'];
   $testimonial = $instance['testimonial'];

   echo $before_widget;
   // Display the widget
   echo '<div class="col6 testimonial">';

   if ( $icon ) {
      echo  '<header class="testimonial__header"><img class="testimonial__icon" src="' . $icon . '">';
   }

   if ( $name ) {
      echo '<div class="testimonial__details"><h4>'.$name.'</h4>';
   }

  if ( $name && $age ) {
      echo '<h4>'.$name.', '.$age.'</h4>';
  }

  if ( $place ) {
      echo '<h4>'.$place.'</h4></div></header>';
  }

  if ( $testimonial ) {
   	  echo '<div class="testimonial__content"><p>' . $testimonial . '</p></div>';
  }

   echo '</div>';
   echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("damsons_test_plugin");'));

/**

PRODUCTS WIDGET 

**/

// Creating the widget 
class damsons_request_plugin extends WP_Widget {
// constructor
	function damsons_request_plugin() {
		parent::WP_Widget(false, $name = __('Damsons Request Box', 'damsons_request_plugin') );

		add_action('admin_enqueue_scripts', array($this, 'photo_upload_option'));
	}

	function photo_upload_option($hook) {
	    if( $hook != 'widgets.php' ) 
	        return;
	    //enque Javasript Media API
	    wp_enqueue_media();
	    wp_enqueue_script( 'uploadphoto', get_template_directory_uri() . '/assets/js/upload_image.js', array('jquery'), '1.0', 'true' );
	}

	// widget form creation
	function form($instance) {	
		// Check values
	if( $instance) {
	     $textarea = esc_textarea($instance['textarea']);
	     $button_text = esc_attr($instance['button_text']);
	     $button_class = esc_attr($instance['button_class']);
	} else {
	     $textarea = '';
	     $button_text = '';
	     $button_class = '';
	}

	?>

	<p>
	<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Text:', 'damsons_request_plugin'); ?></label>
	<textarea class="widefat" style="display:block;" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e('Button Text:', 'damsons_request_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
	</p>

	
	<p>
	<label for="<?php echo $this->get_field_id('button_class'); ?>"><?php _e('Button Class:', 'damsons_request_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('button_class'); ?>" name="<?php echo $this->get_field_name('button_class'); ?>" type="text" value="<?php echo $button_class; ?>" />
	</p>
	<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
	$instance = $old_instance;
      // Fields
      $instance['textarea'] = strip_tags($new_instance['textarea']);
      $instance['button_text'] = strip_tags($new_instance['button_text']);
      $instance['button_class'] = strip_tags($new_instance['button_class']);

     return $instance;
	}

	// widget display
	function widget($args, $instance) {
	extract( $args );

   $textarea = $instance['textarea'];
   $button_text = $instance['button_text'];
   $button_class = $instance['button_class'];

   echo $before_widget;
   // Display the widget
   echo '';

   if ( $textarea && $button_text && $button_class ) {
   		echo '<p>' . $textarea . ' <button data-request-name="request-callback" class="button '. $button_class .'">'.$button_text.' <i class="fa fa-chevron-right" aria-hidden="true"></i></button></p>';
   }

   echo '';
   echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("damsons_request_plugin");'));

function infobox($params,$content=null){
    return '<div class="box__info"><p>'.do_shortcode($content).'</p></div>';
}
add_shortcode("infobox", "infobox");

function col($params,$content=null){
    extract(shortcode_atts(array(
    	'align' => '',
    	'margin' => '',
        'no' => ''
    ), $params));
    return '<div class="col'.$no.' margin'.$margin.' '.$align.'">'.do_shortcode($content).'</div>';
}
add_shortcode("col", "col");

function box($params,$content=null){
    extract(shortcode_atts(array(
    	'class' => '',
    ), $params));
    return '<div class="box '.$class.'">'.do_shortcode($content).'</div>';
}
add_shortcode("box", "box");

function col_wrapper($atts,$content,$tag){
	
	//collect values, combining passed in values and defaults
	$values = shortcode_atts(array(
		'align-items' => '',
		'no-flex' => '',
		'no-wrap' => ''
	),$atts);  
	
	
	//based on input determine what to return
	$output = '';
	if($values['align-items'] == 'center'){
		$output = '<div class="col"><div class="col__wrapper col__wrapper--center">'.do_shortcode($content).'</div></div>';
	}
	else if($values['no-wrap'] == 'true'){
		$output = '<div class="col"><div class="col__wrapper col__nowrap">'.do_shortcode($content).'</div></div>'; 
	}
	else if($values['no-flex'] == 'true'){
		$output = '<div class="col"><div class="col__wrapper col_noflex">'.do_shortcode($content).'</div></div>'; 
	}
	else{
		$output = '<div class="col"><div class="col__wrapper">'.do_shortcode($content).'</div></div>'; 
	}
	
	return $output;
	
}
add_shortcode('col_wrapper','col_wrapper');

function banner($atts,$content,$tag){
	
	$values = shortcode_atts(array(
		'title' => '',
		'text' => '',
		'button_url' => '',
		'button_text' => '',
		'width' => ''
	),$atts);  
	
	
	//based on input determine what to return
	$output = '';
	if($values['width'] == 'full'){
		$output = '<div class="request width100"><div class="request__contain request__wrapper"><span>'.do_shortcode($content).'</span></div></div>';
	} else {
		$output = '<div class="request widthContain"><div class="request__contain request__wrapper"><p>'.do_shortcode($content).'</p></div></div>';
	}
	
	return $output;
	
}
add_shortcode('banner','banner');

// Add Shortcode
function banner_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'title' => '',
			'text' => '',
			'button_url' => '',
			'button_text' => '',
		),
		$atts,
		'banner'
	);

	// Return custom embed code
	return '<div class="request widthContain"><div class="request__contain request__flex"><span>
	         <h2>' . $atts['title'] . '</h2>
	         <p>' . $atts['text'] . '</p></span>
	         <a href="' . $atts['button_url'] . '">
	         <button class="button button--green button--request">' . $atts['button_text'] . ' <i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>
	         </div></div>';

}
add_shortcode( 'banner', 'banner_shortcode' );

function the_content_filter($content) {
    $block = join("|",array("col_wrapper", "col", "col_noflex"));
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
return $rep;
}
add_filter("the_content", "the_content_filter");


function ajax_search_enqueues() {
    if (is_search()) {        
        wp_enqueue_script('ajax-search', get_stylesheet_directory_uri() . '/assets/js/ajax-search.js', array('jquery'), '1.0.0', true);
        wp_localize_script('ajax-search', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
}

add_action('wp_enqueue_scripts', 'ajax_search_enqueues');

add_filter( 'the_posts', function( $posts, $q ) 
{
    if(     $q->is_main_query()  // Targets the main query only
         && $q->is_search() // Only targets the search page
    ) {

        usort( $posts, function( $a, $b )
      {
            $post_types = array ( // Set your post type order here
                'post' => 1,
                'pages' => 2,
                'faq' => 3
            );

            $posts = $post_types[$a->post_type] - $post_types[$b->post_type];

            if ($posts === 0) {
                //same post_type, compare by post_date.
                return $a->post_date < $b->post_date;
            }else{
                //different post_type, save to ignore the post_date.
                return $posts;
            }
        } );
    } 
    return $posts;  
}, 
10, 2 );

add_action( 'wp_ajax_load_search_results', 'load_search_results' );
add_action( 'wp_ajax_nopriv_load_search_results', 'load_search_results' );

function load_search_results() {
	global $post;
    $query = $_POST['query'];
    $args = array(
        's' => $query
    );

    $search = new WP_Query( $args );
    ob_start(); ?>

    <?php if ( $search->have_posts() ) {
		echo "<div class=\"search--container\"><div class=\"col col--search\"><h2>Articles</h2><div class=\"col__wrapper\">";
    while( $search->have_posts() ) {
        $search->the_post();
        if ( $post->post_type == 'post' ) {
            get_template_part( 'parts/post', get_post_format() );
        }
    } echo "</div></div></div>";

    rewind_posts(); // rewind loop so we can rerun it
    	echo "<div class=\"search--container\"><div class=\"col col--search\"><h2>Pages</h2><div class=\"col__wrapper\">";
    while( $search->have_posts() ) { // Start second while loop
        $search->the_post();
        if ( $post->post_type == 'page' ) {
            get_template_part( 'parts/page', get_post_format() );
        }

    } echo "</div></div></div>";

    rewind_posts(); // rewind loop so we can rerun it
    	echo "<div class=\"search--container\"><div class=\"col col--search\"><h2>Frequently Asked Questions</h2><div class=\"col__wrapper\">";
    while( $search->have_posts() ) { // Start second while loop
        $search->the_post();
        if ( $post->post_type == 'faq' ) {
            get_template_part( 'parts/faq', get_post_format() );
        }

    } echo "</div></div></div>";

    // Run your third while loop for blog posts

} else {
	echo "<div class=\"search__none\"><h2>Nothing found matching $query...</h2></div>";
	} ?>

    <?php $content = ob_get_clean(); echo $content; 

    die(); 
}

function include_file($atts) {
     $a = shortcode_atts( array(
        'slug' => 'NULL',
       ), $atts );

      if($slug != 'NULL'){
        ob_start();
        get_template_part($a['slug']);
        return ob_get_clean();
      }
 }
 add_shortcode('include', 'include_file');

 function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}