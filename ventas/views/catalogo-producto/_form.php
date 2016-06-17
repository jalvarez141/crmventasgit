<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\CatalogoProducto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalogo-producto-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'producto_id')->textInput() ?>
    
    <?= $form->field($model, 'nomcatprod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precatprod')->textInput() ?>

    <?= $form->field($model, 'tamcatprod')->textInput() ?>

    <?= $form->field($model, 'stocatprod')->textInput() ?> 
    
    <?= $form->field($model, 'catalogo_id')->textInput() ?>

    <?= $form->field($model, 'campana_id')->textInput() ?>

    <?= $form->field($model, 'incentivo_id')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
