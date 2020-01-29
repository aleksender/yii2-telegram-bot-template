<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $telegram_id
 * @property string $language
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 *
 */
class User extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telegram_id', 'language', 'first_name', 'last_name', 'username',], 'string'],
            [['language'], 'default', Language::LANGUAGE_EN],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telegram_id' => 'Telegram ID',
            'language' => 'Language',
            'first_name' => 'First Name',
            'last_name' => 'LastName',
            'username' => 'Username',
        ];
    }

    /**
     * {@inheritdoc}
     * @return queries\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new queries\UserQuery(static::class);
    }

    /**
     * @param TelegramBotRequest $request
     * @return User|array|null|ActiveRecord
     */
    public static function fromTelegramRequest(TelegramBotRequest $request)
    {
        static $user;
        if (!$user) {
            $user = self::find()->where(['telegram_id' => $request->telegramId()])->one();
            if (!$user) {
                $user = new self([
                    'telegram_id' => $request->telegramId(),
                    'first_name' => $request->firstName(),
                    'last_name' => $request->lastName(),
                    'username' => $request->username(),
                ]);
                $user->save();
            }
        }

        return $user;
    }
}
