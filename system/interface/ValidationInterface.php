<?php

namespace Bytes\system\interface;

interface ValidationInterface
{
    public function required($field): string;
    public function validEmail($field): string;
    public function validMobileNo($field): string;
    public function min($length);
    public function exact($length);
    public function exact_length($length);
    public function max_length($length);
    public function min_length($length);
    public function max($length);
    public function isUnique($table, $column, $id = null);
    public function string($field);
    public function numeric($field);
    public function matchPassword($field);
    public function alphaNum($field);
    public function url($field);
    public function file($field);
    public function fileType($field);
    public function maxsize($field);
    public function ifHas($field);
}