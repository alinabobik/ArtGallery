<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kurs".
 *
 * @property int $id
 * @property string $img
 * @property string $name
 * @property string $body
 */
class Kurs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kurs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'img', 'name', 'body'], 'required'],
            [['id'], 'integer'],
            [['img', 'name', 'body'], 'string', 'max' => 256],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'name' => 'Name',
            'body' => 'Body',
        ];
    }
}
