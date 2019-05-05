<?php

namespace Serialization;

class JsonResult {
    /**
     * @var bool
     */
    private $success;

    /**
     * @var array
     */
    private $data;

    public static function success(array $data) {
        return new JsonResult(true, $data);
    }

    public static function error() {
        return new JsonResult(false);
    }

    public function __construct(bool $success, array $data = []) {
        $this->success = $success;
        $this->data = $data;
    }

    public function jsonString() {
        return json_encode(['success' => !empty($this->success), 'data' => $this->data]);
    }
}
