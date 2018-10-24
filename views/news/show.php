<?php

use app\models\Countries;
use app\models\Kindofsports;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;

?>
<div class="jumbotron"><span><h1>Новости спорта</h1></span></div>
<br>
<div class="container">
    <div class="col-md-3">

            <?php $form = ActiveForm::begin([
                'method' => 'post',
            ]); ?>
            <?= $form->field($model, 'kindofsportsid')->dropDownList(ArrayHelper::map(Kindofsports::find()->all(), 'id', 'sportname')) ->label("Категория");?>
            <?= $form->field($model, 'countryid')->dropDownList(ArrayHelper::map(Countries::find()->all(), 'id', 'name')) ->label("Страна");?>

            <div align="center" class="form-group">
                <?= Html::submitButton('Фильтр', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>


    </div>
    <div class="col-md-9"><?php if(count($newsmodel)):?>
        <?php foreach ($newsmodel as $item): ?>
            <div class="newdiv">
                <h4><?= Html::a(StringHelper::truncateWords($item->shortdesc, 6, ' ...'), ['/news/view', 'id' => $item->id]) ?></h4>
                <h6><?= StringHelper::truncateWords($item->desc, 14, ' ...')?></h6>
                <div class="row">
                    <div class="col-md-6 "></div>
                    <div class="col-md-3 textstyle"><i class="glyphicon glyphicon-comment"></i>  Категория: <?= Kindofsports::findOne($item->kindofsportsid)->sportname?></div>
                    <div class="col-md-3 textstyle"><i class="glyphicon glyphicon-calendar"></i> <?=$item->dateadd?></div>
                </div>
            </div>&nbsp;
        <?php endforeach; ?>
        <?php else: ?>
        <h3>Новостей нет</h3>
    <?php endif; ?>
    </div>
</div>