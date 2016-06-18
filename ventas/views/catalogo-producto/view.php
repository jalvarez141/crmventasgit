<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\CatalogoProducto */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-producto-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Agregar a Pedido', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['pedido-detalle/create']),
            'data-pjax' => '0',
        ]); ?>
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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'catalogo_id',
            'campana_id',
            'producto_id',
            'incentivo_id',
            'descripcion',
            'estado',
            'nomcatprod',
            'precatprod',
            'tamcatprod',
            'stocatprod',
        ],
    ]) ?>

 

</div>
