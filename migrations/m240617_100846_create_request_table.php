<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m240617_100846_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'mark_id' => $this->integer(),
            'engine_capacity' => $this->string(),
            'release_date' => $this->string(5),
            'color' => $this->string(),
            'gear_type_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->integer()->defaultValue(0),
        ]);

        $this->createIndex(
            'idx-request-mark_id',
            'request',
            'mark_id'
        );

        $this->addForeignKey(
            'fk-request-mark_id',
            'request',
            'mark_id',
            'car_mark',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-request-gear_type_id',
            'request',
            'gear_type_id'
        );

        $this->addForeignKey(
            'fk-request-gear_type_id',
            'request',
            'gear_type_id',
            'gear_type',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-request-user_id',
            'request',
            'user_id'
        );

        $this->addForeignKey(
            'fk-request-user_id',
            'request',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%request}}');
    }
}
