<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m220612_204023_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'number' => $this->integer()->notNull()->unique(),
            'store_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-device-store_id',
            'device',
            'store_id'
        );

        $this->addForeignKey(
            'fk-device-store_id',
            'device',
            'store_id',
            'store',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-device-store_id',
            'device'
        );

        $this->dropIndex(
            'idx-device-store_id',
            'device'
        );

        $this->dropTable('{{%device}}');
    }
}
