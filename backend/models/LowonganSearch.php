<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Lowongan;

/**
 * LowonganSearch represents the model behind the search form of `backend\models\Lowongan`.
 */
class LowonganSearch extends Lowongan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lowongan', 'id_admin'], 'integer'],
            [['nama_lowongan', 'status_lowongan', 'kriteria', 'tanggal_lowongan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Lowongan::find();

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
            'id_lowongan' => $this->id_lowongan,
            'id_admin' => $this->id_admin,
            'tanggal_lowongan' => $this->tanggal_lowongan,
        ]);

        $query->andFilterWhere(['like', 'nama_lowongan', $this->nama_lowongan])
            ->andFilterWhere(['like', 'status_lowongan', $this->status_lowongan])
            ->andFilterWhere(['like', 'kriteria', $this->kriteria]);

        return $dataProvider;
    }
}
