<?php

use yii\db\Migration;

/**
 * customer 主表
 */
class m200701_063835_create_customer_table extends Migration
{
    private $table_str = '{{%customer}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB COMMENT="客户主表"';
        }
        $this->createTable($this->table_str, [
            'id' => $this->primaryKey(),
            'a' => $this->string(100)->notNull()->defaultValue('11')
        ],$tableOptions);

        //增长一列在指定列后面
        $this->addColumn($this->table_str,'aa',$this->string()->after('a')->notNull());
        //设置索引
        $this->createIndex('a',$this->table_str,'a');
        //添加注释
        $this->addCommentOnColumn($this->table_str,'a','添加a列注释');
        //新增一列
        $this->addColumn($this->table_str,'b',$this->string(200)->defaultValue('88'));
        //删除一列
        $this->dropColumn($this->table_str,'b');
        //添加表注释
        $this->addCommentOnTable($this->table_str,'添加表注释');
        //修改列类型，
        $this->alterColumn($this->table_str,'a',$this->integer()->defaultValue(9));

        //命令列表
//        $this->addCommentOnTable();
//        $this->addColumn();
//        $this->addCommentOnColumn();
//        $this->addForeignKey();
//        $this->addPrimaryKey();
//
//        $this->alterColumn();
//        $this->attachBehavior();
//        $this->attachBehaviors();
//
//        $this->batchInsert();
//        $this->beginCommand();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table_str);
    }
}
