<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\ventas\models\InterlocutorComercial */

$this->title = 'Create Interlocutor Comercial';
$this->params['breadcrumbs'][] = ['label' => 'Interlocutor Comercials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interlocutor-comercial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
