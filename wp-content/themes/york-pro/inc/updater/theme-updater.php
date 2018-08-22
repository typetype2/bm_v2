<?php
/**
 * EDD SL Theme Updater
 *
 * @subpackage  Inc/Updater
 */



// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}



// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'http://themebeans.com', // Site where EDD is hosted
		'item_name' => 'York Pro', // Name of theme
		'theme_slug' => 'york-pro', // Theme slug
		'version' => YORK_VERSION, // The current version of this theme
		'author' => 'ThemeBeans', // The author of this theme
		'download_id' => '105665', // Optional, used for generating a license renewal link
		'renew_url' => '' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license' => esc_html__( 'Activate your theme license.', 'york-pro' ),
		'enter-key' => __( 'Add your license key to get theme updates without leaving your dashboard and to access support. Locate your license key in your ThemeBeans account dashboard and on your purchase receipt.<br><br>Enter your license key below:', 'york-pro' ),
		'license-key' => esc_html__( 'License Key', 'york-pro' ),
		'license-action' => esc_html__( 'License Action', 'york-pro' ),
		'enter-license-label' => esc_html__( '', 'york-pro' ),
		'deactivate-license' => esc_html__( 'Deactivate License', 'york-pro' ),
		'reload-button' => esc_html__( 'Reload', 'york-pro' ),
		'activate-license' => esc_html__( 'Activate License', 'york-pro' ),
		'reactivate-button' => esc_html__( 'Reactivate License', 'york-pro' ),
		'status-unknown' => esc_html__( 'License status is unknown.', 'york-pro' ),
		'renew' => esc_html__( 'renew your theme license.', 'york-pro' ),
		'renew-after' => esc_html__( 'After completing the renewal, click the Reload button below.', 'york-pro' ),
		'renew-button' => esc_html__( 'Renew your License &rarr;', 'york-pro' ),
		'unlimited' => esc_html__( 'unlimited', 'york-pro' ),
		'license-key-is-active%s' => esc_html__( 'Seamless theme updates and support has been enabled for %s. You will receive a notice in your dashboard when an update is available.', 'york-pro' ),
		'expires%s' => esc_html__( 'Your theme license expires on %s.', 'york-pro' ),
		'%1$s/%2$-sites' => esc_html__( 'You have %1$s / %2$s sites activated.', 'york-pro' ),
		'license-key-expired-%s' => esc_html__( 'Your license key expired on %s. In order to access support and seamless updates, you need to', 'york-pro' ),
		'license-key-expired' => esc_html__( 'License key has expired.', 'york-pro' ),
		'license-keys-do-not-match' => esc_html__( 'This is not a valid license key. Please try again.', 'york-pro' ),
		'license-is-inactive' => esc_html__( 'License is inactive.', 'york-pro' ),
		'license-key-is-disabled' => esc_html__( 'License key is disabled.', 'york-pro' ),
		'site-is-inactive' => esc_html__( 'Site is inactive.', 'york-pro' ),
		'license-status-unknown' => esc_html__( 'License status is unknown.', 'york-pro' ),
		'update-notice' => esc_html__( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'york-pro' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" title="%4s" target="blank">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'york-pro' )
	)

);