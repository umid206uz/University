<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room_pair".
 *
 * @property int $id
 * @property int $room_id
 * @property int $pair_id
 * @property string $day
 *
 * @property Pair $pair
 * @property Room $room
 */
class RoomPair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_pair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'pair_id', 'day'], 'required'],
            [['room_id', 'pair_id'], 'integer'],
            [['day'], 'string', 'max' => 255],
            [['pair_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pair::className(), 'targetAttribute' => ['pair_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'room_id' => Yii::t('app', 'Room ID'),
            'pair_id' => Yii::t('app', 'Pair ID'),
            'day' => Yii::t('app', 'Day'),
        ];
    }

    /**
     * Gets query for [[Pair]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPair()
    {
        return $this->hasOne(Pair::className(), ['id' => 'pair_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }
}
