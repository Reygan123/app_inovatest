<?php

use yii\db\Migration;

/**
 * Class m240717_012859_alter_user_add_default_role
 */
class m240717_012859_alter_user_add_default_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'role', $this->string()->notNull()->defaultValue('user'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('user', 'role', $this->string()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240717_012859_alter_user_add_default_role cannot be reverted.\n";

        return false;
    }
    */
}
