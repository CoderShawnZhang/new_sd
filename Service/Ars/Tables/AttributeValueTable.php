<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "{{%attribute_value}}".
 *
 * @property int $value_id 规格属性值编号
 * @property int $type_id 规格属性名称编号
 * @property string $name 规格属性数值
 * @property int $sort 排序
 *
 * @property AttributeTypeTable $type
 */
class AttributeValueTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%attribute_value}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'name'], 'required'],
            [['value_id', 'type_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['value_id', 'type_id'], 'unique', 'targetAttribute' => ['value_id', 'type_id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributeTypeTable::className(), 'targetAttribute' => ['type_id' => 'type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'value_id' => '规格属性值编号',
            'type_id' => '规格属性名称编号',
            'name' => '规格属性数值',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\AttributeTypeQuery
     */
    public function getType()
    {
        return $this->hasOne(AttributeTypeTable::className(), ['type_id' => 'type_id']);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\AttributeValueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\AttributeValueQuery(get_called_class());
    }
}
