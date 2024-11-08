<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           FPR_Chris_Force_Password_Reset
 *
 * @wordpress-plugin
 * Plugin Name:       Force Password Reset
 * Plugin URI:        #
 * Description:       This plugin is designed to remind WordPress users to reset their password after certain number of days.
 * Version:           4.3.2
 * Author:            Christian Nwachukwu
 * Author URI:        https://lets-talk.netlify.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chris-force-password-reset
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FPR_PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-chris-force-password-reset-activator.php
 */
function fpr_activate_chris_force_password_reset() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chris-force-password-reset-activator.php';
	FPR_Chris_Force_Password_Reset_Activator::fpr_activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-chris-force-password-reset-deactivator.php
 */
function fpr_deactivate_chris_force_password_reset() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chris-force-password-reset-deactivator.php';
	FPR_Chris_Force_Password_Reset_Deactivator::fpr_deactivate();
}

register_activation_hook( __FILE__, 'fpr_activate_chris_force_password_reset' );
register_deactivation_hook( __FILE__, 'fpr_deactivate_chris_force_password_reset' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-chris-force-password-reset.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function fpr_run_chris_force_password_reset() {

	$plugin = new FPR_Chris_Force_Password_Reset();
	$plugin->fpr_run_main();

}

fpr_run_chris_force_password_reset();
