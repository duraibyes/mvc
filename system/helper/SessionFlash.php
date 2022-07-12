<?php

/** 
 *  set a flash message with key value pair setFlash('success', 'All done');
 */
if (! function_exists('setFlash')) {
    function setFlash(string $key, string $value) {

        $_SESSION[ 'flash' ] = array( $key => $value );
        
    }
}
/**
 * show flash message on view pages like flash('success');
 */
if (! function_exists('flash')) {
    function flash(string $key) {
        if( isset( $_SESSION['flash'][$key] ) ) {
            
            $flash_data = $_SESSION['flash'][$key];
            echo $flash_data;
            unset($_SESSION['flash'][$key]);
            
        }
    }
}
/**
 *  set Form error messages on form flash
 * setFormError(['name' => 'name field is required', 'email' => 'email fiedl is  required'])
 */
if (! function_exists('setFormError')) {
    function setFormError(array $formArray ) {
        $_SESSION[ 'formflash' ]['errors'] = $formArray;
        $_SESSION[ 'formflash' ]['values'] = $_REQUEST ?? [];
    }
}
/**
 *  set Form error messages on form flash
 * setFormError(['name' => 'name field is required', 'email' => 'email fiedl is  required'])
 */
if (! function_exists('unsetFormError')) {
    function unsetFormError( string $field = null) {
        if( $field ) {
            unset($_SESSION[ 'formflash' ]['errors'][$field]);
        } else {
            unset($_SESSION[ 'formflash' ]['errors']);
        }
        
    }
}
/**
 * 
 * show stored flash form error messages on controller or any file in  view file
 * formError()  : this will return all error message from form;
 * formError('name') : this will return name field error message if it contains;
 * 
 */
if (! function_exists('formError')) {
    function formError(string $field = null ) {
        $errors = $_SESSION[ 'formflash' ]['errors'] ?? '';
        if( isset( $errors ) && !empty($errors) ){
            if( !$field ) {
                return $errors;
            } else {
                return $errors[$field] ?? null;
            }
        }
    }
}
/**
 * 
 *  This will show with alert div with errors
 * 
 */
if (! function_exists('formErrorAlert')) {
    function formErrorAlert(string $field = null ) {
        $errors = $_SESSION[ 'formflash' ]['errors'] ?? '';
        $error_html = '';
        if( isset( $errors ) && !empty($errors) ){
            $error_html = '<div class="dj-form-flash-error">';
            if( !$field ) {
                foreach ($errors as $key => $value) {
                    $error_html .= '<div class="dj-form-flash-text">'.$value.'</div>';
                }
            } else {
                return $errors[$field] ?? null;
            }
            $error_html .= '</div>';
            unset($_SESSION[ 'formflash' ]);
        }
        echo $error_html;
    }
}
/**
 *  set Form error messages on form flash
 * setFormError(['name' => 'name field is required', 'email' => 'email fiedl is  required'])
 */
if (! function_exists('dVal')) {
    function dVal(string $field ) {
        $values = $_SESSION[ 'formflash' ]['values'] ?? '';
        return $values[$field] ?? '';
    }
}