<?php
/**
 * 从线上旧版搜灯数据库读取数据，
 * 生成测试基镜数据,
 */

namespace console\controllers\TransferData;


use console\controllers\BaseController;
use Service\ServiceOld\Models\OldCustomer;
use Service\ServiceOld\Models\OldUser;

class CreateTestDataController extends BaseController
{
    /**
     * 生成旧数据库user1表测试数据
     * php yii TransferData/create-test-data/create-user-fixture-data
     */
    public function actionCreateUserFixtureData()
    {
        $list = OldCustomer::find()->where(['user_id' => 700000])->asArray()->all();
        $string = '<?php return ' . var_export($list, true) . ';';
        $dir = dirname(dirname(dirname(__DIR__))) . '/Service/tests/_data/OldUserData.php';
        file_put_contents($dir, $string);
    }
}