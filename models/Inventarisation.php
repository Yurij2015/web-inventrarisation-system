<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventarisation".
 *
 * @property int $idinventarisation
 * @property string|null $date
 * @property int $material
 * @property float|null $count
 * @property string|null $units
 * @property int $employee
 * @property string|null $actnumber
 * @property string|null $protocolnumber
 * @property mixed materialG
 */
class Inventarisation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventarisation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['material', 'employee'], 'required'],
            [['material', 'employee'], 'integer'],
            [['count'], 'number'],
            [['units'], 'string', 'max' => 15],
            [['actnumber', 'protocolnumber'], 'string', 'max' => 20],
            [['employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee' => 'idemployee']],
            [['material'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material' => 'idmaterial']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idinventarisation' => Yii::t('message', 'Idinventarisation'),
            'date' => Yii::t('message', 'Date'),
            'material' => Yii::t('message', 'Material'),
            'count' => Yii::t('message', 'Count'),
            'units' => Yii::t('message', 'Units'),
            'employee' => Yii::t('message', 'Employee'),
            'actnumber' => Yii::t('message', 'Actnumber'),
            'protocolnumber' => Yii::t('message', 'Protocolnumber'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeG()
    {
        return $this->hasOne(Employee::className(), ['idemployee' => 'employee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialG()
    {
        return $this->hasOne(Material::className(), ['idmaterial' => 'material']);
    }
}
