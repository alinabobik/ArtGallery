<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "katalog".
 *
 * @property int $id
 * @property string $name
 */
class Bid extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'bid';
    }

    public function rules()
    {
        return [
            [['auction_id', 'user_id', 'amount'], 'required'],
            [['amount'], 'number', 'min' => 0.01],
        ];
    }

    // Связи
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getAuction()
    {
        return $this->hasOne(Auction::class, ['id' => 'auction_id']);
    }
}