<?php namespace Service\tests\Old;

use Service\Base\Constants\CustomerConstant;
use Service\Old\OldUserPartnerFastService;

/**
 * 1检查用户角色
 * 2检查用户上级
 * 3检查用户上上级
 *
 * Class checkRoleTest
 * @package Service\tests\Old
 */
class checkRoleTest extends \Codeception\Test\Unit
{
    /**
     * @var \Service\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->tester->haveFixtures([
           'customer' => [
               'class' => 'Service\tests\fixtures\Old\UserFixture',
               'dataFile' => codecept_data_dir() . 'OldUserData.php'
           ]
        ]);
    }

    protected function _after()
    {
    }

    public function dataProvider()
    {
        //抽样测试，测试全部需要使用基镜导入测试数据
        return [
//              [
//                  [
//                      //孙俊敏
//                      'cur_user_id' => 1033662,
//                      'cur_user_role' => UserConstant::USER_ROLE_IS_PARTNER,
//                      'cur_user_partner_fast_uid' => 800727,
//                      'cur_user_partner_fast_role' => UserConstant::USER_ROLE_IS_ALLIANCE,
//                      'cur_user_partner_last_uid' => 804034,
//                      'cur_user_partner_last_role' => UserConstant::USER_ROLE_IS_AGENT
//                  ]
//              ],
//              [
//                  [
//                      //思婷 1033650
//                      'cur_user_id' => 1033650,
//                      'cur_user_role' => UserConstant::USER_ROLE_IS_PARTNER_CUSTOMER,
//                      'cur_user_partner_fast_uid' => 1022183,
//                      'cur_user_partner_fast_role' => UserConstant::USER_ROLE_IS_PARTNER,
//                      'cur_user_partner_last_uid' => 802719,
//                      'cur_user_partner_last_role' => UserConstant::USER_ROLE_IS_ALLIANCE
//                  ]
//              ],
            [
                [
                    //700000
                    'cur_user_id' => 700000,
                    'cur_user_role' => CustomerConstant::USER_ROLE_IS_AGENT,
                    'cur_user_partner_fast_uid' => 0,
                    'cur_user_partner_fast_role' => 0,
                    'cur_user_partner_last_uid' => 0,
                    'cur_user_partner_last_role' => 0
                ]
            ],
            [
                [
                    //700000
                    'cur_user_id' => 1029638,
                    'cur_user_role' => CustomerConstant::USER_ROLE_IS_ALLIANCE,
                    'cur_user_partner_fast_uid' => 0,
                    'cur_user_partner_fast_role' => 0,
                    'cur_user_partner_last_uid' => 0,
                    'cur_user_partner_last_role' => 0
                ]
            ]
        ];
    }

    /**
     * @param $item
     * @test
     * @dataProvider dataProvider
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function SomeFeature($item)
    {
//        $t = OldTestUser::find()->asArray()->one();
//      var_dump($t['user_id']);die;
        list($cur_role_id,$return_partner_fast,$cur_role_txt1) = OldUserPartnerFastService::getPartnerFastRole($item['cur_user_id']);
        list($return_fast_role_id,$return_partner_last,$cur_role_txt2) = OldUserPartnerFastService::getPartnerFastRole($return_partner_fast);
        //$partner_sast 上上上级（暂时没有不需要测试）
        list($return_last_role_id,$partner_sast,$cur_role_txt3) = OldUserPartnerFastService::getPartnerFastRole($return_partner_last);
        codecept_debug($cur_role_txt1);
        codecept_debug($cur_role_txt2);
        codecept_debug($cur_role_txt3);
        $this->assertEquals($item['cur_user_role'],$cur_role_id,'当前用户角色:' . $cur_role_id.';验证用户角色:'.$item['cur_user_role']);
        $this->assertEquals($item['cur_user_partner_fast_uid'],$return_partner_fast,'当前用户上级id:' . $return_partner_fast.';验证用户上级id:'.$item['cur_user_partner_fast_uid']);
        $this->assertEquals($item['cur_user_partner_last_uid'],$return_partner_last,'当前用户上上级id:' . $return_partner_last.';验证用户上上级id:'.$item['cur_user_partner_last_uid']);
        $this->assertEquals($item['cur_user_partner_fast_role'],$return_fast_role_id,'当前用户上级角色:' . $return_fast_role_id.';验证用户上级角色:'.$item['cur_user_partner_fast_role']);
        $this->assertEquals($item['cur_user_partner_last_role'],$return_last_role_id,'当前用户上上级角色:' . $return_fast_role_id.';验证用户上上级角色:'.$item['cur_user_partner_last_role']);
    }


}