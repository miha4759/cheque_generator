<?php

namespace app\controllers;

use app\models\Cheque;
use app\services\ChequeService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ChequeController extends ActiveController
{
    public $modelClass = Cheque::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'prepareDataProvider' => fn() => new ActiveDataProvider(
                [
                    'query' => $this->modelClass::find(),
                    'pagination' => false,
                ]
            ),
        ];

        return $actions;
    }

    public function actionGenerate()
    {
        $request = Yii::$app->request->post();
        $service = new ChequeService($request['bank'], $request['user'], $request['cheque']);
        $service->create();

        return $this->asJson(['html' => 123123]);
    }

}
