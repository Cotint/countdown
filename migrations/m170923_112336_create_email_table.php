<?php

use yii\db\Migration;

/**
 * Handles the creation of table `email`.
 */
class m170923_112336_create_email_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_email', [
            'id' => $this->primaryKey(),
            'email'=> $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tbl_email');
    }
}
