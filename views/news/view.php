<?php

use app\models\Kindofsports;
use app\models\Userdb;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $model2 app\models\CommentsAddition */

$this->title = $model->shortdesc;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newdiv container">

    <div class="well"> <h3><?= Html::encode($this->title) ?></h3></div>
    <div class="row" style="padding-left: 20px">
        <h5><?=$model->desc?></h5>
        <div class="row" style="padding-left: 350px">
            <div class="col-md-6 "></div>
            <div class="col-md-3 textstyle2"><i class="glyphicon glyphicon-comment"></i>  Категория: <?= Kindofsports::findOne($model->kindofsportsid)->sportname?></div>
            <div class="col-md-3 textstyle2"><i class="glyphicon glyphicon-calendar"></i> <?=$model->dateadd?></div>
        </div>
    </div>
</div>
<?php if($permission): ?>
<div class="row" style="padding-left: 20px;"><h3>Добавить комментарий:</h3></div>
<div class="well">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model2, 'message')->textarea(['maxlength' => true])->label('Сообщение') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<? else: ?>
<br><br><h4>Авторизуйтесь, чтобы оставить комментарий. <?= Html::a('Войти', ['/site/login'])?></h4>
<? endif; ?>
<div class="container">
    <?php if(count($comments)):?>
        <?php foreach ($comments as $item): ?>
            <div class="row">
                <div class="col-md-6 well">
                    <div class="row">
                        <div class="col-md-11"></div>
                        <?php if(Yii::$app->user->id == $item->userid): ?>
                            <?= Html::a('<i class="glyphicon glyphicon-remove"></i>', ['/comments/delete/', 'id' => $item->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Удалить комментарий?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        <div class="col-md-1"> </div>

                        <?php endif; ?>
                    </div>
                <h4><?=Userdb::findOne($item->userid)->username?></h4>
                <div class="well"><h5><?=$item->message?></h5></div>
                <div class="row">
                    <div class="col-md-9 "></div>
                    <div class="col-md-3 textstyle"><i class="glyphicon glyphicon-calendar"></i> <?=$item->dateadd?></div>
                </div>
            </div>&nbsp;</div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
