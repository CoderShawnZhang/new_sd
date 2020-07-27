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
 * @property float|null $this_month_buymoney
 * @property float|null $last_month_buymoney
 * @property float|null $three_month_buymoney
 * @property float|null $is_three_money_buy
 * @property float|null $is_three_month_notbuy
 * @property int|null $is_year_buy
 * @property int|null $status
 * @property int|null $last_login_time
 * @property int|null $last_buy_time
 * @property int|null $is_address_trransfer
 * @property int|null $is_store
 *
 * @property Customer $customer
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
            [['customer_id', 'service_id', 'order_count', 'is_year_buy', 'status', 'last_login_time', 'last_buy_time', 'is_address_trransfer', 'is_store'], 'integer'],
            [['order_buy_money', 'order_refund_money', 'this_month_buymoney', 'last_month_buymoney', 'three_month_buymoney', 'is_three_money_buy', 'is_three_month_notbuy'], 'number'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
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
            'this_month_buymoney' => 'This Month Buymoney',
            'last_month_buymoney' => 'Last Month Buymoney',
            'three_month_buymoney' => 'Three Month Buymoney',
            'is_three_money_buy' => 'Is Three Money Buy',
            'is_three_month_notbuy' => 'Is Three Month Notbuy',
            'is_year_buy' => 'Is Year Buy',
            'status' => 'Status',
            'last_login_time' => 'Last Login Time',
            'last_buy_time' => 'Last Buy Time',
            'is_address_trransfer' => 'Is Address Trransfer',
            'is_store' => 'Is Store',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
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
