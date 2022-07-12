<?php

namespace Bytes\system\request\validation;

use Bytes\system\core\Request;
use Bytes\system\core\Files;
use Bytes\system\Repinterface\ValidationInterface;
use Bytes\system\request\validation\ValidationAttributes;

class ValidationMethod extends ValidationAttributes implements ValidationInterface
{
    public $method;
    public function __construct()
    {
        $this->method = new Request();
    }
    public function required($field, $attr): string
    {
        $return  = '';
        if (!$this->method->request($field) || empty(array_filter($this->method->request($field)) ) ) {
           
            if( isset($_FILES[$field]['name'] ) && !empty( $_FILES[$field]['name'] ) ) {
            } else {
                $return = 'The ' . camelCase($field) . ' field is required';
            }

        }
        return $return;
    }

    public function validEmail($field, $attr): string
    {
        $return  = '';
        $field_value = $this->method->request($field);
        
        if (!filter_var($field_value[$field], FILTER_VALIDATE_EMAIL)) {
            $return = 'The ' . camelCase($field) . ' field is not a valid email address';
        }
        return $return;
    }

    public function validMobileNo($field, $attr): string
    {
        $return  = '';
        $numbers = $this->method->request($field);
        if (is_numeric($numbers[$field]) && strlen(trim($numbers[$field])) == 10) {
        } else {
            return 'The ' . camelCase($field) . ' field is not a valid mobile number. Should be 10 digits number';
        }
        return $return;
    }

    public function exact($field, $attr)
    {
        return 'test';
    }

    public function exactLength($field, $attr)
    {
        return 'test';
    }

    public function lt($field, $attr)
    {
        return 'test';
    }

    public function gt($field, $attr)
    {
        return 'maxi';
    }

    public function minLength($field, $length): string
    {
        $return  = '';
        $length = (int)$length;
        $values = $this->method->request($field);
        
        if ( isset( $values[$field] ) && strlen($values[$field]) < $length ) {
            return 'The ' . camelCase($field) . ' field should have minimum '.$length.' character.';
        }
        return $return;
    }

    public function maxLength($field, $length)
    {
        $return  = '';
        $length = (int)$length;
        $values = $this->method->request($field);
        if ( isset( $values[$field] ) && strlen($values[$field]) > $length ) {
            return 'The ' . camelCase($field) . ' field should have maximum '.$length.' character.';
        }
        return $return;
    }

    public function isUnique($table, $column, $id = null)
    {
        return 'string';
    }

    public function string($field, $attr)
    {
        $return  = '';
        $values = $this->method->request($field);
        if ( isset( $values[$field] ) && !is_string( $values[$field] ) ) {
            return 'The ' . camelCase($field) . ' field should contain string only.';
        }
        return $return;
    }

    public function numeric($field, $attr)
    {
        $return  = '';
        $values = $this->method->request($field);
        if ( isset($values[$field]) && !is_numeric($values[$field])) {
            $return = 'The ' . camelCase($field) . ' field is not a valid numeric character.';
        }
        return $return;
    }

    public function matchPassword($field, $attr)
    {
        return 'string';
    }

    public function alphaNum($field, $attr)
    {
        return 'string';
    }

    public function url($field, $attr)
    {
        $return  = '';
        if (!filter_var($this->method->request($field), FILTER_VALIDATE_URL)) {
            $return = 'The ' . camelCase($field) . ' field is not a valid URL';
        }
        return $return;
    }

    public function file($field, $attr)
    {
        return 'string';
    }

    public function fileType($field, $attr)
    {
        $extensions = explode("|", $attr);
        return Files::checkType($field, $extensions);
    }

    public function maxSize($field, $attr)
    {
        return Files::checkSize($field, $attr);
    }

    public function ifHas($field, $attr)
    {
        return 'string';
    }

    public function adult($field, $attr)
    {
        return 'string';
    }

    public function date($field, $attr)
    {
        return 'string';
    }

    public function card($field, $attr)
    {
        return 'string';
    }

    public function ip($field, $attr)
    {
        return 'string';
    }
}