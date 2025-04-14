<?php

namespace app\models;

use Yii;
use yii\base\Model;


class ReviewForm extends Model
{
    public $description;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['description', 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'description' => 'Комментарий',
        ];
    }
}
