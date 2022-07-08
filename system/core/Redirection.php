<?php
// This is redirection Class
namespace Bytes\system\core;

class Redirection 
{
    protected array $with;
   
    public function back() {
        $back_url = $_SERVER['HTTP_REFERER'];
        ss( $this );
        header("Location:$back_url");
    }

    public function to($path) {
        $check_slash = strpos('/', $path);
        $path = substr_replace($path, '', $check_slash, 1);
        $url = $_SERVER['HTTP_ORIGIN'].'/'.$path;
       
        header("Location:$url");
    }
    public function with(array $with_values) {
        $this->with = $with_values;
        return $this;
    }

}