<?php

namespace CS\Helpers;

use Exception;

/**
 * Helper generating UUIDs
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class UUIDGenerator
{
    /**
     * Generates unique ID
     * @param integer $length
     * @return string hex random ID
     */
    public static function getRandomID($length)
    {
        $bytes = UUIDGenerator::generateRandomBytes($length);
        return bin2hex($bytes);
    }

    /**
     * Generates UUID version 4
     * @return string UUIDv4
     */
    public static function getUUIDv4()
    {
        $bytes = UUIDGenerator::generateRandomBytes();
        UUIDGenerator::applyRFC4122v4standard($bytes);
        $uid = bin2hex($bytes);
        UUIDGenerator::addHypens($uid);
        $uid = strtoupper($uid);

        return $uid;
    }

    private static function generateRandomBytes($length = 16)
    {
        if (function_exists("random_bytes"))
        {
            $bytes = random_bytes($length);
        }
        else if (function_exists("openssl_random_pseudo_bytes"))
        {
            $bytes = openssl_random_pseudo_bytes($length);
        }
        else
        {
            throw new Exception("No cryptographically secure random function available");
        }

        return $bytes;
    }

    private static function applyRFC4122v4standard(&$bytes)
    {
        //Setting up (0100b = 4) at the four most significant bits of the 7th byte
        $byte7 = substr($bytes, 6, 1);
        $byte7 = ord($byte7);

        $byte7 |= 64; //0x 0100 0000 = 64
        $byte7 &= 79; //0x 0100 1111 = 79

        //Setting up (10b => 8, 9, A or B) at the two most significant bits of the 9th byte
        $byte9 = substr($bytes, 8, 1);
        $byte9 = ord($byte9);

        $byte9 |= 128; //0x 1000 0000 = 128
        $byte9 &= ~64; //0x 1011 1111 = 191

        //Build up new bytes
        $bytes =  substr($bytes, 0, 6) . chr($byte7) . substr($bytes, 7, 1) . chr($byte9) . substr($bytes, 9, 7);
    }

    private static function addHypens(&$bytes)
    {
        $bytes = sprintf("%s-%s-%s-%s-%s", substr($bytes, 0, 8), substr($bytes, 8, 4), substr($bytes, 12, 4), substr($bytes, 16, 4), substr($bytes, 20, 12));
    }
}