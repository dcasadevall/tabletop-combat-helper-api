<?php

namespace Serialization;

class JsonResult {
    /**
     * @var bool
     */
    private $success;

    public static function success() {
        return new JsonResult(true);
    }

    public static function error() {
        return new JsonResult(false);
    }

    public function __construct(bool $success) {
        $this->success = $success;
    }

    public function getJsonString() {
        return json_encode(['success' => $this->success ? 'true' : 'false']);
    }
}
