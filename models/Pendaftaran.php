<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendaftaran".
 *
 * @property int $id
 * @property int $pasien_id
 * @property string|null $tanggal_daftar
 *
 * @property Pasien $pasien
 * @property Pembayaran[] $pembayarans
 * @property TindakanObat[] $tindakanObats
 */
class Pendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id'], 'required'],
            [['pasien_id'], 'default', 'value' => null],
            [['pasien_id'], 'integer'],
            [['tanggal_daftar'], 'safe'],
            [['pasien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['pasien_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pasien_id' => 'Pasien ID',
            'tanggal_daftar' => 'Tanggal Daftar',
        ];
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'pasien_id']);
    }

    /**
     * Gets query for [[Pembayarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::class, ['pendaftaran_id' => 'id']);
    }

    /**
     * Gets query for [[TindakanObats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakanObats()
    {
        return $this->hasMany(Tindakan_Obat::class, ['pendaftaran_id' => 'id']);
    }
}
