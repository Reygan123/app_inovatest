<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tindakanobat;

/**
 * TindakanobatSearch represents the model behind the search form of `app\models\Tindakanobat`.
 */
class TindakanobatSearch extends Tindakanobat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pendaftaran_id', 'tindakan_id', 'obat_id', 'quantity'], 'integer'],
            [['total_cost'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tindakanobat::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pendaftaran_id' => $this->pendaftaran_id,
            'tindakan_id' => $this->tindakan_id,
            'obat_id' => $this->obat_id,
            'quantity' => $this->quantity,
            'total_cost' => $this->total_cost,
        ]);

        return $dataProvider;
    }
}
