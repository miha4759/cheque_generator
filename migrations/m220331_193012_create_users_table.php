<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m220331_193012_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'bank_id' => $this->integer(),
            'full_name' => $this->string(),
            'postal_code' => $this->string(12),
            'province' => $this->string(),
            'town' => $this->string(),
            'street' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-users-bank_id',
            'users',
            'bank_id',
            'banks',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
