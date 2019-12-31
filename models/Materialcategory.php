<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materialcategory".
 *
 * @property int $idmaterialcategory
 * @property string|null $categoryname
 * @property string|null $description
 *
 * @property Material[] $materials
 */
class Materialcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materialcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryname'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 145],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmaterialcategory' => Yii::t('message', 'Idmaterialcategory'),
            'categoryname' => Yii::t('message', 'Categoryname'),
            'description' => Yii::t('message', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['materialcategory' => 'idmaterialcategory']);
    }
}
