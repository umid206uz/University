<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher_lesson}}`.
 */
class m210827_083916_create_teacher_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher_lesson}}', [
            'id' => $this->primaryKey(),
            'day' => $this->string(255)->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'pair_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey("lesson_lesson_teacher", "teacher_lesson", "lesson_id", "lesson", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("teacher_lesson_teacher", "teacher_lesson", "teacher_id", "teacher", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("pair_lesson_teacher", "teacher_lesson", "pair_id", "pair", "id", "CASCADE", "CASCADE");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teacher_lesson}}');
    }
}
