<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Realizar Venta';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->params ['breadcrumbs'][] = $this->title
?>

<h2><div style="color: #00b3ee" align='center'> VENDER PRODUCTOS</div></h2><br>
<hr style="height: 2px ; background: #0097cf">
<br>
<h2><div align='center'> Productos en la lista de venta:</div></h2><br>
<table class='table table-striped'>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Precio S/.</th>
        <th>Tamaño</th>
        <th>Cantidad</th>
        <th></th>
        <th></th>
    </tr>

    <tr>
        <td>AJ25X</td>
        <td>Perfume Vanidades M</td>
        <td>25.00</td>
        <td>100 ml</td>
        <td>2</td>
        <td><a class="btn btn-primary">
                <span class="glyphicon glyphicon-edit"></span>
            </a></td>
        <td><a class="btn btn-danger">
                <span class="glyphicon glyphicon-trash"></span>
            </a></td>
    </tr>
        <tr>
        <td>PU78M</td>
        <td>Perfume urbanite</td>
        <td>66.00</td>
        <td>100 ml</td>
        <td>1</td>
        <td><a class="btn btn-primary">
                <span class="glyphicon glyphicon-edit"></span>
            </a></td>
        <td><a class="btn btn-danger">
                <span class="glyphicon glyphicon-trash"></span>
            </a></td>
    </tr>
</table>
<div align='right'><b>TOTAL: S/.</b>  116.00 </div>
<hr style="height: 1px ; background: black">
<br>
<a class="btn btn-success" href="
    <?= Url::toRoute('boletatienda')
    ?>"> Finalizar con Boleta </a>
<a class="btn btn-success" href="
    <?= Url::toRoute('facturatienda')
    ?>"> Finalizar con Factura </a> 
<?= Html::submitInput('Cancelar',['class'=>'btn btn-alert ']) ?>
