<?php 
use yii\helpers\Url;
use yii\helpers\Html;
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
<h3>002-00052</h3></div>
<h3 align='right'>
   Fecha: 13/05/2016  </h3>
<h3>Señor(a): Juana Maria Torres Saenz</h3>
<h3>Dirección: Jr. José Santos Chocano 899</h3>
<h3>Documento: 07615948  </h3>

    <table class="table table-responsive">
    <tr>
        
        <th>DESCRIPCIÓN</th>
        <th>CANTIDAD</th>
        <th>IMPORTE</th>
    </tr>
    <tr>
        
        <td>Perfume Vanidades M / 100 ml</td>
        <td>2</td> 
        <td>50.00</td> 
    </tr>
    <tr>
        
        <td>Perfume urbanite / 100 ml</td>
        <td>1</td> 
        <td>66.00</td> 
    </tr>
    <tr>
        <td></td> 
        <td align='right'>Total</td>
        <td>106.00</td> 
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



   


