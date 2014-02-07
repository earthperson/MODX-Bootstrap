<?php
$ids = $modx->getParentIds($modx->resource->id);
return isset($ids[0]) && $ids[0] == 0 ? 0 : 1;
