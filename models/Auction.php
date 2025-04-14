<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "katalog".
 *
 * @property int $id
 * @property string $name
 */
class Auction extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'auction';
    }

    public function rules()
    {
        return [
            [['proposal_id', 'start_price', 'start_time', 'end_time'], 'required'],
            [['start_price', 'current_bid'], 'number', 'min' => 0.01],
            [['status_id'], 'default', 'value' => 1],
        ];
    }

    // Связи
    public function getProposal()
    {
        return $this->hasOne(Proposal::class, ['id' => 'proposal_id']);
    }

    public function getBids()
    {
        return $this->hasMany(Bid::class, ['auction_id' => 'id'])->orderBy('amount DESC');
    }
}