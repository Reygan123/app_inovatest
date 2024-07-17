<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float|null $cost
 *
 * @property TindakanObat[] $tindakanObats
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['cost'], 'number'],
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
            'cost' => 'Cost',
        ];
    }

    /**
     * Gets query for [[TindakanObats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakanObats()
    {
        return $this->hasMany(TindakanObat::class, ['tindakan_id' => 'id']);
    }
}
