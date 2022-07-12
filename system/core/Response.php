<?php
namespace Bytes\system\core;

class Response {
    public function setStatusCode(int $code) {
        \http_response_code($code);
    }

    public function responseView($code) {
        \ob_start();
        include_once __DIR__."/../response/view/error.php";
        return \ob_get_clean();
    }
}
