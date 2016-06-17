<?php

namespace frontend\modules\ventas\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\ventas\models\InterlocutorComercial;

/**
 * InterlocutorComercialSearch represents the model behind the search form about `frontend\modules\ventas\models\InterlocutorComercial`.
 */
class InterlocutorComercialSearch extends InterlocutorComercial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'zona_id', 'roles_id', 'estado'], 'integer'],
            [['codigo', 'nombre', 'apellido', 'email', 'telefono'], 'safe'],
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
        $query = InterlocutorComercial::find();

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
            'zona_id' => $this->zona_id,
            'roles_id' => $this->roles_id,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telefono', $this->telefono]);

        return $dataProvider;
    }
}
