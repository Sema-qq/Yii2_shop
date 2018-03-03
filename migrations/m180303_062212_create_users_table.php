<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180303_062212_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey()->comment('Ид пользователя'),
            'name' => $this->string()->comment('Имя пользователя'),
            'email' => $this->string()->comment('Электронная почта'),
            'password' => $this->string()->comment('Пароль'),
            'is_admin' => $this->boolean()->defaultValue(0)->comment('Админ: 0 - нет, 1 - да'),
            'photo' => $this->string()->comment('Фото пользователя'),
            'phone' => $this->integer()->comment('Телефон'),
            'vk_id' => $this->integer()->comment('Ид из вконтакте, для авторизации VK'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
