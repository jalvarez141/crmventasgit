<?php

namespace frontend\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property integer $id
 * @property integer $despacho_id
 * @property integer $pedido_id
 *
 * @property Despacho $despacho
 * @property Pedido $pedido
 * @property VentaDetalle[] $ventaDetalles
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedido_id'], 'required'],
            [['pedido_id'], 'integer'],
            [['pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['pedido_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'despacho_id' => 'Despacho ID',
            'pedido_id' => 'Pedido ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getDespacho()
    {
        return $this->hasOne(Despacho::className(), ['id' => 'despacho_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'pedido_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaDetalles()
    {
        return $this->hasMany(VentaDetalle::className(), ['venta_id' => 'id']);
    }
}
