<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Storehouse;

/**
 * StorehouseSearch represents the model behind the search form of `app\models\Storehouse`.
 */
class StorehouseSearch extends Storehouse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idstorehouse', 'employee_idemployee'], 'integer'],
            [['name', 'adress'], 'safe'],
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
        $query = Storehouse::find();

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
            'idstorehouse' => $this->idstorehouse,
            'employee_idemployee' => $this->employee_idemployee,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'adress', $this->adress]);

        return $dataProvider;
    }
}
