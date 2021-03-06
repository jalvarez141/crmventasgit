<?php

namespace frontend\modules\ventas\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\ventas\models\CatalogoProducto;

/**
 * CatalogoProductoSearch represents the model behind the search form about `frontend\modules\ventas\models\CatalogoProducto`.
 */
class CatalogoProductoSearch extends CatalogoProducto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'catalogo_id', 'campana_id', 'producto_id', 'estado'], 'integer'],
            [['descripcion'], 'safe'],
            //[['precatprod'], 'number'],
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
        $query = CatalogoProducto::find();

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
            'catalogo_id' => $this->catalogo_id,
            'campana_id' => $this->campana_id,
            'producto_id' => $this->producto_id,
            //'incentivo_id' => $this->incentivo_id,
            'estado' => $this->estado,
             'unidad' =>$this->unidad,
            'precio' => $this->precio,
            'precio_vta' => $this->precio_vta,
            'descuento' => $this->descuento,
           // 'precatprod' => $this->precatprod,
          //  'tamcatprod' => $this->tamcatprod,
          //  'stocatprod' => $this->stocatprod,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);


        return $dataProvider;
    }
}
