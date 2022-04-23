<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%finished_lesson}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%lesson}}`
 */
class m220423_151442_create_finished_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%finished_lesson}}', [
            'id' => $this->primaryKey(11)->notNull()->unique(),
            'user_id' => $this->integer(11)->notNull(),
            'lesson_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-finished_lesson-user_id}}',
            '{{%finished_lesson}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-finished_lesson-user_id}}',
            '{{%finished_lesson}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `lesson_id`
        $this->createIndex(
            '{{%idx-finished_lesson-lesson_id}}',
            '{{%finished_lesson}}',
            'lesson_id'
        );

        // add foreign key for table `{{%lesson}}`
        $this->addForeignKey(
            '{{%fk-finished_lesson-lesson_id}}',
            '{{%finished_lesson}}',
            'lesson_id',
            '{{%lesson}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-finished_lesson-user_id}}',
            '{{%finished_lesson}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-finished_lesson-user_id}}',
            '{{%finished_lesson}}'
        );

        // drops foreign key for table `{{%lesson}}`
        $this->dropForeignKey(
            '{{%fk-finished_lesson-lesson_id}}',
            '{{%finished_lesson}}'
        );

        // drops index for column `lesson_id`
        $this->dropIndex(
            '{{%idx-finished_lesson-lesson_id}}',
            '{{%finished_lesson}}'
        );

        $this->dropTable('{{%finished_lesson}}');
    }
}
