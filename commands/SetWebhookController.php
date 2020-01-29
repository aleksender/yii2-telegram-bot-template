<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Class SetWebhookController
 * @package app\commands
 */
class SetWebhookController extends Controller
{
    /**
     * @param $url
     * @return string
     */
    public function actionIndex($url)
    {
        return Yii::$app->bot->setWebhook($url);
    }
}