<?php

namespace frontend\modules\ventas\controllers;

use yii\web\Controller;

/**
 * Default controller for the `ventas` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
        public function actionRealizarcomprat(){
        return $this->render('views/realizarcompraT');
    }

}
