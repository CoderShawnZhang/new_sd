<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-08-23
 * Time: 16:10
 */

namespace backend\Modules\Goods\Controllers;


use backend\controllers\BaseController;
use Service\Ars\Tables\AttributeTypeTable;
use Service\Ars\Tables\AttributeValueTable;
use Service\Helper\Tools\ArrayHelper;
use Yii;
use yii\web\Response;

class AttrController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $count = 10;
        $limit = 10;
        $dataArray = AttributeValueTable::find()->with('type')->asArray()->all();
        $data = [];
        foreach($dataArray as $key => $val){
            $data[$key]['value_id'] = $val['value_id'];
            $data[$key]['name'] = $val['name'];
            $data[$key]['parent_name'] = $val['type']['name'];
            $data[$key]['type'] = $val['type']['type'];
            $data[$key]['sort'] = $val['type']['sort'];
            $data[$key]['status'] = $val['type']['status'];
        }
        return $this->layUiTableData($data,$count,$limit);
    }

    public function actionAdd()
    {
        $list = AttributeTypeTable::find()->all();
        $typeList = [
            1=>'必选属性',
            2=>'可选属性',
            3=>'分类',
            4=>'参数'
        ];
        return $this->render('add',['list' => $list,'typeList' => $typeList]);
    }

    public function actionTree(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $cache = Yii::$app->cache->get('attr_tree');
        // if(!empty($cache)){
        //     return $cache;
        // }
        $list = AttributeTypeTable::find()->orderBy('type asc')->all();
        $fieldData = \yii\helpers\ArrayHelper::toArray($list,['title,id,children'],true);
        Yii::$app->cache->set('attr_tree',$fieldData);
        return $fieldData;

    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionPostDel()
    {

    }

    public function actionPostAdd()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii::$app->request->post();
        $parentValue = isset($post['parentValue']) ? $post['parentValue'] : '';
        $name = isset($post['name']) ? $post['name'] : '';
        $type = isset($post['type']) ? $post['type'] : 1;
        $sort = isset($post['sort']) ? $post['sort'] : 1;

        if(empty($parentValue)){
            $model = new AttributeTypeTable();
            $model->name = $name;
            $model->sort = $sort;
            $model->type = $type;
            $res = $model->save();
            if($res){
                return ['success' => true,'msg' => 'AttributeTypeTable成功'];
            } else {
                return ['success' => false,'msg' => $model->getErrors()];
            }
        } else {
            $model = new AttributeValueTable();
            $model->type_id = $parentValue;
            $model->name = $name;
            $model->sort = $sort;
            $res = $model->save();
            if($res){
                return ['success' => true,'msg' => 'AttributeValueTable成功'];
            } else {
                return ['success' => false,'msg' => $model->getErrors()];
            }
        }


    }
}