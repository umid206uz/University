<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%room_pair}}`.
 */
class m210827_092312_create_room_pair_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%room_pair}}', [
            'id' => $this->primaryKey(),
            'room_id' => $this->integer()->notNull(),
            'pair_id' => $this->integer()->notNull(),
            'day' => $this->string(255)->notNull(),
        ]);
        $this->addForeignKey("room_room_pair", "room_pair", "room_id", "room", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("pair_room_pair", "room_pair", "pair_id", "pair", "id", "CASCADE", "CASCADE");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%room_pair}}');
    }
}
