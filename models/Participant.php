<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participant".
 *
 * @property int $id
 * @property string $name
 * @property int $kindofsportsid
 * @property int $countryid
 *
 * @property Events[] $events
 * @property Events[] $events0
 * @property Kindofsports $kindofsports
 * @property Countries $country
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'participant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'kindofsportsid', 'countryid'], 'required'],
            [['kindofsportsid', 'countryid'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'id' => 'Код',
            'name' => 'Название',
            'kindofsportsid' => 'Вид спорта',
            'countryid' => 'Страна',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['participant1id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents0()
    {
        return $this->hasMany(Events::className(), ['participant2id' => 'id']);
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
