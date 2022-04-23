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

        $this->insert('{{%lesson}}', [
            'title' => 'Zawód programista',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet felis vel leo lacinia gravida. Pellentesque nec ornare ipsum. Suspendisse nec ultricies dui. Sed aliquet, erat eu tincidunt interdum, libero ex eleifend ipsum, faucibus hendrerit nibh justo a sapien. Sed ut eros eget purus tincidunt egestas. Praesent vestibulum odio nec volutpat viverra. Nullam porta urna id neque hendrerit dignissim. Sed mauris urna, scelerisque ut euismod quis, varius vitae lacus. Fusce pretium orci lorem. Pellentesque interdum ex eu leo sodales, sed laoreet mauris facilisis. Donec ullamcorper dolor a porta dignissim. Praesent bibendum condimentum maximus.',
            'chapter_id' => 1,
            'slug' => 'zawod-programista'
        ]);

        $this->insert('{{%lesson}}', [
            'title' => 'Od czego zacząć przygodę z programowaniem?',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet felis vel leo lacinia gravida. Pellentesque nec ornare ipsum. Suspendisse nec ultricies dui. Sed aliquet, erat eu tincidunt interdum, libero ex eleifend ipsum, faucibus hendrerit nibh justo a sapien. Sed ut eros eget purus tincidunt egestas. Praesent vestibulum odio nec volutpat viverra. Nullam porta urna id neque hendrerit dignissim. Sed mauris urna, scelerisque ut euismod quis, varius vitae lacus. Fusce pretium orci lorem. Pellentesque interdum ex eu leo sodales, sed laoreet mauris facilisis. Donec ullamcorper dolor a porta dignissim. Praesent bibendum condimentum maximus.',
            'chapter_id' => 1,
            'slug' => 'od-czego-zaczac-przygode-z-programowaniem'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // delete value with id = 2 from lesson table
        $this->delete('{{%lesson}}', ['id' => 2]);

        // delete value with id = 1 from lesson table
        $this->delete('{{%lesson}}', ['id' => 1]);

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
