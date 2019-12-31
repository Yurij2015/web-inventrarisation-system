<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialcategory */

$this->title = Yii::t('message', 'Update Materialcategory: {name}', [
    'name' => $model->idmaterialcategory,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Materialcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmaterialcategory, 'url' => ['view', 'id' => $model->idmaterialcategory]];
$this->params['breadcrumbs'][] = Yii::t('message', 'Update');
?>
<div class="materialcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
