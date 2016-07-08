<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Inicio';
?>   
<a class="btn btn-info" href="
    <?= Url::toRoute('/ventas/catalogo-producto')
    ?>"> Venta en tienda> </a>
<a class="btn btn-info" href="
    <?= Url::toRoute('/ventas/pedido-detalle')
    ?>"> Pedidos Consultora> </a>
<a class="btn btn-info" href="
    <?= Url::toRoute('/ventas/venta')
    ?>"> Realizar facturacion> </a>

<div class="site-index">
 
 
</div>
