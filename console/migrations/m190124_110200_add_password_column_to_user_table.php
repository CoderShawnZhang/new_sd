<?php

use \yii\db\Migration;

class m190124_110200_add_password_column_to_user_table extends Migration
{
    public function safeUp()
    {
//        $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}','password',$this->string(64));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'password');
    }
}
