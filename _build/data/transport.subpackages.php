<?php
/**
 * Package in subpackages
 *
 * @package Bootstrap
 */
$subpackages = array(
	'breadcrumb' => 'breadcrumb-1.4.2-pl',
	'if' => 'if-1.1.1-pl',
	'wayfinder' => 'wayfinder-2.3.3-pl',
);
$spAttr = array('vehicle_class' => 'xPDOTransportVehicle');

foreach ($subpackages as $name => $signature) {
	$vehicle = $builder->createVehicle(array(
		'source' => $sources['subpackages'] . $signature . '.transport.zip',
		'target' => "return MODX_CORE_PATH . 'packages/';",
	),$spAttr);
	$vehicle->validate('php',array(
		'source' => $sources['validators'] . $name . '.php'
	));
	$builder->putVehicle($vehicle);
}

return true;
