<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KindofsportsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Виды спорта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kindofsports-index">

    <h1 align="center" class="well"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить вид спорта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sportname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
