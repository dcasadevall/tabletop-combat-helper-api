<?php

require 'vendor/autoload.php';

use function DI\autowire;

return [
    'Database' => autowire('MedooDatabase'),
];

