<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%finished_chapter}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%chapter}}`
 * - `{{%user}}`
 */
class m220425_134131_create_finished_chapter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%finished_chapter}}', [
            'id' => $this->primaryKey(11)->notNull()->unique(),
            'chapter_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `chapter_id`
        $this->createIndex(
            '{{%idx-finished_chapter-chapter_id}}',
            '{{%finished_chapter}}',
            'chapter_id'
        );

        // add foreign key for table `{{%chapter}}`
        $this->addForeignKey(
            '{{%fk-finished_chapter-chapter_id}}',
            '{{%finished_chapter}}',
            'chapter_id',
            '{{%chapter}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-finished_chapter-user_id}}',
            '{{%finished_chapter}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-finished_chapter-user_id}}',
            '{{%finished_chapter}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%chapter}}`
        $this->dropForeignKey(
            '{{%fk-finished_chapter-chapter_id}}',
            '{{%finished_chapter}}'
        );

        // drops index for column `chapter_id`
        $this->dropIndex(
            '{{%idx-finished_chapter-chapter_id}}',
            '{{%finished_chapter}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-finished_chapter-user_id}}',
            '{{%finished_chapter}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-finished_chapter-user_id}}',
            '{{%finished_chapter}}'
        );

        $this->dropTable('{{%finished_chapter}}');
    }
}
