<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proposal".
 *
 * @property int $id
 * @property string $name
 * @property string $body
 * @property string $image
 * @property int $user_id
 * @property string $created_at
 *
 * @property Review[] $reviews
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proposal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'body', 'image', 'user_id'], 'required'],
            [['body'], 'string'],
            [['user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'image'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'body' => 'Body',
            'image' => 'Image',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['proposal_id' => 'id']);
    }
}
