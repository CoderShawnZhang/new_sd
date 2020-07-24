<?php

use yii\db\Migration;

/**
 * Class m200724_064137_user_add_password_column
 */
class m200724_064137_user_add_password_column extends Migration
{
    private $tableName = '{{%user}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName,'password',$this->string(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200724_064137_user_add_password_column cannot be reverted.\n";
        $this->dropColumn($this->tableName,'password');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200724_064137_user_add_password_column cannot be reverted.\n";

        return false;
    }
    */
}
