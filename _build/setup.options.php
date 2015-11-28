<?php
/**
 * Build the setup options form.
 *
 * @package Bootstrap
 * @subpackage build
 */
$output = '<h2>jQuery version</h2>
<label for="jquery2">jQuery 2.x <small>(has the same API as jQuery 1.x, but does not support Internet Explorer 6, 7, or 8)</small></label>
<input type="radio" name="jquery" id="jquery2" value="2" checked="checked">
<label for="jquery1">jQuery 1.x</label>
<input type="radio" name="jquery" id="jquery1" value="1">';

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
    	break;
    case xPDOTransport::ACTION_UNINSTALL:
    	$output = '';
        break;
}

return $output;
