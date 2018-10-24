<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $shortdesc
 * @property string $desc
 * @property string $dateadd
 * @property string $datechange
 * @property int $kindofsportsid
 * @property int $countryid
 * @property int $userid
 *
 * @property Comments[] $comments
 * @property User $user
 * @property Kindofsports $kindofsports
 * @property Countries $country
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateadd', 'datechange'], 'safe'],
            [['kindofsportsid', 'countryid', 'userid'], 'integer'],
            [['countryid'], 'required'],
            [['shortdesc'], 'string', 'max' => 100],
            [['desc'], 'string', 'max' => 10000],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
            [['kindofsportsid'], 'exist', 'skipOnError' => true, 'targetClass' => Kindofsports::className(), 'targetAttribute' => ['kindofsportsid' => 'id']],
            [['countryid'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['countryid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortdesc' => 'Shortdesc',
            'desc' => 'Desc',
            'dateadd' => 'Dateadd',
            'datechange' => 'Datechange',
            'kindofsportsid' => 'Kindofsportsid',
            'countryid' => 'Countryid',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['newsid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKindofsports()
    {
        return $this->hasOne(Kindofsports::className(), ['id' => 'kindofsportsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'countryid']);
    }
}
