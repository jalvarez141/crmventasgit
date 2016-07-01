<?php

namespace frontend\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property integer $producto_id
 * @property integer $stock
 * @property string $fecha_actualizacion
 *
 * @property Producto $producto
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_id'], 'required'],
            [['producto_id', 'stock'], 'integer'],
            [['fecha_actualizacion'], 'safe'],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'producto_id' => 'Producto ID',
            'stock' => 'Stock',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }
}
