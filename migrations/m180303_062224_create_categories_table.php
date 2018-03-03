<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m180303_062224_create_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey()->comment('Ид категории'),
            'name' => $this->string()->comment('Название категории'),
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
        $this->dropTable('categories');
    }
}
