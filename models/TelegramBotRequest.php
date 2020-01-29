<?php

namespace app\models;


use yii\helpers\Json;

/**
 * Class TelegramBotResponse
 * @package app\models
 */
class TelegramBotRequest
{
    /** @var  string */
    private $telegramId;
    /** @var  string */
    private $chatId;
    /** @var  string */
    private $firstName;
    /** @var  string */
    private $lastName;
    /** @var  string */
    private $username;
    /** @var  string */
    private $command;

    /** @var  string */
    private $messageId;

    public function __construct($content)
    {
        $data = Json::decode($content);
        $this->parse($data);
    }

    private function parse($data)
    {
        if (isset($data['callback_query'])) {
            $this->chatId = $data['callback_query']['message']['chat']['id'];
            $this->telegramId = $data['callback_query']['from']['id'];
            $this->firstName = @$data['callback_query']['message']['chat']['first_name'] ?: '';
            $this->lastName = @$data['callback_query']['message']['chat']['last_name'] ?: '';
            $this->username = @$data['callback_query']['message']['chat']['username'] ?: '';
            $this->command = $data['callback_query']['data'];
            $this->messageId = $data['callback_query']['message']['message_id'];
        }

        if (isset($data['message'])) {
            $this->chatId = $data['message']['chat']['id'];
            $this->telegramId = $data['message']['from']['id'];
            $this->firstName = @$data['message']['chat']['first_name'] ?: '';
            $this->lastName = @$data['message']['chat']['last_name'] ?: '';
            $this->username = @$data['message']['chat']['username'] ?: '';
            $this->command = $data['message']['text'];
        }
    }

    /**
     * @return string
     */
    public function chatId()
    {
        return $this->chatId;
    }

    /**
     * @return string
     */
    public function telegramId()
    {
        return $this->telegramId;
    }

    /**
     * @return string
     */
    public function firstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function lastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function messageId()
    {
        return $this->messageId;
    }

    /**
     * @return string
     */
    public function command()
    {
        return $this->command;
    }
}