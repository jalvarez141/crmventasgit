<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;
$connection = \Yii::$app->db;
$tot=0;
$this->title = 'Factura Venta';
$this->params['breadcrumbs'][] = ['label' => 'Realizar Venta', 'url' => ['realizarcomprat']];
$this->params['breadcrumbs'][] = $this->title;
?>


<h2 style="color: #00b3ee"  align='center'> VENTA</h2>
<hr style="height: 2px ; background: #0097cf"><br>
<?php
 $sql='select venta_detalle.id as id from venta_detalle where pedido_id=9001;
'; $model=$connection->createCommand($sql)->queryOne();
?>
<hr style="height: 1px ; background: black">
<div align="right"><h2>R.U.C. Nº 20525149750</h2></div>
<div align="right"><h1>Factura</h1>
<h3>Nº 002-000<?= $model['id']?></h3></div>
<table class="table table-condensed">
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td><span style="font-size: 22px"> 02 de julio del 2016</span></td> 
        <td></td>
        <td></td> 
    </tr>
    <tr>
        <td><span style="font-size: 22px; font-weight: bold">Señor(a):</span>
            <span style="font-size: 22px"> ---------------------------</span></td> 
        <td></td>
        
        <td><span style="font-size: 22px; font-weight: bold">RUC: </span>
            <span style="font-size: 22px"> ---------------------</span> </td> 
    </tr>
    <tr>
        <td><span style="font-size: 22px; font-weight: bold">Dirección: </span>
            <span style="font-size: 22px"> -------------------------</span> </td> 
        <td></td> 
        <td></td> 
    </tr>
    </table>

<hr style="height: 0.5px ; background: black">

 <table class="table table-responsive">
    <tr>
        
        <th>DESCRIPCIÓN</th>
        <th>PRECIO UNIT</th>
        <th>CANTIDAD</th>
        <th>IMPORTE</th>
    </tr>
    <?php
  $sql='select pedido_detalle.id as id,pedido_detalle.producto_id as producto_id, producto.nombre as nombre, catalogo_producto.precio_vta as precio_vta,  pedido_detalle.cantidad as cantidad from pedido_detalle, producto,catalogo_producto where pedido_detalle.pedido_id=9001 and pedido_detalle.producto_id=producto.id and catalogo_producto.producto_id=producto.id;
';
    
    $model=$connection->createCommand($sql)->queryAll();
            ?>
     <?php foreach($model as $row): ?>
    <tr>
        
        <td><?= $row['nombre']?></td>
        <td><?= $row['precio_vta'] ?></td>
        <td><?= $row['cantidad'] ?></td>
        <td><?= $row['precio_vta']*$row['cantidad'] ?></td>
    </tr>
    <?php endforeach ?>
        <?php    foreach ($model as $value) {
        $tot=$tot+($value['precio_vta']*$value['cantidad']);    } 
    ?>
    <tr>
        <td></td>
        <td></td>
        <td align='right'>SUB-TOTAL</td>
        <td><?=$tot*81/100?></td> 
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td align='right'>I.G.V 19%</td>
        <td><?=$tot*19/100?></td> 
    </tr>
    <tr>
        <td></td> 
         <td></td> 
        <td align='right'>TOTAL</td>
        <td><?=$tot?></td> 
    </tr>
    </table>
   

<hr style="height: 1px ; background: black">
   <p>
        <?= Html::a('Imprimir', '#',[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Imprimiendo . . .',
            ],
        ]) ?>
    </p>



   


