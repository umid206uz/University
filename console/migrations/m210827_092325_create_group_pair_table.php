<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group_pair}}`.
 */
class m210827_092325_create_group_pair_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group_pair}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'pair_id' => $this->integer()->notNull(),
            'day' => $this->string(255)->notNull(),
        ]);
        $this->addForeignKey("group_group_pair", "group_pair", "group_id", "group", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("pair_group_pair", "group_pair", "pair_id", "pair", "id", "CASCADE", "CASCADE");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group_pair}}');
    }
}
