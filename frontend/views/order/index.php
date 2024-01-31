<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var frontend\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Hisobotlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-8">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pager'=>[
                    'class'=>\yii\bootstrap5\LinkPager::class,
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'user',
                    'direction',
                    [
                        'attribute' => 'total',
                        'value' => function (Order $model) {
                            if($model->total) {
                                return Yii::$app->formatter->asCurrency($model->total, 'UZS', [
                                    NumberFormatter::MIN_FRACTION_DIGITS => 0,
                                    NumberFormatter::MAX_FRACTION_DIGITS => 0,
                                ]);
                            }
                            return '';
                        }
                    ],
                    //'sale',
                    //'total',
                    //'status',
                    'phone',
                    //'comment',
                    'created_at:date',
                    //'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
        <div class="col-md-4">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

    </div>
