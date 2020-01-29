<?php

namespace app\models\commands;


use app\models\helpers\TelegramSmile;
use app\models\messages\Message;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class WithReplyKeyboardCommand extends Command
{

    /**
     * @return bool
     */
    public function execute()
    {
        return true;
    }

    /** @return Message */
    public function returnMessage()
    {
        return new Message([
            'text' => \Yii::t('app', 'Return message'),
            'messageId' => $this->telegramBotRequest->messageId(),
            'chatId' => $this->telegramBotRequest->chatId(),
            'keyboard' => new ReplyKeyboardMarkup([
                [
                    TelegramSmile::football() . ' ' . \Yii::t('app', 'Football'),
                    TelegramSmile::tennis() . ' ' . \Yii::t('app', 'Tennis'),
                ],
                [
                    TelegramSmile::football() . ' ' . \Yii::t('app', 'Football'),
                    TelegramSmile::tennis() . ' ' . \Yii::t('app', 'Tennis'),
                ],
                [
                    TelegramSmile::tennis() . ' ' . \Yii::t('app', 'Tennis'),
                ]
            ], false, true),
        ]);
    }

    /** @return string */
    public static function name()
    {
        return '';
    }
}