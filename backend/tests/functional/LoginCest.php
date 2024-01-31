<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\AdminFixture;
use common\fixtures\UserFixture;
use common\models\Admin;
use yii\helpers\VarDumper;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => AdminFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I): void
    {
        VarDumper::dump($I) or die();
        $I->amOnRoute('/site/login');
        $I->fillField('username', 'erau');
        $I->fillField('password', 'password_0');
        $I->click('login-button');
        $I->see('Logout (erau)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }
}
