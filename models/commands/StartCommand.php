<?php

namespace app\models\commands;


use app\models\messages\Message;

/**
 * Class StartCommand
 * @package app\models\commands
 */
class StartCommand extends Command
{
    /**
     * @return Message
     */
    public function returnMessage()
    {
        return new Message([
            "text" => \Yii::t('app', "Hello!!!"),
            "chatId" => $this->telegramBotResponse->chatId(),
            "messageId" => $this->telegramBotResponse->messageId(),
        ]);
    }

    /**
     * @return string
     */
    public static function name()
    {
        return '/start';
    }

    /**
     * @return bool
     */
    public function execute()
    {
        return true;
    }
}