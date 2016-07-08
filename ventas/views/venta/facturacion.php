<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;
$connection = \Yii::$app->db;
$tot=0;
$cant=0;
$this->title = 'Venta';
$this->params['breadcrumbs'][] = ['label' => 'Hojas de despacho', 'url' => ['hojadespacho']];
$this->params['breadcrumbs'][] = $this->title;
?>



<h2 style="color: #00b3ee"  align='center'> Facturacion</h2>
<hr style="height: 2px ; background: #0097cf"><br>



<hr style="height: 1px ; background: black">
    
<?php
 $sql='SELECT
  v.pedido_id AS id,
  v.codigo_venta AS cod,
  v.fecha_venta AS fech,
  concat( i.nombre," ",i.apellido) AS nom,
  z.nombre AS zona
FROM
  venta v,
  pedido p,
  interlocutor_comercial i,
  zona z
WHERE
  p.id = v.pedido_id AND i.id = p.interlocutor_comercial_id AND z.id = 

i.zona_id
ORDER BY
  cod;';
 $model=$connection->createCommand($sql)->queryAll();
?>
 <?php foreach($model as $row): ?>
<div align="right"><h1>Boleta de Venta</h1>
<h3>002-000<?= $row['cod']?></h3></div>
<h3 align='right'>
   Fecha: <?= $row['fech']?>  </h3>
<h3 align='left'>
   Nombre: <?= $row['nom']?>  </h3>
<h3 align='left'>
   Zona: <?= $row['zona']?>  </h3>

<br>

<?php
// $sql='select venta_detalle.id as id from venta_detalle where pedido_id='.$row["id"]; 
// $model=$connection->createCommand($sql)->queryOne();
?>


    <table class="table table-responsive">
    <tr>
        
        <th>DESCRIPCIÓN</th>
        <th>CANTIDAD</th>
        <th>PRECIO UNIT</th>
        <th>DESCUENTO</th>
        <th>PRECIO C/ DESC</th>
        <th>IMPORTE</th>
    </tr>
    <?php
 $sql='
SELECT
  pedido_detalle.id AS id,
  pedido_detalle.producto_id AS producto_id,
  CONCAT(
    producto.nombre,
    "-",
    producto.codigo
  ) AS nombre,
  catalogo_producto.precio AS precio,
  catalogo_producto.precio_vta AS precio_vta,
  catalogo_producto.descuento AS descu,
  pedido_detalle.cantidad_at AS cantidad
FROM
  pedido_detalle,
  producto,
  catalogo_producto
WHERE
  pedido_detalle.pedido_id = '.$row['id'].' AND pedido_detalle.producto_id = producto.id 
      AND catalogo_producto.producto_id = producto.id;
';
    
    $model=$connection->createCommand($sql)->queryAll();
            ?>
     <?php foreach($model as $row): ?>
   <tr>
        <?php if($row['cantidad']>0):?>
      
        <td><?= $row['nombre']?></td>
        <td><?= $row['cantidad'] ?></td>
        <td><?= $row['precio'] ?></td>
        <td><?= $row['descu'] ?></td>
        <td><?= $row['precio_vta'] ?></td>
        <td><?= $row['precio_vta']*$row['cantidad'] ?></td>
       <?php endif ?>
   </tr>
    <?php endforeach ?>
        <?php    foreach ($model as $value) {
        $tot=$tot+($value['precio_vta']*$value['cantidad']); 
        $cant=$cant+($value['cantidad']); 
        
        } 
    ?>
    <tr>
        <td><b>TOTAL PRODUCTOS</b></td> 
        <td><b><?=$cant?></b></td> 
         <td></td>
         <td></td>
        <td align='right'><b>IMPORTE TOTAL A PAGAR</b></td>
        <td><b><?=$tot?></b></td> 
    </tr>
    </table>
   <?php
$tot=0;
$cant=0;
$cant1=0;
$cant2=0;
$cant3=0;
$cant4=0;
$cant5=0;
$cant6=0;?> 
<hr style="height: 1px ; background: black">
<hr style="height: 1px ; background: black">
 <?php endforeach ?>
<hr style="height: 1px ; background: black">
   <p>
        <?= Html::a('Imprimir', '#',[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Imprimiendo . . .',
            ],
        ]) ?>
    </p>



   


