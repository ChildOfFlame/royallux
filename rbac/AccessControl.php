<?php

/*
 * 
 */

namespace app\rbac;

use Yii;
use yii\web\ForbiddenHttpException;

class AccessControl extends \yii\filters\AccessControl
{
    public function denyAccess($user)
    {
        if (Yii::$app->user->isGuest) {
            return  yii\web\Controller::redirect('/user/login');
        } else {
            throw new ForbiddenHttpException(Yii::t('app', 'Доступ запрещен'));
        }
    }
}