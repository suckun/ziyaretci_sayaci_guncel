<?php

namespace kouosl\ziyaretci_sayaci\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kouosl\ziyaretci_sayaci\models\IpSayaci;

/**
 * IpSayacisSearch represents the model behind the search form about `kouosl\ziyaretci_sayaci\models\IpSayaci`.
 */
class IpSayacisSearch extends IpSayaci
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'simdi', 'sayac', 'gun', 'ay', 'yil'], 'integer'],
            [['ip'], 'safe'],
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
        $query = IpSayaci::find();

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
            'simdi' => $this->simdi,
            'sayac' => $this->sayac,
            'gun' => $this->gun,
            'ay' => $this->ay,
            'yil' => $this->yil,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
