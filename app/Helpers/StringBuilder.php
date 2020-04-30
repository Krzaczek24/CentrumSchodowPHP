<?php

namespace CS\Helpers;

use InvalidArgumentException;

/**
 * Helper to build string
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 * @version 1.0
 */
class StringBuilder
{
    private $text = "";

    /**
     * Appends text without new line
     * @param string $string text to add
     * @throws InvalidArgumentException
     */
    public function addString($string)
    {
        $this->validateInput($string);
        $this->text .= $string;
    }

    /**
     * Appends text with new line
     * @param string $string text to add
     * @throws InvalidArgumentException
     */
    public function addLine($string)
    {
        $this->addString($string);
        $this->makeNewLine();
    }

    /**
     * Appends new line
     */
    public function makeNewLine()
    {
        $this->text .= PHP_EOL;
    }

    /**
     * Returns all gathered text
     * @return string 
     */
    public function toString()
    {
        return $this->text;
    }

    /**
     * Clears all gathered text
     */
    public function clear()
    {
        $this->text = "";
    }

    private function validateInput(&$string)
    {
        if (is_int($string) || is_float($string))
        {
            $string = strval($string);
        }

        if (!is_string($string))
        {
            throw new InvalidArgumentException("StringBuilder");
        }
    }
}