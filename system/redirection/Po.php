<?php 
namespace Bytes\system\redirection;


class Po {

    public static $withValue;
    public static $redirectUrl;

    public function back() {
        static::$redirectUrl = $_SERVER['HTTP_REFERER'];
        return new static;
    }

    public function to($path) {
        $check_slash = strpos('/', $path);
        $path = substr_replace($path, '', $check_slash, 1);
        $url = $_SERVER['HTTP_ORIGIN'].'/'.$path;
        static::$redirectUrl = $url;
        return new static;
    }

    public function with($with_values) {
        static::$withValue = $with_values;
        return new static;
    }

    public function now() {
        $with_input = static::$withValue;
        $path = static::$redirectUrl;
        if( isset( $with_input ) && !empty($with_input)) {

           
            $_SESSION['flash_form_message'] = $with_input;
        }
        header("Location:$path");
    }
}