<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "sd_open_role_relation".
 *
 * @property int $id
 * @property int $role_id
 * @property int $limit_date_constant_id
 * @property int $limit_money_constant_id
 * @property int $status
 *
 * @property CustomerRole $id0
 */
class OpenRoleRelationTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sd_open_role_relation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'limit_date_constant_id', 'limit_money_constant_id'], 'required'],
            [['role_id', 'limit_date_constant_id', 'limit_money_constant_id', 'status'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerRole::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'limit_date_constant_id' => 'Limit Date Constant ID',
            'limit_money_constant_id' => 'Limit Money Constant ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerRoleQuery
     */
    public function getId0()
    {
        return $this->hasOne(CustomerRole::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\OpenRoleRelationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\OpenRoleRelationQuery(get_called_class());
    }
}
