<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Storehouse */

$this->title = Yii::t('message', 'Update Storehouse: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Storehouses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idstorehouse]];
$this->params['breadcrumbs'][] = Yii::t('message', 'Update');
?>
<div class="storehouse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
