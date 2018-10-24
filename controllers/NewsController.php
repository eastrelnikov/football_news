<?php

namespace app\controllers;

use app\models\Comments;
use app\models\CommentsAddition;
use app\models\News;
use app\models\Signup;
use Yii;
use yii\base\DynamicModel;
use yii\debug\models\search\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm as Login;
use app\models\ContactForm;

class NewsController extends Controller
{
    public function init()
    {
        if(Yii::$app->user->can('adminAccess'))
        {
            return $this->layout = "admin.php";
        }
        else return $this->layout = "main.php";
    }

    public function actionShow()
    {
        $model = new DynamicModel(['kindofsportsid','countryid']);
        $model->addRule(['kindofsportsid'], 'integer');
        $model->addRule(['countryid'], 'integer');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $newsmodel = News::find()->where(['kindofsportsid' => $model['kindofsportsid'], 'countryid' => $model['countryid']])->orderBy(['dateadd' => SORT_DESC])->all();

        }
        else $newsmodel = News::find()->orderBy(['dateadd' => SORT_DESC])->all();

        return $this->render('show',['newsmodel' => $newsmodel, 'model' => $model]);
    }

    public function actionView($id)
    {
        $permission = true;
        $model2 = new CommentsAddition();
        $comments = Comments::find()->where(['newsid'=>$id])->all();
        if(Yii::$app->user->isGuest)
        {
            $permission = false;
        }
        if($model2->load(Yii::$app->request->post()) && $model2->add($id)) {
            $this->refresh();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'model2' => $model2,
            'comments' => $comments,
            'permission' => $permission
        ]);
    }

    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
