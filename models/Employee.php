<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $idemployee
 * @property string|null $name
 * @property string|null $phone
 *
 * @property Acceptmaterial[] $acceptmaterials
 * @property Inventarisation[] $inventarisations
 * @property Storehouse[] $storehouses
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idemployee' => Yii::t('message', 'Idemployee'),
            'name' => Yii::t('message', 'EmpName'),
            'phone' => Yii::t('message', 'Phone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcceptmaterials()
    {
        return $this->hasMany(Acceptmaterial::className(), ['employee' => 'idemployee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarisations()
    {
        return $this->hasMany(Inventarisation::className(), ['employee' => 'idemployee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStorehouses()
    {
        return $this->hasMany(Storehouse::className(), ['employee_idemployee' => 'idemployee']);
    }
}
