<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialstorage */

$this->title = Yii::t('message', 'Update Materialstorage: {name}', [
    'name' => $model->idfoodstorage,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Materialstorages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfoodstorage, 'url' => ['view', 'id' => $model->idfoodstorage]];
$this->params['breadcrumbs'][] = Yii::t('message', 'Update');
?>
<div class="materialstorage-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
