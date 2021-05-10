<?php

namespace app\models\services;

class LinkHelper
{
    private static $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private static $tokenLength = 8;


    public static function generateShortLink()
    {
        $randomString = '';
        for ($i=0; $i < self::$tokenLength; $i++)
        {
            $randomString .= self::$permittedChars[mt_rand(0, strlen(self::$permittedChars))];
        }
        return $randomString;
    }

}