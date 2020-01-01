<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acceptmaterial".
 *
 * @property int $idaccept
 * @property string|null $date
 * @property int $employee
 * @property int $material
 * @property int $vendor
 * @property int $transporter
 * @property float|null $cost
 * @property float|null $count
 * @property string|null $units
 *
 * @property Employee $employeeG
 * @property Material $materialG
 * @property Transporter $transporterG
 * @property Vendor $vendorG
 */
class Acceptmaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acceptmaterial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['employee', 'material', 'vendor', 'transporter'], 'required'],
            [['employee', 'material', 'vendor', 'transporter'], 'integer'],
            [['cost', 'count'], 'number'],
            [['units'], 'string', 'max' => 15],
            [['employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee' => 'idemployee']],
            [['material'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material' => 'idmaterial']],
            [['transporter'], 'exist', 'skipOnError' => true, 'targetClass' => Transporter::className(), 'targetAttribute' => ['transporter' => 'idtransporter']],
            [['vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::className(), 'targetAttribute' => ['vendor' => 'idvendor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idaccept' => Yii::t('message', 'Idaccept'),
            'date' => Yii::t('message', 'Date'),
            'employee' => Yii::t('message', 'Employee'),
            'material' => Yii::t('message', 'Material'),
            'vendor' => Yii::t('message', 'Vendor'),
            'transporter' => Yii::t('message', 'Transporter'),
            'cost' => Yii::t('message', 'Cost'),
            'count' => Yii::t('message', 'Count'),
            'units' => Yii::t('message', 'Units'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransporterG()
    {
        return $this->hasOne(Transporter::className(), ['idtransporter' => 'transporter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorG()
    {
        return $this->hasOne(Vendor::className(), ['idvendor' => 'vendor']);
    }
}
