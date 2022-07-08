<?php

namespace Bytes\system\core;

use Bytes\system\redirection\Po;
use Bytes\system\request\validation\ValidationAttributes;
use Bytes\system\request\validation\ValidationMethod;
use Exception;

class Validation extends ValidationMethod
{
    public static array $error_message;
    public static function checkValidAttributes(string $attributes)
    {
        $attr = explode(',', $attributes);
        $err = [];

        if (isset($attr) && !empty($attr)) {
            foreach ($attr as $item) {
                $item = trim($item);
                $item = explode(':', $item);
                $field = trim(current($item));
                if (!in_array($field, ValidationAttributes::RULE_VALIDATION_ATTRIBUES)) {
                    $err[] = $field . ' Validation Rule not defined';
                }
            }
        }
        try {

            if (!empty($err)) {

                $error = implode(',', $err);
                trigger_error($error);
                // throw new Exception("An error occurred" . $error);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
        return $err;
    }

    public static function getErrorMsg()
    {
        return self::$error_message;
    }

    public function validate_request($field, $rules)
    {
        $valid_method = new ValidationMethod();
        //#$rules -> will come in string as =>  required,string, min:4
        $attr = explode(',', $rules);
        if (isset($attr) && !empty($attr)) {
            foreach ($attr as $key => $value) {
                $item = trim($value);
                $item = explode(':', $item);
                $rule = trim(current($item));
                $rule_attr = trim($item[1] ?? '');
                $field = trim($field);

                $error = $valid_method->$rule($field, $rule_attr);
                
                if (isset($error) && !empty($error) ) {
                    self::$error_message[$field] = $error;
                    break;
                }
            }
        }
    }

    public static function validate($rules)
    {
        if (isset($rules) && !empty($rules)) {
            foreach ($rules as $key => $value) {
                self::checkValidAttributes($value);
            }
        }

        if (isset($rules) && !empty($rules)) {
            foreach ($rules as $key => $value) {
                $key = trim($key);
                $value = trim($value);
                (new Validation())->validate_request($key, $value);
            }
        }
        if (empty(self::$error_message)) {
            return true;
        } else {
            setFormError(self::getErrorMsg());
            Po::back()->now();
        }
        return false;
    }
}