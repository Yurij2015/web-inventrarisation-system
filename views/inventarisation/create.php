<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarisation */

$this->title = Yii::t('message', 'Create Inventarisation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Inventarisations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarisation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
