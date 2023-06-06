<?php

namespace cleanarchitecture\app\core;

use cleanarchitecture\app\helpers\CookieTrait;
use cleanarchitecture\app\helpers\FilterTrait;
use cleanarchitecture\app\helpers\MaskTrait;
use cleanarchitecture\app\helpers\SecurityTrait;

class Data
{
    use SecurityTrait;
    use MaskTrait;
    use FilterTrait;
    use CookieTrait;
}
