<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "sd_customer_return_money".
 *
 * @property int $id
 * @property int $customer_id
 * @property int|null $parent_level_1
 * @property int|null $parent_level_2
 * @property int|null $parent_level_3
 * @property float|null $parent_1_ratio
 * @property float|null $parent_2_ratio
 * @property float|null $parent_3_ratio
 * @property float|null $parent_1_return_money
 * @property float|null $parent_2_return_money
 * @property float|null $parent_3_return_money
 * @property int $order_id
 * @property int $sub_order_id
 * @property int $status
 * @property int $return_time
 * @property int|null $return_type
 * @property float|null $level_1_rely_money
 * @property float|null $level_2_rely_money
 * @property float|null $level_3_rely_money
 * @property int $order_role
 *
 * @property Customer $customer
 */
class CustomerReturnMoneyTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sd_customer_return_money';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'parent_level_1', 'parent_level_2', 'parent_level_3', 'order_id', 'sub_order_id', 'status', 'return_time', 'return_type', 'order_role'], 'integer'],
            [['parent_1_ratio', 'parent_2_ratio', 'parent_3_ratio', 'parent_1_return_money', 'parent_2_return_money', 'parent_3_return_money', 'level_1_rely_money', 'level_2_rely_money', 'level_3_rely_money'], 'number'],
            [['order_id', 'sub_order_id'], 'required'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'parent_level_1']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'parent_level_1' => 'Parent Level 1',
            'parent_level_2' => 'Parent Level 2',
            'parent_level_3' => 'Parent Level 3',
            'parent_1_ratio' => 'Parent 1 Ratio',
            'parent_2_ratio' => 'Parent 2 Ratio',
            'parent_3_ratio' => 'Parent 3 Ratio',
            'parent_1_return_money' => 'Parent 1 Return Money',
            'parent_2_return_money' => 'Parent 2 Return Money',
            'parent_3_return_money' => 'Parent 3 Return Money',
            'order_id' => 'Order ID',
            'sub_order_id' => 'Sub Order ID',
            'status' => 'Status',
            'return_time' => 'Return Time',
            'return_type' => 'Return Type',
            'level_1_rely_money' => 'Level 1 Rely Money',
            'level_2_rely_money' => 'Level 2 Rely Money',
            'level_3_rely_money' => 'Level 3 Rely Money',
            'order_role' => 'Order Role',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['parent_level_1' => 'customer_id']);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\CustomerReturnMoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\CustomerReturnMoneQuery(get_called_class());
    }
}
