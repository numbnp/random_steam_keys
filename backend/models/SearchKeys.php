<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Keys;

/**
 * SearchKeys represents the model behind the search form about `backend\models\Keys`.
 */
class SearchKeys extends Keys
{
    public $gamename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'game_id', 'sales'], 'integer'],
            [['key', 'created_at', 'updated_at', 'gamename'], 'safe'],
            [['cost'], 'number'],
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
        $query = Keys::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->innerJoin(Games::tableName(),Games::tableName().'.id=game_id');

        $query->andFilterWhere([
            'id' => $this->id,
            'game_id' => $this->game_id,
            'cost' => $this->cost,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sales' => $this->sales,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key]);
        $query->andFilterWhere(['like', Games::tableName().'.name', $this->gamename]);

        return $dataProvider;
    }
}
