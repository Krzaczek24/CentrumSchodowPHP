<?php

namespace CS\Helpers;

/**
 * Helper providing additional operations on strings
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class StringHelper
{
    /**
     * Checks if text starts with provided string
     * @param string $string text to check
     * @param string $startString seeking text at the beginning of text
     * @return bool true if string found at beginning of text, otherwise returns false
     */
    public static function startsWith($string, $startString)
    {
        $len = strlen($startString); 
        return (substr($string, 0, $len) === $startString); 
    }

    /**
     * Checks if text ends with provided string
     * @param string $string text to check
     * @param string $endString seeking text at the ending of text
     * @return bool true if string found at ending of text, otherwise returns false
     */
    public static function endsWith($string, $endString)
    {
        if (($len = strlen($endString)) == 0)
        { 
            return true; 
        } 
        return (substr($string, -$len) === $endString); 
    }
}