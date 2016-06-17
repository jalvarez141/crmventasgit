<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\PedidoDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeLabel($model, "producto_id") ?>
<?=
Select2::widget([
    'model' => $model,
    'attribute' => "producto_id",
    'initValueText' => '1', // set the initial display text
    'options' => ['placeholder' => 'Ingrese codigo...'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 1,
        'ajax' => [
            'url' => Url::to(['ventas/user-list']),
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }')
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('function(user) { return user.text; }'),
        'templateSelection' => new JsExpression('function (user) { return user.text; }'),
    ],
])
?>
    </br><?= $form->field($model, 'pedido_id')->textInput() ?>
 <?= $form->field($model, 'cantidad')->textInput() ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
$this->registerJs('
$("#ventas-pedido_id").on("select2:unselect", function (e) {
        $("#ventas-pedido_id-error").html( "pedido ID no puede estar vacío." );
        $("#ventas-pedido_id-container").removeClass( "has-success" ).addClass( "has-error" );
    });
    $("#ventas-pedido_id").on("select2:select", function (e) {
        $("#ventas-pedido_id-error").html( "" );
        $("#ventas-pedido_id-container").removeClass( "has-error" ).addClass( "has-success" );
    });
');
?>
</div>
