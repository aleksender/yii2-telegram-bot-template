<?php

namespace app\controllers;


use app\models\commands\Command;
use app\models\TelegramBotRequest;
use app\models\User;
use yii\log\Logger;
use yii\web\Controller;
use Yii;

/**
 * Class TelegramBotController
 * @package app\controllers
 */
class TelegramBotController extends Controller
{
    /**
     * @var TelegramBotRequest
     */
    private $telegramBotRequest;

    /**
     * @var User
     */
    private $user;

    /**
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->telegramBotRequest = new TelegramBotRequest(Yii::$app->request->rawBody);
        $this->user = User::fromTelegramRequest($this->telegramBotRequest);
        Yii::$app->language = $this->user->language;
        return parent::beforeAction($action);
    }

    /**
     * @return void
     */
    public function actionIndex()
    {
        try {
            Yii::$app->bot->send(
                Command::factory($this->telegramBotRequest)
                    ->returnMessage()
            );
        } catch (\Exception $e) {
            $logger = Yii::getLogger();
            $logger->log($e->getMessage(), Logger::LEVEL_ERROR);
        }
    }
}