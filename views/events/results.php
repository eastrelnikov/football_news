<?php

use app\models\Countries;
use app\models\Kindofsports;
use app\models\Participant;
use app\models\Status;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;

?>
<div class="jumbotron"><span><h1>Результаты</h1></span></div>
<br>
<div class="container">
    <div class="col-md-3">

        <?php $form = ActiveForm::begin([
            'method' => 'post',
        ]); ?>
        <?= $form->field($model, 'kindofsportsid')->dropDownList(ArrayHelper::map(Kindofsports::find()->all(), 'id', 'sportname')) ->label("Категория");?>

        <div align="center" class="form-group">
            <?= Html::submitButton('Фильтр', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end() ?>


    </div>
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <br>
        <?php if(count($events)):?>
            <?php foreach ($events as $item): ?>
                <div class="row well" style="font-family: 'Arial Narrow', Helvetica, sans-serif; font-weight:bold; padding: 0px 0px 0px 0px">

                    <div class="col-md-1"><h4><i class="glyphicon glyphicon-calendar"></i></h4></div>
                    <div class="col-md-2"><h4><?= $item->dateevent?></h4></div>
                    <div align="right" class="col-md-5"><h4><?=Participant::findOne($item->participant1id)->name?> - <?=Participant::findOne($item->participant2id)->name ?></h4></div>
                    <div align="right" class="col-md-2"><h4 style="font-weight: bold"><?=$item->score?></h4></div>
                    <div align="right" class="col-md-2"><h4><?= Status::findOne($item->status)->status?></h4></div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>