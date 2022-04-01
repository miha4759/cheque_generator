<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cheques`.
 */
class m220331_193701_create_cheques_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cheques', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'bank_id' => $this->integer(),
            'recipient' => $this->string(),
            'memo' => $this->text(),
            'amount' => $this->decimal(32, 2),
            'created_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk-cheques-user_id',
            'cheques',
            'user_id',
            'users',
            'id',
            'SET NULL'
        );

        $this->addForeignKey(
            'fk-cheques-bank_id',
            'cheques',
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
        $this->dropTable('cheques');
    }
}
