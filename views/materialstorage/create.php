<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialstorage */

$this->title = Yii::t('message', 'Create Materialstorage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Materialstorages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materialstorage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
