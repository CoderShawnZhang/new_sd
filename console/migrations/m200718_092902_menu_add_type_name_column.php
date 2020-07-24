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
    public function up()
    {
        /**
         * 菜单新增类型字段，（该字段可以确定是否是项目初始化固定字段）
         */
        $this->addColumn($this->tableName,'type_name',$this->string(10));
        $this->alterColumn($this->tableName,'data',$this->string(200));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn($this->tableName,'type_name');
        $this->dropColumn($this->tableName,'data');
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
