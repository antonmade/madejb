<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Statistik;

/**
 * StatistikSearch represents the model behind the search form of `backend\models\Statistik`.
 */
class StatistikSearch extends Statistik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_statistik', 'id_admin'], 'integer'],
            [['access_time', 'user_ip', 'user_host'], 'safe'],
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
        $query = Statistik::find();

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
            'id_statistik' => $this->id_statistik,
            'id_admin' => $this->id_admin,
            'access_time' => $this->access_time,
        ]);

        $query->andFilterWhere(['like', 'user_ip', $this->user_ip])
            ->andFilterWhere(['like', 'user_host', $this->user_host]);

        return $dataProvider;
    }
}
