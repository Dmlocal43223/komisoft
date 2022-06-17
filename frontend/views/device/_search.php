<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Store;

/* @var $this yii\web\View */
/* @var $model frontend\models\DeviceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'number') ?>

    <!-- <?= $form->field($model, 'store_id') ?> -->

    <?= $form->field($model, 'store_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Store::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'Select a name ...'],
]);?>

    <?= $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
