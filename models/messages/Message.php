<?php

namespace app\models\messages;

use yii\base\Model;

/**
 * Class Message
 * @package app\models\messages
 */
class Message extends Model
{

    /**
     * @var array
     */
    public $keyboard = [];

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $chatId;

    /**
     * @var string
     */
    public $messageId;

    /**
     * @var string
     */
    public $replyId = "";


    /**
     * @return bool
     */
    public function isEmpty()
    {
        if (!empty($this->chatId)) {
            if (!empty($this->text)) {
                return false;
            }
        }
        return true;
    }
}