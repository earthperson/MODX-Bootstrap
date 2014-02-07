<?php
/**
 * Build the setup options form.
 *
 * @package Bootstrap
 * @subpackage build
 */
$output = '';
/* set some default values */

/* get values based on mode */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return $output;
