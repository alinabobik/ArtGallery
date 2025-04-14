<?php

use yii\db\Migration;

/**
 * Class m250413_185027_add_is_auction_to_proposal
 */
class m250413_185027_add_is_auction_to_proposal extends Migration
{
    public function safeUp() {
        // Проверка, существует ли таблица proposal (если создана вручную)
        if ($this->db->schema->getTableSchema('proposal') === null) {
            throw new \yii\db\Exception("Таблица 'proposal' не существует.");
        }

        // Добавление поля is_auction, если его ещё нет
        $this->addColumn('proposal', 'is_auction', $this->boolean()->defaultValue(false));
    }

    public function safeDown() {
        $this->dropColumn('proposal', 'is_auction');
    }
}
