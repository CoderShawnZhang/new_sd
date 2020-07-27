<?php

use yii\db\Migration;

/**
 * Class m200727_103554_update_rbac_table_prefix
 */
class m200727_103554_update_rbac_table_prefix extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('{{user}}','{{sd_user}}');
        $this->renameTable('{{menu}}','{{sd_menu}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200727_103554_update_rbac_table_prefix cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200727_103554_update_rbac_table_prefix cannot be reverted.\n";

        return false;
    }
    */
}
