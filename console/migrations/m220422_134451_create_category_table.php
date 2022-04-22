<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m220422_134451_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->smallInteger(6)->notNull()->unique() . ' PRIMARY KEY AUTO_INCREMENT',
            'name' => $this->string(128) . ' CHARACTER SET utf8 NOT NULL',
        ]);

        $this->insert('{{%category}}', [
            'name' => 'Ogólne'
        ]);

        $this->insert('{{%category}}', [
            'name' => 'Języki'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%category}}', ['id' => 2]);
        $this->delete('{{%category}}', ['id' => 1]);
        $this->dropTable('{{%category}}');
    }
}
