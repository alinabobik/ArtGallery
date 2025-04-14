<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_signup".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class CourseSignup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_signup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required'], // Убедитесь, что все поля обязательны для заполнения
            [['name', 'email', 'phone'], 'string'], // Валидация на строковые значения
            ['email', 'email'], // Валидация для email
            ['phone', 'match', 'pattern' => '/^\+7-\d{3}-\d{3}-\d{4}$/', 'message' => 'Номер телефона должен быть в формате +7-999-999-9999'], // Валидация для телефона
            ['name', 'match', 'pattern' => '/^[А-Яа-яёЁ\s\-]+$/u', 'message' => 'Имя должно содержать только русские буквы, пробелы и дефисы.'], // Валидация для имени
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Почта',
            'phone' => 'Номер телефона',
        ];
    }
}
