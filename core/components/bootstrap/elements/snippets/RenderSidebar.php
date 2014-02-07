<?php
return $modx->getCount('modResource', array(
    'parent' => $modx->resource->id,
    'deleted' => false,
    'hidemenu' => false,
    'published' => true
));
