<?php

namespace app\controllers;

use app\rbac\AccessControl;
use app\models\Stock;
use yii\data\ActiveDataProvider;
use app\rbac\Perms;
use Yii;
use yii\filters\VerbFilter;

class StockController extends Controller
{
    public function behaviors()
    {
        return [
            static::BEHAVIOR_ACCESS => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => [Perms::VIEW_STOCK],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                ]
            ]
        ];
    }
    
    public function actionIndex()
    {
        $user = Yii::$app->user;
        $dataProvider = new ActiveDataProvider();
        $dataProvider = new ActiveDataProvider([
            'query' => Stock::find(),
            'pagination' => [
                'pageSize' => 20,
        ],
]);
        
        return $this->render('index', [
            'provider' => $dataProvider,
            'user' => $user,
        ]);
    }
}
