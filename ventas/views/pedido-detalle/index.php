<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ventas\models\search\PedidoDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido Detalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-detalle-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pedido Detalle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <?=  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'producto_id',
            'pedido_id',
            'cantidad',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  ?> 
    
 
</div>
