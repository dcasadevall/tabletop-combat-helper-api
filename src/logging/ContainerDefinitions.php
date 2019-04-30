<?php

namespace Logging;

use function DI\autowire;

require 'vendor/autoload.php';

return [
    '\Logging\Logger' => autowire('\Logging\PHPErrorLogger'),
    'Logging\Logger' => autowire('\Logging\PHPErrorLogger'),
];

