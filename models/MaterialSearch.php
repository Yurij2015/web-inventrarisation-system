<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Material;

/**
 * MaterialSearch represents the model behind the search form of `app\models\Material`.
 */
class MaterialSearch extends Material
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmaterial'], 'integer'],
            [['invnumber', 'name', 'description', 'materialcategory'], 'safe'],
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
        $query = Material::find();

        $query->joinWith(['materialcategoryG']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['materialcategory'] = [
            'asc' => ['materialcategory.categoryname' => SORT_ASC],
            'desc' => ['materialcategory.categoryname' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idmaterial' => $this->idmaterial,
//            'materialcategory' => $this->materialcategory,
        ]);

        $query->andFilterWhere(['like', 'invnumber', $this->invnumber])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'materialcategory.categoryname', $this->materialcategory]);;

        return $dataProvider;
    }
}
