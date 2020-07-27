<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "sd_customer_role".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 *
 * @property Customer $customer
 * @property OpenRoleRelation $openRoleRelation
 */
class CustomerRoleTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer_role}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[OpenRoleRelation]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\OpenRoleRelationQuery
     */
    public function getOpenRoleRelation()
    {
        return $this->hasOne(OpenRoleRelation::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\CustomerRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\CustomerRoleQuery(get_called_class());
    }
}
