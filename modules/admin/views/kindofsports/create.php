<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kindofsports */

$this->title = 'Добавить вид спорта';
$this->params['breadcrumbs'][] = ['label' => 'Виды спорта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kindofsports-create">

    <h1 align="center" class="well"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
