<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kindofsports */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kindofsports-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sportname')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
