<?php

namespace app\models\components;

use \app\models\messages\Message;
use TelegramBot\Api\BotApi;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Class TelegramBot
 * @package app\models\components
 */
class TelegramBot extends Component
{

    /**
     * @var string
     */
    public $botLink;

    /**
     * @var string
     */
    public $applicationKey;

    /**
     * @var BotApi
     */
    private $botApi;


    /**
     * TelegramBot constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->botApi = new BotApi($config['apiToken']);
    }

    /**
     * @param Message $message
     * @return bool
     * @throws \TelegramBot\Api\Exception
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public function send(Message $message)
    {
        if (!$message->isEmpty()) {
            return !empty($this->botApi->sendMessage($message->chatId, $message->text, "html", false, $message->replyId, $message->keyboard));
        }

        return false;
    }

    /**
     * @param string $webhookUrl
     * @return string
     * @throws \TelegramBot\Api\Exception
     */
    public function setWebhook(string $webhookUrl)
    {
        return $this->botApi->setWebhook($webhookUrl);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function validateKey(string $key)
    {
        return $key == $this->applicationKey || !($this->applicationKey);
    }
}