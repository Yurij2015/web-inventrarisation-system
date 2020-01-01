<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Acceptmaterial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acceptmaterial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'employee')->textInput() ?>

    <?= $form->field($model, 'employee')->dropDownList(ArrayHelper::map(\app\models\Employee::find()->all(), 'idemployee', 'name')) ?>

    <?= $form->field($model, 'material')->dropDownList(ArrayHelper::map(\app\models\Material::find()->all(), 'idmaterial', 'invnumber')) ?>

    <?= $form->field($model, 'vendor')->dropDownList(ArrayHelper::map(\app\models\Vendor::find()->all(), 'idvendor', 'name')) ?>

    <?= $form->field($model, 'transporter')->dropDownList(ArrayHelper::map(\app\models\Transporter::find()->all(), 'idtransporter', 'name')) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

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

    <div class="form-group">
        <?= Html::submitButton(Yii::t('message', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
