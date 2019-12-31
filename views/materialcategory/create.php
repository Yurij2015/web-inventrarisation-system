<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialcategory */

$this->title = Yii::t('message', 'Create Materialcategory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Materialcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materialcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
