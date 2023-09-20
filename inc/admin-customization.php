<?php
/**
 *************** Admin Customization Features ***************
 * 
 * Section 1: Login Page Customization
 * Section 2: Dashboard Widget Customization
 * Section 3: Dashboard Menu Customization
 * 
 * 
 * 
 * 
 */

 /**
  *************** Section 1: Login Page Customization ***************
  * Source: https://codex.wordpress.org/Customizing_the_Login_Form
  *
  */

 // Replaces the WordPress logo with your own custom logo
 // Note: you must add your own logo to an "images" folder within your theme. Adjust CSS values accordingly
 function citc_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/images/logo-vector.png);
		height:140px;
		width:320px;
		background-size: 140px 140px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'citc_login_logo' );


// Changes the logo link so that it points to your site, instead of wordpress.org
function citc_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'citc_login_logo_url' );

function citc_login_logo_url_title() {
    return 'Candy in the Cove - Home';
}
add_filter( 'login_headertext', 'citc_login_logo_url_title' );


// Links your own custom CSS stylesheet for the login page
// function citc_login_stylesheet() {
//     wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css' );
// }
// add_action( 'login_enqueue_scripts', 'citc_login_stylesheet' );


 /**
  *************** Section 2: Dashboard Widget Customization ***************
  * Source: https://developer.wordpress.org/apis/dashboard-widgets/
  *
  */

// Removes unnecessary dashboard widgets
function citc_remove_dashboard_widget() {

	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
  remove_meta_box( 'health_check_status', 'dashboard', 'normal' );

} 
add_action( 'wp_dashboard_setup', 'citc_remove_dashboard_widget' );

//// Defines the content of a new custom dashboard widget
// function citc_dashboard_widget_function( $post, $callback_args ) {
// 	echo '<pre>' . print_r( $GLOBALS[ 'menu' ], true) . '</pre>';
// }

// function citc_add_dashboard_widgets() {
// 	wp_add_dashboard_widget( 'dashboard_widget', "Dashboard Menu Array Data", 'citc_dashboard_widget_function' );
// }
// add_action( 'wp_dashboard_setup', 'citc_add_dashboard_widgets' );



 /**
  *************** Section 3: Dashboard Menu Customization ***************
  * Source: https://developer.wordpress.org/themes/functionality/administration-menus/
  *
  */

// Establishes a custom admin menu order
function citc_custom_menu_order( $menu_ord ) {

  if ( !$menu_ord ) return true;

  return array(
    'index.php',                     // Dashboard
    'separator1',                    // First separator
    'edit.php?post_type=page',       // Pages
    'edit.php?post_type=citc-hours', // Hours
    'upload.php',                    // Images
  );
}
add_filter( 'custom_menu_order', 'citc_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'citc_custom_menu_order', 10, 1 );

function citc_custom_admin_menu_changes() {

  //// Renames the "Media" menu item
  global $menu;
  $menu[4][0] = 'Images';

  //// Removes some unnecessary menu items
  remove_menu_page( 'edit.php' );
  remove_menu_page( 'edit-comments.php' );

}
add_action( 'admin_init', 'citc_custom_admin_menu_changes' );
?>