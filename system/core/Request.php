<?php

namespace Bytes\system\core;

use Bytes\system\core\Validation;
use Bytes\system\core\Files;

class Request
{
    protected $file_save_path;
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? false;
        
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }
        return \substr($path, 0, $position);
    }

    public function getMethod()
    {
        return \strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function get($field = '')
    {
        $body = [];
        if ($this->getMethod() === 'get') {
            if (!empty($field)) {
                $body[$field] = \filter_input(INPUT_GET, $field, FILTER_SANITIZE_SPECIAL_CHARS);
            } else {
                foreach ($_GET as $key => $value) {
                    $body[$key] = \filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
        return $body;
    }

    public function input($field) {
        $value = $this->request($field);
        return $value[$field] ?? null;
    }

    public function post($field = '')
    {
        $body = [];
        if ($this->getMethod() === 'post') {
            if (!empty($field)) {
                $body[$field] = \filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
            } else {
                foreach ($_POST as $key => $value) {
                    $body[$key] = \filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
        return $body;
    }

    public function request($field)
    {
        $method = $this->getMethod();
        return $this->$method(trim($field));
    }

    public function validate($rules)
    {
        $validation = new Validation();

        if (isset($rules) && !empty($rules)) {
            foreach ($rules as $key => $value) {
                $validation->checkValidAttributes($value);
            }
        }
    }

    public function file($field) {
        $path = $this->file_save_path;
        if( !$path ) {
            trigger_error('File path not defined. Use save function with file to set file path.', E_USER_ERROR);
        }
        ss( Files::upload($field, $path) );
    }
    public function save($path) {
        $uploaddir = realpath('./') . '/';
        $uploadfile = $uploaddir.'bootstrap/storage/'.$path;
        if (!file_exists($uploadfile)) {
            
            mkdir($uploadfile, 0777, true);
            echo 'created';
        }
        ss( 'test');
        $this->file_save_path = $path;
        return $this;
    }
}