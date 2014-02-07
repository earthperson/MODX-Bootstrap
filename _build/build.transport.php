<?php
/**
 * Bootstrap build script
 * 
 * @package Bootstrap
 * @subpackage build
 */
$tstart = microtime(true);
set_time_limit(0);

/* define package names */
define('PKG_NAME', 'Bootstrap');
define('PKG_NAME_LOWER', strtolower(PKG_NAME));
define('PKG_VERSION', '1.0.2');
define('PKG_RELEASE', 'beta1');

$root = dirname(__DIR__) . '/';
$sources = array(
	'root' => $root,
	'build' => $root . '_build/',
	'source_core' => $root . 'core/components/' . PKG_NAME_LOWER,
	'source_assets' => $root . 'assets/components' . PKG_NAME_LOWER,
	'data' => $root . '_build/data/',
	'elements' => $root . 'core/components/' . PKG_NAME_LOWER . '/elements/',
	'docs' => $root . 'core/components/' . PKG_NAME_LOWER . '/docs/'
);
unset($root);

require_once $sources['build'] . 'build.config.php';
if(!defined('MODX_CORE_PATH')) {
	die('Use of undefined constant MODX_CORE_PATH');
}
if(!defined('MODX_CONFIG_KEY')) {
	die('Use of undefined constant MODX_CONFIG_KEY');
}
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx = new modX;
$modx->initialize('mgr');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
$modx->loadClass('transport.modPackageBuilder', '', false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage(PKG_NAME, PKG_VERSION, PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER,false,true,'{core_path}components/' . PKG_NAME_LOWER . '/');

/* create category */
$modx->log(modX::LOG_LEVEL_INFO,'Creating category...');
$category= $modx->newObject('modCategory');
$category->set('id', 0);
$category->set('category','Bootstrap');

/* add snippets */
$modx->log(modX::LOG_LEVEL_INFO,'Packaging in snippets...');
$snippets = include $sources['data'].'transport.snippets.php';
if (!is_array($snippets)) $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in snippets.');
$category->addMany($snippets);
unset($snippets);

/* add chunks */
$modx->log(modX::LOG_LEVEL_INFO,'Packaging in chunks...');
$chunks = include $sources['data'].'transport.chunks.php';
if (!is_array($chunks)) $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in chunks.');
$category->addMany($chunks);
unset($chunks);

$modx->log(modX::LOG_LEVEL_INFO,'Packaging in category...');
$vehicle = $builder->createVehicle($category, array(
	xPDOTransport::UNIQUE_KEY => 'category',
	xPDOTransport::UPDATE_OBJECT => true,
	xPDOTransport::PRESERVE_KEYS => false,
	xPDOTransport::RELATED_OBJECTS => true,
	xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
	'Snippets' => array(
		xPDOTransport::UNIQUE_KEY => 'name',
		xPDOTransport::UPDATE_OBJECT => true,
		xPDOTransport::PRESERVE_KEYS => false,
	),
	'Chunks' => array (
		xPDOTransport::UNIQUE_KEY => 'name',
		xPDOTransport::UPDATE_OBJECT => true,
		xPDOTransport::PRESERVE_KEYS => false,
	),
)));
$builder->putVehicle($vehicle);
unset($category, $vehicle);

/* load system settings */
$settings = include $sources['data'].'transport.settings.php';
if (is_array($settings) && !empty($settings)) {
	$attributes= array(
		xPDOTransport::UNIQUE_KEY => 'key',
		xPDOTransport::PRESERVE_KEYS => true,
		xPDOTransport::UPDATE_OBJECT => false,
	);
	foreach ($settings as $setting) {
		$vehicle = $builder->createVehicle($setting,$attributes);
		$builder->putVehicle($vehicle);
	}
	$modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($settings).' System Settings.');
}
else {
	$modx->log(xPDO::LOG_LEVEL_ERROR,'Could not package System Settings.');
}
unset($settings, $setting, $attributes);

/* now pack in the license file, readme, changelog and setup options */
$modx->log(modX::LOG_LEVEL_INFO,'Adding package attributes and setup options...');
$builder->setPackageAttributes(array(
	'license' => file_get_contents($sources['docs'] . 'license.txt'),
	'readme' => file_get_contents($sources['docs'] . 'readme.txt'),
	'changelog' => file_get_contents($sources['docs'] . 'changelog.txt'),
	'setup-options' => array(
		'source' => $sources['build'].'setup.options.php',
	),
));

/* zip up package */
$modx->log(modX::LOG_LEVEL_INFO,'Packing up transport package zip...');
$builder->pack();
$modx->log(modX::LOG_LEVEL_INFO, 'Package built.');
$modx->log(modX::LOG_LEVEL_INFO, 'Execution time: ' . sprintf("%2.4f s", microtime(true) - $tstart) . '.');
exit;
