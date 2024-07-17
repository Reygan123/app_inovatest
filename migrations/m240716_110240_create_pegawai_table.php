<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pegawai}}`.
 */
class m240716_110240_create_pegawai_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pegawai}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->text(),
            'phone_number' => $this->string(),
            'email' => $this->string(),
            'role' => $this->string()->notNull(),
            'wilayah_id' => $this->integer()->notNull(),
            // 'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            // 'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-pegawai-wilayah_id',
            '{{%pegawai}}',
            'wilayah_id',
            '{{%wilayah}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-pegawai-wilayah_id', '{{%pegawai}}');
        $this->dropTable('{{%pegawai}}');
    }
}
