<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bid}}`.
 */
class m250413_183337_create_bid_table extends Migration
{
    public function safeUp() {
        $this->createTable('bid', [
            'id' => $this->primaryKey(),
            'auction_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'amount' => $this->decimal(10, 2)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // Внешние ключи
        $this->addForeignKey(
            'fk-bid-auction_id',
            'bid',
            'auction_id',
            'auction',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-bid-user_id',
            'bid',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function safeDown() {
        $this->dropTable('bid');
    }
}
