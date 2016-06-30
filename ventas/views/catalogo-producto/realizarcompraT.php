<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use frontend\modules\ventas\models\PedidoDetalle;
use frontend\modules\ventas\models\Pedido;
use app\models;
use yii\db\Query;
$connection = \Yii::$app->db;
$tot=0;
$this->title = 'Realizar Venta';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->params ['breadcrumbs'][] = $this->title
?>

<h2><div style="color: #00b3ee" align='center'> VENDER PRODUCTOS</div></h2><br>
<hr style="height: 2px ; background: #0097cf">
<br>
<h2><div align='center'> Productos en la lista de venta:</div></h2><br>
<br>
<table class='table table-striped'>
    
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th></th>
        <th></th>
    </tr>
    <?php $table = new PedidoDetalle();
    $sql='select pedido_detalle.id as id,pedido_detalle.producto_id as producto_id, producto.nombre as nombre, producto.precio_vta as precio_vta,  pedido_detalle.cantidad as cantidad from pedido_detalle, producto where pedido_detalle.pedido_id=9001 and pedido_detalle.producto_id=producto.id ;
';
    
    $model=$connection->createCommand($sql)->queryAll();
    //$model =Yii::app()->db->createCommand('select * from pedido_detalle')->queryAll();
   // $model = $table->find()->select('pedido_detalle.producto_id as producto_id, producto.nombre, pedido_detalle.cantidad') 
            //->from('pedido_detalle, producto')->where('pedido_detalle.pedido_id=9001 and producto.id=pedido_detalle.producto_id ')->all();
    //$model = $table->find()->where(['id'=>(['codigo'=>'1001'])])->all();//a
    ?>
    <?php foreach($model as $row): ?>
    <tr>
        
        <td><?= $row['producto_id']?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['precio_vta'] ?></td>
        <td><?= $row['cantidad'] ?></td>
        <td><a class="btn btn-primary" href="
    <?= Url::toRoute(['pedido-detalle/update_2', 'id' => $row['id']])
    ?>">
                <span class="glyphicon glyphicon-edit"></span>
            </a></td>
      <td><?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['pedido-detalle/delete2', 'id' => $row['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar?',
                'method' => 'post',
            ],
        ]) ?></td>
    </tr>
    <?php endforeach ?>
    
    <?php    foreach ($model as $value) {
        $tot=$tot+($value['precio_vta']*$value['cantidad']);
    } 
    ?>
    
</table>
<div align='right'><b>TOTAL: S/.</b>  <?= $tot?> </div>
<hr style="height: 1px ; background: black">
<a class="btn btn-success" href="
    <?= Url::toRoute('boletatienda')
    ?>"> Finalizar con Boleta </a>
<a class="btn btn-success" href="
    <?= Url::toRoute('facturatienda')
    ?>"> Finalizar con Factura </a> 
<?= Html::submitInput('Cancelar',['class'=>'btn btn-alert ']) ?>
