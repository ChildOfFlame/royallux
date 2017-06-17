<?php

namespace app\controllers;

use app\models\users\User;
use ReflectionClass;
use Yii;
use yii\db\ActiveRecord;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class Controller extends \yii\web\Controller
{
    const MODELS_PATH = 'app\\models\\';
    
    const BEHAVIOR_ACCESS = 'access';
    
    /**
     *
     * @var User
     */
    protected $user;

    /**
     * Get name of controller without 'Controller' word
     * 
     * @return string
     */
    protected function getName()
    {   
        return array_reduce(explode('-', $this->id), function($res, $val) {
            return $res .= ucfirst($val);
        }, '');
    }
    
    /**
     * Search and return model if it exists
     * 
     * @param int $id
     * @param string $modelClass
     * @return ActiveRecord
     * @throws NotFoundHttpException if model was not found throws exception
     */
    protected function findModel($id, $modelClass = false)
    {
        $model = null;
        
        if ($modelClass) {
            $model = $modelClass::findOne($id);
        } else {
            $modelsPath = static::MODELS_PATH;
            
            $modelName = $this->getName();
            $modelClass = $modelsPath . $modelName;
            $model = $modelClass::findOne($id);
        }
        
        if ($model === null) {
            throw new NotFoundHttpException(Yii::t('app', 'Запрошенные данные не были найдены.'));
        }
        
        return $model;
    }
    
    /**
     * Close access with deny message
     * 
     * @return ForbiddenHttpException
     */
    protected function denyAccess()
    {
        return $this->getBehavior(static::BEHAVIOR_ACCESS)->denyAccess($this->user);
    }
    
    /**
     * Checks [$param] for true or false and with depends on it allows access or
     * denies.
     * 
     * @param boolean $param
     * @return boolean
     */
    protected function checkAccess($param)
    {
        if ($param) {
            return true;
        } else {
            return $this->denyAccess();
        }
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->user = Yii::$app->user;
    }
}
