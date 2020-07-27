<?php
namespace backend\tests\unit;

use Service\ServiceModules\ServiceUser\UserService;

class aTest extends \Codeception\Test\Unit
{
    /**
     * @var  \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        // insert records in database

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
        $this->assertTrue(true);
    }
}