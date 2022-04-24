<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%test}}`
 */
class m220424_133603_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(11)->notNull()->unique(),
            'question' => $this->string(255) . ' CHARACTER SET utf8 NOT NULL',
            'answer_a' => $this->string(255) . ' CHARACTER SET utf8',
            'answer_b' => $this->string(255) . ' CHARACTER SET utf8',
            'answer_c' => $this->string(255) . ' CHARACTER SET utf8',
            'answer_d' => $this->string(255) . ' CHARACTER SET utf8',
            'test_id' => $this->integer()->notNull(),
            'correct_answer' => $this->string(1)->notNull(),
        ]);

        // creates index for column `test_id`
        $this->createIndex(
            '{{%idx-question-test_id}}',
            '{{%question}}',
            'test_id'
        );

        // add foreign key for table `{{%test}}`
        $this->addForeignKey(
            '{{%fk-question-test_id}}',
            '{{%question}}',
            'test_id',
            '{{%test}}',
            'id',
            'CASCADE'
        );

        $this->insert('{{%question}}', [
            'question' => 'Przykładowe pytanie numer 1',
            'answer_a' => 'Odpowiedź a',
            'answer_b' => 'Odpowiedź b',
            'answer_c' => 'Odpowiedź c',
            'answer_d' => 'Odpowiedź d',
            'test_id' => 1,
            'correct_answer' => 'c'
        ]);
        $this->insert('{{%question}}', [
            'question' => 'Przykładowe pytanie numer 2',
            'answer_a' => 'Odpowiedź a',
            'answer_b' => 'Odpowiedź b',
            'answer_c' => 'Odpowiedź c',
            'answer_d' => 'Odpowiedź d',
            'test_id' => 1,
            'correct_answer' => 'b'
        ]);
        $this->insert('{{%question}}', [
            'question' => 'Przykładowe pytanie numer 3',
            'answer_a' => 'Odpowiedź a',
            'answer_b' => 'Odpowiedź b',
            'answer_c' => 'Odpowiedź c',
            'answer_d' => 'Odpowiedź d',
            'test_id' => 1,
            'correct_answer' => 'a'
        ]);
        $this->insert('{{%question}}', [
            'question' => 'Przykładowe pytanie numer 4',
            'answer_a' => 'Odpowiedź a',
            'answer_b' => 'Odpowiedź b',
            'answer_c' => 'Odpowiedź c',
            'answer_d' => 'Odpowiedź d',
            'test_id' => 1,
            'correct_answer' => 'd'
        ]);
        $this->insert('{{%question}}', [
            'question' => 'Przykładowe pytanie numer 5',
            'answer_a' => 'Odpowiedź a',
            'answer_b' => 'Odpowiedź b',
            'answer_c' => 'Odpowiedź c',
            'answer_d' => 'Odpowiedź d',
            'test_id' => 1,
            'correct_answer' => 'c'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%question}}', ['id' => 5]);
        $this->delete('{{%question}}', ['id' => 4]);
        $this->delete('{{%question}}', ['id' => 3]);
        $this->delete('{{%question}}', ['id' => 2]);
        $this->delete('{{%question}}', ['id' => 1]);

        // drops foreign key for table `{{%test}}`
        $this->dropForeignKey(
            '{{%fk-question-test_id}}',
            '{{%question}}'
        );

        // drops index for column `test_id`
        $this->dropIndex(
            '{{%idx-question-test_id}}',
            '{{%question}}'
        );

        $this->dropTable('{{%question}}');
    }
}
