<?php

namespace Bytes\system\core;

use Bytes\system\core\Validation;
use Bytes\system\core\Files;

class Request
{
    protected $file_save_path;
    protected $file_return_path;
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
    /***
     * file function used to upload file with specific path 
     * Return values : array 
     * array(2) {
                        ["file_name"]=>
                        string(30) "3139323078313132302e706e67.png"
                        ["file_saved_path"]=>
                        string(92) "E:\xampp7.4.29\htdocs\duraibytes/bootstrap/storage/users/3139323078313132302e706e67.png"
                        }
     * we return only file name if you want to file_saved_path 
     */
    public function file($field) {

        $path = $this->file_save_path;
        if( !$path ) {
            trigger_error('File path not defined. Use save function with file to set file path.', E_USER_ERROR);
        }
        $img_return = Files::upload($field, $path);
        if( $this->file_return_path == 'path' ) {
            return $img_return['file_saved_path'];
        }  else {
            return $img_return['file_name'];
        }

    }
    public function returnPath() {
        $this->file_return_path = 'path';
        return $this;
    }
    public function returnName() {
        $this->file_return_path = 'name';
        return $this;
    }
    public function save($path) {
        $uploaddir = realpath('./') . '/';
        $uploadfile = $uploaddir.'bootstrap/storage/'.$path;
        if (!file_exists($uploadfile)) {
            mkdir($uploadfile, 0777, true);
            // echo 'created';
        }
        
        $this->file_save_path = $uploadfile;
        return $this;
    }
}