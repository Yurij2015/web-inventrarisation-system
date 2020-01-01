<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Materialstorage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materialstorage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material')->dropDownList(ArrayHelper::map(\app\models\Material::find()->all(), 'idmaterial', 'name')) ?>

    <?= $form->field($model, 'storehouse')->dropDownList(ArrayHelper::map(\app\models\Storehouse::find()->all(), 'idstorehouse', 'name')) ?>

    <?= $form->field($model, 'racknumber')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('message', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
