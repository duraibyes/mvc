<?php

//error handler function
function customError($errno, $errstr)
{
    $html = "<div><div><b>Error:</b> [$errno] $errstr</div></div>";
    echo $html;
}

//set error handler
set_error_handler("customError", E_ERROR);
  
  //trigger error