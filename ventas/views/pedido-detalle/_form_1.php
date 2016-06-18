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

<div class="pedido-detalle-form-1">

    <?php //$form = ActiveForm::begin(); ?>
    
    <?php $form = ActiveForm::begin([
    'id' => 'pedido-detalle-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>
    <?php
$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#pedido-detalle-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#pedido-detalle-grid"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');
?>

    <?= Html::activeLabel($model, "producto_id") ?>
<?=
Select2::widget([
    'model' => $model,
    'attribute' => "producto_id",
    'initValueText' => '', // set the initial display text
    'options' => ['placeholder' => 'Ingrese codigo...'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 1,
        'ajax' => [
            'url' => Url::to(['pedido-detalle/user-list']),
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }')
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('function(user) { return user.text; }'),
        'templateSelection' => new JsExpression('function (user) { return user.text; }'),
    ],
])
?>
    </br>
 <?= $form->field($model, 'cantidad')->textInput() ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
$this->registerJs('
$("#pedido-detalle-pedido_id").on("select2:unselect", function (e) {
        $("#pedido-detalle-pedido_id-error").html( "pedido ID no puede estar vacío." );
        $("#pedido-detalle-pedido_id-container").removeClass( "has-success" ).addClass( "has-error" );
    });
    $("#pedido-detalle-pedido_id").on("select2:select", function (e) {
        $("#pedido-detalle-pedido_id-error").html( "" );
        $("#pedido-detalle-pedido_id-container").removeClass( "has-error" ).addClass( "has-success" );
    });
');
?>
</div>
