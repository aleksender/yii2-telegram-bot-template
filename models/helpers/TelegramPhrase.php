<?php

namespace app\models\helpers;


/**
 * Class TelegramPhrase
 * @package app\models\helpers
 */
class TelegramPhrase
{
    /**
     * @param $string
     * @return string
     */
    public static function bold($string)
    {
        return "<b>$string</b>";
    }

    /**
     * @return string
     */
    public static function dashedLine()
    {
        return "\n" . "----------" . "\n";
    }
}