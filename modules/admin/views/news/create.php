<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewsAddition */
///* @var $model2 app\models\NewsAddition */

$this->title = 'Добавить новость';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <h1 align="center" class="well"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
//        'model2' => $model2
    ]) ?>

</div>
