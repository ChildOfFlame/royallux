<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use app\rbac\AccessControl;
use app\rbac\Perms;
use app\models\users\User;
use yii\web\Response;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    /**
	 * @inheritdoc
	 */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className(),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            static::BEHAVIOR_ACCESS => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['error'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => [Perms::AUTHORIZED],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get','post'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $arDate=$this->getDateArray(new \DateTime());

        return $this->render('index',[
            "arDate"=> $arDate,
            'user' => $user,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    private function getDateArray($timestamp){
        $date["day"]=Yii::$app->formatter->asDate($timestamp, 'php:d');
        $date["month"]= strtr(Yii::$app->formatter->asDate($timestamp,'php:F'),array(
            "January" => "Январь", 
            "February" => "Февраль", 
            "March" => "Март", 
            "April" => "Апрель", 
            "May" => "Май", 
            "June" => "Июнь", 
            "July" => "Июль", 
            "August" => "Август", 
            "September" => "Сентябрь", 
            "October" => "Октябрь", 
            "November" => "Ноябрь", 
            "December" => "Декабрь"));
        return $date;
    } 
}
