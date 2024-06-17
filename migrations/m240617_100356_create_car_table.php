<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m240617_100356_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'mark_id' => $this->integer(),
            'name' => $this->string(255),
            'engine_capacity' => $this->integer()->notNull(),
            'release_date' => $this->string(5)->notNull(),
            'color' => $this->string(255)->notNull(),
            'gear_type_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-car-mark_id',
            'car',
            'mark_id'
        );

        $this->addForeignKey(
            'fk-car-mark_id',
            'car',
            'mark_id',
            'car_mark',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-car-gear_type_id',
            'car',
            'gear_type_id'
        );

        $this->addForeignKey(
            'fk-car-gear_type_id',
            'car',
            'gear_type_id',
            'gear_type',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
