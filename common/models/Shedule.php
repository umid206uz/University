<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shedule".
 *
 * @property int $id
 * @property int $group_id
 * @property int $teacher_id
 * @property int $lesson_id
 * @property int $room_id
 * @property int $pair_id
 * @property string $day
 *
 * @property Group $group
 * @property Lesson $lesson
 * @property Pair $pair
 * @property Room $room
 * @property Teacher $teacher
 */
class Shedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'teacher_id', 'lesson_id', 'room_id', 'pair_id', 'day'], 'required'],
            [['group_id', 'teacher_id', 'lesson_id', 'room_id', 'pair_id'], 'integer'],
            [['day'], 'string', 'max' => 255],
            ['pair_id', 'checkGroupPair'],
            ['room_id', 'checkRoomPair'],
            ['teacher_id', 'checkTeacherPair'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::className(), 'targetAttribute' => ['lesson_id' => 'id']],
            [['pair_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pair::className(), 'targetAttribute' => ['pair_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'group_id' => Yii::t('app', 'Group'),
            'teacher_id' => Yii::t('app', 'Teacher'),
            'lesson_id' => Yii::t('app', 'Lesson'),
            'room_id' => Yii::t('app', 'Room'),
            'pair_id' => Yii::t('app', 'Pair'),
            'day' => Yii::t('app', 'Day'),
        ];
    }

    public function checkGroupPair($attribute, $params){

        $model = GroupPair::findOne(['group_id' => $this->group_id, 'pair_id' => $this->pair_id, 'day' => $this->day]);

        if(!empty($model))
        {
            $this->addError($attribute, $this->group->name . ' guruhda ' . $this->pair->pair_name . 'parada dars qo`yilgan');
        }

    }

    public function checkRoomPair($attribute, $params){

        $model = RoomPair::findOne(['room_id' => $this->room_id, 'pair_id' => $this->pair_id, 'day' => $this->day]);

        if(!empty($model))
        {
            $this->addError($attribute, $this->room->name . ' xonada ' . $this->pair->pair_name . 'parada dars qo`yilgan');
        }

    }

    public function checkTeacherPair($attribute, $params){

        $model = TeacherLesson::findOne(['teacher_id' => $this->teacher_id, 'pair_id' => $this->pair_id, 'day' => $this->day]);

        if(!empty($model))
        {
            $this->addError($attribute, $this->teacher->first_name . ' o`qituvchi ' . $this->pair->pair_name . 'parada band!');
        }

    }

    public function afterSave($insert, $attr = NULL)
    {
        $this->saveRelationGroupPair();
        $this->saveRelationRoomPair();
        $this->saveRelationTeacherPair();
        return parent::afterSave($insert, $attr = NULL);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function saveRelationGroupPair(){
        $model = new GroupPair();
        $model->group_id = $this->group_id;
        $model->pair_id = $this->pair_id;
        $model->day = $this->day;
        $model->save();
    }

    public function saveRelationRoomPair(){
        $model = new RoomPair();
        $model->room_id = $this->room_id;
        $model->pair_id = $this->pair_id;
        $model->day = $this->day;
        $model->save();
    }

    public function saveRelationTeacherPair(){
        $model = new TeacherLesson();
        $model->teacher_id = $this->teacher_id;
        $model->pair_id = $this->pair_id;
        $model->day = $this->day;
        $model->save();
    }

    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'lesson_id']);
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

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }
}
