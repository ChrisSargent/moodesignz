<?php


// ***************************** Swapping Servers *******************************

// update_option( 'siteurl', 'http://www.moodesignz.com' );
// update_option( 'home', 'http://www.moodesignz.com' );

// update_option('siteurl', 'http://moodesignz.dev/wordpress/');
// update_option('home', 'http://moodesignz.dev/wordpress/');

// ******************************* Theme Support *******************************

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// ******************************* Register Menus *******************************

function moo_register_menus()
{
    register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
      'footer-menu-1' => __('Footer Menu 1'),
      'footer-menu-2' => __('Footer Menu 2'),
    )
  );
}
add_action('init', 'moo_register_menus');

// **************************** Add 'Contact Us' *****************************

function moo_custom_menu_item ( $items, $args ) {
    if ($args->theme_location == 'header-menu') {
        $homeURL = esc_url( home_url( '/' ));
        $items .= '<li><a href="' . $homeURL . '#your-project">Contact Us</a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'moo_custom_menu_item', 10, 2 );

// ************* Change the default placeholder text for new posts *************

function moo_change_placeholder($title)
{
    $screen = get_current_screen();
    if (isset($screen->post_type)) {
        if ('rooms' == $screen->post_type) {
            $title = 'Room Type';
        }
        if ('projects' == $screen->post_type) {
            $title = 'Project Name';
        }
    }

    return $title;
}
add_filter('enter_title_here', 'moo_change_placeholder');

// ****************************** Excerpts Setup *******************************

function moo_custom_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'moo_custom_excerpt_length', 999);

function moo_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'moo_excerpt_more');

function moo_add_class_to_excerpt($excerpt)
{
    return str_replace('<p', '<p class="moo-tile__excerpt--news"', $excerpt);
}
add_filter('the_excerpt', 'moo_add_class_to_excerpt');

// ****************************** Image Sizes **********************************

add_image_size('hero', 1600, 9999);

function moo_custom_sizes($sizes)
{
    return array_merge($sizes, array(
        'hero' => __('Hero Image'),
    ));
}

add_filter('image_size_names_choose', 'moo_custom_sizes');

// **************************** Custom Options *********************************

if (function_exists('acf_add_options_page')) {
    acf_add_options_page('Site Settings');
}

// ************************ Fetch Images with Fallbacks ************************

function moo_get_hero($postID)
{
    $hero = wp_get_attachment_image_src(get_post_thumbnail_id($postID), 'hero')[0];
    if (empty($hero)) {
        $frontpage_id = get_option('page_on_front');
        $hero = wp_get_attachment_image_src(get_post_thumbnail_id($frontpage_id), 'hero')[0];
    };

    return $hero;
}

function moo_get_lb_url($imageID)
{
    $imageURL = wp_get_attachment_image_src($imageID, 'hero')[0];

    return $imageURL;
}

function moo_get_tilebg($postID)
{
    $tilebg = wp_get_attachment_image_src(get_post_thumbnail_id($postID), 'large')[0];

    return $tilebg;
}

function prettyPrint($a)
{
    echo '<pre>'.print_r($a, 1).'</pre>';
}

// ********************** Style sheets and scripts loading **********************

function moo_resources()
{
    global $pagenow;
    if ( !is_admin() && 'wp-login.php' != $pagenow ) {
        // Don't load for admin pages
        wp_enqueue_style('moo_ui', get_template_directory_uri().'/css/moo_ui.css');
        wp_enqueue_script('moo_scripts', get_template_directory_uri().'/moo_scripts.min.js', array('jquery'), false, true);
    }
}
add_action('wp_enqueue_scripts', 'moo_resources');


// ************************ Add Open Graph Information *************************

function moo_get_og_excerpt($this_post){
    $the_excerpt = $this_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $the_excerpt = htmlentities($the_excerpt, null, 'utf-8');
    $the_excerpt = str_replace("&nbsp;", " ", $the_excerpt);
    $the_excerpt = sanitize_text_field($the_excerpt);
    $the_excerpt = esc_attr($the_excerpt);
    $the_excerpt = substr($the_excerpt, 0, 140);
    if(empty($the_excerpt)) {
      $the_excerpt = get_bloginfo('description');
    }

    return $the_excerpt;
}

// Remove Comments and Posts Tab from admin page.
add_action('admin_menu', 'aqvaluxe_custom_admin_tabs');
function aqvaluxe_custom_admin_tabs()
{
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
}

// Remove unnecessary parts from the standard wp header
remove_action('wp_head', 'rsd_link'); // Weblog Client Link
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer Manifest Link
remove_action('wp_head', 'wp_shortlink_wp_head'); // WordPress Shortlinks
remove_action('wp_head', 'wp_generator'); // WordPress Generator
remove_action('wp_head', 'print_emoji_detection_script', 7); // Emoticons shit
remove_action('wp_print_styles', 'print_emoji_styles'); // Emoticons shit
