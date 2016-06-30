<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\PedidoDetalle */

$this->title = 'Modificar Producto de Venta: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Catalogo Productos', 'url' => ['catalogo-productos/index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="pedido-detalle-update-2">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
