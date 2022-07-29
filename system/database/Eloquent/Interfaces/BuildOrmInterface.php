<?php
namespace Bytes\system\database\Eloquent\Interfaces;

interface BuildOrmInterface {
    public function find();
    public function all();
    public function one();
    public function latest();
 
}
