<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;
$connection = \Yii::$app->db;
$tot=0;
$this->title = 'Boleta Venta';
$this->params['breadcrumbs'][] = ['label' => 'Realizar Venta', 'url' => ['realizarcomprat']];
$this->params['breadcrumbs'][] = $this->title;
?>


<h2 style="color: #00b3ee"  align='center'> VENTA</h2>
<hr style="height: 2px ; background: #0097cf"><br>
<?=
Html::beginform(
        Url::toRoute('site/request'),
        'get',
        ['class'=> 'form-inline']
        );

?>
<div class="form-group">
    <?= Html::label('Nombre de cliente:','nombrec') ?>
    <?= Html::textInput('nombrec','Ingrese nombre',['class'=>'form-control']) ?>
</div>
<div class="form-group">
    <?= Html::label('Dirección de cliente:','dirc') ?>
    <?= Html::textInput('dirc','Dirección',['class'=>'form-control']) ?>
</div>
<div class="form-group">
    <?= Html::label('Documento de cliente:','dnic') ?>
    <?= Html::textInput('dnic','DNI',['class'=>'form-control']) ?>
</div>
<br>
<?= Html::submitInput('Cargar',['class'=>'btn btn-success']) ?>
<?= Html::endForm() ?>
<hr style="height: 1px ; background: black">
<div align="right"><h1>Boleta de Venta</h1>
<?php
 $sql='select venta_detalle.id as id from venta_detalle where pedido_id=9001;
'; $model=$connection->createCommand($sql)->queryOne();
?>
<h3>002-000<?= $model['id']?></h3></div>
<h3 align='right'>
   Fecha: 02/07/2016  </h3>
<h3>Señor(a): Juana Maria Torres Saenz</h3>
<h3>Dirección: Jr. José Santos Chocano 899</h3>
<h3>Documento: 07615948  </h3>

    <table class="table table-responsive">
    <tr>
        
        <th>DESCRIPCIÓN</th>
        <th>CANTIDAD</th>
        <th>IMPORTE</th>
    </tr>
    <?php
 $sql='select pedido_detalle.id as id,pedido_detalle.producto_id as producto_id, producto.nombre as nombre, producto.precio_vta as precio_vta,  pedido_detalle.cantidad as cantidad from pedido_detalle, producto where pedido_detalle.pedido_id=9001 and pedido_detalle.producto_id=producto.id ;
';
    
    $model=$connection->createCommand($sql)->queryAll();
            ?>
     <?php foreach($model as $row): ?>
    <tr>
        
        <td><?= $row['nombre']?></td>
        <td><?= $row['cantidad'] ?></td>
        <td><?= $row['precio_vta']*$row['cantidad'] ?></td>
    </tr>
    <?php endforeach ?>
        <?php    foreach ($model as $value) {
        $tot=$tot+($value['precio_vta']*$value['cantidad']);    } 
    ?>
    <tr>
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



   


