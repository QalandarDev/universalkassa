<?php

namespace common\fixtures;

use yii\test\ActiveFixture;
use common\models\User;
use common\models\Admin;

/*
 * @var $AdminClass
 * */

class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;
}
