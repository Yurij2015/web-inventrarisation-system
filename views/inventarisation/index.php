<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventarisationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('message', 'Inventarisations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarisation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('message', 'Create Inventarisation'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idinventarisation',
            'date',
            'material',
            'count',
            'units',
            //'employee',
            //'actnumber',
            //'protocolnumber',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
