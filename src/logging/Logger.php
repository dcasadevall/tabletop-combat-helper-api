<?php

namespace Logging;

require_once dirname(__FILE__) . '/LogLevel.php';

/**
 * Interface Logger
 *
 * Contract for our application wide logging system.
 */
interface Logger {
    public function log(LogLevel $level, String $message);
}
