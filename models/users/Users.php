<?php

namespace app\models\users;

use \yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public static function tableName() {
        return 'users';
    }

    /**
     * Finds user by [[login]]
     *
     * @return User|null
     */
    public function getUser()
    {
		return User::findByUsername($this->login);
    }
}
