<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Acceptmaterial */

$this->title = Yii::t('message', 'Create Acceptmaterial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('message', 'Acceptmaterials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acceptmaterial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
