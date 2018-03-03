<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m180303_062319_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey()->comment('Ид товара'),
            'name' => $this->string()->comment('Наименование товара'),
            'category_id' => $this->integer()->comment('Ид категории fk categories.id'),
            'code' => $this->integer()->comment('Код товара'),
            'price' => $this->float()->comment('Цена товара'),
            'avialability' => $this->boolean()->defaultValue(1)->comment('Доступность товара'),
            'brand_id' => $this->integer()->comment('Ид бренда fk brands.id'),
            'image' => $this->string()->comment('Изображение товара'),
            'description' => $this->text()->comment('Описание товара'),
            'is_new' => $this->boolean()->defaultValue(1)->comment('1 - новый, 0 - нет'),
            'is_recommended' => $this->boolean()->defaultValue(0)->comment('1 - рекомендуемый, - нет'),
            'status' => $this->boolean()->defaultValue(1)
                ->comment('Разрешен к кубликации: 0 - нет, 1 - да'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
