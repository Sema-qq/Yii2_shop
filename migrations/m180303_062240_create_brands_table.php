<?php

use yii\db\Migration;

/**
 * Handles the creation of table `brands`.
 */
class m180303_062240_create_brands_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('brands', [
            'id' => $this->primaryKey()->comment('Ид производителя'),
            'name' => $this->string()->comment('Название производителя'),
            'sort_order' => $this->integer()->comment('Сортировка, пока не определился будем ли использовать'),
            'status' => $this->boolean()->defaultValue(1)
                ->comment('Статус публиковать или нет: 0 - нет, 1 - да'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('brands');
    }
}
