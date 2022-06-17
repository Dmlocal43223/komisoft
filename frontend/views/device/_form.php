<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Store;

/* @var $this yii\web\View */
/* @var $model frontend\models\Device */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'store_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Store::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'Select a name ...'],
]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
