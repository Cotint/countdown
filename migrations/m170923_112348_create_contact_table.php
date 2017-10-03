<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m170923_112348_create_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_contact', [
            'id' => $this->primaryKey(),
            'name'=> $this->string()->notNull(),
            'email'=> $this->string()->notNull(),
            'message'=> $this->text()->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tbl_contact');
    }
}
