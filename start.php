<?php
/*
 *
 * My Friends Widget
 *
 * @author RiverVanRain
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 * @copyright (c) weborganiZm 2k14
 *
 * @link http://weborganizm.org/crewz/p/1983/personal-net
 *
 */
elgg_register_event_handler('init', 'system', 'my_friends_init');

function my_friends_init() {
    elgg_unregister_widget_type('friends', elgg_echo('friends'), elgg_echo('friends:widget:description'));
	elgg_register_widget_type("my_friends", elgg_echo("widgets:my_friends:title"), elgg_echo("widgets:my_friends:description"), "profile", false);
	
	elgg_extend_view('css/elgg', 'my_friends/css');
}