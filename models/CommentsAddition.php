<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21.01.2018
 * Time: 1:50
 */

namespace app\models;


use Yii;
use yii\base\Model;

class CommentsAddition extends Model
{
//    public $newsid;
    public $message;

    public function rules()
    {
        return [
            [['message'],'required']
        ];
    }

    public function add($id2)
    {
        $comment = new Comments();
        $comment->newsid = $id2;
        $comment->userid = Yii::$app->user->id;
        $comment->message = $this->message;
        $today = new \DateTime();
        $newdat = $today->format('Y-m-d H:i:s');
        $comment->dateadd = $newdat;
//        print($id2." ".$this->message. " ".Yii::$app->user->id." ".$newdat); die();
        $comment->save();
        return true;
    }
}