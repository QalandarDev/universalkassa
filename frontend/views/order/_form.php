<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_id')->widget(\yii\widgets\MaskedInput::class,[
        'mask' => '9999999999999999',
    ]) ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'direction')->widget(\yii\widgets\MaskedInput::class,[
                'mask' => 'AAA-AAA',
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->widget(\kartik\select2\Select2::class, [
                'data' => [
                    'money' => 'Naqd pul',
                    'terminal' => 'Terminal',
                    'later' => 'Qarz'
                ],
                'options' => ['placeholder' => 'Tanlang ...'],
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'total')->widget(\yii\widgets\MaskedInput::class,[
                'clientOptions' => [
                    'alias' =>  'decimal',
                    'groupSeparator' => ',',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => true,
                    'removeMaskOnValidate' => true,
                    'align' => 'left',
                ]
            ]) ?>
        </div>
        <div class="col-md-6">
            <?=
            $form->field($model,'sale')->widget(\yii\widgets\MaskedInput::class,[
                //for example values 0.5%, 1%, 1.5%, 2%
                'mask' => '9.9%',
                'clientOptions' => [
                    'groupSeparator' => ',',
                    'removeMaskOnSubmit' => true,
                    'removeOnValidate' => true,
                    'align' => 'left',
                ]
            ])
            ?>
        </div>
    </div>



    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
                'mask' => '+\9\9899-999-99-99',
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>
        </div>
    </div>




    <div class="form-group d-grid gap-2">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
