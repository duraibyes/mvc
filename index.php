<?php

/**
 * DuraiBytes - A PHP Framework For Web Artisans
 *
 * @package  DuraiBytes
 * @author   Durai Raj( DJ ) <dj@duraibytes.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);


if ($uri !== '/' && file_exists(__DIR__.'/system'.$uri)) {
    return false;
}

require_once __DIR__.'/system/index.php';
