<?php

/** 
 *  set a flash message with key value pair setFlash('success', 'All done');
 */


if (! function_exists('past')) {
    function past(string $field) {
        print_r( $_SESSION['old'] );
        $value = $_SESSION['old'][$field] ?? '';
        unset( $_SESSION['old'][$field] );
        return $value;
        
    }
}