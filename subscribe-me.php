<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mithilesh.wisdmlabs.net/
 * @since             1.0.0
 * @package           Subscribe_Me
 *
 * @wordpress-plugin
 * Plugin Name:       Subscribe Me
 * Plugin URI:        https://localhost:10065/subscribe-me
 * Description:       This plugin is useful for admins to add a shortcode to their site page to display a newsletter subscription form and maintain and monitor their subscribers.
 * Version:           1.0.0
 * Author:            Mithilesh
 * Author URI:        https://mithilesh.wisdmlabs.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       subscribe-me
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('SUBSCRIBE_ME_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-subscribe-me-activator.php
 */
function activate_subscribe_me()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-subscribe-me-activator.php';
	Subscribe_Me_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-subscribe-me-deactivator.php
 */
function deactivate_subscribe_me()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-subscribe-me-deactivator.php';
	Subscribe_Me_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_subscribe_me');
register_deactivation_hook(__FILE__, 'deactivate_subscribe_me');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-subscribe-me.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

// $CUSTOM

// Add a shortcode to display the form
function subscribe_me__shortcode()
{
	// Code to generate the form HTML goes here
	$form_html = '<form class="subscribe-me-form" method="post">
                      <legend>Subscribe to Newsletter</legend>
                      <label for="name">Name</label>
                      <input type="text" id="name" name="name">
                      <br>
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email">
                      <br>
                      <input class="btn" type="submit" value="Submit">
                  </form>';

	// Return the form HTML
	return $form_html;
}

add_shortcode('subscribe-me', 'subscribe_me__shortcode');

function run_subscribe_me()
{

	$plugin = new Subscribe_Me();
	$plugin->run();
}
run_subscribe_me();
