<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Materialstorage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materialstorage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'racknumber')->textInput() ?>

    <?= $form->field($model, 'storehouse')->textInput() ?>

    <?= $form->field($model, 'material')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('message', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
