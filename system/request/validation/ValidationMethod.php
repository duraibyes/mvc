<?php

namespace Bytes\system\request\validation;

use Bytes\system\core\Request;
use Bytes\system\interface\ValidationInterface;
use Bytes\system\request\validation\ValidationAttributes;

class ValidationMethod extends ValidationAttributes implements ValidationInterface
{
    public $method;
    public function __construct()
    {
        $this->method = new Request();
    }
    public function required($field): string
    {
        $return  = '';
        if (!$this->method->request($field) || empty($this->method->request($field))) {
            $return = 'The ' . $field . ' field is required';
        }
        return $return;
    }

    public function validEmail($field): string
    {
        $return  = '';
        if (!filter_var($this->method->request($field), FILTER_VALIDATE_EMAIL)) {
            $return = 'The ' . $field . ' field is not a valid email address';
        }
        return $return;
    }

    public function validMobileNo($field): string
    {
        $return  = '';
        if (is_numeric($this->method->request($field)) && strlen(trim($this->method->request($field))) == 10) {
        } else {
            return 'The ' . $field . ' field is not a valid mobile number. Should be 10 digits number';
        }
        return $return;
    }

    public function exact($length)
    {
        return 'test';
    }

    public function exact_length($length)
    {
        return 'test';
    }

    public function min($length)
    {
        return 'test';
    }

    public function max($length)
    {
        return 'maxi';
    }

    public function min_length($length)
    {
        return 'test';
    }

    public function max_length($length)
    {
        return 'maxi';
    }

    public function isUnique($table, $column, $id = null)
    {
        return 'string';
    }

    public function string($field)
    {
        $return  = '';
        if (!is_string($this->method->request($field))) {
            return 'The ' . $field . ' field should contain string only.';
        }
        return $return;
    }

    public function numeric($field)
    {
        $return  = '';
        if (!is_numeric($this->method->request($field))) {
            return 'The ' . $field . ' field is not a valid numeric character.';
        }
        return $return;
    }

    public function matchPassword($field)
    {
        return 'string';
    }

    public function alphaNum($field)
    {
        return 'string';
    }

    public function url($field)
    {
        $return  = '';
        if (!filter_var($this->method->request($field), FILTER_VALIDATE_URL)) {
            $return = 'The ' . $field . ' field is not a valid URL';
        }
        return $return;
    }

    public function file($field)
    {
        return 'string';
    }

    public function fileType($field)
    {
        return 'string';
    }

    public function maxsize($field)
    {
        return 'string';
    }

    public function ifHas($field)
    {
        return 'string';
    }
}