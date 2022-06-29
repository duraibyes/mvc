<?php
namespace Bytes\system\helper;
//show and stop execution of program
function ss($data=[]){
    echo '<pre>';
    var_dump($data);
    die;
}