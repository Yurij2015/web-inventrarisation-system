<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Materialstorage;

/**
 * MaterialstorageSearch represents the model behind the search form of `app\models\Materialstorage`.
 */
class MaterialstorageSearch extends Materialstorage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idfoodstorage', 'racknumber'], 'integer'],
            [['storehouse', 'material'], 'safe'],

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
        $query = Materialstorage::find();

        $query->joinWith(['storehouseG', 'materialG']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['material'] = [
            'asc' => ['material.name' => SORT_ASC],
            'desc' => ['material.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['storehouse'] = [
            'asc' => ['storehouse.name' => SORT_ASC],
            'desc' => ['storehouse.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idfoodstorage' => $this->idfoodstorage,
            'racknumber' => $this->racknumber
        ]);

        $query->andFilterWhere(['like', 'material.name', $this->material])
            ->andFilterWhere(['like', 'storehouse.name', $this->storehouse]);
        return $dataProvider;
    }
}
