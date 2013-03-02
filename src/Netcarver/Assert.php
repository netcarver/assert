<?php

namespace Netcarver;

/**
 * Common assertions. These all throw an AssertionFailure on failure.
 *
 * Example...
 *     Netcarver\Assert::isCallable($fn); # Check that $fn can be called.
 */
class Assert
{
    public static function isNonEmptyString($arg, $argname = '', $msg=null)
    {
        if (!is_string($arg) || '' === $arg) {
            if (is_string($msg) && '' !== $msg) {
                throw new AssertionFailure($msg);
            } else {
                throw new AssertionFailure("Argument [$argname] should be a non-empty string.");
            }
        }
    }


    public static function isNull($arg, $argname = '', $msg=null)
    {
        if (null !== $arg) {
            if (is_string($msg) && '' !== $msg) {
                throw new AssertionFailure($msg);
            } else {
                throw new AssertionFailure("Argument [$argname] should be null.");
            }
        }
    }


    public static function isCallable($fn)
    {
        if (!is_callable($fn)) {
            throw new AssertionFailure("Function [$fn] should be callable.");
        }
    }


    public static function isNotInArrayKeys($key, &$array, $msg=null)
    {
        if (array_key_exists($key, $array)) {
            if (is_string($msg) && '' !== $msg) {
                throw new AssertionFailure($msg);
            } else {
                throw new AssertionFailure("Key \$key must not exist in array keys.");
            }
        }
    }


    public static function isInArrayKeys($key, &$array, $msg=null)
    {
        if (!array_key_exists($key, $array)) {
            if (is_string($msg) && '' !== $msg) {
                throw new AssertionFailure($msg);
            } else {
                throw new AssertionFailure("Key \$key must exist in array keys.");
            }
        }
    }


    public static function isInArray($val, &$array, $msg=null)
    {
        if (!in_array($val, $array)) {
            if (is_string($msg) && '' !== $msg) {
                throw new AssertionFailure($msg);
            } else {
                throw new AssertionFailure("Value \$val must exist in array.");
            }
        }
    }


    public static function isArray(&$var, $var_name = 'Variable')
    {
        if (!is_array($var)) {
            throw new AssertionFailure("$var_name must be an array.");
        }
    }


    public static function isString(&$var, $var_name = 'Variable')
    {
        if (!is_array($var)) {
            throw new AssertionFailure("$var_name must be a string.");
        }
    }


    public static function isNotEmpty(&$var, $var_name = 'Variable')
    {
        if (empty($var)) {
            throw new AssertionFailure("$var_name must not be empty.");
        }
    }
}

#eof
