<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auction}}`.
 */
class m250413_183328_create_auction_table extends Migration
{
    public function safeUp() {
        $this->createTable('auction', [
            'id' => $this->primaryKey(),
            'proposal_id' => $this->integer()->notNull(),
            'start_price' => $this->decimal(10, 2)->notNull(),
            'current_bid' => $this->decimal(10, 2)->notNull()->defaultValue(0.00),
            'start_time' => $this->dateTime()->notNull(),
            'end_time' => $this->dateTime()->notNull(),
            'status_id' => $this->integer()->notNull()->defaultValue(1), // 1 = активен, 2 = завершен
        ]);

        // Внешние ключи
        $this->addForeignKey(
            'fk-auction-proposal_id',
            'auction',
            'proposal_id',
            'proposal',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-auction-status_id',
            'auction',
            'status_id',
            'status',
            'id',
            'CASCADE'
        );
    }

    public function safeDown() {
        $this->dropTable('auction');
    }
}
