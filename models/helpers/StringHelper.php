<?php

namespace app\models\helpers;

/**
 * Class StringHelper
 * @package app\models\helpers
 */
class StringHelper extends \yii\helpers\StringHelper
{
    public static function mbUcFirst($string)
    {
        return mb_strtoupper(substr($string, 0, 1)) . mb_strtolower(substr($string, 1, strlen($string) - 1));
    }
}