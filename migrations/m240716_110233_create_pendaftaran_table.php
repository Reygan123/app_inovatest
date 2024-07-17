<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pendaftaran}}`.
 */
class m240716_110233_create_pendaftaran_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pendaftaran}}', [
            'id' => $this->primaryKey(),
            'pasien_id' => $this->integer()->notNull(),
            'tanggal_daftar' => $this->date()->notNull()
            // 'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            // 'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-pendaftaran-pasien_id',
            '{{%pendaftaran}}',
            'pasien_id',
            '{{%pasien}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-pendaftaran-pasien_id', '{{%pendaftaran}}');
        $this->dropTable('{{%pendaftaran}}');
    }
}
