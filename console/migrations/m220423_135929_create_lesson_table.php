<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%chapter}}`
 */
class m220423_135929_create_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(11)->notNull()->unique(),
            'title' => $this->string(128) . " CHARACTER SET utf8 NOT NULL UNIQUE",
            'content' => $this->text() . " CHARACTER SET utf8",
            'chapter_id' => $this->integer(11)->notNull(),
            'slug' => $this->string(255)->unique()->notNull(),
        ]);

        // creates index for column `chapter_id`
        $this->createIndex(
            '{{%idx-lesson-chapter_id}}',
            '{{%lesson}}',
            'chapter_id'
        );

        // add foreign key for table `{{%chapter}}`
        $this->addForeignKey(
            '{{%fk-lesson-chapter_id}}',
            '{{%lesson}}',
            'chapter_id',
            '{{%chapter}}',
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
            '{{%fk-lesson-chapter_id}}',
            '{{%lesson}}'
        );

        // drops index for column `chapter_id`
        $this->dropIndex(
            '{{%idx-lesson-chapter_id}}',
            '{{%lesson}}'
        );

        $this->dropTable('{{%lesson}}');
    }
}
