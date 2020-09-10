<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "{{%cate}}".
 *
 * @property int $cate_id 分类id
 * @property int|null $parent_id 父类id
 * @property string $cate_name 分类名称
 * @property int $level 分类等级
 * @property string|null $img 分类图标
 * @property int $state 状态(1:可用，0:禁用)
 */
class CateTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cate}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_id', 'cate_name'], 'required'],
            [['cate_id', 'parent_id', 'level', 'state'], 'integer'],
            [['cate_name'], 'string', 'max' => 45],
            [['img'], 'string', 'max' => 100],
            [['cate_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cate_id' => '分类id',
            'parent_id' => '父类id',
            'cate_name' => '分类名称',
            'level' => '分类等级',
            'img' => '分类图标',
            'state' => '状态(1:可用，0:禁用)',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\CateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\CateQuery(get_called_class());
    }
}
