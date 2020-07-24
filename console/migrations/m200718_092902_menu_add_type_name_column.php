<?php

use yii\db\Migration;

/**
 * Class m200718_092902_menu_add_type_name_column
 */
class m200718_092902_menu_add_type_name_column extends Migration
{
    private $tableName = '{{%menu}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /**
         * 菜单新增类型字段，（该字段可以确定是否是项目初始化固定字段）
         */
        $this->addColumn($this->tableName,'type_name',$this->string(10));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200718_092902_menu_add_type_name_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200718_092902_menu_add_type_name_column cannot be reverted.\n";

        return false;
    }
    */
}
