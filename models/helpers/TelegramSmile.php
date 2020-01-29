<?php

namespace app\models\helpers;

/**
 * Class TelegramSmile
 * @package app\models\helpers
 */
class TelegramSmile
{
    /**
     * @param $string
     * @return bool|string
     */
    public static function fromBytes($string)
    {
        return hex2bin(str_replace('\x', '', $string));
    }

    /**
     * @return bool|string
     */
    public static function football()
    {
        return static::fromBytes('\xE2\x9A\xBD');
    }

    /**
     * @return bool|string
     */
    public static function hockey()
    {
        return static::fromBytes('\xF0\x9F\x8F\x92');
    }

    /**
     * @return bool|string
     */
    public static function tennis()
    {
        return static::fromBytes('\xF0\x9F\x8E\xBE');
    }

    /**
     * @return bool|string
     */
    public static function money()
    {
        return static::fromBytes('\xF0\x9F\x92\xB0');
    }

    /**
     * @return bool|string
     */
    public static function creditCard()
    {
        return static::fromBytes('\xF0\x9F\x92\xB3');
    }

    /**
     * @return bool|string
     */
    public static function paperMoney()
    {
        return static::fromBytes('\xF0\x9F\x92\xB5');
    }

    /**
     * @return bool|string
     */
    public static function wingMoney()
    {
        return static::fromBytes('\xF0\x9F\x92\xB8');
    }
}