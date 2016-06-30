<?php

namespace frontend\modules\ventas\controllers;

use Yii;
use frontend\modules\ventas\models\PedidoDetalle;
use frontend\modules\ventas\models\search\PedidoDetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\HtmlHelpers;
use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * PedidoDetalleController implements the CRUD actions for PedidoDetalle model.
 */
class PedidoDetalleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PedidoDetalle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoDetalleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PedidoDetalle model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PedidoDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PedidoDetalle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
        public function actionCreate_2($submit = false)
    {
        $model = new PedidoDetalle();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['message' => '¡Agregado...!',
                   ];
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('create_2', [
                'model' => $model,
            ]);
        }
    }
 
    public function actionCreate_1($submit = false)
{   
    $model = new PedidoDetalle();

 
    if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
 
    if ($model->load(Yii::$app->request->post())) {
        if ($model->save()) {
            $model->refresh();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['message' => '¡Éxito!',
                    ];
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
 
    return $this->renderAjax('create_1', [
        'model' => $model,
    ]);
        
}

    /**
     * Updates an existing PedidoDetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
        public function actionUpdate_2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['catalogo-producto/realizarcomprat']);
        } else {
            return $this->render('update_2', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PedidoDetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
        public function actionDelete2($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['catalogo-producto/realizarcompra']);
    }

    /**
     * Finds the PedidoDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PedidoDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PedidoDetalle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionUserList($q = null, $id = null) {
    return HtmlHelpers::sugestionList('producto_id', 'catalogo_producto', 'CatalogoProducto', $q, $id);
}
}
