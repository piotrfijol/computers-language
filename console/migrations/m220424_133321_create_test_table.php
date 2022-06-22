<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%chapter}}`
 */
class m220424_133321_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(11)->notNull()->unique(),
            'chapter_id' => $this->integer()->unique()->notNull(),
        ]);

        // creates index for column `chapter_id`
        $this->createIndex(
            '{{%idx-test-chapter_id}}',
            '{{%test}}',
            'chapter_id'
        );

        // add foreign key for table `{{%chapter}}`
        $this->addForeignKey(
            '{{%fk-test-chapter_id}}',
            '{{%test}}',
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
            '{{%fk-test-chapter_id}}',
            '{{%test}}'
        );

        // drops index for column `chapter_id`
        $this->dropIndex(
            '{{%idx-test-chapter_id}}',
            '{{%test}}'
        );

        $this->dropTable('{{%test}}');
    }
}
