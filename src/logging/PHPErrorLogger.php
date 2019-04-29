<?php

require_once dirname(__FILE__) . '/Logger.php';

/**
 * Class PHPErrorLogger
 * Simple Logger implementation that uses the standard PHP error log method.
 */
class PHPErrorLogger implements Logger {
    public function log(LogLevel $level, String $message) {
        error_log($message);
    }
}