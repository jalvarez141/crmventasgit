<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ventas\models\search\CatalogoProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-producto-index">

    <h1 style="color:#00b3ee"  align='center'><?= Html::encode($this->title) ?></h1>
    <hr style="height: 2px ; background: #0097cf"><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buscar Consultora', ['interlocutor-comercial/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Agregar a Venta', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['pedido-detalle/create_1']),
            'data-pjax' => '0',
        ]); ?>
       <?= Html::a('Terminar Venta', ['realizarcomprat'], ['class' => 'btn btn-success']) ?>
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
    'id' => 'modal',
    'header' => '<h4 class="modal-title">Complete</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
]);
 
echo "<div class='well'></div>";
 
Modal::end();
?>
        
        
        
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             
           // 'id',
           // 'catalogo_id',
           // 'campana_id',
            'producto_id:text:Identificador',
           // 'incentivo_id',
           //  'descripcion',
           //  'estado',
             'nomcatprod:text:Nombre',
             'precatprod:text:Precio',
             'tamcatprod:text:Tamaño',
             'stocatprod:text:Stock',

           // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-zoom-in"></span>', $url, [
                        ]);
                    },
            ]],
                            
            ['class' => 'yii\grid\CheckboxColumn'],
                            
         /*  [
            'class'  => '\yii\grid\CheckboxColumn',
            'checkboxOptions' => [
               'class' => 'simple'
            ]
            ],*/
                            
        ],

    ]); ?>
   <?php //<?= 
      //  Html::button('<i class="glyphicon glyphicon-download-alt"></i><span>   Filter Rows Select</span>',
     //   ['type'=>'button', 'class'=>'btn btn-success',
    //        'onclick'=>'var keys = $("#kv-grid").yiiGridView("getSelectedRows").length'
   // ])?>
</div>
