<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property int|null $a
 * @property string $aa
 */
class CustomerTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['a'], 'integer'],
            [['aa'], 'required'],
            [['aa'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'a' => 'A',
            'aa' => 'Aa',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\CustomerQuery(get_called_class());
    }
}
