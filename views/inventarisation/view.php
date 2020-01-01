<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarisation */

$this->title = $model->materialG->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Inventarisations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inventarisation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('message', 'Update'), ['update', 'id' => $model->idinventarisation], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('message', 'Delete'), ['delete', 'id' => $model->idinventarisation], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('message', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'idinventarisation',
            'date',
            'materialG.name',
            'count',
            'units',
            'employeeG.name',
            'actnumber',
            'protocolnumber',
        ],
    ]) ?>

</div>
