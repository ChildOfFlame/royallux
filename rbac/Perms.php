<?php

namespace app\rbac;

use Yii;

class Perms
{
	/**
	 * No restricts
	 */
	const FREE = '*';
	/**
	 * Only authorized users
	 */
	const AUTHORIZED = '@';
    
    /**
     * Access to main page of module
     */
    const VIEW_STOCK = 'viewStock';
    const VIEW_ORDERS = 'viewOrders';
    const VIEW_CURRENT_ORDERS = 'viewCurrentOrders';
    const VIEW_MANAGER = 'viewManager';
    const VIEW_COSTS = 'viewCosts';
    
    /**
     * Access for CRUD with content
     */
    const DELETE_ORDER = 'deleteOrder';
    const DELETE_OWN_ORDER = 'deleteOwnOrder';
	const CREATE_ORDER = 'createOrder';
	const UPDATE_ORDER = 'updateOrder';
	const UPDATE_OWN_ORDER = 'updateOwnOrder';
    const CHANGE_STATUS_ORDER = 'changeStatusOrder';
    
    /**
     * Access to managment stock
     */
    const CREATE_STOCK = 'createStock';
    const UPDATE_STOCK = 'updateStock';
    const DELETE_STOCK = 'deleteStock';
   
    /**
     * Description of permissions
     * 
     * @return array
     */
    public static function description() {
        return [
            self::FREE => Yii::t('app', 'Гость'),
            self::AUTHORIZED => Yii::t('app', 'Успешно прошедшие авторизацию'),
            
            /**
            * Access to main page of module
            */
            self::VIEW_STOCK => Yii::t('app', 'Доступ к меню склада'),
            self::VIEW_ORDERS => Yii::t('app', 'Доступ к меню заказы'),
            self::VIEW_CURRENT_ORDERS => Yii::t('app', 'Доступ к меню текущие заказы'),
            self::VIEW_MANAGER => Yii::t('app', 'Доступ к меню менеджеры'),
            self::VIEW_COSTS => Yii::t('app', 'Доступ к меню прочие расходы'),
            self::MANAGE_CONTENT => Yii::t('app', 'Доступ к меню управления изданиями'),

            /**
             * Access for CRUD with content
             */
            self::DELETE_ORDER => Yii::t('app', 'Доступ для удаления заказа'),
            self::DELETE_OWN_ORDER => Yii::t('app', 'Доступ для удаления своего заказы'),
            self::CREATE_ORDER => Yii::t('app', 'Доступ для создания заказа'),
            self::UPDATE_ORDER => Yii::t('app', 'Доступ для обновления заказа'),
            self::UPDATE_OWN_ORDER => Yii::t('app', 'Доступ для обновления своего заказа'),
            self::CHANGE_STATUS_ORDER => Yii::t('app', 'Доступ для изменения статуса заказа'),

            /**
            * Access to managment stock
            */
            self::CREATE_STOCK => Yii::t('app', 'Возможность добавлять товары на склад'),
            self::UPDATE_STOCK => Yii::t('app', 'Возможность обновлять товары на складе'),
            self::DELETE_STOCK => Yii::t('app', 'Возможность удалять товары со склада'),
            
        ];
    }
}
