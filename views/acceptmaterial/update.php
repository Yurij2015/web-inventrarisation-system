<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Acceptmaterial */

$this->title = Yii::t('message', 'Update Acceptmaterial: {name}', [
    'name' => $model->idaccept,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Acceptmaterials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idaccept, 'url' => ['view', 'id' => $model->idaccept]];
$this->params['breadcrumbs'][] = Yii::t('message', 'Update');
?>
<div class="acceptmaterial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
