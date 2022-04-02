<?php

namespace app\controllers;

use app\models\Cheque;
use app\services\ChequeService;
use DateTime;
use Yii;
use yii\rest\ActiveController;

class ChequeController extends ActiveController
{
    public $modelClass = Cheque::class;

    /**
     * Generate the cheque
     * @return \yii\console\Response|\yii\web\Response
     */
    public function actionGenerate()
    {
        $request = Yii::$app->request->post();
        $service = new ChequeService($request['bank'], $request['user'], $request['cheque']);
        $create = $service->create();

        $html = null;
        if (empty($create->errors)) {
            $html = $this->renderAjax('index', [
                'user' => $create->objects->user,
                'bank' => $create->objects->bank,
                'cheque' => $create->objects->cheque,
                'date' => new DateTime(),
            ]);
        }

        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = [
            'errors' => $create->errors,
            'html' => $html
        ];

        if (!empty($create->errors)) {
            $response->statusCode = 400;
        }

        return $response;
    }

}
