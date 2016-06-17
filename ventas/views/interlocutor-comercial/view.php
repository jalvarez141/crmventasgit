<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\InterlocutorComercial */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Interlocutor Comercials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interlocutor-comercial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
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
