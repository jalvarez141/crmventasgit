<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use frontend\modules\ventas\models\CatalogoProducto;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ventas\models\search\PedidoDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mis Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-detalle-index">

    <h1 style="color:#00b3ee"  align='center'><?= Html::encode($this->title) ?></h1>
   <hr style="height: 2px ; background: #0097cf"><br>
 <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align='center'>
   <?= Html::a('Agregar a Pedidos', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create_1']),
            'data-pjax' => '0',
        ]); ?>
    <?= Html::a('Agregar Pedido',['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin() ?>
   <?=  GridView::widget([
       'id' => 'pedido-detalle-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            //'producto_id',
            ['attribute'=>'producto_id',
                'value'=>function($model){
                    $catalogoproducto = CatalogoProducto::findOne($model->producto_id);
                    return $catalogoproducto->nomcatprod;
                },
                   //'filter' => ArrayHelper::map(CatalogoProducto::find()->all(),'id','nomcatprod'),
            ],
            'pedido_id',
            'cantidad',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  ?> 
    <?php Pjax::end() ?>

 <?php    
     $this->registerJs(
    "$(document).on('click', '#activity-index-link', (function() {
        $.get(
            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal').modal();
            }
        );
    }));"
); ?>
     <?php
Modal::begin([
    'options'=>[
        'tabindex'=>'false'
    ],
    'id' => 'modal',
    'header' => '<h4 class="modal-title">Complete</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',

    ]);
 
echo "<div class='well'></div>";
 
Modal::end();
?>
 
</div>
