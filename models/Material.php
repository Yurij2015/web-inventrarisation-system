<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $idmaterial
 * @property string|null $invnumber
 * @property string|null $name
 * @property string|null $description
 * @property int $materialcategory
 *
 * @property Acceptmaterial[] $acceptmaterials
 * @property Inventarisation[] $inventarisations
 * @property Materialcategory $materialcategory0
 * @property Materialstorage[] $materialstorages
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['materialcategory'], 'required'],
            [['materialcategory'], 'integer'],
            [['invnumber'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 85],
            [['description'], 'string', 'max' => 255],
            [['materialcategory'], 'exist', 'skipOnError' => true, 'targetClass' => Materialcategory::className(), 'targetAttribute' => ['materialcategory' => 'idmaterialcategory']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmaterial' => Yii::t('message', 'Idmaterial'),
            'invnumber' => Yii::t('message', 'Invnumber'),
            'name' => Yii::t('message', 'MaterialName'),
            'description' => Yii::t('message', 'Description'),
            'materialcategory' => Yii::t('message', 'Materialcategory'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcceptmaterials()
    {
        return $this->hasMany(Acceptmaterial::className(), ['material' => 'idmaterial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarisations()
    {
        return $this->hasMany(Inventarisation::className(), ['material' => 'idmaterial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialcategoryG()
    {
        return $this->hasOne(Materialcategory::className(), ['idmaterialcategory' => 'materialcategory']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialstorages()
    {
        return $this->hasMany(Materialstorage::className(), ['material' => 'idmaterial']);
    }
}
