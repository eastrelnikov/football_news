<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21.01.2018
 * Time: 16:39
 */

namespace app\controllers;


use app\models\Events;
use Yii;
use yii\base\DynamicModel;
use yii\web\Controller;

class EventsController extends Controller
{
    public function init()
    {
        if(Yii::$app->user->can('adminAccess'))
        {
            return $this->layout = "admin.php";
        }
        else return $this->layout = "main.php";
    }

    public function actionResults()
    {
        $model = new DynamicModel(['kindofsportsid']);
        $model->addRule(['kindofsportsid'], 'integer');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $events = Events::find()->where(['status' => 2, 'kindofsportsid' => $model['kindofsportsid']])->orderBy(['dateevent' => SORT_DESC])->all();
        }
        else $events = Events::find()->where(['status' => 2])->orderBy(['dateevent' => SORT_DESC])->all();

        return $this->render('results',['model' => $model, 'events' => $events]);
    }

    public function actionCurrent()
    {
        $model = new DynamicModel(['kindofsportsid']);
        $model->addRule(['kindofsportsid'], 'integer');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $events = Events::find()->where(['status' => 1, 'kindofsportsid' => $model['kindofsportsid']])->orderBy(['dateevent' => SORT_DESC])->all();
        }
        else $events = Events::find()->where(['status' => 1])->orderBy(['dateevent' => SORT_DESC])->all();

        return $this->render('current',['model' => $model, 'events' => $events]);
    }
}