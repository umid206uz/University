<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string $name
 * @property string $name_ru
 * @property string $name_en
 * @property int $status
 * @property string|null $created_date
 *
 * @property RoomPair[] $roomPairs
 * @property Shedule[] $shedules
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_ru', 'name_en'], 'required'],
            [['status'], 'integer'],
            [['created_date'], 'safe'],
            [['name', 'name_ru', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'status' => Yii::t('app', 'Status'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }

    /**
     * Gets query for [[RoomPairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoomPairs()
    {
        return $this->hasMany(RoomPair::className(), ['room_id' => 'id']);
    }

    /**
     * Gets query for [[Shedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShedules()
    {
        return $this->hasMany(Shedule::className(), ['room_id' => 'id']);
    }
}
