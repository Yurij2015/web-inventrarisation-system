<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AcceptmaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acceptmaterial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idaccept') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'employee') ?>

    <?= $form->field($model, 'material') ?>

    <?= $form->field($model, 'vendor') ?>

    <?php // echo $form->field($model, 'transporter') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'units') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('message', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('message', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
