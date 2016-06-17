<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\CatalogoProducto */

$this->title = 'Create Catalogo Producto';
$this->params['breadcrumbs'][] = ['label' => 'Catalogo Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogo-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
