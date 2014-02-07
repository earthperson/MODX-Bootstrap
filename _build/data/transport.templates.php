<?php
/**
 * @package Bootstrap
 * @subpackage build
 */
$templates = array(
	array(
		'id' => 1,
		'templatename' => 'BootstrapTemplate',
		'description' => '',
		'content' => file_get_contents($sources['elements'] . 'templates/BootstrapTemplate'),
	),
);

foreach ($templates as &$template) {
	$t = $modx->newObject('modTemplate');
	$t->fromArray($template,'',true,true);
	$template = $t;
	unset($t);
}

return $templates;
