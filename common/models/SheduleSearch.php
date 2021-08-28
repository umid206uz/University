<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Shedule;

/**
 * SheduleSearch represents the model behind the search form of `common\models\Shedule`.
 */
class SheduleSearch extends Shedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_id', 'teacher_id', 'lesson_id', 'room_id', 'pair_id'], 'integer'],
            [['day'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function search($params)
    {
        $query = Shedule::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'group_id' => $this->group_id,
            'teacher_id' => $this->teacher_id,
            'lesson_id' => $this->lesson_id,
            'room_id' => $this->room_id,
            'pair_id' => $this->pair_id,
        ]);

        if ($this->day != '') {

            $date = strtotime($this->day);
            $day = date('Y-m-d', $date);
            $time = date('H:i:s', $date);

            $pair = Pair::find()->where(['<=', 'begin_date', $time])->andWhere(['>=', 'end_date', $time])->one();

            $query->andFilterWhere(['day' => $day, 'pair_id' => $pair->id]);
        }

        return $dataProvider;
    }
}
