<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\bootstrap4\Modal;
use frontend\models\Store;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Store', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $stores = Store::find()->with('devices')->all();
    foreach($stores as $store){
    Modal::begin([
        'title' => "<h2>Store : " . $store->name . "</h2>",
        'options' => ['id' => 'd'.$store->name],
    ]);
        $stores = Store::find()->with('devices')->where(['id' => $store->id])->all();
        foreach($stores as $store) {
            echo "<ul>";
            foreach($store->devices as $device) {  
                echo "<li>". Html::a($device->number, ['device/index', 'DeviceSearch[number]'=>$device->number], ['target' => '_blank']). "</li>";
            }
            echo "</ul>";
        }

    Modal::end();
    }
?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute'=>'name',
                'format'=>'raw',
                'value' => function($model){    
                return Html::a($model->name, ['#'], ['data-toggle' => 'modal', 'data-target' => '#d'.$model->name]);
                },
            ],

            'created_at:datetime',
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, frontend\models\Store $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
