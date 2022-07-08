<?php 

if (! function_exists('camelCase')) {
    function camelCase(string $string) {
        return ucwords(str_replace('_', " ", $string ));
    }
}