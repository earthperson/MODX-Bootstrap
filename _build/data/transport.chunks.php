<?php
/**
 * @package Bootstrap
 * @subpackage build
 */
$chunks = array(
	array(
		'id' => 1,
		'name' => 'Breadcrumb',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Breadcrumb'),
	),
	array(
		'id' => 2,
		'name' => 'Breadcrumb.containerTpl',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Breadcrumb.containerTpl'),
	),
	array(
		'id' => 3,
		'name' => 'Footer',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Footer'),
	),
	array(
		'id' => 4,
		'name' => 'Head',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Head'),
	),
	array(
		'id' => 5,
		'name' => 'Navbar',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Navbar'),
	),
	array(
		'id' => 6,
		'name' => 'Sidebar',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Sidebar'),
	),
	array(
		'id' => 7,
		'name' => 'Wayfinder.innerRowTpl',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Wayfinder.innerRowTpl'),
	),
	array(
		'id' => 8,
		'name' => 'Wayfinder.innerTpl',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Wayfinder.innerTpl'),
	),
	array(
		'id' => 9,
		'name' => 'Wayfinder.outerTpl',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Wayfinder.outerTpl'),
	),
	array(
		'id' => 10,
		'name' => 'Wayfinder.parentRowTpl',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Wayfinder.parentRowTpl'),
	),
	array(
		'id' => 11,
		'name' => 'Wayfinder.rowTpl',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Wayfinder.rowTpl'),
	),
	array(
		'id' => 12,
		'name' => 'Wayfinder.Sidebar.innerRowTpl',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'chunks/Wayfinder.Sidebar.innerRowTpl'),
	),
);

foreach ($chunks as &$chunk) {
	$c = $modx->newObject('modChunk');
	$c->fromArray($chunk,'',true,true);
	$chunk = $c;
	unset($s);
}

return $chunks;
