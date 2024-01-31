<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
    <div class="logo"><a href="<?=Yii::$app->getHomeUrl()?>"><img src=<?=Yii::getAlias('@web')."/img/logo-circle.png"?> alt=""></a> </div>
    <div class="text-center mt-4 name"> Tizimga kirish</div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => [
            'class' => "p-3 mt-3"
        ],
        'fieldConfig' => [
            'template' => " <div class=\"form-field d-flex align-items-center\"><span class=\"far fa-user\"></span>{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
//            'labelOptions' => ['class' => 'col-lg-12 control-label'],
        ],

    ]); ?>

    <?= $form->field($model, 'username')->textInput([
        'placeholder' => 'Email'
    ])->label(false) ?>
    <?= $form->field($model, 'password')->passwordInput([
        'placeholder' => 'Password'
    ]) ?>
    <?= $form->field($model, 'rememberMe', [
        'template' => "{label}<div class=\"col-lg-offset-2 col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
    ])->checkbox() ?>

    <div class="form-group row">
        <div class=" col-lg-12" style="padding: 8px">
            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="col-md-12">
            Akkaunt yo'qmi? <?= Html::a(Yii::t("app", "Register"), ["/user/register"]) ?>
            <!--            --><? //= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?><!-- /-->
            <!--            --><? //= Html::a(Yii::t("user", "Resend confirmation email"), ["/user/resend"]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?php if (Yii::$app->get("authClientCollection", false)): ?>
        <div class="col-lg-offset-2 col-lg-10">
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['/user/auth/login']
            ]) ?>
        </div>
    <?php endif; ?>

    <div class="col-lg-offset-2" style="color:#999;">
        You may login with <strong>neo/neo</strong>.<br>
        To modify the username/password, log in first and then <?= HTML::a("update your account", ["/user/account"]) ?>.
    </div>

</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif
    }

    body {
        background: #ecf0f3
    }

    .wrapper {
        max-width: 350px;
        min-height: 500px;
        margin: 80px auto;
        padding: 40px 30px 30px 30px;
        background-color: #ecf0f3;
        border-radius: 15px;
        box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff
    }

    .logo {
        width: 80px;
        margin: auto
    }

    .logo img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
    }

    .wrapper .name {
        font-weight: 600;
        font-size: 1.4rem;
        letter-spacing: 1.3px;
        padding-left: 10px;
        color: #555
    }

    .wrapper .form-field input {
        width: 100%;
        display: block;
        border: none;
        outline: none;
        background: none;
        font-size: 1.2rem;
        color: #666;
        padding: 10px 15px 10px 10px
    }

    .wrapper .form-field {
        padding-left: 10px;
        margin-bottom: 20px;
        border-radius: 20px;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
    }

    .wrapper .form-field .fas {
        color: #555
    }

    .wrapper .btn {
        box-shadow: none;
        width: 100%;
        height: 40px;
        background-color: #03A9F4;
        color: #fff;
        border-radius: 25px;
        box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
        letter-spacing: 1.3px
    }

    .wrapper .btn:hover {
        background-color: #039BE5
    }

    .wrapper a {
        text-decoration: none;
        font-size: 0.8rem;
        color: #03A9F4
    }

    .wrapper a:hover {
        color: #039BE5
    }

    @media (max-width: 380px) {
        .wrapper {
            margin: 30px 20px;
            padding: 40px 15px 15px 15px
        }
    }
</style>
