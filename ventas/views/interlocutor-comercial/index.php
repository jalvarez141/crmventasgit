<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ventas\models\search\InterlocutorComercialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buscar consultora';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interlocutor-comercial-index">

    <h1 style="color:#00b3ee"  align='center'><?= Html::encode($this->title) ?></h1>
        <hr style="height: 2px ; background: #0097cf"><br>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'zona_id',
            'codigo',
            'nombre',
            'roles_id',
            // 'apellido',
            // 'email:email',
            // 'telefono',
            // 'estado',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-zoom-in"></span>', $url, [
                        ]);
                    },
            ]],
        ],
    ]); ?>
</div>
