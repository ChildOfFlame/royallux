<?php

use yii\db\Schema;
use yii\db\Migration;

class m150505_130225_create_users_table extends Migration
{
	const TABLE_NAME = 'users';
	const INDEX_NAME = 'login_unique_index';
	const INDEX_COLUMN = 'login';
		
    public function safeUp()
    {
		$this->createTable(self::TABLE_NAME, [
			'id' => 'pk',
			'login' => 'VARCHAR(20) NOT NULL COMMENT "Логин пользователя"',
			'password' => 'VARCHAR(100) NOT NULL COMMENT "Пароль"',
			'email' => 'VARCHAR(50) NOT NULL COMMENT "Электронная почта"',
			'name' => 'VARCHAR(100) NOT NULL COMMENT "ФИО пользователя"',
			'enabled' => 'BIT NOT NULL DEFAULT 1 COMMENT "Пользователь активен"',
			'registered' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT "Дата регистрации"',
			'auth_key' => 'VARCHAR(30) NOT NULL',
			'access_token' => 'VARCHAR(30) NOT NULL',
		]);
		$this->createIndex(self::INDEX_NAME, self::TABLE_NAME, self::INDEX_COLUMN, true);
		return true;
    }

    public function safeDown()
    {
		$this->dropIndex(self::INDEX_NAME, self::TABLE_NAME);
		return $this->dropTable(self::TABLE_NAME);
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
