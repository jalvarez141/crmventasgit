<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\search\CatalogoProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalogo-producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'catalogo_id') ?>

    <?= $form->field($model, 'campana_id') ?>

    <?= $form->field($model, 'producto_id') ?>

    <?= $form->field($model, 'incentivo_id') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'nomcatprod') ?>

    <?php // echo $form->field($model, 'precatprod') ?>

    <?php // echo $form->field($model, 'tamcatprod') ?>

    <?php // echo $form->field($model, 'stocatprod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
