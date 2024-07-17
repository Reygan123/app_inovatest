<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $phone_number
 * @property string|null $email
 * @property string $role
 * @property int $wilayah_id
 *
 * @property Wilayah $wilayah
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'role', 'wilayah_id'], 'required'],
            [['address'], 'string'],
            [['wilayah_id'], 'default', 'value' => null],
            [['wilayah_id'], 'integer'],
            [['name', 'phone_number', 'email', 'role'], 'string', 'max' => 255],
            [['wilayah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['wilayah_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'role' => 'Role',
            'wilayah_id' => 'Wilayah ID',
        ];
    }

    /**
     * Gets query for [[Wilayah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'wilayah_id']);
    }
}
