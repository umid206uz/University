<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $skill
 * @property int $status
 * @property string|null $created_date
 *
 * @property Shedule[] $shedules
 * @property TeacherLesson[] $teacherLessons
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'skill'], 'required'],
            [['status'], 'integer'],
            [['created_date'], 'safe'],
            [['first_name', 'last_name', 'skill'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'skill' => Yii::t('app', 'Skill'),
            'status' => Yii::t('app', 'Status'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }

    /**
     * Gets query for [[Shedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShedules()
    {
        return $this->hasMany(Shedule::className(), ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[TeacherLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherLessons()
    {
        return $this->hasMany(TeacherLesson::className(), ['teacher_id' => 'id']);
    }
}
