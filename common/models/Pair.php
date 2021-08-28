<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pair".
 *
 * @property int $id
 * @property string $pair_name
 * @property string $pair_name_ru
 * @property string $pair_name_en
 * @property string $begin_date
 * @property string $end_date
 *
 * @property GroupPair[] $groupPairs
 * @property RoomPair[] $roomPairs
 * @property Shedule[] $shedules
 * @property TeacherLesson[] $teacherLessons
 */
class Pair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pair_name', 'pair_name_ru', 'pair_name_en', 'begin_date', 'end_date'], 'required'],
            [['pair_name', 'pair_name_ru', 'pair_name_en', 'begin_date', 'end_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pair_name' => Yii::t('app', 'Pair Name'),
            'pair_name_ru' => Yii::t('app', 'Pair Name Ru'),
            'pair_name_en' => Yii::t('app', 'Pair Name En'),
            'begin_date' => Yii::t('app', 'Begin Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * Gets query for [[GroupPairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupPairs()
    {
        return $this->hasMany(GroupPair::className(), ['pair_id' => 'id']);
    }

    /**
     * Gets query for [[RoomPairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoomPairs()
    {
        return $this->hasMany(RoomPair::className(), ['pair_id' => 'id']);
    }

    /**
     * Gets query for [[Shedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShedules()
    {
        return $this->hasMany(Shedule::className(), ['pair_id' => 'id']);
    }

    /**
     * Gets query for [[TeacherLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherLessons()
    {
        return $this->hasMany(TeacherLesson::className(), ['pair_id' => 'id']);
    }
}
