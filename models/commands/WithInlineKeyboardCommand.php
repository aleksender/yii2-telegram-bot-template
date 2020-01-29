<?php

namespace app\models\commands;


use app\models\helpers\TelegramSmile;
use app\models\messages\Message;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class WithInlineKeyboardCommand extends Command
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
            'keyboard' => new InlineKeyboardMarkup([
                [
                    ['text' => TelegramSmile::football() . ' ' . \Yii::t('app', 'Football'), 'callback_data' => StartCommand::name()],
                ],
                [
                    ['text' => TelegramSmile::tennis() . ' ' . \Yii::t('app', 'Tennis'), 'callback_data' => StartCommand::name()],
                ],
            ]),
        ]);
    }

    /** @return string */
    public static function name()
    {
        return '';
    }
}