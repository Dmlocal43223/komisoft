<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Store;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Device', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'number',
            [
                'attribute' => 'store_id',
                'value' => 'store.name',
                'filter' => \kartik\select2\Select2::widget([
                    'name' => 'store_id',
                    'model' => $searchModel,
                    'attribute' => 'store_id',
                    'data' => ArrayHelper::map(Store::find()->all(), 'id', 'name'),
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Выберите значение'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'selectOnClose' => true,
                    ]
                ])
            ],
    
            'created_at:datetime',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, frontend\models\Device $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
