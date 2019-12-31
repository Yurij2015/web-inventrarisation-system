<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Materialcategory;

/**
 * MaterialcategorySearch represents the model behind the search form of `app\models\Materialcategory`.
 */
class MaterialcategorySearch extends Materialcategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmaterialcategory'], 'integer'],
            [['categoryname', 'description'], 'safe'],
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
        $query = Materialcategory::find();

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
            'idmaterialcategory' => $this->idmaterialcategory,
        ]);

        $query->andFilterWhere(['like', 'categoryname', $this->categoryname])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
