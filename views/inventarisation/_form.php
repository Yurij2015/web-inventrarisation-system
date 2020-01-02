<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarisation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventarisation-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    echo $form->field($model, 'date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?>
    <?= $form->field($model, 'material')->dropDownList(ArrayHelper::map(\app\models\Material::find()->all(), 'idmaterial', 'invnumber')) ?>
    <?= $form->field($model, 'count')->textInput() ?>
    <?php
    $items = [
        'Литры' => 'Литры',
        'Килограммы' => 'Килограммы',
        'Тонны' => 'Тонны',
        'Граммы' => 'Граммы'
    ];
    $params = [
        'prompt' => 'Выберите единицу измерения...'
    ];
    echo $form->field($model, 'units')->dropDownList($items, $params);
    ?>
    <?= $form->field($model, 'employee')->dropDownList(ArrayHelper::map(\app\models\Employee::find()->all(), 'idemployee', 'name')) ?>
    <?= $form->field($model, 'actnumber')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'protocolnumber')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('message', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
