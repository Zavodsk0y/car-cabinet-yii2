<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Car;

/**
 * CarSearch represents the model behind the search form of `app\models\Car`.
 */
class CarSearch extends Car
{
    /**
     * {@inheritdoc}
     */
    public $mark;
    public $gearType;

    public function rules()
    {
        return [
            [['id', 'mark_id', 'engine_capacity', 'gear_type_id'], 'integer'],
            [['name', 'release_date', 'color', 'mark', 'gearType'], 'safe'],
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
        $query = Car::find()
        ->joinWith(['mark', 'gearType']);

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
            'mark_id' => $this->mark_id,
            'engine_capacity' => $this->engine_capacity,
            'gear_type_id' => $this->gear_type_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'release_date', $this->release_date])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'car_mark.name', $this->mark])
            ->andFilterWhere(['like', 'gear_type.name', $this->gearType]);

        return $dataProvider;
    }
}
