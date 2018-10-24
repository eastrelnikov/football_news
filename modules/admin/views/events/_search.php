<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'participant1id') ?>

    <?= $form->field($model, 'participant2id') ?>

    <?= $form->field($model, 'score') ?>

    <?= $form->field($model, 'stadiumid') ?>

    <?php // echo $form->field($model, 'dateevent') ?>

    <?php // echo $form->field($model, 'kindofsportsid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
