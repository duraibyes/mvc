<?php

namespace Bytes\system\request\validation;

class ValidationAttributes
{
    public const RULE_EMAIL = "validEmail";
    public const RULE_REQUIRED = "required";
    public const RULE_MOBILE_NO = "validMobileNo";
    public const RULE_MIN = "min";
    public const RULE_MAX = "max";
    public const RULE_UNIQUE = "isUnique";
    public const RULE_STRING = "string";
    public const RULE_NUMERIC = "numeric";
    public const RULE_PASSWORD_MATCH = "matchPassword";
    public const RULE_ALPHA_NUM = "alphaNum";
    public const RULE_URL = "url";
    public const RULE_FILE = "file";
    public const RULE_FILE_TYPE = "fileType";
    public const RULE_FILE_MAX_SIZE = "maxsize";
    public const RULE_IF_HAS = "ifHas";
    public const RULE_VALIDATION_ATTRIBUES = array(
                                                'required',
                                                'validEmail',
                                                'validMobileNo',
                                                'lt',
                                                'exact',
                                                'exactLength',
                                                'maxLength',
                                                'minLength',
                                                'gt',
                                                'isUnique',
                                                'string',
                                                'numeric',
                                                'matchPassword',
                                                'alphaNum',
                                                'url',
                                                'file',
                                                'fileType',
                                                'maxSize',
                                                'ifHas',
                                                'adult',
                                                'date',
                                                'card',
                                                'ip',
                                            );
}