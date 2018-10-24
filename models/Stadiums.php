<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stadiums".
 *
 * @property int $id
 * @property string $name
 * @property int $capacity
 * @property int $countryid
 *
 * @property Events[] $events
 * @property Countries $country
 */
class Stadiums extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stadiums';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'capacity'], 'required'],
            [['capacity', 'countryid'], 'integer'],
            [['name'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'capacity' => 'Capacity',
            'countryid' => 'Countryid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['stadiumid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'countryid']);
    }
}
