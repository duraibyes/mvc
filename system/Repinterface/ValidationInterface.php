<?php

namespace Bytes\system\Repinterface;

interface ValidationInterface
{
    public function required($field): string;
    public function validEmail($field): string;
    public function validMobileNo($field): string;
    public function min($length);
    public function exact($length);
    public function exactLength($length);
    public function maxLength($length);
    public function minLength($length);
    public function max($length);
    public function isUnique($table, $column, $id = null);
    public function string($field);
    public function numeric($field);
    public function matchPassword($field);
    public function alphaNum($field);
    public function url($field);
    public function file($field);
    public function fileType($field);
    public function maxSize($field);
    public function ifHas($field);
    public function adult($field);
    public function date($field);
    public function card($field);
    public function ip($field);
}