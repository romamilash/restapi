<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\User;
use yii\filters\auth\HttpBasicAuth;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
        ];

        return $behaviors;
    }

    public function actionIndex()
    {
        return User::getAll();
    }

    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
        ];
    }
}