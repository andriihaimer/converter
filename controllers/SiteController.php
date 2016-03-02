<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\converter\ConverterForm;
use yii\web\Response;

class SiteController extends Controller {

    public function actionIndex() {
       /**
        * Form model
        */
        $model = new ConverterForm;
        /**
         * Check if POST has data. If has, then load it to form model and validate.
         */
        if(\Yii::$app->getRequest()->post() && $model->load(\Yii::$app->getRequest()->post()) ){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $model->convert();

        }
        return $this->render('converter/converter',['model' => $model]);
    }

}
