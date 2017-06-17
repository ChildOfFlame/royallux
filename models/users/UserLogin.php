<?php

namespace app\models\users;

use Yii;
use yii\base\Model;

/**
 * Model for user authorization
 */
class UserLogin extends Model
{
    public $login;
    public $password;
    public $rememberMe = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // login and password are both required
            ['login', 'required','message'=>"Вы не ввели логин."],
            ['password', 'required','message'=>"Вы не ввели пароль."],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * Logs in a user using the provided login and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        $user = $this->getUser();
		
        if ($user && $user->validatePassword($this->password) && $user->enabled) {
            return \Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
        } else {
			$this->addError('login', \Yii::t('app', 'Пользователь с таким логином и паролем не найден'));
            return false;
        }
    }

    /**
	 * Returns user object for login and password validation
	 * 
	 * @return User if user found, else null
	 */
    public function getUser()
    {
		return User::findByUsername($this->login);
    }
}