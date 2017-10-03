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
        $this->createTable('tbl_user', [
            'id' => $this->primaryKey(),
            'username'=> $this->string()->notNull(),
            'password'=> $this->text()->notNull(),
            'email'=> $this->string()->notNull(),
            'token'=> $this->text()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tbl_user');
    }
}
