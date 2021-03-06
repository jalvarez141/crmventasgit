<?php

namespace frontend\modules\ventas\controllers;

use Yii;
use frontend\modules\ventas\models\CatalogoProducto;
use frontend\modules\ventas\models\search\CatalogoProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\ventas\models\PedidoDetalle;

/**
 * CatalogoProductoController implements the CRUD actions for CatalogoProducto model.
 */
class CatalogoProductoController extends Controller
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
     * Lists all CatalogoProducto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatalogoProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatalogoProducto model.
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
     * Creates a new CatalogoProducto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatalogoProducto();
        $tipopedido = PedidoDetalle::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'tipopedido' => $tipopedido,
            ]);
        }
    }

    /**
     * Updates an existing CatalogoProducto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);
        $tipopedido = PedidoDetalle::find()->all();

        $model->ped = \yii\helpers\ArrayHelper::getColumn(
            $model->getRolOperaciones()->asArray()->all(),
            'operacion_id'
        );

        if ($model->load(Yii::$app->request->post())) {
            if (!isset($_POST['Rol']['operaciones'])) {
                $model->operaciones = [];
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'tipoOperaciones' => $tipoOperaciones
            ]);
        }
    }

    /**
     * Deletes an existing CatalogoProducto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatalogoProducto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatalogoProducto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatalogoProducto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionRealizarcomprat(){
        return $this->render('realizarcompraT');
    }
    public function actionFacturatienda(){
        return $this->render('facturatienda');
    }
    public function actionBoletatienda(){
        return $this->render('boletatienda');
    }
}
