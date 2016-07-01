<?php

namespace frontend\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "catalogo_producto".
 *
 * @property integer $id
 * @property integer $catalogo_id
 * @property integer $campana_id
 * @property integer $producto_id
 * @property integer $incentivo_id
 * @property string $descripcion
 * @property integer $estado
 * @property string $nomcatprod
 * @property double $precatprod
 * @property integer $tamcatprod
 * @property integer $stocatprod
 *
 * @property Campana $campana
 * @property Catalogo $catalogo
 * @property Incentivo $incentivo
 * @property Producto $producto
 */
class CatalogoProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalogo_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           /* [['catalogo_id', 'campana_id', 'producto_id', 'incentivo_id', 'nomcatprod', 'precatprod', 'tamcatprod', 'stocatprod'], 'required'],
            [['catalogo_id', 'campana_id', 'producto_id', 'incentivo_id', 'estado', 'tamcatprod', 'stocatprod'], 'integer'],
            [['precatprod'], 'number'],
            [['descripcion'], 'string', 'max' => 255],
            [['nomcatprod'], 'string', 'max' => 45],*/
            
            
           // [['campana_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campana::className(), 'targetAttribute' => ['campana_id' => 'id']],
           // [['catalogo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalogo::className(), 'targetAttribute' => ['catalogo_id' => 'id']],
           // [['incentivo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Incentivo::className(), 'targetAttribute' => ['incentivo_id' => 'id']],
           // [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id']],
             [['catalogo_id', 'campana_id', 'producto_id', 'incentivo_id'], 'required'],
            [['catalogo_id', 'campana_id', 'producto_id', 'incentivo_id', 'estado'], 'integer'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        //    'catalogo_id' => 'Catalogo ID',
        //    'campana_id' => 'Campana ID',
         //   'producto_id' => 'Producto ID',
         //   'incentivo_id' => 'Incentivo ID',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
           /* 'nomcatprod' => 'Nomcatprod',
            'precatprod' => 'Precatprod',
            'tamcatprod' => 'Tamcatprod',
            'stocatprod' => 'Stocatprod',*/
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getCampana()
    {
        return $this->hasOne(Campana::className(), ['id' => 'campana_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getCatalogo()
    {
        return $this->hasOne(Catalogo::className(), ['id' => 'catalogo_id']);
    }
*/
    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getIncentivo()
    {
        return $this->hasOne(Incentivo::className(), ['id' => 'incentivo_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }*/
}
