<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarisation */

$this->title = Yii::t('message', 'Update Inventarisation: {name}', [
    'name' => $model->idinventarisation,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Inventarisations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idinventarisation, 'url' => ['view', 'id' => $model->idinventarisation]];
$this->params['breadcrumbs'][] = Yii::t('message', 'Update');
?>
<div class="inventarisation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
