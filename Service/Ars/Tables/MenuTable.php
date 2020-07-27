<?php

namespace Service\Ars\Tables;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent
 * @property string|null $route
 * @property int|null $order
 * @property string|null $data
 * @property string|null $type_name
 *
 * @property MenuTable $parent0
 * @property MenuTable[] $menuTables
 */
class MenuTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent', 'order'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['route'], 'string', 'max' => 255],
            [['data'], 'string', 'max' => 200],
            [['type_name'], 'string', 'max' => 10],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => MenuTable::className(), 'targetAttribute' => ['parent' => 'id']],
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
            'parent' => 'Parent',
            'route' => 'Route',
            'order' => 'Order',
            'data' => 'Data',
            'type_name' => 'Type Name',
        ];
    }

    /**
     * Gets query for [[Parent0]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\MenuTableQuery
     */
    public function getParent0()
    {
        return $this->hasOne(MenuTable::className(), ['id' => 'parent']);
    }

    /**
     * Gets query for [[MenuTables]].
     *
     * @return \yii\db\ActiveQuery|\Service\Ars\Querys\MenuTableQuery
     */
    public function getMenuTables()
    {
        return $this->hasMany(MenuTable::className(), ['parent' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \Service\Ars\Querys\ConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \Service\Ars\Querys\ConfigQuery(get_called_class());
    }
}
