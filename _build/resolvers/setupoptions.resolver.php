<?php
/**
 * Resolves setup-options.
 *
 * @package Bootstrap
 * @subpackage build
 */
$success = true;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    	if (isset($options['jquery']) && $options['jquery'] == 1) {
    		$chunk = $object->xpdo->getObject('modChunk', array('name' => 'Head'));
    		if ($chunk) {
    			$chunk->setContent(str_replace('.modern', '', $chunk->getContent()));
    			$chunk->save();
    			$object->xpdo->log(modX::LOG_LEVEL_INFO, 'jQuery 1.x in the chunk Head');
    		}
    		else {
    			$success = false;
    		}
    	}
    	else {
    		$object->xpdo->log(modX::LOG_LEVEL_INFO, 'jQuery 2.x in the chunk Head');
    	}
    	break;
    case xPDOTransport::ACTION_UPGRADE:
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}
return $success;
