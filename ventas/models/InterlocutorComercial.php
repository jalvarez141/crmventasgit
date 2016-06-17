<?php

namespace frontend\modules\ventas\models;

use Yii;

/**
 * This is the model class for table "interlocutor_comercial".
 *
 * @property integer $id
 * @property integer $zona_id
 * @property integer $roles_id
 * @property string $codigo
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $telefono
 * @property integer $estado
 *
 * @property Ganadoras[] $ganadoras
 * @property Roles $roles
 * @property Zona $zona
 * @property Pedido[] $pedidos
 * @property Puntaje[] $puntajes
 * @property Relacion[] $relacions
 * @property Relacion[] $relacions0
 */
class InterlocutorComercial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interlocutor_comercial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zona_id', 'roles_id'], 'required'],
            [['zona_id', 'roles_id', 'estado'], 'integer'],
            [['codigo'], 'string', 'max' => 10],
            [['nombre', 'apellido', 'email'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 45],
           // [['roles_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['roles_id' => 'id']],
           // [['zona_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zona::className(), 'targetAttribute' => ['zona_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zona_id' => 'Zona ID',
            'roles_id' => 'Roles ID',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'telefono' => 'Telefono',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getGanadoras()
    {
        return $this->hasMany(Ganadoras::className(), ['interlocutor_comercial_id' => 'id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getRoles()
    {
        return $this->hasOne(Roles::className(), ['id' => 'roles_id']);
    }
*/
    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getZona()
    {
        return $this->hasOne(Zona::className(), ['id' => 'zona_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['interlocutor_comercial_id' => 'id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getPuntajes()
    {
        return $this->hasMany(Puntaje::className(), ['interlocutor_comercial_id' => 'id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getRelacions()
    {
        return $this->hasMany(Relacion::className(), ['interlocutor_comercial_id' => 'id']);
    }
*/
    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getRelacions0()
    {
        return $this->hasMany(Relacion::className(), ['interlocutor_comercial_id_alt' => 'id']);
    }*/
}
