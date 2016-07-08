<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;
$connection = \Yii::$app->db;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ventas\models\search\VentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
    

<div class="venta-index">
<?php
 $sql='call up_cargarPedidoVenta();';
 $connection->createCommand($sql)->execute();
?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ver boletas de Venta', ['facturacion'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Ver hojas de despacho', ['hojadespacho'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
