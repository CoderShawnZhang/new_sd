<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-18
 * Time: 16:47
 */
namespace console\models;

use function foo\func;
use yii\db\ActiveRecord;

/**
 * Class MenuAr
 * @package console\models
 * @property string name
 * @property integer id
 */
class MenuAr extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%menu}}";
    }

    public function rules()
    {
        return [
            [['name','route','data','type_name'],'string','message'=>'aaaaaaa'],
            [['id','parent','order'],'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'parent' => 'parent',
            'route' => 'route',
            'order' => 'order',
            'data' => 'data',
            'type_name' => 'type_name'
        ];
    }

    public function fields()
    {
        $fieldsArray = [
            'id' => function($m){
                return $m->id;
            }
        ];
        return array_merge(parent::fields(),$fieldsArray);
    }

    public function extraFields()
    {
        return [
            'children' => function ($m){
                $menu_data = json_decode($m->data,true);
                if(isset($menu_data['show_child']) == 'false'){
                    return [];
                }
               return self::find()->where(['parent' => $m['id']])->asArray()->all();
            }
        ];
    }

}