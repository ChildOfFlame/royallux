<?php 
namespace app\models;

use \yii\db\ActiveRecord;
use Yii;

/**
 * Model that is record of stock database table.
 * 
 * @property int $id 
 * @property string $name
 * @property int $price
 * @property int $count
 * @property string $type
 */

class Stock extends ActiveRecord {

    public static function tableName() {
        return 'stock';
    }

    public function rules() {
        return [
            [['id', 'price', 'count'], 'integer'],
            [['name', 'type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор'),
            'name' => Yii::t('app', 'Наименование'),
            'price' => Yii::t('app', 'Цена'),
            'count' => Yii::t('app', 'Количество'),
            'type' => Yii::t('app', 'Тип'),
        ];
    }
}