<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'role' => $this->smallInteger()->notNull()->defaultValue(0)
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => '',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin!23'),
            'password_reset_token' => '',
            'email' => Yii::$app->params['adminEmail'],
            'role' => User::ROLE_ADMIN,

            'created_at' => ($currentDate = (new DateTime)->getTimestamp()),
            'updated_at' => $currentDate
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
