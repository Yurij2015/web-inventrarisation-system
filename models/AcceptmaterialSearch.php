<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Acceptmaterial;

/**
 * AcceptmaterialSearch represents the model behind the search form of `app\models\Acceptmaterial`.
 */
class AcceptmaterialSearch extends Acceptmaterial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idaccept'], 'integer'],
            [['date', 'units', 'employee', 'material', 'vendor', 'transporter'], 'safe'],
            [['cost', 'count'], 'number'],
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
        $query = Acceptmaterial::find();

        $query->joinWith(['employeeG', 'materialG', 'vendorG', 'transporterG']);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['employee'] = [
            'asc' => ['employee.name' => SORT_ASC],
            'desc' => ['employee.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['material'] = [
            'asc' => ['material.name' => SORT_ASC],
            'desc' => ['material.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['vendor'] = [
            'asc' => ['vendor.name' => SORT_ASC],
            'desc' => ['vendor.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['transporter'] = [
            'asc' => ['transporter.name' => SORT_ASC],
            'desc' => ['transporter.name' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idaccept' => $this->idaccept,
            'date' => $this->date,
            'cost' => $this->cost,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'units', $this->units])
            ->andFilterWhere(['like', 'employee.name', $this->employee])
            ->andFilterWhere(['like', 'material.name', $this->material])
            ->andFilterWhere(['like', 'vendor.name', $this->vendor])
            ->andFilterWhere(['like', 'transporter.name', $this->transporter]);

        return $dataProvider;
    }
}
