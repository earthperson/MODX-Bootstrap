<?php
/**
 * @package Bootstrap
 * @subpackage build
 */
$settings = array();

$settings['bootstrap.dropdown_disabled']= $modx->newObject('modSystemSetting');
$settings['bootstrap.dropdown_disabled']->fromArray(array(
    'key' => 'bootstrap.dropdown_disabled',
    'value' => '1',
    'xtype' => 'textfield',
    'namespace' => 'bootstrap',
    'area' => 'general',
),'',true,true);

return $settings;
