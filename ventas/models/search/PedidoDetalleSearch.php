<?php

namespace frontend\modules\ventas\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\ventas\models\PedidoDetalle;

/**
 * PedidoDetalleSearch represents the model behind the search form about `frontend\modules\ventas\models\PedidoDetalle`.
 */
class PedidoDetalleSearch extends PedidoDetalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'producto_id', 'pedido_id', 'cantidad'], 'integer'],
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
        $query = PedidoDetalle::find();

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
            'producto_id' => $this->producto_id,
            'pedido_id' => $this->pedido_id,
            'cantidad' => $this->cantidad,
        ]);

        return $dataProvider;
    }
}
