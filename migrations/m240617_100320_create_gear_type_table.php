<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gear_type}}`.
 */
class m240617_100320_create_gear_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gear_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%gear_type}}');
    }
}
