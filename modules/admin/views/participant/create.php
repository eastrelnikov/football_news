<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Participant */

$this->title = 'Добавить спортсмена/команду';
$this->params['breadcrumbs'][] = ['label' => 'Участники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-create">

    <h1 align="center" class="well"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
