<?php 
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Factura Venta';
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
    <?= Html::label('Razón social:','razons') ?>
    <?= Html::textInput('razons','Ingrese ',['class'=>'form-control']) ?>
</div>
<div class="form-group">
    <?= Html::label('Dirección:','dirc') ?>
    <?= Html::textInput('dirc','Ingrese dirección',['class'=>'form-control']) ?>
</div>
<div class="form-group">
    <?= Html::label('RUC:','rucc') ?>
    <?= Html::textInput('rucc','RUC',['class'=>'form-control']) ?>
</div>
<br>
<?= Html::submitInput('Cargar',['class'=>'btn btn-success']) ?>
<?= Html::endForm() ?>
<hr style="height: 1px ; background: black">
<div align="right"><h2>R.U.C. Nº 20525149750</h2></div>
<div align="right"><h1>Factura</h1>
<h3>Nº 002-00052</h3></div>
<table class="table table-condensed">
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td><span style="font-size: 22px">Lima, 13 de mayo del 2016</span></td> 
        <td></td>
        <td></td> 
    </tr>
    <tr>
        <td><span style="font-size: 22px; font-weight: bold">Señor(a):</span>
            <span style="font-size: 22px"> Juana Maria Torres Saenz</span></td> 
        <td></td>
        
        <td><span style="font-size: 22px; font-weight: bold">RUC: </span>
            <span style="font-size: 22px"> 20255451585</span> </td> 
    </tr>
    <tr>
        <td><span style="font-size: 22px; font-weight: bold">Dirección: </span>
            <span style="font-size: 22px"> Jr. José Santos Chocano 899</span> </td> 
        <td></td> 
        <td></td> 
    </tr>
    </table>

<hr style="height: 0.5px ; background: black">
    <table class="table table-responsive">
    <tr>
        
        <th>DESCRIPCIÓN</th>
        <th>P. UNITARIO</th>
        <th>CANT</th>
        <th>IMPORTE</th>
    </tr>
    <tr>
        
        <td>Perfume Vanidades M / 100 ml</td>
        <td>25.00</td> 
        <td>2</td> 
        <td>50.00</td> 
    </tr>
    <tr>
        
        <td>Perfume urbanite / 100 ml</td>
        <td>66.00</td> 
        <td>1</td> 
        <td>66.00</td> 
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td align='right'>SUB-TOTAL</td>
        <td>85.86</td> 
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td align='right'>I.G.V 19%</td>
        <td>20.14</td> 
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td align='right'>Total S/.</td>
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



   


