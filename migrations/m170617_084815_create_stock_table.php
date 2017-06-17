<?php

use yii\db\Migration;

/**
 * Handles the creation of table `stock`.
 */
class m170617_084815_create_stock_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('stock', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255),
            'price'=>$this->integer(),
            'count'=>$this->integer(),
            'type'=>$this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('stock');
    }
}
