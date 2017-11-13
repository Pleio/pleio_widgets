<?php
/**
 * The main plugin file for Pleio Widgets
 */

/**
 * Init function for Pleio Widgets
 *
 * @return void
 */
function pleio_widgets_init() {
	require_once(elgg_get_plugins_path() . "widget_manager/widgets/rss/vendors/simplepie/autoloader.php");
	
	elgg_extend_view('css/elgg', 'pleio_widgets/css');
	
	elgg_register_widget_type('rss_news', elgg_echo('pleio_widgets:widgets:rss_news:title'), elgg_echo('pleio_widgets:widgets:rss_news:description'), 'index', true);
}

elgg_register_event_handler('init', 'system', 'pleio_widgets_init');
