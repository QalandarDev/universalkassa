<?php

namespace console\controllers;

use common\models\Admin;
use Yii;
use yii\base\Exception;
use yii\console\Controller;

class InitController extends Controller
{
    /**
     * @throws Exception
     */
    public function actionIndex()
    {
        $model = new Admin();
        $model->username = 'admin';
        $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash('myadmin@2412.uz');
        $model->email = 'admin@urdu.uz';
        $model->generateAuthKey();
        $model->generateEmailVerificationToken();
        $model->status = 10;
        $model->role = 'admin';
        $model->created_at = time();
        $model->updated_at = time();
        $model->save();
    }
}