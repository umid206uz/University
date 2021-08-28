<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group_pair".
 *
 * @property int $id
 * @property int $group_id
 * @property int $pair_id
 * @property string $day
 *
 * @property Group $group
 * @property Pair $pair
 */
class GroupPair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_pair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'pair_id', 'day'], 'required'],
            [['group_id', 'pair_id'], 'integer'],
            [['day'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['pair_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pair::className(), 'targetAttribute' => ['pair_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'pair_id' => Yii::t('app', 'Pair ID'),
            'day' => Yii::t('app', 'Day'),
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
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
}
