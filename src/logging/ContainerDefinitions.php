<?php

use function DI\autowire;

// TODO: Autoloading should work here..
require_once dirname(__FILE__) . '/Logger.php';
require_once dirname(__FILE__) . '/PHPErrorLogger.php';

return [
    'Logger' => autowire('PHPErrorLogger'),
];

