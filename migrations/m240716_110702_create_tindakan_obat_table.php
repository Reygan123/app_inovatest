<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tindakan_obat}}`.
 */
class m240716_110702_create_tindakan_obat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tindakanobat}}', [
            'id' => $this->primaryKey(),
            'pendaftaran_id' => $this->integer()->notNull(),
            'tindakan_id' => $this->integer(),
            'obat_id' => $this->integer(),
            'quantity' => $this->integer(),
            'total_cost' => $this->decimal(10, 2),
            // 'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            // 'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-tindakanobat-pendaftaran_id',
            '{{%tindakanobat}}',
            'pendaftaran_id',
            '{{%pendaftaran}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-tindakanobat-tindakan_id',
            '{{%tindakanobat}}',
            'tindakan_id',
            '{{%tindakan}}',
            'id',
            'SET NULL'
        );
        $this->addForeignKey(
            'fk-tindakanobat-obat_id',
            '{{%tindakanobat}}',
            'obat_id',
            '{{%obat}}',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-tindakanobat-pendaftaran_id', '{{%tindakanobat}}');
        $this->dropForeignKey('fk-tindakanobat-tindakan_id', '{{%tindakanobat}}');
        $this->dropForeignKey('fk-tindakanobat-obat_id', '{{%tindakanobat}}');
        $this->dropTable('{{%tindakanobat}}');
    }
}
