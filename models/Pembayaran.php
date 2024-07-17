<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $id
 * @property int $pendaftaran_id
 * @property float|null $total_amount
 * @property string|null $payment_date
 *
 * @property Pendaftaran $pendaftaran
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pendaftaran_id'], 'required'],
            [['pendaftaran_id'], 'default', 'value' => null],
            [['pendaftaran_id'], 'integer'],
            [['total_amount'], 'number'],
            [['payment_date'], 'safe'],
            [['pendaftaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::class, 'targetAttribute' => ['pendaftaran_id' => 'id']],
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
            'total_amount' => 'Total Amount',
            'payment_date' => 'Payment Date',
        ];
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
}
