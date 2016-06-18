<?php

namespace frontend\modules\ventas\models;

use Yii;
use frontend\modules\ventas\models\CatalogoProducto;
use frontend\modules\ventas\models\PedidoDetalle;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id
 * @property integer $tipo_pedido_id
 * @property integer $interlocutor_comercial_id
 *
 * @property Despacho[] $despachos
 * @property Operacion[] $operacions
 * @property InterlocutorComercial $interlocutorComercial
 * @property TipoPedido $tipoPedido
 * @property PedidoDetalle[] $pedidoDetalles
 * @property Venta[] $ventas
 */
class Pedido extends \yii\db\ActiveRecord
{
    public $catalogoproductos;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_pedido_id', 'interlocutor_comercial_id'], 'required'],
            [['tipo_pedido_id', 'interlocutor_comercial_id'], 'integer'],
          //  [['interlocutor_comercial_id'], 'exist', 'skipOnError' => true, 'targetClass' => InterlocutorComercial::className(), 'targetAttribute' => ['interlocutor_comercial_id' => 'id']],
         //   [['tipo_pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoPedido::className(), 'targetAttribute' => ['tipo_pedido_id' => 'id']],
            ['catalogoproductos', 'safe']
            ];
    }
    public function afterSave($insert, $changedAttributes){
        \Yii::$app->db->createCommand()->delete('pedido_detalle', 'pedido_id = '.(int) $this->id)->execute();
        foreach($this->catalogoproductos  as $id) {
            $ro = new PedidoDetalle();
            $ro->pedido_id = $this->id;
            $ro->catalogo_id = $id;
            $ro->save();
        }
    }
    
 
public function getCatalogoProductosPermitidas()
{
    return $this->hasMany(CatalogoProducto::className(), ['id' => 'producto_id'])
        ->viaTable('pedido_detalle', ['pedido_id' => 'id']);
}
 
public function getCatalogoProductosPermitidasList()
{
    return $this->getCatalogoProductosPermitidas()->asArray();
}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_pedido_id' => 'Tipo Pedido ID',
            'interlocutor_comercial_id' => 'Interlocutor Comercial ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDespachos()
    {
        return $this->hasMany(Despacho::className(), ['pedido_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacions()
    {
        return $this->hasMany(Operacion::className(), ['pedido_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterlocutorComercial()
    {
        return $this->hasOne(InterlocutorComercial::className(), ['id' => 'interlocutor_comercial_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPedido()
    {
        return $this->hasOne(TipoPedido::className(), ['id' => 'tipo_pedido_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::className(), ['pedido_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['pedido_id' => 'id']);
    }
}
