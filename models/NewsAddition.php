<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 20.01.2018
 * Time: 21:53
 */

namespace app\models;


use Yii;
use yii\base\Model;

class NewsAddition extends Model
{
    public $shortdesc;
    public $desc;
    public $dateadd;
    public $datechange;
    public $kindofsportsid;
    public $countryid;
    public $userid;

    public function rules()
    {
        return [
          [['shortdesc','desc','kindofsportsid','countryid'],'required'],
        ];
    }

    public function add()
    {
        $news = new News();
        $news->shortdesc = $this->shortdesc;
        $news->desc = $this->desc;
        $today = new \DateTime();
        $newdat = $today->format('Y-m-d H:i:s');
        $news->dateadd = $newdat;
        $news->datechange = $newdat;
        $news->kindofsportsid = $this->kindofsportsid;
        $news->countryid = $this->countryid;
        $news->userid = Yii::$app->user->id;
        $news->save();
        return true;
    }
}