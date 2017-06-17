<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use app\rbac\AccessControl;
use app\rbac\Perms;
use app\models\users\UserLogin;
use app\models\users\User;

class UserController extends Controller {

    public function behaviors() {
        return [
            static::BEHAVIOR_ACCESS => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login','error'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => [Perms::AUTHORIZED],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'login' => ['post','get'],
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    public function actionLogin() {
    	if (! Yii::$app->user->isGuest) {
            return $this->goHome();
        }
    	$model = new UserLogin;
    	if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
	 * Logout user and go to home page
	 * 
	 * @return Response
	 */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/user/login');
    }
} 
?>