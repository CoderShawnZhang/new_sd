<?php
/**
 * 系统参数化配置表
 */
use yii\db\Migration;

/**
 * Handles the creation of table `{{%config}}`.
 */
class m200724_070351_create_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%config}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(32)->defaultValue(null),
            'value' => $this->string(64)->defaultValue(''),
            'desc' => $this->string(200)->defaultValue('')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%config}}');
    }
}
