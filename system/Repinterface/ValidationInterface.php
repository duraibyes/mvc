<?php

namespace Bytes\system\Repinterface;

interface ValidationInterface
{
    public function required($field, $attr): string;
    public function validEmail($field, $attr): string;
    public function validMobileNo($field, $attr): string;
    public function lt($field, $length);
    public function exact($field, $length);
    public function exactLength($field, $length);
    public function maxLength($field, $length);
    public function minLength($field, $length): string;
    public function gt($field, $length);
    public function isUnique($table, $column, $id = null);
    public function string($field, $attr);
    public function numeric($field, $attr);
    public function matchPassword($field, $attr);
    public function alphaNum($field, $attr);
    public function url($field, $attr);
    public function file($field, $attr);
    public function fileType($field, $attr);
    public function maxSize($field, $attr);
    public function ifHas($field, $attr);
    public function adult($field, $attr);
    public function date($field, $attr);
    public function card($field, $attr);
    public function ip($field, $attr);
}