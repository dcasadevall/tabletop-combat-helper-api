<?php

use function DI\autowire;

require 'vendor/autoload.php';

return [
    'Logger' => autowire('PHPErrorLogger'),
];

