<?php
namespace Service\tests\unit;

use Service\ServiceModules\ServiceUser\UserService;

class aTest extends \Codeception\Test\Unit
{
    /**
     * @var \Service\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->tester->haveFixtures([
            'area' => [
                'class'=> \console\fixtures\TextFixture::class,
                'dataFile' => codecept_data_dir().'Area.php',
            ]
        ]);
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $res = UserService::test();
        $this->assertEquals($res['username'],'test1');
    }
}