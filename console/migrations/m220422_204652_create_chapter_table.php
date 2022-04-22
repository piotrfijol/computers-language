<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chapter}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%course}}`
 * - `{{%chapter}}`
 */
class m220422_204652_create_chapter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chapter}}', [
            'id' => $this->primaryKey(11)->unique()->notNull(),
            'name' => $this->string(128) . "CHARACTER SET utf8 UNIQUE NOT NULL",
            'description' => $this->string(255) . "CHARACTER SET utf8",
            'course_id' => $this->integer(11)->notNull(),
            'next_chapter' => $this->integer(11),
            'slug' => $this->string(255)->notNull()->unique(),
        ]);

        $this->insert('{{%chapter}}', [
            'name' => 'Czym jest programowanie?',
            'description' => 'Wyjaśnienie podstawowych pojęć, czym zajmują się programiści i wiele innych.',
            'course_id' => 1,
            'next_chapter' => 2,
            'slug' => 'czym-jest-programowanie'
        ]);

        $this->insert('{{%chapter}}', [
            'name' => 'Historia programowania',
            'description' => 'Omówienie początków programowania.',
            'course_id' => 1,
            'next_chapter' => null,
            'slug' => 'historia-programowania'
        ]);

        $this->insert('{{%chapter}}', [
            'name' => 'Historia C++',
            'course_id' => 2,
            'next_chapter' => null,
            'slug' => 'historia-cplusplus'
        ]);

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-chapter-course_id}}',
            '{{%chapter}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-chapter-course_id}}',
            '{{%chapter}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // creates index for column `next_chapter`
        $this->createIndex(
            '{{%idx-chapter-next_chapter}}',
            '{{%chapter}}',
            'next_chapter'
        );

        // add foreign key for table `{{%chapter}}`
        $this->addForeignKey(
            '{{%fk-chapter-next_chapter}}',
            '{{%chapter}}',
            'next_chapter',
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
        $this->delete('{{%chapter}}', ['id' => 3]);
        $this->delete('{{%chapter}}', ['id' => 2]);
        $this->delete('{{%chapter}}', ['id' => 1]);
        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-chapter-course_id}}',
            '{{%chapter}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-chapter-course_id}}',
            '{{%chapter}}'
        );

        // drops foreign key for table `{{%chapter}}`
        $this->dropForeignKey(
            '{{%fk-chapter-next_chapter}}',
            '{{%chapter}}'
        );

        // drops index for column `next_chapter`
        $this->dropIndex(
            '{{%idx-chapter-next_chapter}}',
            '{{%chapter}}'
        );

        $this->dropTable('{{%chapter}}');
    }
}
