<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $idvendor
 * @property string $name
 * @property string|null $adress
 * @property string|null $phone
 * @property string|null $info
 *
 * @property Acceptmaterial[] $acceptmaterials
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['adress'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['info'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idvendor' => Yii::t('message', 'Idvendor'),
            'name' => Yii::t('message', 'Name'),
            'adress' => Yii::t('message', 'Adress'),
            'phone' => Yii::t('message', 'Phone'),
            'info' => Yii::t('message', 'Info'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcceptmaterials()
    {
        return $this->hasMany(Acceptmaterial::className(), ['vendor' => 'idvendor']);
    }
}
