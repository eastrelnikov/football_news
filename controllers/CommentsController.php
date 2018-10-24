<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21.01.2018
 * Time: 4:15
 */

namespace app\controllers;


use app\models\Comments;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CommentsController extends Controller
{
    public function init()
    {
        if(Yii::$app->user->can('adminAccess'))
        {
            return $this->layout = "admin.php";
        }
        else return $this->layout = "main.php";
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->goBack();
    }

    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}