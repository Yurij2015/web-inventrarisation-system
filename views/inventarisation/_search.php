<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InventarisationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventarisation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idinventarisation') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'material') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'units') ?>

    <?php // echo $form->field($model, 'employee') ?>

    <?php // echo $form->field($model, 'actnumber') ?>

    <?php // echo $form->field($model, 'protocolnumber') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('message', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('message', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
