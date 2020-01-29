<?php

namespace app\models\commands;

use app\models\messages\Message;

class MessageFromUser extends Command
{
    /**
     * @return bool
     */
    public function execute()
    {
        $message = $this->telegramBotRequest->command();

        /**
         * Work with message here...
         */

        return true;
    }

    /**
     * @return \app\models\messages\Message
     */
    public function returnMessage()
    {
        return new Message([
            "text" => \Yii::t('app', "Your message was processed"),
            "chatId" => $this->telegramBotRequest->chatId(),
            "messageId" => $this->telegramBotRequest->messageId(),
        ]);
    }

    /** @return string */
    public static function name()
    {
        return '';
    }
}