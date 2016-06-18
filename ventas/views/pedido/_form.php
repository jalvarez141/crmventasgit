<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_pedido_id')->textInput() ?>

    <?= $form->field($model, 'interlocutor_comercial_id')->textInput() ?>


<?php
$opciones = \yii\helpers\ArrayHelper::map($tipocatalogoproductos, 'id', 'nomcatprod');
echo $form->field($model, 'catalogoproductos')->checkboxList($opciones, ['unselect'=>NULL]);
?>   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
