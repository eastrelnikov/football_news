<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property int $participant1id
 * @property int $participant2id
 * @property string $score
 * @property int $stadiumid
 * @property string $dateevent
 * @property int $kindofsportsid
 * @property int $status
 * @property int $userid
 *
 * @property User $user
 * @property Kindofsports $kindofsports
 * @property Status $status0
 * @property Participant $participant1
 * @property Participant $participant2
 * @property Stadiums $stadium
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['participant1id', 'participant2id', 'stadiumid', 'kindofsportsid', 'status', 'userid'], 'integer'],
            [['dateevent', 'kindofsportsid', 'status'], 'required'],
            [['dateevent'], 'safe'],
            [['score'], 'string', 'max' => 255],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
            [['kindofsportsid'], 'exist', 'skipOnError' => true, 'targetClass' => Kindofsports::className(), 'targetAttribute' => ['kindofsportsid' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status' => 'id']],
            [['participant1id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['participant1id' => 'id']],
            [['participant2id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['participant2id' => 'id']],
            [['stadiumid'], 'exist', 'skipOnError' => true, 'targetClass' => Stadiums::className(), 'targetAttribute' => ['stadiumid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'participant1id' => 'Участник 1',
            'participant2id' => 'Участник 2',
            'score' => 'Счёт',
            'stadiumid' => 'Стадион',
            'dateevent' => 'Дата',
            'kindofsportsid' => 'Вид спорта',
            'status' => 'Статус',
            'userid' => 'Userid',
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
    public function getKindofsports()
    {
        return $this->hasOne(Kindofsports::className(), ['id' => 'kindofsportsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant1()
    {
        return $this->hasOne(Participant::className(), ['id' => 'participant1id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant2()
    {
        return $this->hasOne(Participant::className(), ['id' => 'participant2id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStadium()
    {
        return $this->hasOne(Stadiums::className(), ['id' => 'stadiumid']);
    }
}
