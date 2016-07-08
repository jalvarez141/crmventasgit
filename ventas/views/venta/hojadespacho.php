<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;
$connection = \Yii::$app->db;
$tot=0;
$cant=0;
$cant1=0;
$cant2=0;
$cant3=0;
$cant4=0;
$cant5=0;
$cant6=0;
$this->title = 'Venta';
$this->params['breadcrumbs'][] = ['label' => 'Hojas de despacho', 'url' => ['hojadespacho']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <p>
        <?= Html::a('Ver boletas de Venta', ['facturacion'], ['class' => 'btn btn-success']) ?>
    </p>


<h2 style="color: #00b3ee"  align='center'> Despachos</h2>
<hr style="height: 2px ; background: #0097cf"><br>



<hr style="height: 1px ; background: black">
    
<?php
 $sql='SELECT
  v.pedido_id AS id,
  v.codigo_venta AS cod,
  v.fecha_venta AS fech,
  i.codigo as codc,
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
<div align="right"><h1>Hoja de despacho</h1>
<h3>002-000<?= $row['cod']?></h3></div>
<h3 align='right'>
   Fecha: <?= $row['fech']?>  </h3>
<h3 align='left'>
   Codigo Consultora: <?= $row['codc']?>  </h3>
<h3 align='left'>
   Consultora: <?= $row['nom']?>  </h3>
<h3 align='left'>
   Pedido: <?= $row['id']?>  </h3>
<h3 align='left'>
   Zona: <?= $row['zona']?>  </h3>
<br>

<?php
// $sql='select venta_detalle.id as id from venta_detalle where pedido_id='.$row["id"]; 
// $model=$connection->createCommand($sql)->queryOne();
?>


    <table class="table table-responsive">
    <tr>
        
        <th>COD</th>
        <th>PRODUCTO</th>
        <th>SOLIC</th>
        <th>ATEND</th>
        <th>PRECIO UNIT</th>
        <th>TOTAL ATENDIDO</th>
        <th>% DESC</th>
        <th>TOTAL DSCTO</th>
        <th>PRECIO CATALOGO</th>
        <th>TOTAL CATALOGO</th>
        <th>OPORT AHORRO</th>
        <th>TOTAL FACTURADO</th>
        <th>OBSERVACIONES</th>
    </tr>
    <?php
 $sql='
SELECT
  catalogo_producto.id AS cod,
  CONCAT(
    producto.nombre,
    "-",
    producto.codigo
  ) AS nombre,
  pedido_detalle.cantidad AS solic,
  pedido_detalle.cantidad_at AS atend,
  catalogo_producto.precio_vta AS precio,
  (
    catalogo_producto.precio_vta * pedido_detalle.cantidad_at
  ) AS totatend,
  catalogo_producto.descuento AS descu,
  (
    catalogo_producto.precio - catalogo_producto.precio_vta
  ) AS totdesc,
  catalogo_producto.precio AS preciocat,
  (
    catalogo_producto.precio * pedido_detalle.cantidad_at
  ) AS totcat,
  (
    (
      catalogo_producto.precio_vta - catalogo_producto.precio
    ) * pedido_detalle.cantidad_at
  ) AS oportaho,
  (
    catalogo_producto.precio_vta * pedido_detalle.cantidad_at
  ) AS totfact
FROM
  pedido_detalle,
  producto,
  catalogo_producto
WHERE
  pedido_detalle.pedido_id = '.$row["id"].' AND pedido_detalle.producto_id = producto.id AND catalogo_producto.producto_id = producto.id;
';
    
    $model=$connection->createCommand($sql)->queryAll();
            ?>
     <?php foreach($model as $row): ?>
    <tr>
        
        <td><?= $row['cod']?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['solic'] ?></td>
        <td><?= $row['atend'] ?></td>
        <td><?= $row['precio'] ?></td>
        <td><?= $row['totatend'] ?></td>
        <td><?= $row['descu'] ?></td>
        <td><?= $row['totdesc'] ?></td>
        <td><?= $row['preciocat'] ?></td>        
        <td><?= $row['totcat'] ?></td>
        <td><?= $row['oportaho'] ?></td>
        <td><?= $row['totfact'] ?></td>
        <td><?php if($row['atend'] == 0){
             echo 'agotado';
        }?></td>
               <?php     
        $cant=$cant+($row['solic']); 
        $cant1=$cant1+($row['atend']); 
        $cant2=$cant2+($row['totatend']); 
        $cant3=$cant3+($row['totdesc']); 
        $cant4=$cant4+($row['preciocat']); 
        $cant5=$cant5+($row['totcat']); 
        $cant6=$cant6+($row['oportaho']); 
        $tot=$tot+($row['totfact']); 
        
    ?>
    </tr>
    <?php endforeach ?>
        <?php  /*  foreach ($model as $value) {
        $cant=$cant+($value['solic']); 
        $cant1=$cant1+($value['atend']); 
        $cant2=$cant2+($value['totatend']); 
        $cant3=$cant3+($value['totdesc']); 
        $cant4=$cant4+($value['preciocat']); 
        $cant5=$cant5+($value['totcat']); 
        $cant6=$cant6+($value['oportaho']); 
        $tot=$tot+($value['totfact']); 
        } */
    ?>
    <tr>
        <td style="background-color:#d0d0d0"></td>
        <td style="background-color:#d0d0d0" align='right'><b>SUBTOTAL</b></td> 
        <td style="background-color:#d0d0d0"><b><?=$cant?></b></td> 
        <td style="background-color:#d0d0d0"><b><?=$cant1?></b></td> 
        <td style="background-color:#d0d0d0"></td>
        <td style="background-color:#d0d0d0"><b><?=$cant2?></b></td> 
        <td style="background-color:#d0d0d0"></td>
        <td style="background-color:#d0d0d0"><b><?=$cant3?></b></td> 
        <td style="background-color:#d0d0d0"><b><?=$cant4?></b></td> 
        <td style="background-color:#d0d0d0"><b><?=$cant5?></b></td> 
        <td style="background-color:#d0d0d0"><b><?=$cant6?></b></td> 
        <td style="background-color:#d0d0d0"><b><?=$tot?></b></td> 
        <td style="background-color:#d0d0d0"></td>
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



   


