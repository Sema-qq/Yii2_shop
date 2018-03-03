<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m180303_062403_create_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey()->comment('Ид заказа'),
            'count' => $this->integer()->comment('Количество товаров в заказе'),
            'summ' => $this->float()->comment('Общая сумма заказа'),
            'status' => $this->integer()->defaultValue(0)
                ->comment('Статус: 0 - новый, 1 - в обработке, 2 - отправлен, 3 - завершен'),
            'user_id' => $this->string()->comment('Ид пользователя fk users.id'),
            'address' => $this->string()->comment('Адрес, куда нужно отправить заказ'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('orders');
    }
}
