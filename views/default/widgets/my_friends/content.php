<?php
/**
 * My Friends Widget view
 *
 */
$widget = $vars["entity"];

$owner = $vars['entity']->getOwnerEntity();

$num = (int) $vars['entity']->num_display;

$size = $vars['entity']->icon_size;

if (elgg_instanceof($owner, 'user')) {

if ($widget->all_only == "friends") {
$html = $owner->listFriends('', $num, array(
		'size' => $size,
		'list_type' => 'gallery',
		'pagination' => false
	));
$options = array(
	'relationship' => 'friend',
	'relationship_guid' => $owner->getGUID(),
	'inverse_relationship' => FALSE,
	'type' => 'user',
	'count' => TRUE,
);
$number = elgg_get_entities_from_relationship($options);
$result = elgg_echo('friends:none');

if ($html && $widget->show_numbers == "yes") {
	echo '<div class="friends_only"><label>'.elgg_echo('friends').' ['.$number.']</label><br><br>'.$html.'</div>';
}
else if ($html) {
		echo $html;
}
else { 
	echo $result; 
}
}

else if ($widget->all_only == "followers") {
$html = $owner->listFriends('', $num, array(
		'size' => $size,
		'list_type' => 'gallery',
		'inverse_relationship' => true,
		'pagination' => false
));
$options = array(
	'relationship' => 'friend',
	'relationship_guid' => $owner->getGUID(),
	'inverse_relationship' => TRUE,
	'type' => 'user',
	'count' => TRUE,
);
$number = elgg_get_entities_from_relationship($options);
$result = elgg_echo('friends:of:none');

if ($html && $widget->show_numbers == "yes") {
	echo '<div class="followers_only"><label>'.elgg_echo('followers').' ['.$number.']</label><br><br>'.$html.'</div>';
}
else if ($html) {
		echo $html;
}
else { 
	echo $result; 
}
}

else {
$html = $owner->listFriends('', $num, array(
		'size' => $size,
		'list_type' => 'gallery',
		'pagination' => false
	));
$options = array(
	'relationship' => 'friend',
	'relationship_guid' => $owner->getGUID(),
	'inverse_relationship' => FALSE,
	'type' => 'user',
	'count' => TRUE,
);
$number = elgg_get_entities_from_relationship($options);

$html2 = $owner->listFriends('', $num, array(
		'size' => $size,
		'list_type' => 'gallery',
		'inverse_relationship' => true,
		'pagination' => false
));
$options2 = array(
	'relationship' => 'friend',
	'relationship_guid' => $owner->getGUID(),
	'inverse_relationship' => TRUE,
	'type' => 'user',
	'count' => TRUE,
);
$number2 = elgg_get_entities_from_relationship($options2);

$result = elgg_echo('friends:nobody');

if (($html || $html2) && ($widget->show_numbers == "yes")) {
	echo '<div class="friends_gallery"><label>'.elgg_echo('friends').' ['.$number.']</label><br><br>'.$html.'</div>';
	echo '<div class="followers_gallery"><label>'.elgg_echo('followers').' ['.$number2.']</label><br><br>'.$html2.'</div>';
}

else if ($html || $html2) {
		echo '<div class="friends_gallery"><label>'.elgg_echo('friends').'</label><br><br>'.$html.'</div>';
		echo '<div class="followers_gallery"><label>'.elgg_echo('followers').'</label><br><br>'.$html2.'</div>';
}
else {
	echo $result; 
}

}
}