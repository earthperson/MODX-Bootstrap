<?php
/**
 * @package Bootstrap
 * @subpackage build
 */
$snippets = array(
	array(
		'id' => 1,
		'name' => 'Years',
		'snippet' => file_get_contents($sources['elements'] . 'snippets/years.php'),
	),
	array(
		'id' => 2,
		'name' => 'RenderBreadcrumbs',
		'snippet' => file_get_contents($sources['elements'] . 'snippets/renderbreadcrumbs.php'),
	),
	array(
		'id' => 3,
		'name' => 'RenderSidebar',
		'snippet' => file_get_contents($sources['elements'] . 'snippets/rendersidebar.php'),
	),
);

foreach ($snippets as &$snippet) {
	$s = $modx->newObject('modSnippet');
	$s->fromArray($snippet,'',true,true);
	$snippet = $s;
	unset($s);
}

return $snippets;
