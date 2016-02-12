<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TextLabels;

/**
 * TextLabelsSearch represents the model behind the search form about `common\models\TextLabels`.
 */
class TextLabelsSearch extends TextLabels
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'option_name', 'code', 'value'], 'integer'],
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
        $query = TextLabels::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'option_name' => $this->option_name,
            'code' => $this->code,
            'value' => $this->value,
        ]);

        return $dataProvider;
    }
}
