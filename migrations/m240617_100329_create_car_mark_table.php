<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_mark}}`.
 */
class m240617_100329_create_car_mark_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_mark}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_mark}}');
    }
}
