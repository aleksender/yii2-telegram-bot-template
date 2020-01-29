<?php

namespace app\models\queries;


use app\models\User;
use yii\db\ActiveQuery;

/**
 * Class UserQuery
 * @package app\models\queries
 */
class UserQuery extends ActiveQuery
{
    /**
     * @param null $db
     * @return array|null|\yii\db\ActiveRecord|User
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param null $db
     * @return array|\yii\db\ActiveRecord[]|User[]
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
}