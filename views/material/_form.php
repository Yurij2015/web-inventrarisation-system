<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="material-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'invnumber')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'materialcategory')->dropDownList(ArrayHelper::map(\app\models\Materialcategory::find()->all(), 'idmaterialcategory', 'categoryname')) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('message', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
