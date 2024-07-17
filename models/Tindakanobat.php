<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakanobat".
 *
 * @property int $id
 * @property int $pendaftaran_id
 * @property int|null $tindakan_id
 * @property int|null $obat_id
 * @property int|null $quantity
 * @property float|null $total_cost
 *
 * @property Obat $obat
 * @property Pendaftaran $pendaftaran
 * @property Tindakan $tindakan
 */
class Tindakanobat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakanobat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pendaftaran_id'], 'required'],
            [['pendaftaran_id', 'tindakan_id', 'obat_id', 'quantity'], 'default', 'value' => null],
            [['pendaftaran_id', 'tindakan_id', 'obat_id', 'quantity'], 'integer'],
            [['total_cost'], 'number'],
            [['obat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['obat_id' => 'id']],
            [['pendaftaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::class, 'targetAttribute' => ['pendaftaran_id' => 'id']],
            [['tindakan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['tindakan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pendaftaran_id' => 'Pendaftaran ID',
            'tindakan_id' => 'Tindakan ID',
            'obat_id' => 'Obat ID',
            'quantity' => 'Quantity',
            'total_cost' => 'Total Cost',
        ];
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'obat_id']);
    }

    /**
     * Gets query for [[Pendaftaran]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, ['id' => 'pendaftaran_id']);
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'tindakan_id']);
    }
}
