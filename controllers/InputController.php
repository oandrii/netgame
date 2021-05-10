<?php

namespace app\controllers;

use app\models\Links;
use app\models\services\LinkHelper;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class InputController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $short = trim($_SERVER['REQUEST_URI'], '/');

        if ($link = Links::findOne(['short' => $short])) {
            return $this->redirect($link->original);
        }
        return 'not found';
    }

    public function actionGetShortLink()
    {
        $request = Yii::$app->request;

        if ($link = Links::findOne(['original' => $request->get('link')])) {
            return $link->getFullShortLink();
        }

        /** @var Links $link */
        $link = new Links();
        $link->original = $request->get('link');
        $link->short = LinkHelper::generateShortLink();
        if (!$link->save()) {
            throw new BadRequestHttpException(json_encode($link->getErrors()), 400);
        }
        return $link->getFullShortLink();
    }
}