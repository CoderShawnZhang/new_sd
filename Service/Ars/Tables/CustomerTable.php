<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property int $id
 * @property string $user_name 客户认证，权限，角色表
 * @property string $password
 * @property string|null $email
 * @property int $role
 * @property int|null $parent_level_1
 * @property int|null $parent_level_2
 * @property float $return_money_ratio 返现比率(百分比)
 * @property int|null $last_login_at
 * @property int $on_line
 * @property int $status
 * @property string $access_token
 * @property int $created_at
 * @property int $updated_at
 *
// * @property CustomerRole $id0
// * @property CustomerCommon[] $customerCommons
// * @property CustomerReturnMoney[] $customerReturnMoneys
// * @property CustomerWx[] $customerWxes
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
            [['user_name', 'password', 'role', 'access_token', 'created_at'], 'required'],
            [['role', 'parent_level_1', 'parent_level_2', 'last_login_at', 'on_line', 'status', 'created_at', 'updated_at'], 'integer'],
            [['return_money_ratio'], 'number'],
            [['user_name', 'password', 'email'], 'string', 'max' => 45],
            [['access_token'], 'string', 'max' => 100],
            [['access_token'], 'unique'],
//            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerRole::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => '客户认证，权限，角色表',
            'password' => 'Password',
            'email' => 'Email',
            'role' => 'Role',
            'parent_level_1' => 'Parent Level 1',
            'parent_level_2' => 'Parent Level 2',
            'return_money_ratio' => '返现比率(百分比)',
            'last_login_at' => 'Last Login At',
            'on_line' => 'On Line',
            'status' => 'Status',
            'access_token' => 'Access Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerRoleQuery
     */
    public function getId0()
    {
//        return $this->hasOne(CustomerRole::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[CustomerCommons]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerCommonQuery
     */
    public function getCustomerCommons()
    {
//        return $this->hasMany(CustomerCommon::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[CustomerReturnMoneys]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerReturnMoneyQuery
     */
    public function getCustomerReturnMoneys()
    {
//        return $this->hasMany(CustomerReturnMoney::className(), ['customer_id' => 'parent_level_1']);
    }

    /**
     * Gets query for [[CustomerWxes]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerWxQuery
     */
    public function getCustomerWxes()
    {
//        return $this->hasMany(CustomerWx::className(), ['id' => 'id']);
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
