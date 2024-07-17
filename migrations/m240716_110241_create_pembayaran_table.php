<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pembayaran}}`.
 */
class m240716_110241_create_pembayaran_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pembayaran}}', [
            'id' => $this->primaryKey(),
            'pendaftaran_id' => $this->integer()->notNull(),
            'total_amount' => $this->decimal(10, 2),
            'payment_date' => $this->date(),
            // 'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            // 'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-pembayaran-pendaftaran_id',
            '{{%pembayaran}}',
            'pendaftaran_id',
            '{{%pendaftaran}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-pembayaran-pendaftaran_id', '{{%pembayaran}}');
        $this->dropTable('{{%pembayaran}}');
    }
}
