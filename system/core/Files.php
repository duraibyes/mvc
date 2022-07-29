<?php
namespace Bytes\system\core;

class Files {
    public static function checkType(string $field, array $type) {
        $errors = '';
        if( isset( $_FILES[$field]['name'] ) && !empty(  $_FILES[$field]['name'] ) ) {
            $file_type = $_FILES[$field]['type'];
            $ext = explode('.',$_FILES[$field]['name']);
            $file_ext = strtolower(end($ext));
            if(in_array( $file_ext, $type )=== false) {
                $errors = "Extension is not allowed, please choose a ".implode(' or ', $type). ' format';
            }
        }
        return $errors;
    }

    public static function checkSize($field, $checkSize) {
        $errors = '';
        $kbCheckSize = $checkSize * 1024; //convert bytes to kilobytes;
        if( isset( $_FILES[$field]['name'] ) && !empty(  $_FILES[$field]['name'] ) ) {
            $size = $_FILES[$field]['size'];
            if($size > $kbCheckSize){
                $errors = 'File size must be exactly '.$checkSize.'kb';
            }
        }
        return $errors;
    }

    public static function upload($field, $path) {
        $file_info = [];
        if( isset( $_FILES[$field]['name'] ) && !empty(  $_FILES[$field]['name'] ) ) {
            $ext = explode('.',$_FILES[$field]['name']);
            $file_ext = strtolower(end($ext));
            $file_name = bin2hex($_FILES[$field]['name']).'.'.$file_ext;

            $file_tmp = $_FILES[$field]['tmp_name'];
            $uploaddir = realpath('./') . '/';
            // $uploadfile = $uploaddir.'bootstrap/storage/' . basename($file_name);
            $uploadfile = $path.'/'. basename($file_name);

            try {
                move_uploaded_file($file_tmp, $uploadfile);
                $file_info = array('file_name' => $file_name, 'file_saved_path' => $uploadfile );
            }
            catch(\Exception $e) {
                trigger_error('Message: ' .$e->getMessage());
            }
           
        } else {
            trigger_error('File not found, check with file name or form encryption ', E_USER_ERROR);
        }
        return $file_info;
    }
}