<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use frontend\modules\ventas\models\Pedido;
use frontend\modules\ventas\models\PedidoDetalle;
use yii\db\Query;
$connection = \Yii::$app->db;
/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\PedidoDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-detalle-form-1">

    <?php //$form = ActiveForm::begin(); ?>
    
    <?php $form = ActiveForm::begin([
    'id' => 'pedido-detalle-form-1',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>



<?=   Html::activeLabel($model, "producto_id")
?>
<?= 
Select2::widget([
    'model' => $model,
    'attribute' => "producto_id",
    'initValueText' => '', // set the initial display text
    'options' => ['placeholder' => 'Ingrese codigo...'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 2,
        'ajax' => [
            'url' => Url::to(['pedido-detalle/user-list']),
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }')
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('function(pedido_detalle) { return pedido_detalle.text; }'),
        'templateSelection' => new JsExpression('function (pedido_detalle) { return pedido_detalle.text; }'),
    ],
])  
  
?>
  </br> 


    <?php
 $sql='SELECT
      id
    FROM
      pedido
    WHERE
     pedido.tipo_pedido_id = "800"
    ORDER BY
      id DESC
    LIMIT 1;
';
    
     $model1=$connection->createCommand($sql)->queryOne();
            ?>
   <?= $form->field($model, 'pedido_id')->dropDownList(ArrayHelper::map(Pedido::find()->where(['id'=>[$model1['id']]])->all()
           , 'id', 'id'))
?>
  
    
 <?= $form->field($model, 'cantidad')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

      <?php
$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#pedido-detalle-form-1").on("beforeSubmit", function(e) {
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
