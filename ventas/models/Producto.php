<?php

namespace frontend\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id
 * @property integer $familia_id
 * @property string $codigo
 * @property string $nombre
 * @property integer $unidad
 * @property string $precio
 * @property string $precio_vta
 * @property integer $descuento
 * @property integer $estado
 *
 * @property CatalogoProducto[] $catalogoProductos
 * @property EntregaPremios[] $entregaPremios
 * @property Incentivo[] $incentivos
 * @property OperacionDetalle[] $operacionDetalles
 * @property OperacionDetalle[] $operacionDetalles0
 * @property PedidoDetalle[] $pedidoDetalles
 * @property Familia $familia
 * @property Stock[] $stocks
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['familia_id'], 'required'],
            [['familia_id', 'unidad', 'descuento', 'estado'], 'integer'],
            [['precio', 'precio_vta'], 'number'],
            [['codigo'], 'string', 'max' => 10],
            [['nombre'], 'string', 'max' => 255],
            [['familia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Familia::className(), 'targetAttribute' => ['familia_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'familia_id' => 'Familia ID',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'unidad' => 'Unidad',
            'precio' => 'Precio',
            'precio_vta' => 'Precio Vta',
            'descuento' => 'Descuento',
            'estado' => 'Estado',
        ];
    }


    public function getCatalogoProductos()
    {
        return $this->hasMany(CatalogoProducto::className(), ['producto_id' => 'id']);
    }

/*
    public function getEntregaPremios()
    {
        return $this->hasMany(EntregaPremios::className(), ['producto_id' => 'id']);
    }
*/
  /* 
    public function getIncentivos()
    {
        return $this->hasMany(Incentivo::className(), ['producto_id' => 'id']);
    }
*/
/*
    public function getOperacionDetalles()
    {
        return $this->hasMany(OperacionDetalle::className(), ['producto_id' => 'id']);
    }
*/
    /*
    public function getOperacionDetalles0()
    {
        return $this->hasMany(OperacionDetalle::className(), ['producto_id_operacion' => 'id']);
    }

*/
    public function getPedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::className(), ['producto_id' => 'id']);
    }

/*
    public function getFamilia()
    {
        return $this->hasOne(Familia::className(), ['id' => 'familia_id']);
    }
*/
/*
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['producto_id' => 'id']);
    }*/
}
