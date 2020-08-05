<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "sd_customer_wx".
 *
 * @property int $id
 * @property int $customer_id 客户微信信息表
 * @property string $nickname
 * @property string $wx_openid
 * @property string|null $xcx_openid
 * @property string $unionId
 * @property string|null $avatar_url
 * @property int|null $gender
 * @property string|null $province
 * @property string|null $city
 * @property string|null $mobile
 * @property string|null $watermark 用户认证信息
 * @property int $is_wx_subscribe
 * @property int|null $wx_subscribe_time
 * @property int $created_at
 * @property string $updated_at
 *
// * @property Customer $id0
 */
class CustomerWxTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer_wx}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'nickname', 'wx_openid', 'unionId'], 'required'],
            [['customer_id', 'gender', 'is_wx_subscribe', 'wx_subscribe_time', 'created_at', 'province', 'city','mobile'], 'integer'],
            [['updated_at'], 'safe'],
            [['nickname', 'wx_openid', 'xcx_openid', 'unionId'], 'string', 'max' => 45],
            [['avatar_url', 'watermark'], 'string', 'max' => 255],
//            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => '客户微信信息表',
            'nickname' => 'Nickname',
            'wx_openid' => 'Wx Openid',
            'xcx_openid' => 'Xcx Openid',
            'unionId' => 'Union ID',
            'avatar_url' => 'Avatar Url',
            'gender' => 'Gender',
            'province' => 'Province',
            'city' => 'City',
            'mobile' => 'Mobile',
            'watermark' => '用户认证信息',
            'is_wx_subscribe' => 'Is Wx Subscribe',
            'wx_subscribe_time' => 'Wx Subscribe Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\CustomerQuery
     */
    public function getId0()
    {
//        return $this->hasOne(Customer::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\CustomerWxQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\CustomerWxQuery(get_called_class());
    }
}
