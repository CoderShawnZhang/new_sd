<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "chat_online".
 *
 * @property int $id
 * @property int|null $uid
 * @property string|null $fd
 * @property int|null $state
 */
class ChatOnline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_online';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'uid', 'state'], 'integer'],
            [['fd'], 'string', 'max' => 200],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'fd' => 'Fd',
            'state' => 'State',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\ChatOnlineQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\ChatOnlineQuery(get_called_class());
    }
}
