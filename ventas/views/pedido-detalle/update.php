<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\PedidoDetalle */

$this->title = 'Update Pedido Detalle: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pedido Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
