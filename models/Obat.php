<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float|null $price
 * @property int|null $stock
 *
 * @property TindakanObat[] $tindakanObats
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['stock'], 'default', 'value' => null],
            [['stock'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'price' => 'Price',
            'stock' => 'Stock',
        ];
    }

    /**
     * Gets query for [[TindakanObats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakanObats()
    {
        return $this->hasMany(Tindakan_Obat::class, ['obat_id' => 'id']);
    }
}
