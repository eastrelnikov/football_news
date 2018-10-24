<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
///* @var $model app\models\News */
/* @var $model app\models\NewsAddition */

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="news-update">

    <h1 align="center" class="well"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
//        'model2' => $model2
    ]) ?>

</div>
