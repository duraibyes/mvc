<?php
namespace Bytes\system\database\Eloquent\Interfaces;

interface BuildOrmInterface {
    public static function find();
    public static function all();
    public function one();
    public function latest();
    public static function table();
 
}
