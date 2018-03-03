<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_items`.
 */
class m180303_062409_create_order_items_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey()->comment('Ид итем ордер'),
            'order_id' => $this->integer()->comment('Ид заказа fk orders.id'),
            'product_id' => $this->integer()->comment('Ид товара fk products.id'),
            'count_item' => $this->integer()->comment('Количество товара'),
            'summ_item' => $this->integer()->comment('Общая сумма товара'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_items');
    }
}
