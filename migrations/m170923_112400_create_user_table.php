<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170923_112400_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username'=> 'varchar NOT NULL',
            'password'=> 'text NOT NULL',
            'email'=> 'varchar NOT NULL',
            'token'=> 'text',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
