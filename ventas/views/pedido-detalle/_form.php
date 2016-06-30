<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use frontend\modules\ventas\models\Pedido;
use yii\helpers\ArrayHelper;
use frontend\modules\ventas\models\PedidoDetalle

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\PedidoDetalle */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="pedido-detalle-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'producto_id') ?>
    
   <?= $form->field($model, 'pedido_id')->dropDownList(ArrayHelper::map(PedidoDetalle::find()->where(['pedido_id'=>9001])->all()
           , 'pedido_id', 'pedido_id'))
?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>