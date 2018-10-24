<?php

use app\models\Countries;
use app\models\Kindofsports;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Participant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название')?>

    <?= $form->field($model, 'kindofsportsid')->dropDownList(ArrayHelper::map(Kindofsports::find()->all(), 'id', 'sportname')) ->label("Категория");?>

    <?= $form->field($model, 'countryid')->dropDownList(ArrayHelper::map(Countries::find()->all(), 'id', 'name')) ->label("Страна");?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
