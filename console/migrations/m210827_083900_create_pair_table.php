<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pair}}`.
 */
class m210827_083900_create_pair_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pair}}', [
            'id' => $this->primaryKey(),
            'pair_name' => $this->string(255)->notNull(),
            'pair_name_ru' => $this->string(255)->notNull(),
            'pair_name_en' => $this->string(255)->notNull(),
            'begin_date' => $this->string(255)->notNull(),
            'end_date' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pair}}');
    }
}
