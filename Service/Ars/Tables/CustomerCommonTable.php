<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "sd_customer_common".
 *
 * @property int $id
 * @property int $customer_id 客户副表
 * @property int|null $service_id
 * @property float $order_buy_money
 * @property float|null $order_refund_money
 * @property int|null $order_count
 * @property float|null $this_month_buy_money
 * @property float|null $last_month_buy_money
 * @property float|null $three_month_buy_money
 * @property float|null $is_three_money_buy
 * @property float|null $is_three_month_not_buy
 * @property int|null $is_year_buy
 * @property int|null $status
 * @property int|null $last_login_time
 * @property int|null $last_buy_time
 * @property int|null $is_address_transfer
 * @property int|null $is_store
 *
// * @property Customer $customer
 */
class CustomerCommonTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer_common}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'order_buy_money'], 'required'],
            [['customer_id', 'service_id', 'order_count', 'is_year_buy', 'status', 'last_login_time', 'last_buy_time', 'is_address_transfer', 'is_store'], 'integer'],
            [['order_buy_money', 'order_refund_money', 'this_month_buy_money', 'last_month_buy_money', 'three_month_buy_money', 'is_three_money_buy', 'is_three_month_not_buy'], 'number'],
//            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => '客户副表',
            'service_id' => 'Service ID',
            'order_buy_money' => 'Order Buy Money',
            'order_refund_money' => 'Order Refund Money',
            'order_count' => 'Order Count',
            'this_month_buy_money' => 'This Month Buymoney',
            'last_month_buy_money' => 'Last Month Buymoney',
            'three_month_buy_money' => 'Three Month Buymoney',
            'is_three_money_buy' => 'Is Three Money Buy',
            'is_three_month_not_buy' => 'Is Three Month Notbuy',
            'is_year_buy' => 'Is Year Buy',
            'status' => 'Status',
            'last_login_time' => 'Last Login Time',
            'last_buy_time' => 'Last Buy Time',
            'is_address_transfer' => 'Is Address Transfer',
            'is_store' => 'Is Store',
        ];
    }


    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\CustomerCommonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\CustomerCommonQuery(get_called_class());
    }
}
