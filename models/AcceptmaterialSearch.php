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
            [['idaccept', 'employee', 'material', 'vendor', 'transporter'], 'integer'],
            [['date', 'units'], 'safe'],
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
            'idaccept' => $this->idaccept,
            'date' => $this->date,
            'employee' => $this->employee,
            'material' => $this->material,
            'vendor' => $this->vendor,
            'transporter' => $this->transporter,
            'cost' => $this->cost,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'units', $this->units]);

        return $dataProvider;
    }
}
