<?php

/* @var $this yii\web\View */

use app\models\Kindofsports;
use app\models\Participant;
use app\models\Status;
use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = 'Sports.net';
?>
<div class="site-index">
    <div class="jumbotron"><span><a href="/site/index" style="text-decoration: none; color:whitesmoke"><h1><?= Html::encode($this->title)?></h1></a></span></div>

    <div class="body-content ">

        <div class="row">
            <div class="col-lg-5"><h3>События:</h3>
                <?php if(count($events)):?>
                <?php foreach ($events as $item): ?>
                        <div class="col-md-10 row well" style="font-family: 'Arial Narrow', Helvetica, sans-serif; font-weight:bold; padding: 0px 0px 0px 0px">

                            <div class="col-md-3"><h6><?= $item->dateevent?></h6></div>
                            <div align="right" class="col-md-5"><h6><?=Participant::findOne($item->participant1id)->name?> - <?=Participant::findOne($item->participant2id)->name ?></h6></div>
                            <div align="right" class="col-md-4"><h6 style="font-weight: bold;"><?= Status::findOne($item->status)->status?></h6></div>

                        </div>
                    <div class="col-md-2 well" align="center" style="color: black; background-color: #9acfea; margin-left: 15px; padding: 12px 0px 20px 5px; font-size: 10px;"><?= Kindofsports::findOne($item->kindofsportsid)->sportname?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-lg-6"><h3>Свежие новости:</h3>
                <?php if(count($newsmodel)):?>
                <?php foreach ($newsmodel as $item): ?>
                        <div class="newdiv">
                            <?php ;?>
                            <h4><?= Html::a(StringHelper::truncateWords($item->shortdesc, 6, ' ...'), ['/news/view', 'id' => $item->id]) ?></h4>
                            <h6><?= StringHelper::truncateWords($item->desc, 14, ' ...')?></h6>
                            <div class="row">
                                <div class="col-md-6 "></div>
                                <div class="col-md-3 textstyle"><i class="glyphicon glyphicon-comment"></i>  Категория: <?= Kindofsports::findOne($item->kindofsportsid)->sportname?></div>
                                <div class="col-md-3 textstyle"><i class="glyphicon glyphicon-calendar"></i> <?=$item->dateadd?></div>
                            </div>
                        </div>&nbsp;
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
