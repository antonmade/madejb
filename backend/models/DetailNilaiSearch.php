<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetailNilai;

/**
 * DetailNilaiSearch represents the model behind the search form of `backend\models\DetailNilai`.
 */
class DetailNilaiSearch extends DetailNilai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_penilaian', 'nilai'], 'integer'],
            [['tanggal_penilaian', 'pemberi_nilai'], 'safe'],
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
        $query = DetailNilai::find();

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
            'id_penilaian' => $this->id_penilaian,
            'nilai' => $this->nilai,
            'tanggal_penilaian' => $this->tanggal_penilaian,
        ]);

        $query->andFilterWhere(['like', 'pemberi_nilai', $this->pemberi_nilai]);

        return $dataProvider;
    }
}
