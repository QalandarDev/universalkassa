<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

    <div class="order-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ticket_id')->widget(MaskedInput::class, [
            'mask' => '9999999999999999',
        ]) ?>

        <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'direction')->widget(MaskedInput::class, [
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
            <div class="col-md-4">
                <?= $form->field($model, 'total')->widget(MaskedInput::class, [
                    'clientOptions' => [
                        'alias' => 'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                        'removeMaskOnValidate' => true,
                        'align' => 'left',
                    ]
                ]) ?>
            </div>
            <div class="col-md-4">
                <?=
                $form->field($model, 'sale')->widget(MaskedInput::class, [
                    //for example values 0.5%, 1%, 1.5%, 2%
                    'mask' => '9.9%',
                    'clientOptions' => [
                        'value' => '0.0%',
                        'groupSeparator' => ',',
                        'removeMaskOnSubmit' => true,
                        'removeOnValidate' => true,
                        'align' => 'left',
                    ]
                ])
                ?>
            </div>
            <div class="col-md-4">
                <?=
                $form->field($model, 'price')->widget(MaskedInput::class, [
                    //for example values 0.5%, 1%, 1.5%, 2%
                    'clientOptions' => [
                        'alias' => 'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        'removeMaskOnSubmit' => true,
                        'removeMaskOnValidate' => true,
                        'align' => 'left',
                    ],
                    'options'=>[
                        'disabled'=>true
                    ]
                ])
                ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
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
<?php
$script = "
    $('#sale').on('change',function (){
        value = $(this).val();
        value = value.replace('%','');
        value = parseFloat(value);
        if(value==0){
            $('#price').val($('#total').val());
            $('#price').removeAttr('disabled');
            return;
        }
        totalValue=$('#total').val();
        totalValue=totalValue.replaceAll(',','');
        price = totalValue - (totalValue*(value/100));
        $('#price').val(price);
        $('#price').attr('disabled','disabled');
        
    });";
$this->registerJs($script);
?>