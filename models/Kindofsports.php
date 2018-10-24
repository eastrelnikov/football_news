<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kindofsports".
 *
 * @property int $id
 * @property string $sportname
 *
 * @property News[] $news
 * @property Sportsman[] $sportsmen
 * @property Teams[] $teams
 */
class Kindofsports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kindofsports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sportname'], 'required'],
            [['sportname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'sportname' => 'Название вида',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['kindofsportsid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSportsmen()
    {
        return $this->hasMany(Sportsman::className(), ['kindofsportsid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeams()
    {
        return $this->hasMany(Teams::className(), ['kindofsportsid' => 'id']);
    }
}
