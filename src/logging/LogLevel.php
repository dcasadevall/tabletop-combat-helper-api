<?php

namespace Logging;

class LogLevel {
    const INFO = 0;
    const WARNING = 1;
    const ERROR = 2;

    /**
     * @var int
     */
    private $level;

    public function __construct(int $level) {
        $this->level = $level;
    }
}