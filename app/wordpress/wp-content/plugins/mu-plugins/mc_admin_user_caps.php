<?php
/**
 * Plugin Name: Allow admin to edit users
 * Plugin URI: https://codex.wordpress.org/Must_Use_Plugins
 * Description: Allow admin to edit users
 * Version: 0.1
 * Author: Smartella
 * Author URI: http://smartella.co.uk
 */


//Add edit user capability to site admins
function mc_admin_users_caps( $caps, $cap, $user_id, $args ){

  foreach( $caps as $key => $capability ){

    if( $capability != 'do_not_allow' )
    continue;

    switch( $cap ) {
      case 'edit_user':
      case 'edit_users':
      $caps[$key] = 'edit_users';
      break;
      case 'delete_user':
      case 'delete_users':
      $caps[$key] = 'delete_users';
      break;
      case 'create_users':
      $caps[$key] = $cap;
    }
  }

  return $caps;
}
add_filter( 'map_meta_cap', 'mc_admin_users_caps', 1, 4 );
remove_all_filters( 'enable_edit_any_user_configuration' );
add_filter( 'enable_edit_any_user_configuration', '__return_true');

/**
* Checks that both the editing user and the user being edited are
* members of the blog and prevents the super admin being edited.
*/
function mc_edit_permission_check() {
  global $current_user, $profileuser;

  $screen = get_current_screen();

  wp_get_current_user();

  if( ! is_super_admin( $current_user->ID ) && in_array( $screen->base, array( 'user-edit', 'user-edit-network' ) ) ) { // editing a user profile
    if ( is_super_admin( $profileuser->ID ) ) { // trying to edit a superadmin while less than a superadmin
      wp_die( __( 'You do not have permission to edit this user.' ) );
    } elseif ( ! ( is_user_member_of_blog( $profileuser->ID, get_current_blog_id() ) && is_user_member_of_blog( $current_user->ID, get_current_blog_id() ) )) { // editing user and edited user aren't members of the same blog
      wp_die( __( 'You do not have permission to edit this user.' ) );
    }
  }

}
add_filter( 'admin_head', 'mc_edit_permission_check', 1, 4 );

/**
* Add New Course Link to New Menu in admin bar
*/
function add_new_course_link($wp_admin_bar) {
    $args = array(
        'id' => 'new-course',
        'title' => 'Course',
        'parent' => 'new-content',
        'href' => admin_url('post-new.php?post_type=product&product-type=mdl_course')
    );
    $wp_admin_bar->add_node($args);
}

add_action('admin_bar_menu', 'add_new_course_link', 100);
