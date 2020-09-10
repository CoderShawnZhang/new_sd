<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-23
 * Time: 09:46
 */

namespace backend\Modules\Goods\Controllers;


use backend\controllers\BaseController;
use Service\Ars\Tables\AttributeTypeTable;

class GoodsController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd(){
        //分类+必须按属性列表
        $must_list = AttributeTypeTable::find()->with('attributeValues')->where(['type'=>[1,3]])->orderBy('type desc,sort asc')->all();
        //可选属性列表
        $need_list = AttributeTypeTable::find()->with('attributeValues')->where(['type'=>[2]])->orderBy('type desc,sort asc')->all();
        //参数属性列表
        $params_list = AttributeTypeTable::find()->with('attributeValues')->where(['type'=>[4]])->orderBy('type desc,sort asc')->all();

        return $this->render('add',[
            'must_list' => $must_list,
            'need_list' => $need_list,
            'params_list' => $params_list
        ]);
    }
}