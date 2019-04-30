<?php

require 'vendor/autoload.php';

use function DI\autowire;

return [
    'Persistence\Database' => autowire('\Persistence\MedooDatabase'),
    '\Persistence\Database' => autowire('\Persistence\MedooDatabase'),
];

