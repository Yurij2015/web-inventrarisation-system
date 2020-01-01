<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "storehouse".
 *
 * @property int $idstorehouse
 * @property string|null $name
 * @property string|null $adress
 * @property int $employee_idemployee
 *
 * @property Materialstorage[] $materialstorages
 * @property Employee $employeeIdemployee
 */
class Storehouse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'storehouse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_idemployee'], 'required'],
            [['employee_idemployee'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['adress'], 'string', 'max' => 150],
            [['employee_idemployee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_idemployee' => 'idemployee']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idstorehouse' => Yii::t('message', 'Idstorehouse'),
            'name' => Yii::t('message', 'StorehouseName'),
            'adress' => Yii::t('message', 'Adress'),
            'employee_idemployee' => Yii::t('message', 'Employee Idemployee'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialstorages()
    {
        return $this->hasMany(Materialstorage::className(), ['storehouse' => 'idstorehouse']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeIdemployee()
    {
        return $this->hasOne(Employee::className(), ['idemployee' => 'employee_idemployee']);
    }
}
