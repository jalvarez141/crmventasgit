<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\InterlocutorComercial */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Datos de Consultora', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interlocutor-comercial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Imprimir', '#',[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Imprimiendo . . .',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'zona_id',
            'roles_id',
            'codigo',
            'nombre',
            'apellido',
            'email:email',
            'telefono',
            'estado',
        ],
    ]) ?>

</div>
