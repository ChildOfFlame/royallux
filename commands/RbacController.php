<?php

namespace app\commands;

use app\rbac\Perms;
use app\rbac\Roles;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
	/**
	 * Permissions and roles initialization
	 */
	public function actionInit() 
	{
		/**
		 * @var $auth \yii\rbac\ManagerInterface 
		 */
		$auth = Yii::$app->authManager;

        // добавляем разрешение на просмотр меню склад
        $viewStock = $auth->createPermission(Perms::VIEW_STOCK);
        $viewStock->description = Yii::t('app', 'Просмотр меню склад - просмотр наличия товара и цен');
        $auth->add($viewStock);
		
		// добавляем разрешение на просмотр меню заказы
        $viewOrders = $auth->createPermission(Perms::VIEW_ORDERS);
        $viewOrders->description = Yii::t('app', 'Просмотр меню заказы - просмотр выполненых заказов');
        $auth->add($viewOrders);
		
		// добавляем разрешение на просмотр меню текущие заказы
        $viewCurrentOrders = $auth->createPermission(Perms::VIEW_CURRENT_ORDERS);
        $viewCurrentOrders->description = Yii::t('app', 'Просмотр меню текущие заказы - просмотр текущих заказов');
        $auth->add($viewCurrentOrders);

		// добавляем разрешение на просмотр меню менеджеры
        $viewManager = $auth->createPermission(Perms::VIEW_MANAGER);
        $viewManager->description = Yii::t('app', 'Просмотр меню менеджеры - просмотр информации о менеджерах');
        $auth->add($viewManager);

		// добавляем разрешение на просмотр меню расходы
        $viewCost = $auth->createPermission(Perms::VIEW_COSTS);
        $viewCost->description = Yii::t('app', 'Просмотр меню расходы - просмотр информации о расходах');
        $auth->add($viewCost);

		// добавляем разрешение на удаление заказа
        $deleteOrder = $auth->createPermission(Perms::DELETE_ORDER);
        $deleteOrder->description = Yii::t('app', 'Возможность удалять заказы');
        $auth->add($deleteOrder);

		// добавляем разрешение на создания заказа
        $createOrder = $auth->createPermission(Perms::CREATE_ORDER);
        $createOrder->description = Yii::t('app', 'Возможность создавать заказы');
        $auth->add($createOrder);

		// добавляем разрешение на изменение заказа
        $updateOrder = $auth->createPermission(Perms::UPDATE_ORDER);
        $updateOrder->description = Yii::t('app', 'Возможность изменять заказы');
        $auth->add($updateOrder);

		// добавляем разрешение на изменение статуса заказа
        $changeStatusOrder = $auth->createPermission(Perms::CHANGE_STATUS_ORDER);
        $changeStatusOrder->description = Yii::t('app', 'Возможность изменять статус заказа');
        $auth->add($changeStatusOrder);

		// добавляем разрешение на добавление товаров на склад
        $createStock = $auth->createPermission(Perms::CREATE_STOCK);
        $createStock->description = Yii::t('app', 'Возможность добавлять товары на склад');
        $auth->add($createStock);

		// добавляем разрешение на обновление товаров на складе
        $updateStock = $auth->createPermission(Perms::UPDATE_STOCK);
        $updateStock->description = Yii::t('app', 'Возможность обновлять товары на складе');
        $auth->add($updateStock);

		// добавляем разрешение на удаление товаров со склада
        $deleteStock = $auth->createPermission(Perms::DELETE_STOCK);
        $deleteStock->description = Yii::t('app', 'Возможность удалять товары на склада');
        $auth->add($deleteStock);
		
        // добавляем роль "manager" и даём роли разрешения
        $manager = $auth->createRole(Roles::MANAGER);
		$manager->description = Yii::t('app', 'Пользователи этой группы могут создавать новые заказы, редактировать их и удалять');
        $auth->add($manager);
        $auth->addChild($manager, $viewStock);
		$auth->addChild($manager, $createOrder);
		$auth->addChild($manager, $updateOrder);
		$auth->addChild($manager, $viewCurrentOrders);
		
		// добавляем роль "general_manager" и даём роли разрешения
        // а также все разрешения роли "manager"
		$generalManager = $auth->createRole(Roles::GENERAL_MANAGER);
		$generalManager->description = Yii::t('app', 'Пользователи этой группы могут просматривать все заказы, создавать, редактировать и удалять их');
        $auth->add($generalManager);
		$auth->addChild($generalManager, $manager);
        $auth->addChild($generalManager, $viewCost);
        $auth->addChild($generalManager, $viewManager);
		$auth->addChild($generalManager, $viewOrders);
		$auth->addChild($generalManager, $deleteOrder);
		$auth->addChild($generalManager, $changeStatusOrder);
		$auth->addChild($generalManager, $createStock);
		$auth->addChild($generalManager, $updateStock);
		$auth->addChild($generalManager, $deleteStock);

        // добавляем роль "admin" и даём роли разрешения
        // а также все разрешения роли "general_manager"
        $admin = $auth->createRole(Roles::ADMIN);
		$admin->description = Yii::t('app', 'Пользователя этой группы могут делать все, что доступно в системе');
        $auth->add($admin);
        $auth->addChild($admin, $generalManager);
	}
}
