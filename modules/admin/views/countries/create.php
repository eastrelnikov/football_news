<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Countries */

$this->title = 'Добавить страну';
$this->params['breadcrumbs'][] = ['label' => 'Страны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-create">

    <h1 align="center" class="well"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
