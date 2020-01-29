<?php

namespace app\models\commands;


use app\models\exceptions\BadCommandException;
use app\models\messages\Message;
use app\models\TelegramBotRequest;

/**
 * Class Command
 * @package app\models\commands
 */
abstract class Command
{

    /**
     * @var TelegramBotRequest
     */
    protected $telegramBotRequest;

    /**
     * Command constructor.
     * @param TelegramBotRequest $telegramBotRequest
     */
    public function __construct(TelegramBotRequest $telegramBotRequest)
    {
        $this->telegramBotRequest = $telegramBotRequest;
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
     * @return Command
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