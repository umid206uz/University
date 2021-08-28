<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher_lesson".
 *
 * @property int $id
 * @property string $day
 * @property int $teacher_id
 * @property int $pair_id
 */
class TeacherLesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher_lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day', 'teacher_id', 'pair_id'], 'required'],
            [['teacher_id', 'pair_id'], 'integer'],
            [['day'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'day' => Yii::t('app', 'Day'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'pair_id' => Yii::t('app', 'Pair ID'),
        ];
    }
}
