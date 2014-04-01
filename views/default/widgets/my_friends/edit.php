<?php
/**
 * My Friends Widget options
 *
 */
$widget = $vars["entity"];

$noyes_options = array(
			'all' => elgg_echo('all'),
			'friends' => elgg_echo('friends'),
		    'followers' => elgg_echo('followers'),
);

if (!isset($widget->all_only)) {
	$widget->all_only = 'all';
}

$number_options = array(
			'yes' => elgg_echo('yes'),
			'no' => elgg_echo('friends:show_numbers:not'),
);

if (!isset($widget->show_numbers)) {
	$widget->show_numbers = 'yes';
}

if (!isset($vars['entity']->num_display)) {
	$vars['entity']->num_display = 10;
}

$params = array(
	'name' => 'params[num_display]',
	'value' => $vars['entity']->num_display,
	'options' => range(1, 24),
);
$display_dropdown = elgg_view('input/dropdown', $params);

if ($vars['entity']->icon_size == 1) {
	$vars['entity']->icon_size = 'small';
} elseif ($vars['entity']->icon_size == 2) {
	$vars['entity']->icon_size = 'tiny';
}

if (!isset($vars['entity']->icon_size)) {
	$vars['entity']->icon_size = 'small';
}

$params = array(
	'name' => 'params[icon_size]',
	'value' => $vars['entity']->icon_size,
	'options_values' => array(
		'small' => elgg_echo('friends:small'),
		'tiny' => elgg_echo('friends:tiny'),
	),
);
$size_dropdown = elgg_view('input/dropdown', $params);
?>
<div><?php echo elgg_echo("friends:all_only");?>: <?php 
echo elgg_view("input/dropdown", array("name" => "params[all_only]", "value" => $widget->all_only, "options_values" => $noyes_options));?></div>
<p><?php echo elgg_echo('friends:num_display'); ?>: <?php echo $display_dropdown; ?></p><p><?php echo elgg_echo('friends:icon_size'); ?>: <?php echo $size_dropdown; ?></p>
<div><?php echo elgg_echo("friends:show_numbers");?>: <?php 
echo elgg_view("input/dropdown", array("name" => "params[show_numbers]", "value" => $widget->show_numbers, "options_values" => $number_options)); ?></div>
