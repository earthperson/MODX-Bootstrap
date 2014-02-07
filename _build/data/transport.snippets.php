<?php
/**
 * @package Bootstrap
 * @subpackage build
 */
function getSnippetContent($filename) {
	$o = file_get_contents($filename);
	$o = trim(str_replace(array('<?php','?>'),'',$o));
	return $o;
}
$snippets = array(
	array(
		'id' => 1,
		'name' => 'Years',
		'snippet' => getSnippetContent($sources['elements'] . 'snippets/Years.php'),
	),
	array(
		'id' => 2,
		'name' => 'RenderBreadcrumbs',
		'snippet' => getSnippetContent($sources['elements'] . 'snippets/RenderBreadcrumbs.php'),
	),
	array(
		'id' => 3,
		'name' => 'RenderSidebar',
		'snippet' => getSnippetContent($sources['elements'] . 'snippets/RenderSidebar.php'),
	),
);

foreach ($snippets as &$snippet) {
	$s = $modx->newObject('modSnippet');
	$s->fromArray($snippet,'',true,true);
	$snippet = $s;
	unset($s);
}

return $snippets;
