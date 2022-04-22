<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m220422_145138_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(11)->unique()->notNull(),
            'name' => $this->string(128) . "CHARACTER SET utf8 UNIQUE NOT NULL",
            'img_url' => $this->string(512)->notNull()->unique(),
            'category_id' => $this->smallInteger()->notNull(),
            'slug' => $this->string(255)->unique()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-course-category_id}}',
            '{{%course}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-course-category_id}}',
            '{{%course}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
        

        //Insert some sample data
        $this->insert("{{%course}}", [
            'name' => "Podstawy",
            'img_url' => 'https://iconutopia.com/wp-content/uploads/2016/06/basics-01.png',
            'category_id' => 1,
            'slug' => "podstawy"
        ]);

        $this->insert("{{%course}}", [
            'name' => "C++",
            'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/ISO_C%2B%2B_Logo.svg/1822px-ISO_C%2B%2B_Logo.svg.png',
            'category_id' => 2,
            'slug' => "cplusplus"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        //Remove inserted data
        $this->delete(['id' => 2]);
        $this->delete(['id' => 1]);

        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-course-category_id}}',
            '{{%course}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-course-category_id}}',
            '{{%course}}'
        );

        $this->dropTable('{{%course}}');
    }
}
