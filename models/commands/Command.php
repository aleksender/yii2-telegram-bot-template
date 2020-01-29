<?php

namespace app\models\commands;


use app\models\exceptions\BadCommandException;
use app\models\MessageExamples;
use app\models\messages\Message;
use app\models\TelegramBotRequest;
use app\models\User;

/**
 * Class Command
 * @package app\models\commands
 */
abstract class Command
{

    /**
     * @var TelegramBotRequest
     */
    protected $telegramBotResponse;
    /**
     * @var User
     */
    protected $user;

    /**
     * Command constructor.
     * @param TelegramBotRequest $telegramBotResponse
     */
    public function __construct(TelegramBotRequest $telegramBotResponse)
    {
        $this->telegramBotResponse = $telegramBotResponse;
        $this->user = User::fromTelegramRequest($telegramBotResponse);
    }

    /**
     * @return bool
     */
    abstract public function execute();

    /** @return Message */
    abstract public function returnMessage();

    /** @return string */
    abstract public static function name();


    /**
     * @param TelegramBotRequest $telegramBotRequest
     * @return StartCommand
     * @throws BadCommandException
     */
    public static function factory(TelegramBotRequest $telegramBotRequest)
    {
        switch ($telegramBotRequest->command()) {
            case StartCommand::name():
                $command = new StartCommand($telegramBotRequest);
                break;
            default:
                $command = new MessageFromUser($telegramBotRequest);
                break;
        }

        if ($command->execute()){
            return $command;
        }

        throw new BadCommandException();
    }
}