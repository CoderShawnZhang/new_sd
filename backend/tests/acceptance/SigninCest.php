<?php namespace backend\tests;
use backend\tests\AcceptanceTester;

class SigninCest
{
    public function _before(AcceptanceTester $I)
    {

//        $I->grabTextFrom('h1');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $t = $I->grabRecord('backend\models\user', array('username' => 'test112'));
        $I->haveRecord('backend\models\user', array('username' => 'test112'));
    }
}
