<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $newsid
 * @property int $userid
 * @property string $message
 * @property string $dateadd
 *
 * @property User $user
 * @property News $news
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['newsid', 'userid', 'message', 'dateadd'], 'required'],
            [['newsid', 'userid'], 'integer'],
            [['dateadd'], 'safe'],
            [['message'], 'string', 'max' => 300],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
            [['newsid'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['newsid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'newsid' => 'Newsid',
            'userid' => 'Userid',
            'message' => 'Message',
            'dateadd' => 'Dateadd',
        ];
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
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'newsid']);
    }
}
