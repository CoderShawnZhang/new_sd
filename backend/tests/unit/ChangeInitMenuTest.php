<?php namespace backend\tests;

use backend\tests\fixtures\InitMenu;
use Service\ServiceHelper\ConfigService;

class ChangeInitMenuTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->tester->haveFixtures([
            'init_menu_data' => [
                'class' => InitMenu::class,
                'dataFile' => codecept_data_dir() . 'InitMenu.php'
            ]
        ]);
    }

    protected function _after()
    {

    }

    public function dataProvider()
    {
        return [
          [8]
        ];
    }

    /**
     * 测试变更top初始加载菜单
     *
     * @param $init_menu_id
     * @test
     * @dataProvider dataProvider
     */
    public function changeInitMenu($init_menu_id)
    {

        $config_init_menu_id = ConfigService::getTopInitMenu();
        $this->assertEquals($init_menu_id,$config_init_menu_id);
    }
}