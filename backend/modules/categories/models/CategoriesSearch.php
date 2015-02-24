<?php

namespace backend\modules\categories\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\categories\models\Categories;

/**
 * CategoriesSearch represents the model behind the search form about `backend\modules\categories\models\Categories`.
 */
class CategoriesSearch extends Categories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'level', 'lvt', 'rgt', 'visible'], 'integer'],
            [['category_name', 'descriptiom'], 'safe'],
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
        $query = Categories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'level' => $this->level,
            'lvt' => $this->lvt,
            'rgt' => $this->rgt,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'descriptiom', $this->descriptiom]);

        return $dataProvider;
    }
}
