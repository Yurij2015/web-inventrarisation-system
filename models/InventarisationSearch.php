<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventarisation;

/**
 * InventarisationSearch represents the model behind the search form of `app\models\Inventarisation`.
 */
class InventarisationSearch extends Inventarisation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idinventarisation'], 'integer'],
            [['date', 'units', 'actnumber', 'protocolnumber', 'material', 'employee'], 'safe'],
            [['count'], 'number'],
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
        $query = Inventarisation::find();

        $query->joinWith(['materialG', 'employeeG']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['material'] = [
            'asc' => ['material.name' => SORT_ASC],
            'desc' => ['material.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['employee'] = [
            'asc' => ['employee.name' => SORT_ASC],
            'desc' => ['employee.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idinventarisation' => $this->idinventarisation,
            'date' => $this->date,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'units', $this->units])
            ->andFilterWhere(['like', 'actnumber', $this->actnumber])
            ->andFilterWhere(['like', 'protocolnumber', $this->protocolnumber])
            ->andFilterWhere(['like', 'material.name', $this->material])
            ->andFilterWhere(['like', 'employee.name', $this->employee]);

        return $dataProvider;
    }
}
