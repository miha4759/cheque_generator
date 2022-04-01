<?php

use yii\db\Migration;

/**
 * Handles the creation of table `banks`.
 */
class m220331_193010_create_banks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('banks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'postal_code' => $this->string(12),
            'province' => $this->string(),
            'town' => $this->string(),
            'street' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('banks');
    }
}
