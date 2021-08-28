<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shedule}}`.
 */
class m210827_092346_create_shedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shedule}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'lesson_id' => $this->integer()->notNull(),
            'room_id' => $this->integer()->notNull(),
            'pair_id' => $this->integer()->notNull(),
            'day' => $this->string(255)->notNull(),
        ]);
        $this->addForeignKey("shedule_group", "shedule", "group_id", "group", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("shedule_teacher", "shedule", "teacher_id", "teacher", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("shedule_lesson", "shedule", "lesson_id", "lesson", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("shedule_room", "shedule", "room_id", "room", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("shedule_pair", "shedule", "pair_id", "pair", "id", "CASCADE", "CASCADE");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shedule}}');
    }
}
