<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property string|null $desc
 */
class ConfigTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key'], 'string', 'max' => 32],
            [['value'], 'string', 'max' => 64],
            [['desc'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'desc' => 'Desc',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\ConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\ConfigQuery(get_called_class());
    }
}
