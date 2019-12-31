<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transporter".
 *
 * @property int $idtransporter
 * @property string $name
 * @property string|null $adress
 * @property string $phone
 * @property string|null $info
 *
 * @property Acceptmaterial[] $acceptmaterials
 */
class Transporter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transporter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['adress'], 'string', 'max' => 150],
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
            'idtransporter' => Yii::t('message', 'Idtransporter'),
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
        return $this->hasMany(Acceptmaterial::className(), ['transporter' => 'idtransporter']);
    }
}
