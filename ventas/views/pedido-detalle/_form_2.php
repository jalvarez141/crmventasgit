<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use frontend\modules\ventas\models\Pedido;
use yii\helpers\ArrayHelper;
use frontend\modules\ventas\models\PedidoDetalle;
use yii\jui\DatePicker;
use yii\db\Query;
$connection = \Yii::$app->db;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\PedidoDetalle */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="pedido-detalle-form-2">

    <?php $form = ActiveForm::begin([    
            'id' => 'pedido-detalle-form-2',
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
    <?php
 $sql='SELECT
      id
    FROM
      pedido
    WHERE
     pedido.tipo_pedido_id = "900"
    ORDER BY
      id desc
    LIMIT 1;
';
    
     $model1=$connection->createCommand($sql)->queryOne();
            ?>
   <?= $form->field($model, 'pedido_id')->dropDownList(ArrayHelper::map(Pedido::find()->where(['id'=>[$model1['id']]])->all()
           , 'id', 'id'))
?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar.' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
  <?php
$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#pedido-detalle-form-2").on("beforeSubmit", function(e) {
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

</div>