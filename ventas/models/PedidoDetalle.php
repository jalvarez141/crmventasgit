<?php

namespace frontend\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "pedido_detalle".
 *
 * @property integer $id
 * @property integer $producto_id
 * @property integer $pedido_id
 * @property integer $cantidad
 *
 * @property Pedido $pedido
 * @property Producto $producto
 */
class PedidoDetalle extends \yii\db\ActiveRecord
{public $my_attribute='9001';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido_detalle';
        
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_id', 'pedido_id', 'cantidad'], 'required'],
            [['producto_id', 'pedido_id', 'cantidad'], 'integer'],
            [['pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['pedido_id' => 'id']],
          //  [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id']],
            
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'producto_id' => 'ID Producto',
            'pedido_id' => 'ID Pedido',
            'cantidad' => 'Cantidad',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'pedido_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }*/
}
