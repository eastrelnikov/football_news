<?php

use app\models\Countries;
use app\models\Kindofsports;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsAddition */
/* @var $model2 app\models\NewsAddition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortdesc')->textInput(['maxlength' => true])->label('Краткое описание') ?>

    <?= $form->field($model, 'desc')->textarea(['maxlength' => true])->label('Описание') ?>

    <?= $form->field($model, 'kindofsportsid')->dropDownList(ArrayHelper::map(Kindofsports::find()->all(), 'id', 'sportname')) ->label("Категория");?>

    <?= $form->field($model, 'countryid')->dropDownList(ArrayHelper::map(Countries::find()->all(), 'id', 'name')) ->label("Страна");?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
