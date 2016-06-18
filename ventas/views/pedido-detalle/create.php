<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\PedidoDetalle */

$this->title = 'Agregar Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Mis Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-detalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
