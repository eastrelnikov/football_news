<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1 align="center" class="well"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute' => 'participant1id',
                'value' => 'participant1.name'
            ],
            [
                'attribute' => 'participant2id',
                'value' => 'participant2.name'
            ],
            'score',
            [
                'attribute' => 'stadiumid',
                'value' => 'stadium.name'
            ],
            //'dateevent',
            [
                'attribute' => 'kindofsportsid',
                'value' => 'kindofsports.sportname'
            ],
            [
                'attribute' => 'status',
                'value' => 'status0.status'
            ],
            //'userid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
