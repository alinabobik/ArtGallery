<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $phone
 * @property string $email
 */
class SignupForm extends \yii\db\ActiveRecord
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
            [['username', 'password', 'surname', 'name', 'patronymic', 'phone', 'email'], 'required'],
            [['username', 'password', 'surname', 'name', 'patronymic', 'phone', 'email'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'surname' => 'Surname',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }
}
