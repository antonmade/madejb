<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pelamar;

/**
 * PelamarSearch represents the model behind the search form of `frontend\models\Pelamar`.
 */
class PelamarSearch extends Pelamar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'nik', 'nama_lengkap', 'alamat_ktp', 'provinsi', 'kota', 'status_menikah', 'deskripsi_keahlian', 'pengalaman_kerja', 'foto', 'jenjang', 'jurusan', 'ipk', 'nama_institusi', 'no_ijazah', 'toefl'], 'safe'],
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
        $query = Pelamar::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'alamat_ktp', $this->alamat_ktp])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'kota', $this->kota])
            ->andFilterWhere(['like', 'status_menikah', $this->status_menikah])
            ->andFilterWhere(['like', 'deskripsi_keahlian', $this->deskripsi_keahlian])
            ->andFilterWhere(['like', 'pengalaman_kerja', $this->pengalaman_kerja])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'jenjang', $this->jenjang])
            ->andFilterWhere(['like', 'jurusan', $this->jurusan])
            ->andFilterWhere(['like', 'ipk', $this->ipk])
            ->andFilterWhere(['like', 'nama_institusi', $this->nama_institusi])
            ->andFilterWhere(['like', 'no_ijazah', $this->no_ijazah])
            ->andFilterWhere(['like', 'toefl', $this->toefl]);

        return $dataProvider;
    }
}
