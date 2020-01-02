<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AcceptmaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('message', 'Acceptmaterials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acceptmaterial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('message', 'Create Acceptmaterial'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date',
            [
                'attribute' => 'employee',
                'value' => 'employeeG.name'
            ],
            [
                'attribute' => 'material',
                'value' => 'materialG.name'
            ],
            [
                'attribute' => 'vendor',
                'value' => 'vendorG.name'
            ],
            [
                'attribute' => 'transporter',
                'value' => 'transporterG.name'
            ],
            'cost',
            'count',
            'units',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
