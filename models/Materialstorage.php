<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "materialstorage".
 *
 * @property int $idfoodstorage
 * @property int|null $racknumber
 * @property int $storehouse
 * @property int $material
 * @property ActiveQuery $storehouseG
 * @property mixed materialG
 */
class Materialstorage extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materialstorage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['racknumber', 'storehouse', 'material'], 'integer'],
            [['storehouse', 'material'], 'required'],
            [['material'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material' => 'idmaterial']],
            [['storehouse'], 'exist', 'skipOnError' => true, 'targetClass' => Storehouse::className(), 'targetAttribute' => ['storehouse' => 'idstorehouse']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idfoodstorage' => Yii::t('message', 'Idfoodstorage'),
            'racknumber' => Yii::t('message', 'Racknumber'),
            'storehouse' => Yii::t('message', 'Storehouse'),
            'material' => Yii::t('message', 'Material'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getMaterialG()
    {
        return $this->hasOne(Material::className(), ['idmaterial' => 'material']);
    }

    /**
     * @return ActiveQuery
     */
    public function getStorehouseG()
    {
        return $this->hasOne(Storehouse::className(), ['idstorehouse' => 'storehouse']);
    }
}
