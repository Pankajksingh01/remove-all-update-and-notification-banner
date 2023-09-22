define( 'AUTOMATIC_UPDATER_DISABLED', true ); in wp-config adding this code remove all update and notification banner
function remove_core_updates() {
    if (!current_user_can('update_core')) {
        return;
    }
    add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
    add_filter('pre_option_update_core', '__return_null');
    add_filter('pre_site_transient_update_core', '__return_null');
}
 
add_action('after_setup_theme', 'remove_core_updates');