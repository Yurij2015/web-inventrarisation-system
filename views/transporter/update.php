<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Transporter */

$this->title = Yii::t('message', 'Update Transporter: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Transporters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idtransporter]];
$this->params['breadcrumbs'][] = Yii::t('message', 'Update');
?>
<div class="transporter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
