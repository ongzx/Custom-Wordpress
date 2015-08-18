<?php

//************************************************//
// -> START Redux embed
//************************************************//

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}

if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/config/sample-config.php' );
}

add_action( 'after_setup_theme', 'theme_setup' );

if ( ! function_exists( 'theme_setup' ) ):
    function theme_setup() {
        register_nav_menu( 'primary', __( 'Primary navigation', 'theme-menu' ) );
    } endif;

require_once(dirname( __FILE__ ) . '/includes/template/wp_bootstrap_navwalker.php');

//************************************************//
// -> START enqueing required styles and scripts
//************************************************//

function load_scripts()
{
	wp_register_style('reset', get_template_directory_uri() . '/includes/css/reset.min.css', null, null, null);
	wp_register_style('bootstrap-style', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', null, null, null);
	wp_register_style('mailchimp', '//cdn-images.mailchimp.com/embedcode/slim-081711.css', null, null, null);
	wp_register_style('slick', '//cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css', null, null, null);
	wp_register_style('slick-theme', get_template_directory_uri() . '/includes/css/slick-theme.css', null, null, null);
	wp_register_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css', null, null, null);
	wp_register_style('mobile-style', get_template_directory_uri() . '/includes/css/mobile-style.css', null, null, null);
	wp_register_style('main', get_template_directory_uri() . '/style.css', null, null, null);
  wp_register_style('main-mobile', get_template_directory_uri() . '/style-mobile.css', null, null, null);

	wp_register_script( 'bootstrap-script', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array( 'jquery' ), null, null );
	wp_register_script( 'slick-script', '//cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js', array( 'jquery' ), null, null );
	wp_register_script( 'slick-slider', get_template_directory_uri(). '/includes/js/slick-slider.js', array( 'jquery' ), null, null );
	// wp_register_script( 'instafeed', get_template_directory_uri(). '/includes/js/vendor/instafeed.min.js', array( 'jquery' ), null, null );
	wp_register_script( 'hiro-player-init', '//tag.mothernist.hiro.tv/premium/scripts_test/hiro_dynamic_player.js?config=conf1&amp;autoInit=false', array( 'jquery' ), null, null );
	wp_register_script( 'hiro-player', get_template_directory_uri(). '/includes/js/hiro-player.js', array( 'jquery' ), null, null );
	wp_register_script( 'main', get_template_directory_uri(). '/includes/js/main.js', array( 'jquery' ), null, null );

	wp_enqueue_style( 'reset' );
	wp_enqueue_style( 'bootstrap-style' );
	wp_enqueue_style( 'mailchimp' );
	wp_enqueue_style( 'slick' );
	wp_enqueue_style( 'slick-theme' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'mobile-style' );
	wp_enqueue_style( 'main' );
  wp_enqueue_style( 'main-mobile' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap-script' );
	wp_enqueue_script( 'hiro-player-init' );
	wp_enqueue_script( 'hiro-player' );
	wp_enqueue_script( 'slick-script' );
	wp_enqueue_script( 'slick-slider' );
	// wp_enqueue_script( 'instafeed' );
	wp_enqueue_script( 'main' );
}

add_action( 'wp_enqueue_scripts', 'load_scripts' );

//************************************************//
// -> START registering custom post types
//************************************************//
add_theme_support( 'post-thumbnails' );

add_action('init', 'article_register');
add_action('init', 'video_register');

function article_register() {

    $labels = array(
        'name' => _x('Article', 'post type general name'),
        'singular_name' => _x('Article', 'post type singular name'),
        'add_new' => _x('Add New', 'Article'),
        'add_new_item' => __('Add New Article'),
        'edit_item' => __('Edit Article'),
        'new_item' => __('New Article'),
        'view_item' => __('View Article'),
        'search_items' => __('Search Article'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array
    (
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => 'dashicons-format-aside',
        'rewrite' => array('slug' => 'articles','permastruct' => '/%category%/%postname%/'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'taxonomies' => array('category', 'post_tag'),
        'has_archive' => true,
        'supports' => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'tags',
			'revisions',
			'thumbnail',
			'author'
		),
		// 'cptp_permalink_structure' => '/%category%/%postname%/'
	);

    register_post_type( 'articles' , $args );
    flush_rewrite_rules();
    register_taxonomy_for_object_type( 'category', 'articles' );

}

function video_register() {

    $labels = array(
        'name' => _x('Video', 'post type general name'),
        'singular_name' => _x('video', 'post type singular name'),
        'add_new' => _x('Add New', 'Video'),
        'add_new_item' => __('Add New Video'),
        'edit_item' => __('Edit Video'),
        'new_item' => __('New Video'),
        'view_item' => __('View Video'),
        'search_items' => __('Search Video'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array
    (
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => 'dashicons-video-alt2',
        'rewrite' => array('slug' => 'videos','permastruct' => '/%category%/%postname%/'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'taxonomies' => array('category', 'post_tag') ,
        'menu_position' => 5,
        'has_archive' => true,
        'supports' => array(
			'title',
			'editor',
			'excerpt',
			'tags',
			'custom-fields',
			'revisions',
			'thumbnail',
			'author'
		),
		// 'cptp_permalink_structure' => '/%category%/%postname%/'
	);

    register_post_type( 'videos' , $args );
    flush_rewrite_rules();
    register_taxonomy_for_object_type( 'category', 'videos' );
}

//************************************************//
// -> START creating custom sidebars
//************************************************//

add_action( 'widgets_init', 'custom_sidebars_register' );

function custom_sidebars_register() {

	register_sidebar(
		array(
			'id' => 'sidebar',
			'name' => __( 'Sidebar' ),
			'description' => __( 'Place for widgets that will be shown on sidebar across pages.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>'
		)
	);
}

function register_footer_menu() {
  register_nav_menus(
    array(
      'new-menu' => __( 'Footer Menu' )
    )
  );
}

add_action( 'init', 'register_footer_menu' );


//************************************************//
// -> START custom widgets
//************************************************//
class Slick_Slider_Widget extends WP_Widget
{
    private $post_types = array();
    function __construct() {
        parent::WP_Widget(false, $name = 'Slick Slider');
    }

    function form($instance) {
        $title = esc_attr($instance['title']);
        $type = esc_attr($instance['post_type']);
        $num = (int)esc_attr($instance['num']);
        $this->post_types = get_post_types(array(
            '_builtin' => false,
        ) , 'names', 'or');
        $this->post_types['post'] = 'post';
        $this->post_types['page'] = 'page';
        ksort($this->post_types);
        echo "<p>";
        echo "<label for=\"" . $this->get_field_id('title') . "\">";
        echo _e('Title:');
        echo "</label>";
        echo "<input class=\"widefat\" id=\"" . $this->get_field_id('title') . "\" name=\"" . $this->get_field_name('title') . "\" type=\"text\" value=\"" . $title . "\" />";
        echo "</p>";
        echo "<p>";
        echo "<label for=\"" . $this->get_field_id('post_type') . "\">";
        echo _e('Post Type:');
        echo "</label>";
        echo "<select name = \"" . $this->get_field_name('post_type') . "\" id=\"" . $this->get_field_id('title') . "\" >";
        foreach ($this->post_types as $key => $post_type) {
            echo '<option value="' . $key . '"' . ($key == $type ? " selected" : "") . '>' . $key . "</option>";
        }

        echo "</select>";
        echo "</p>";
        echo "<p>";
        echo "<label for=\"" . $this->get_field_id('num') . "\">";
        echo _e('Number To show:');

        echo "</label>";
        echo "<input id = \"" . $this->get_field_id('num') . "\" class = \"widefat\" name = \"" . $this->get_field_name('num') . "\" type=\"text\" value =\"" . $num . "\" / >";
        echo "</p>";
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['num'] = (int)strip_tags($new_instance['num']);
        $instance['post_type'] = strip_tags($new_instance['post_type']);
        if ($instance['num'] < 1) {
            $instance['num'] = 10;
        }
        return $instance;
    }
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        wp_reset_query();
        wp_reset_postdata();
        global $wp_query;
        $old_query = $wp_query;
        $custom_query = new WP_Query(array(
            'post_type' => $instance['post_type'],
            'showposts' => $instance['num']
            // 'featured' => 'yes',
            // 'paged' => 1
        ));

        echo '<div class="widget-slider">';

        while ($custom_query->have_posts()) {
            $custom_query->the_post();

            //my custom overrides
            echo '<div class="widget-slider-content">';
            echo '<a href="'.get_the_permalink() .'">';
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
              the_post_thumbnail(array(300, 300), array('class' => 'img-responsive'));
            }
            echo '</a>';
            echo '<h2 class="contributor-title text-uppercase"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
            echo '</div>';

        }

        echo '</div>';

        wp_reset_query();
        wp_reset_postdata();
        $wp_query = $old_query;
        echo $after_widget;
        // outputs the content of the widget
    }
}

// Register and load the widget
function custom_load_widget() {
    register_widget( 'Slick_Slider_Widget' );
}

add_action( 'widgets_init', 'custom_load_widget' );

//************************************************//
// -> START general functionalities
//************************************************//

function is_subcategory (){
    $cat = get_query_var('cat');
    $category = get_category($cat);
    $category->parent;
    return ( $category->parent == '0' ) ? false : true;
}

function custom_link_overlay() {
    $post_type = get_post_type( get_the_ID());
    $html = '<div class="overlay img-responsive">';

    if ($post_type == 'videos')
    {
        $html .= '<label class="overlay-text">Watch Video</label>';
    }
    else if ($post_type == 'articles')
    {
        $html .= '<label class="overlay-text">Read Article</label>';
    }
    else
    {
        $html .= '<label class="overlay-text">&nbsp;</label>';
    }

    $html .= '</div>';

    return $html;
}


function get_theme_title() {

	global $theme_config;
	$site_title = "";

	if (isset($theme_config['opt-title']))
      $site_title = $theme_config['opt-title'];
    if (isset($theme_config['opt-subtitle']))
      $site_title = $site_title." | ".$theme_config['opt-subtitle'];

  	return $site_title;
}

function get_theme_description() {

	global $theme_config;
	$site_desc = "";

	if (isset($theme_config['opt-description']))
      $site_desc = $theme_config['opt-description'];

  	return $site_desc;
}

function get_theme_logo() {

	global $theme_config;
	$site_logo = "";

	if (isset($theme_config['opt-logo']['url']))
      $site_logo = $theme_config['opt-logo']['url'];

  	return $site_logo;
}

function get_theme_logo_footer() {
    global $theme_config;
    $footer_logo = "";

    if (isset($theme_config['opt-logo-footer']['url']))
      $footer_logo = $theme_config['opt-logo-footer']['url'];

    return $footer_logo;
}

function get_footer_copyright() {
    global $theme_config;

    $copyright = "";

    if (isset($theme_config['opt-footer-left']))
      $copyright = $theme_config['opt-footer-left'];

    return $copyright;

}

function get_social_link() {
    global $theme_config;

    $social_menu = "<ul class='footer-nav social-nav'>";

    if ($theme_config['opt-facebook']!= ''){
        $social_menu .="<li class='social-link'><a href='". $theme_config['opt-facebook']. "' target='_blank'><i class='fa fa-2x fa-facebook'></i></a></li>";
    }

    if ($theme_config['opt-twitter']!= '') {
        $social_menu .="<li class='social-link'><a href='". $theme_config['opt-twitter'].  "' target='_blank'><i class='fa fa-2x fa-twitter'></i></a></li>";
    }

    if ($theme_config['opt-pinterest'] != '') {
        $social_menu .="<li class='social-link'><a href='". $theme_config['opt-pinterest'].  "' target='_blank'><i class='fa fa-2x fa-pinterest'></i></a></li>";
    }

    if ($theme_config['opt-instagram'] != '') {
        $social_menu .="<li class='social-link'><a href='". $theme_config['opt-instagram'].  "' target='_blank'><i class='fa fa-2x fa-instagram'></i></a></li>";
    }

    if ($theme_config['opt-googleplus'] != '') {
        $social_menu .="<li class='social-link'><a href='". $theme_config['opt-googleplus'].  "' target='_blank'><i class='fa fa-2x fa-google-plus'></i></a></li>";
    }

    $social_menu .= '</ul>';

    return $social_menu;

}


//************************************************//
// -> START custom filter
//************************************************//

function theme_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'theme_wp_title', 10, 2 );

function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return $site_title." | ".$theme_config['opt-subtitle'];
  }
  return $title;
}

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );


function wptp_add_categories_to_attachments() {
      register_taxonomy_for_object_type( 'category', 'attachment' );
}

add_action( 'init' , 'wptp_add_categories_to_attachments' );


function my_query_post_type($query) {
    if ( is_category() &&  $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'video', 'attachment','videos','articles') );
    return $query;
}
add_filter('pre_get_posts', 'my_query_post_type');

// function show_all_contributors( $query ) {
//     if ( is_post_type_archive( 'contributors' ) ) {
//         $query->set( 'posts_per_page', -1 );
//     }
// }
// add_action( 'pre_get_posts', 'show_all_contributors' );
//

?>
