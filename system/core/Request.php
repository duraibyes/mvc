<?php
namespace Bytes\system\core;

class Request 
{
    public function getPath(){
        $path = $_SERVER['REQUEST_URI'] ?? false;
        $position = strpos($path, '?');
        
        if( $position === false){
            return $path;
        }
        return \substr($path, 0, $position);
    }

    public function getMethod() {
        return \strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function get($field = '') {
        $body = [];
        if( $this->getMethod() === 'get' ) {
            if( !empty($field)) {
                $body[$field] = \filter_input(INPUT_GET, $field, FILTER_SANITIZE_SPECIAL_CHARS);
            } else {
                foreach ($_GET as $key => $value) {
                    $body[$key] = \filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
           
        }
        return $body;
    }

    public function post($field = '') {
        $body = [];
        if( $this->getMethod() === 'post' ) {
            if( !empty($field)) {
                $body[$field] = \filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
            } else {
                foreach ($_POST as $key => $value) {
                    $body[$key] = \filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
        return $body;
    }
}
