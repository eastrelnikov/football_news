<?php

use app\models\Kindofsports;
use app\models\Participant;
use app\models\Stadiums;
use app\models\Status;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'participant1id')->dropDownList(ArrayHelper::map(Participant::find()->all(), 'id', 'name')) ->label("Участник 1");?>

    <?= $form->field($model, 'participant2id')->dropDownList(ArrayHelper::map(Participant::find()->all(), 'id', 'name')) ->label("Участник 2");?>

    <?= $form->field($model, 'score')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stadiumid')->dropDownList(ArrayHelper::map(Stadiums::find()->all(), 'id', 'name')) ->label("Стадион");?>

    <?= $form->field($model, 'dateevent')->widget(DateTimePicker::className(),[
        'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Ввод даты/времени...'],
        'convertFormat' => true,
        'value'=> date("d.m.Y h:i",(integer) $model->dateevent),
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd HH:mm:ss',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ])->label('Время начала'); ?>

    <?= $form->field($model, 'kindofsportsid')->dropDownList(ArrayHelper::map(Kindofsports::find()->all(), 'id', 'sportname')) ->label("Категория");?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'status')) ->label("Статус");?>

    <?= $form->field($model, 'userid')->hiddenInput(['value' => 3])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
